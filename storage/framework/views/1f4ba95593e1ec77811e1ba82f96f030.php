
<?php $__env->startSection('title','My Orders Details'); ?>
<?php $__env->startSection('content'); ?>
<div class="py-3 py-md-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="text-primary">
                        <i class="fa fa-shopping-cart text-dark"></i>My Order Details
                        <a href="<?php echo e(url('orders')); ?>" class="btn btn-danger btn-sm float-end">Back</a>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details </h5>
                            <hr> 
                            <h6>Order Id:<?php echo e($order->id); ?></h6>
                            <h6>Tracking Id/No:<?php echo e($order->tracking_no); ?></h6>
                            <h6>Order  Date:<?php echo e($order->created_at->format('d-m-Y h:i A')); ?></h6>
                            <h6>Payment Mode:<?php echo e($order->payment_mode); ?></h6>
                            <h6 class="border p-2 text-success">
                                Order Status Message: <span class="text-uppercase"><?php echo e($order->status_message); ?></span>
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h5>User Details </h5>
                            <hr> 
                            <h6>Full Name:<?php echo e($order->fullname); ?></h6>
                            <h6>Email Id:<?php echo e($order->email); ?></h6>
                            <h6>Phone:<?php echo e($order->phone); ?></h6>
                            <h6>Address:<?php echo e($order->address); ?></h6>
                            <h6>Pin Code:<?php echo e($order->pincode); ?></h6>
                          
                        </div>
                    </div>
                    <br>
                    <h5>Order Items</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>   
                               
                             <tr>
                                <th>Item ID</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            

                             </tr>
                                
                              
                                
                            </thead>
                            <tbody>
                                <?php
                                     $totalprice = 0 ;                                    
                                ?>
                                <?php $__currentLoopData = $order->orderItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr>
                                    <td width="10%"><?php echo e($item->id); ?></td>
                                    <td width="10%">
                                        <?php if($item->product->productImages): ?>
                                        <img src="<?php echo e(asset($item->product->productImages[0]->image)); ?>" style="width: 50px; height: 50px" alt="">
                                       <?php else: ?>
                                        <img src="" style="width: 50px; height: 50px" alt="">
                                       <?php endif; ?>

                                    </td>
                                    <td width="10%">
                                        <?php echo e($item->product->name); ?>

                                         
                                        <?php if($item->productColor): ?>
                                            <span>- Color: <?php echo e($item->productColor->color->name); ?></span>
                                        <?php endif; ?>
                                    </td>
                                
                                
                                    <td width="10%"><?php echo e($item->price); ?></td>
                                    
                                    <td width="10%"><?php echo e($item->quantity); ?></td>
                                    
                                    <td width="10%" class="fw-bold"><?php echo e($item->quantity * $item->price); ?></td>
                                 </tr>
                                    
                                  <?php
                                      $totalprice += $item->quantity * $item->price
                                  ?>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="5" class="fw-bold">Total Price:</td>
                                    <td colspan="1" class="fw-bold">$<?php echo e($totalprice); ?></td>
                                </tr>
                            </tbody>
                        </table>  
                     

                    </div>
                   
                </div>
            </div>
        </div>
    </div>  
</div>             
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project1\resources\views/frontend/orders/view.blade.php ENDPATH**/ ?>