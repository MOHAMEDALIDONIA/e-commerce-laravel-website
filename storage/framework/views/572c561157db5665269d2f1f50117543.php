<div>
    <?php echo $__env->make('livewire.admin.brands.modal-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(session('message')): ?>
    <h2 class="alert alert-success"><?php echo e(session('message')); ?></h2>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Brands List
                        <a href="" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-primary btn-sm float-end">Add Brands</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($brand->id); ?></td>
                                    <td><?php echo e($brand->name); ?></td>
                                    <td>
                                        <?php if($brand->category): ?>
                                         <?php echo e($brand->category->name); ?>

                                        <?php else: ?>
                                         No Category 
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($brand->slug); ?></td>
                                    <td><?php echo e($brand->status == '1'?'Hidden':'Visable'); ?></td>
                                    <td>
                                        <a href="" wire:click="editBrand(<?php echo e($brand->id); ?>)" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-sm btn-success">Edit</a>
                                        <a href="" wire:click="deleteBrand(<?php echo e($brand->id); ?>)" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <th>
                                    <td colspan="5">
                                    No Brands Found
                                    </td>
                                </th>
                                
                            <?php endif; ?>
                        </tbody>

                    </table>
                    <div>
                        <?php echo e($brands->links()); ?>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<?php $__env->startPush('script'); ?>
 <script>
    window.addEventListener('close-modal',event => [
        $('#addBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
    ]);
 </script>
    
<?php $__env->stopPush(); ?>
<?php /**PATH D:\project1\resources\views/livewire/admin/brands/index.blade.php ENDPATH**/ ?>