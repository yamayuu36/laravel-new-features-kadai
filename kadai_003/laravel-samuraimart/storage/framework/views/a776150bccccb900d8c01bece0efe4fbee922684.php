<div class="container">
    <?php $__currentLoopData = $major_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $major_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h2><?php echo e($major_category->name, false); ?></h2>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($category->major_category_id === $major_category->id): ?>
            <label class="samuraimart-sidebar-category-label"><a href="<?php echo e(route('products.index', ['category' => $category->id]), false); ?>"><?php echo e($category->name, false); ?></a></label>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\laravel-samuraimart\resources\views/components/sidebar.blade.php ENDPATH**/ ?>