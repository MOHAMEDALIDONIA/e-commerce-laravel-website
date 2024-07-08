
<?php $__env->startSection('title'); ?>
<?php echo e($products->meta_title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_keyword'); ?>
<?php echo e($products->meta_keyword); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description'); ?>
<?php echo e($products->meta_description); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.product.view', ['category' => $category,'product' => $products])->html();
} elseif ($_instance->childHasBeenRendered('FtPjlaX')) {
    $componentId = $_instance->getRenderedChildComponentId('FtPjlaX');
    $componentTag = $_instance->getRenderedChildComponentTagName('FtPjlaX');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('FtPjlaX');
} else {
    $response = \Livewire\Livewire::mount('frontend.product.view', ['category' => $category,'product' => $products]);
    $html = $response->html();
    $_instance->logRenderedChild('FtPjlaX', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project1\resources\views/frontend/collections/products/view.blade.php ENDPATH**/ ?>