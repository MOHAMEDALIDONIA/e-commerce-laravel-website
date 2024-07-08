
<?php $__env->startSection('title','Home Page'); ?>
<?php $__env->startSection('content'); ?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">



    <div class="carousel-inner">
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slideritem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
            <?php if($slideritem->image): ?>
            <img src="<?php echo e(asset("$slideritem->image")); ?>" class="d-block w-100" alt="...">
            <?php endif; ?>
     
        <div class="carousel-caption d-none d-md-block">
            <div class="custom-carousel-content">
                <h1>
                    <?php echo e($slideritem->title); ?>

                </h1>
                <p>
                    <?php echo e($slideritem->description); ?>

                </p>
                <div>
                    <a href="#" class="btn btn-slider">
                        Get Now
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
</button>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h4>Welcome to MOD Ecom</h4>
                <div class="underline mx-auto">
                </div>
                <p>

                    MOD Ecom is a reputable online retailer offering a wide array of products, including clothing,
                    shoes, watches, laptops, phones, and more.
                    Its commitment to quality, convenience, and customer satisfaction positions the company as a
                    reliable and trusted choice for individuals seeking a seamless and enjoyable online shopping
                    experience.
                    MOD Ecom is an innovative online e-commerce company that specializes in offering a wide range of
                    products to cater to diverse customer needs. As the name suggests,
                    MOD Ecom brings a modern and contemporary approach to the world of online shopping. With a focus on
                    convenience and accessibility,
                    MOD Ecom strives to provide customers with a seamless and enjoyable shopping experience from the
                    comfort of their own homes.
                </p>
            </div>

        </div>
    </div>


</div>
<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Tranding Products</h4>
                <div class="underline mb-4"></div>
            </div>

            <?php if($trandingProducts): ?>
            <div class="col-md-12">



                <div class="owl-carousel owl-theme tranding-product">
                    <?php $__currentLoopData = $trandingProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="item">



                        <div class="product-card">
                            <div class="product-card-img">

                                <label class="stock bg-danger">new</label>

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

                            </div>
                        </div>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <?php else: ?>
            <div class="col-md-12">
                <div class="p-2">
                    <h4>No Products Available</h4>
                </div>
            </div>
            <?php endif; ?>



        </div>

    </div>
</div>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $('.tranding-product').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project1\resources\views/frontend/index.blade.php ENDPATH**/ ?>