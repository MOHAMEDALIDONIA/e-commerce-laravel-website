
<?php $__env->startSection('title','Users List'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <?php if($errors->any()): ?>
    <div class="alert alert-warning">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div><?php echo e($error); ?></div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
      
   <?php endif; ?>
    <div class="col-md-12 ">
        <?php if(session('message')): ?>
        <h6 class="alert alert-success"><?php echo e(session('message')); ?></h6>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
              <h3>Edit Users
             <a href="<?php echo e(url('admin/users')); ?>" class="btn btn-danger btn-sm text-white float-end">Back</a> 
              </h3>

            </div>
            <div class="card-body">
                <form action="<?php echo e(url('admin/users/'.$user->id)); ?>" method="POST">
                 <?php echo csrf_field(); ?>
                 <?php echo method_field('PUT'); ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label >Name</label>
                            <input type="text" name="name" value="<?php echo e($user->name); ?>" class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label >Email</label>
                            <input type="text" name="email" value="<?php echo e($user->email); ?>" class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label >Password</label>
                            <input type="text" name="password" class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label >Select Role</label>
                            <select name="role_as" class="form-control">
                                <option value="">Select Role</option>
                                <option value="0" <?php echo e($user->role_as == '0' ? 'selected':''); ?>>User</option>
                                <option value="1" <?php echo e($user->role_as == '1' ? 'selected':''); ?>>Admin</option>
                            </select>

                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Update</button>

                        </div>
                    </div>
                
                </form>
            </div>
        </div>
    </div>
</div>   
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project1\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>