<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Carts;
use Livewire\Component;

class CartShow extends Component
{   public $cartlist,$TotalPrice = 0;
    public function decermentQuantity(int $cartId){
        $cartData=Carts::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartData){
            if($cartData->productColor()->where('id',$cartData->product_color_id)->exists()){
                $productcolor = $cartData->productColor()->where('id',$cartData->product_color_id)->first();
                 if($productcolor->quantity > $cartData->quantity){
                    $cartData->decrement('quantity');
                    session()->flash('message','Quantity Updated');
                    return false;
        
                 }else{
                    session()->flash('message','Only'.$productcolor->quantity.'Quantity Available');
                    return false;
                 }

            }else{
                if($cartData->product->quantity > $cartData->quantity){
                    $cartData->decrement('quantity');
                    session()->flash('message','Quantity Updated');
                    return false;
        

                }else{
                    session()->flash('message','Only'.$cartData->product->quantity.'Quantity Available');
                    return false;

                }
            }
           

        }else{
            session()->flash('message','Something Went Wrong!');
            return false;

        }

    }
    public function incermentQuantity(int $cartId){
        $cartData=Carts::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartData){
            if($cartData->productColor()->where('id',$cartData->product_color_id)->exists()){
                $productcolor = $cartData->productColor()->where('id',$cartData->product_color_id)->first();
                 if($productcolor->quantity > $cartData->quantity){
                    $cartData->increment('quantity');
                    session()->flash('message','Quantity Updated');
                    return false;
        
                 }else{
                    session()->flash('message','Only'.$productcolor->quantity.'Quantity Available');
                    return false;
                 }

            }else{
                if($cartData->product->quantity > $cartData->quantity){
                    $cartData->increment('quantity');
                    session()->flash('message','Quantity Updated');
                    return false;
        

                }else{
                    session()->flash('message','Only'.$cartData->product->quantity.'Quantity Available');
                    return false;

                }
            }
           

        }else{
            session()->flash('message','Something Went Wrong!');
            return false;

        }

    }
    public function removeCartItem(int $cartId){
       $cartremoveData= Carts::where('user_id',auth()->user()->id)->where('id',$cartId)->first();
       if($cartremoveData){$cartremoveData->delete();
        $this->emit('CartAddedUpdated');
        session()->flash('message','cart deleted Successfully');

       }else{
        session()->flash('message','Something Went Wrong!');
        return false;
       }

    }
    public function render()
    {  
        $this->cartlist= Carts::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show',[
            'cartlist'=>$this->cartlist
        ]);
    }
}
