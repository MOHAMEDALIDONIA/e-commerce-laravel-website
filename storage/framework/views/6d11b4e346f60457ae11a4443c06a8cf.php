
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12 ">
        <?php if(session('message')): ?>
        <h6 class="alert alert-success"><?php echo e(session('message')); ?></h6>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <h3> Edit Products
                    <a href="<?php echo e(url('admin/products')); ?>" class="btn btn-danger btn-sm text-white float-end">Back</a>
                </h3>

            </div>
            <div class="card-body">
                <form action="<?php echo e(url('admin/products/'.$product->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                        </li>
                     
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag"
                                type="button" role="tab" aria-controls="seotag" aria-selected="false">
                                SEO Tags </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details"
                                type="button" role="tab" aria-controls="details" aria-selected="false">
                                Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image"
                                type="button" role="tab" aria-controls="image" aria-selected="false">
                                Product Image
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color"
                                type="button" role="tab" aria-controls="color" aria-selected="false">
                                Product Color
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="mb-3">
                                <label>Category</label>
                                <select name="category_id" id="" class="form-control">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == $product->category_id ? 'selected':''); ?>>
                                            <?php echo e($category->name); ?>

                                        </option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" name="name" value="<?php echo e($product->name); ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Product Slug</label>
                                <input type="text" name="slug" value="<?php echo e($product->slug); ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Select Brand</label>
                                <select name="brand" id="" class="form-control">
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($brand->name); ?>"  <?php echo e($brand->name == $product->brands ? 'selected':''); ?>>
                                        <?php echo e($brand->name); ?>

                                    </option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Small Description(500 words)</label>
                                <textarea rows="4" name="small_description" class="form-control"><?php echo e($product->small_description); ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea rows="4" name="description" class="form-control"><?php echo e($product->description); ?></textarea>
                            </div>

                         </div>
                        <div class="tab-pane fade border p-3 " id="seotag" role="tabpanel" aria-labelledby="seotag-tab">
                                    <div class="mb-3">
                                        <label>Meta Title</label>
                                        <input type="text" name="meta_title"value="<?php echo e($product->meta_title); ?>" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Meta Description</label>
                                        <textarea rows="4" name="meta_description"  class="form-control"><?php echo e($product->meta_description); ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label>Meta Keyword</label>
                                        <textarea rows="4" name="meta_keyword" class="form-control"><?php echo e($product->meta_keyword); ?></textarea>
                                    </div>

                            </div>
                        <div class="tab-pane fade border p-3 " id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Original Price</label>
                                        <input type="text" name="original_price" value="<?php echo e($product->original_price); ?>" class="form-control" />

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Selling Price</label>
                                        <input type="text" name="selling_price" value="<?php echo e($product->selling_price); ?>" class="form-control" />

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" value="<?php echo e($product->quantity); ?>" class="form-control" />

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Tranding</label>
                                        <input type="checkbox" name="tranding" <?php echo e($product->tranding == '1' ? 'checked':''); ?> style="width: 50px;height:50px;" />

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Featured</label>
                                        <input type="checkbox" name="featured" <?php echo e($product->featured == '1' ? 'checked':''); ?> style="width: 50px;height:50px;" />

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <input type="checkbox" name="status" <?php echo e($product->status == '1' ? 'checked':''); ?>  style="width: 50px;height:50px;" />

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade border p-3 " id="image" role="tabpanel" aria-labelledby="image-tab">
                            <div class="mb-3">
                                <label >Upload Product Image</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>
                            <div>
                                <?php if($product->productImages): ?>
                                <div class="row">
                                    <?php $__currentLoopData = $product->productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-2">
                                        <img src="<?php echo e(asset($image->image)); ?>" style="width:80px; height:80px;" class="me-4 border p-2" alt="img">
                                        <a href="<?php echo e(url('admin/product-image/'.$image->id.'/delete')); ?>" class="d-block">Remove</a>

                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                                 
                             
                           
                                <?php else: ?>
                                 <h5>No Images Added</h5>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3 " id="color" role="tabpanel" aria-labelledby="color-tab">
                            <div class="mb-3">
                                <h4>Add Product Color</h4>
                                <label  style="margin-bottom: 30px;">Selected Color</label>
                                <div class="row">
                                    <?php $__empty_1 = true; $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coloritem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="col-md-3">
                                          <div class="p-2 border  mb-3">
                                                Color:  <input type="checkbox" name="colors[<?php echo e($coloritem->id); ?>]" value="<?php echo e($coloritem->id); ?>" ><?php echo e($coloritem->name); ?>

                                                <br/>
                                                Quantity: <input type="number" name="colorquantity[<?php echo e($coloritem->id); ?>]" style="width: 70px; border:1px solid">
                                          </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                      <div class="col-md-12">
                                        <h1>No Colors Found</h1>
                                        
                                     </div>  
                                    <?php endif; ?>   
                                </div>
                               
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                             <th>Color Name</th>  
                                             <th>Quantity</th>
                                             <th>Delete</th> 
                                        </tr>
    
                                        
    
                                    </thead>
                                    <tbody>
                                      
                                     <?php $__currentLoopData = $product->productColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodcolor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <tr class="prod-color-tr">
                                        <?php if($prodcolor->color): ?>
                                            
                                     
                                        <td><?php echo e($prodcolor->color->name); ?></td>
                                        <td>
                                            <div class="input-group mb-3" style="width: 150px;">
                                                <input type="text" value="<?php echo e($prodcolor->quantity); ?>" class='productColorQuantity form-control form-control-sm'>
                                                <button type="button" value="<?php echo e($prodcolor->id); ?>" class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>
    
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" value="<?php echo e($prodcolor->id); ?>" class="deleteProductColorBtn  btn btn-danger btn-sm text-white">Delete</button>
                                        </td>
                                      </tr>
                                      <?php else: ?>
                                       NO Color Found
                                      <?php endif; ?> 
                                         
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                                    </tbody>
    
                                </table>
    
    
                            </div>
                        </div>
                     
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click','.updateProductColorBtn', function(){
            var product_id = "<?php echo e($product->id); ?>";
            var prod_color_id = $(this).val();
            var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
            // alert(prod_color_id);
            if(qty <= 0 ){
                alert('Quantity is required');
                return false;
            }
            var data ={
                
                'product_id': product_id,
                'qty':qty
            };
            $.ajax({
                type:"GET",
                url:"/admin/product-color/"+prod_color_id,
                data:data,
             
                success:function(response){
                    alert(response.message)
                }


            });

        });
        $(document).on('click','.deleteProductColorBtn', function(){
            
            var prod_color_id = $(this).val();
            var thisClick = $(this);
        
            $.ajax({
                type:"GET",
                url:"/admin/product-color/"+prod_color_id+"/delete",
                success:function(response){
                    thisClick.closest('.prod-color-tr').remove();
                    alert(response.message)
                }


            });

        });

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project1\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>