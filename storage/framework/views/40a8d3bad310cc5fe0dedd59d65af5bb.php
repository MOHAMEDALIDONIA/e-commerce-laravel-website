<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading"><?php echo e($appsetting->website_name ?? 'website name'); ?></h4>
                    <div class="footer-underline"></div>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="<?php echo e(url('/')); ?>" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="<?php echo e(url('/about-us')); ?>" class="text-white">About Us</a></div>
                    <div class="mb-2"><a href="<?php echo e(url('/contact-us')); ?>" class="text-white">Contact Us</a></div>
                    <div class="mb-2"><a href="<?php echo e(url('/blogs')); ?>" class="text-white">Blogs</a></div>
                    <div class="mb-2"><a href="" class="text-white">Sitemaps</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Shop Now</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="<?php echo e(url('/collections')); ?>" class="text-white">Collections</a></div>
                    <div class="mb-2"><a href="<?php echo e(url('/')); ?>" class="text-white">Trending Products</a></div>
                    <div class="mb-2"><a href="<?php echo e(url('/new-arrivals')); ?>" class="text-white">New Arrivals Products</a></div>
                    <div class="mb-2"><a href="<?php echo e(url('/featured-products')); ?>" class="text-white">Featured Products</a></div>
                    <div class="mb-2"><a href="<?php echo e(url('/cart')); ?>" class="text-white">Cart</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i><?php echo e($appsetting->address ?? 'address'); ?>

                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> <?php echo e($appsetting->phone1 ?? 'phone1'); ?>

                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> <?php echo e($appsetting->email1 ?? 'email'); ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2022 - MOD of Web IT - Ecommerce. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        <?php if($appsetting->facebook): ?>
                         <a href="<?php echo e($appsetting->facebook); ?>" target="_blank"><i class="fa fa-facebook" ></i></a>
                            
                        <?php endif; ?>
                        <?php if($appsetting->twitter): ?>
                        <a href="<?php echo e($appsetting->twitter); ?>" target="_blank"><i class="fa fa-twitter" ></i></a>
                           
                       <?php endif; ?>
                       <?php if($appsetting->instagram): ?>
                       <a href="<?php echo e($appsetting->instagram); ?>" target="_blank"><i class="fa fa-instagram" ></i></a>
                          
                      <?php endif; ?>
                      <?php if($appsetting->youtube): ?>
                      <a href="<?php echo e($appsetting->youtube); ?>" target="_blank"><i class="fa fa-youtube" ></i></a>
                         
                     <?php endif; ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\project1\resources\views/layouts/inc/frontend/footer.blade.php ENDPATH**/ ?>