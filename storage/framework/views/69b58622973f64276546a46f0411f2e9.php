
<?php $__env->startSection('title','My Orders'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
              <h3>My Orders
            
              </h3>

            </div>
            <div class="card-body">
                  <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label >Filter by Date</label>
                            <input type="date" name="date" value="<?php echo e(Request::get('date') ?? date('Y-m-d')); ?>" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label >Filter by Status</label>
                          <select name="status"  class="form-select">
                            <option value="">Select All Status</option>
                            <option value="in progress"<?php echo e(Request::get('status')== 'in progress'? 'selected':''); ?>>In Progress</option>
                            <option value="completed"<?php echo e(Request::get('status')== 'completed'? 'selected':''); ?>>Completed</option>
                            <option value="panding"<?php echo e(Request::get('status')== 'panding'? 'selected':''); ?>>Panding</option>
                            <option value="cancelled"<?php echo e(Request::get('status')== 'cancelled'? 'selected':''); ?>>Cancelled</option>
                            <option value="out-for-delivery"<?php echo e(Request::get('status')== 'out-for-delivery'? 'selected':''); ?>>Out for delivery</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                  </form>
                  <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>   
                               
                             <tr>
                                <th>Order ID</th>
                                <th>Tracking No</th>
                                <th>Username</th>
                                <th>Payment Mode</th>
                                <th>Ordered Date</th>
                                <th>Status Massage</th>
                                <th>Action</th>

                             </tr>
                                
                              
                                
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                 <tr>
                                    <td><?php echo e($item->id); ?></td>
                                    <td><?php echo e($item->tracking_no); ?></td>
                                    <td><?php echo e($item->fullname); ?></td>
                                    <td><?php echo e($item->payment_mode); ?></td>
                                    <td><?php echo e($item->created_at->format('d-m-Y')); ?></td>
                                    <td><?php echo e($item->status_message); ?></td>
                                    <td><a href="<?php echo e(url('admin/orders/'.$item->id)); ?>" class="btn btn-primary btn-sm">View</a></td>
                                 </tr>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                 <tr>
                                    <td colspan="7">No Orders Available</td>

                                 </tr>
                                    
                                <?php endif; ?>
                            </tbody>
                        </table>  
                        <div>
                            <?php echo e($orders->links()); ?>

                            
                        </div> 

                    </div>

            </div>
            
        </div>
    </div>  
</div>             
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project1\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>