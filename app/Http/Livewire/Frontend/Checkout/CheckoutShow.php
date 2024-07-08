<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Carts;
use App\Models\Order;
use App\Models\Orderitem;
use Livewire\Component;
use Illuminate\Support\Str;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CheckoutShow extends Component
{   public $carts,$totalProductAmount = 0;
    public $fullname,$email,$phone,$pincode,$address,$payment_mode = NULL,$payment_id = NULL;
    public function rules(){
      return[ 
         'fullname'=>'string|required|max:121',
         'email'=>'email|required|max:121',
         'phone'=>'string|required|max:13|min:10',
         'pincode'=>'string|required|max:6|min:6',
         'address'=>'string|required|max:500',
    ];
    }
    public function placeOrder(){
         $this->validate();
        $order = Order::create([
            'user_id'=>auth()->user()->id,
            'tracking_no'=>'Mo-'.Str::random(10),
            'fullname'=>$this->fullname,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'pincode'=>$this->pincode,
            'address'=>$this->address,
            'status_message'=>'in progress',
            'payment_mode'=>$this->payment_mode,
            'payment_id'=>$this->payment_id,
        ]);
        foreach($this->carts as $cartitem){
            $orderItem = Orderitem::create([
                'order_id'=>$order->id,
                'product_id'=>$cartitem->product_id,
                'product_color_id'=>$cartitem->product_color_id,
                'quantity'=>$cartitem->quantity,
                'price'=>$cartitem->product->selling_price ,
            ]);
           
         

        }
        $this->emit('CartAddedUpdated');
        if($cartitem->product_color_id != NULL){
            $cartitem->productColor()->where('id',$cartitem->product_color_id)->decrement('quantity',$cartitem->quantity);
        }else{
            $cartitem->product()->where('id',$cartitem->product_id)->decrement('quantity',$cartitem->quantity);
        }
        return $order;

    }
    public function codOrder(){
        $this->payment_mode= 'Cash ON Delivery';
      $codorder=  $this->placeOrder();
      if($codorder){ 
        Carts::where('user_id',auth()->user()->id)->delete();
    
        session()->flash('message','Order Palced Successfully');
        return redirect()->to('thank-you');
      }else{
        session()->flash('message','Something Went Wrong');
      }
        
    }
    public function totalProductAmount(){
        $this->carts = Carts::where('user_id',auth()->user()->id)->get();
         $this->totalProductAmount=0;
        foreach($this->carts as $cartitem){
            $this->totalProductAmount +=  $cartitem->product->selling_price * $cartitem->quantity;
         

        }
        return $this->totalProductAmount;
    }
    public function checkout(){
        $provider = new PayPalClient([]);
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);
        // dd($provider);
       
       $order = $provider->createOrder([
        "intent" => "CAPTURE",
        "application_context" => [
            "return_url" => route('payment.success'),
            "cancel_url" => route('payment.cancel'),
        ],
        "purchase_units" => [
            0 => [
                "amount" => [
                    "currency_code" => "USD",
                    "value" => "100"
                ]
            ]
        ]
    ]);
       return redirect($order['links'][1]['href']);

    }
    public function render()
    { 
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show',[
            'totalProductAmount'=> $this->totalProductAmount
        ]);
    }
}
