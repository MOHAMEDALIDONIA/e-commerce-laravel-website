
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12 ">
        <?php if(session('message')): ?>
        <h6 class="alert alert-success"><?php echo e(session('message')); ?></h6>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
              <h3>Slider List
              <a href="<?php echo e(url('admin/sliders/create')); ?>" class="btn btn-primary btn-sm text-white float-end">Add Slider</a> 
              </h3>

            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($slider ->id); ?></td>
                            <td><?php echo e($slider ->title); ?></td>
                            <td><?php echo e($slider->description); ?></td>
                            <td>
                              <img src="<?php echo e(asset("$slider->image")); ?>" style="width:70px;height:70px;" alt="Slider"></td>
                            <td><?php echo e($slider ->status == '1' ? 'Hidden':'Visible'); ?></td>
                            <td>
                                <a href="<?php echo e(url('admin/sliders/'.$slider->id.'/edit')); ?>"
                                    class="btn btn-success btn-sm">Edit</a>
                                <a href="<?php echo e(url('admin/sliders/'.$slider->id.'/delete')); ?>" onclick="return confirm('Are you sure you want to delete this silder? ')"  class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  


                    </tbody>


                </table>
            </div>
        </div>
    </div>
</div>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project1\resources\views/admin/slider/index.blade.php ENDPATH**/ ?>