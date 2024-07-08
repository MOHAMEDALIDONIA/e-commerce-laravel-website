<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Carts;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{   public $category,$product,$prodColorSelectedQuantity,$quantityCount = 1,$productColorId;
    public function addToWishlist($productId){
        if(Auth::check()){
            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()){
               
                
                $this->dispatchBrowserEvent('message',
                    [
                    'text' => 'Already added to wishlist',
                    'type'=>'success',
                    'status'=>409
                    ]
               );
                return false;
            }else{
                    Wishlist::create([
                        'user_id'=>auth()->user()->id,
                        'product_id'=>$productId,
                    ]);
                    $this->emit('wishlistAdded');
                  
                    $this->dispatchBrowserEvent('message',
                    [
                       'text' => 'wishlist Added Successfully',
                       'type'=>'success',
                       'status'=>200
                    ]
                   );
            }


        }else{
          
            $this->dispatchBrowserEvent('message',
             [
                'text' => 'Please Login To continue',
                'type'=>'info',
                'status'=>401
             ]
            );
            return false;
        }
    }
    public function decermentQuantity(){
        if($this->quantityCount > 1){

            $this->quantityCount--;
        }

    }
    public function incermentQuantity(){
        if($this->quantityCount < 10){

            $this->quantityCount++;
        }

    }
    public function addToCart($productId){
        if(Auth::check()){
            if($this->product->where('id',$productId)->where('status','0')->exists()){
              //check for product color quantityand add to cart
              if($this->product->productColors()->count() > 1){
                if($this->prodColorSelectedQuantity != NULL){
                 if(Carts::where('user_id',auth()->user()->id)->where('product_id',$productId)->where('product_color_id',$this->productColorId)->exists()){
                        session()->flash('message','Product Already Added');
                        return false;
    
                  }else{
                        $productcolor= $this->product->productColors()->where('id',$this->productColorId)->first();
                        if($productcolor->quantity > 0){
                            if($productcolor->quantity > $this->quantityCount){
                                //insert product to cart
                                Carts::create([
                                    'user_id'=>auth()->user()->id,
                                    'product_id'=>$productId,
                                    'product_color_id'=>$this->productColorId,
                                    'quantity'=>$this->quantityCount,
                                ]);
                                $this->emit('CartAddedUpdated');
                                session()->flash('message','Product Added to Cart Successfully');
                                return false;

                            }else{
                                session()->flash('message','Only '.$productcolor->quantity.' Quantity Available');
                                return false;
            
                            }

                        }else{
                            session()->flash('message','Out of stock');
                            return false;


                        }

                  }
                   

                }else{
                    
                        session()->flash('message','Select Your Product Color Frist');
                        return false;

                }

              }else{
                  if(Carts::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()){
                    session()->flash('message','Product Already Added');
                    return false;

                  }else{
                        if($this->product->quantity > 0 ){
                            if($this->product->quantity > $this->quantityCount){

                                //insert product to cart
                                Carts::create([
                                    'user_id'=>auth()->user()->id,
                                    'product_id'=>$productId,
                                    'quantity'=>$this->quantityCount,
                                ]);
                                $this->emit('CartAddedUpdated');
                                session()->flash('message','Product Added to Cart Successfully');
                                return false;

                            }else{
                                session()->flash('message','Only'.$this->product->quantity.'Quantity Available');
                                return false;
            
                            }

                        }else{
                            session()->flash('message','Out of stock');
                            return false;

                        }

                  }
                  

              }  
          

            }else{
                session()->flash('message','Product does not exists');
                return false;

            }
       

        }else{
            session()->flash('message','Please Login To add to cart');
            return false;
        }


    }
    public function colorSelected($productColorId){
    
        $this->productColorId = $productColorId;
         $productcolor = $this->product->productColors()->where('id',$productColorId)->first();
         $this->prodColorSelectedQuantity = $productcolor->quantity;
         if($this->prodColorSelectedQuantity == 0){
             $this->prodColorSelectedQuantity = 'outofstock';
         }

    }
    public function mount($category,$product){
        $this->category=$category;
        $this->product=$product;
    }
    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category'=>$this->category,
            'product'=>$this->product,
        ]);
    }
}
