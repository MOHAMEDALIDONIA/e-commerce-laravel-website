
<?php $__env->startSection('title','Search'); ?>
<?php $__env->startSection('content'); ?>
<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <h4>Search Results</h4>
                <div class="underline mb-4"></div>
            </div>
       
                  

                    <?php $__empty_1 = true; $__currentLoopData = $searchProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                     <div class="col-md-10">
                        <div class="product-card">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="product-card-img">
                    
                                            <label class="stock bg-danger">New</label>
                    
                                            <?php if($productitem->productImages->count() > 0): ?>
                                            <a href="<?php echo e(url('/collections/'.$productitem->category->slug.'/'.$productitem->slug)); ?>">
                                                <img src="<?php echo e(asset($productitem->productImages[0]->image)); ?>"
                                                    alt="<?php echo e($productitem->name); ?>">
                                            </a>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                    <div class="col-md-9">
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
                                            <p style="height: 45px; overflow:hidden;">
                                              <b>Description:</b><?php echo e($productitem->description); ?>

                                            </p>
                                            <a href="<?php echo e(url('/collections/'.$productitem->category->slug.'/'.$productitem->slug)); ?>" class="btn btn-outline-primary">View</a>
                                        </div>

                                    </div>
                                </div>    
                        </div>
                     </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-md-12 p-2">
                            <h4>No Such Products Found </h4>
                        </div>
                      
                    <?php endif; ?>
                    <div class="text-center">
                        <a href="<?php echo e(url('/collections')); ?>" class="btn btn-warning px-3">View More</a>

                    </div>
                
        </div>
     
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project1\resources\views/frontend/pages/search.blade.php ENDPATH**/ ?>