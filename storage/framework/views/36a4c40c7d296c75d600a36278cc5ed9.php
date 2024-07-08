
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12 ">
        <?php if(session('message')): ?>
        <h6 class="alert alert-success"><?php echo e(session('message')); ?></h6>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
              <h3>Add Sliders
             <a href="<?php echo e(url('admin/sliders')); ?>" class="btn btn-danger btn-sm text-white float-end">Back</a> 
              </h3>

            </div>
            <div class="card-body">
                <form action="<?php echo e(url('admin/sliders/store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label >Slider Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label >Description</label>
                        <textarea rows="3" name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label >Image</label>
                        <input type="file" name="image" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label >Status</label><br>
                        <input type="checkbox" name="status">Checked = Hidden, UnChecked = Visible 
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>   
<?php $__env->stopSection(); ?>   
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project1\resources\views/admin/slider/create.blade.php ENDPATH**/ ?>