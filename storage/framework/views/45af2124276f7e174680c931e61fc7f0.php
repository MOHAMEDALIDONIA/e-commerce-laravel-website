
<?php $__env->startSection('title','New Arrival'); ?>
<?php $__env->startSection('content'); ?>
<div class="py-5 bg-white">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h4>New Arrivals</h4>
                <div class="underline mb-4"></div>
            </div>
       
                  

                    <?php $__empty_1 = true; $__currentLoopData = $newArrivalProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-md-3">
                            <div class="product-card">
                                <div class="product-card-img">
            
                                    <label class="stock bg-danger">New</label>
            
                                    <?php if($productitem->productImages->count() > 0): ?>
                                    <a href="<?php echo e(url('/collections/'.$productitem->category->slug.'/'.$productitem->slug)); ?>">
                                        <img src="<?php echo e(asset($productitem->productImages[0]->image)); ?>"
                                            alt="<?php echo e($productitem->name); ?>">
                                    </a>
                                    <?php endif; ?>
                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand"><?php echo e($productitem->brands); ?></p>
                                    <h5 class="product-name">
                                        <a
                                            href="<?php echo e(url('/collections/'.$productitem->category->slug.'/'.$productitem->slug)); ?>">
                                            <?php echo e($productitem->name); ?>

                                        </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">$<?php echo e($productitem->selling_price); ?></span>
                                        <span class="original-price">$<?php echo e($productitem->original_price); ?></span>
                                    </div>
                                    <div class="mt-2">
                                        <a href="" class="btn btn1">Add To Cart</a>
                                        <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                        <a href="" class="btn btn1"> View </a>
                                    </div>
                                </div>
                            </div>
            
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-md-12 p-2">
                            <h4>No Products Available </h4>
                        </div>
                      
                    <?php endif; ?>
                    <div class="text-center">
                        <a href="<?php echo e(url('/collections')); ?>" class="btn btn-warning px-3">View More</a>

                    </div>
                
        </div>
     
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project1\resources\views/frontend/pages/new-arrival.blade.php ENDPATH**/ ?>