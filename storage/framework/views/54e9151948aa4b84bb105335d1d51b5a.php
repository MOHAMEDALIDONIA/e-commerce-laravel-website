<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <?php if(session()->has('message')): ?>
            <div class="alert alert-danger">
               <?php echo e(session('message')); ?>

            </div>
           <?php endif; ?>
            <h4>My Cart</h4>
            <hr>
    
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        <?php $__empty_1 = true; $__currentLoopData = $cartlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                         <?php if($cartitem->product): ?>
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <a href="<?php echo e(url('/collections/'.$cartitem->product->category->slug.'/'.$cartitem->product->slug)); ?>">
                                            <label class="product-name">
                                                <?php if($cartitem->product->productImages): ?>
                                                 <img src="<?php echo e(asset($cartitem->product->productImages[0]->image)); ?>" style="width: 50px; height: 50px" alt="">
                                                <?php else: ?>
                                                 <img src="" style="width: 50px; height: 50px" alt="">
                                                <?php endif; ?>
                                            
                                                <?php echo e($cartitem->product->name); ?>

                                         
                                            <?php if($cartitem->productColor): ?>
                                                <span>- Color: <?php echo e($cartitem->productColor->color->name); ?></span>
                                            <?php endif; ?>
                                         </label> 
                                        </a>
                                    </div>
                                    <div class="col-md-1 my-auto">
                                        <label class="price">$<?php echo e($cartitem->product->selling_price); ?></label>
                                    </div>
                                    <div class="col-md-2 col-7 my-auto">
                                        <div class="quantity">
                                            <div class="input-group">
                                                <button type="button" wire:loading.attr="disabled" wire:click="decermentQuantity(<?php echo e($cartitem->id); ?>)" class="btn btn1"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="<?php echo e($cartitem->quantity); ?>" class="input-quantity" />
                                                <button type="button" wire:loading.attr="disabled" wire:click="incermentQuantity(<?php echo e($cartitem->id); ?>)" class="btn btn1"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 my-auto">
                                        <label class="price">$<?php echo e($cartitem->product->selling_price * $cartitem->quantity); ?></label>
                                        <?php $TotalPrice +=  $cartitem->product->selling_price * $cartitem->quantity ?>
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <button type="button" wire:loading.attr="disabled" wire:click="removeCartItem(<?php echo e($cartitem->id); ?>)" class="btn btn-danger btn-sm">
                                                <span wire:loading.remove wire:target="removeCartItem(<?php echo e($cartitem->id); ?>)">
                                                    <i class="fa fa-trash"></i> Remove
                                                </span>
                                                <span wire:loading wire:target="removeCartItem(<?php echo e($cartitem->id); ?>)">
                                                    <i class="fa fa-trash"></i> Removing..
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                             
                         <?php endif; ?>
                          
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                         <h4>NO Cart Added</h4>
                            
                        <?php endif; ?>

                      
                    
                     
                                
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 my-md-auto mt-3">
                    <h5>
                        Get the Best deals & Offers <a href="<?php echo e(url('/collections')); ?>">Shop now</a>
                    </h5>

                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h4>Total:
                            <span class="float-end"> $<?php echo e($TotalPrice); ?></span>

                        </h4>
                        <hr>
                        <a href="<?php echo e(url('/checkout')); ?>" class="btn btn-warning w-100">Checkout</a>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php /**PATH D:\project1\resources\views/livewire/frontend/cart/cart-show.blade.php ENDPATH**/ ?>