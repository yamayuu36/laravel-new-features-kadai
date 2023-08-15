

<?php $__env->startSection('content'); ?>
<div class="container  d-flex justify-content-center mt-3">
    <div class="w-75">
        <h1>お気に入り</h1>

        <hr>

        <div class="row">
            <?php $__currentLoopData = $favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-7 mt-2">
                <div class="d-inline-flex">
                    <a href="<?php echo e(route('products.show', $fav->favoriteable_id), false); ?>" class="w-25">
                        <?php if(App\Models\Product::find($fav->favoriteable_id)->image !== ""): ?>
                        <img src="<?php echo e(asset(App\Models\Product::find($fav->favoriteable_id)->image), false); ?>" class="img-fluid w-100">
                        <?php else: ?>
                        <img src="<?php echo e(asset('img/dummy.png'), false); ?>" class="img-fluid w-100">
                        <?php endif; ?>
                    </a>
                    <div class="container mt-3">
                        <h5 class="w-100 samuraimart-favorite-item-text"><?php echo e(App\Models\Product::find($fav->favoriteable_id)->name, false); ?></h5>
                        <h6 class="w-100 samuraimart-favorite-item-text">&yen;<?php echo e(App\Models\Product::find($fav->favoriteable_id)->price, false); ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-2 d-flex align-items-center justify-content-end">
                <a href="<?php echo e(route('products.favorite', $fav->favoriteable_id), false); ?>" class="samuraimart-favorite-item-delete">
                    削除
                </a>
            </div>
            <div class="col-md-3 d-flex align-items-center justify-content-end">
                <form method="POST" action="<?php echo e(route('carts.store'), false); ?>" class="m-3 align-items-end">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e(App\Models\Product::find($fav->favoriteable_id)->id, false); ?>">
                    <input type="hidden" name="name" value="<?php echo e(App\Models\Product::find($fav->favoriteable_id)->name, false); ?>">
                    <input type="hidden" name="price" value="<?php echo e(App\Models\Product::find($fav->favoriteable_id)->price, false); ?>">
                    <input type="hidden" name="image" value="<?php echo e(App\Models\Product::find($fav->favoriteable_id)->image, false); ?>">
                    <input type="hidden" name="qty" value="1">
                    <input type="hidden" name="weight" value="0">
                    <button type="submit" class="btn samuraimart-favorite-add-cart">カートに入れる</button>
                </form>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <hr>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-samuraimart\resources\views/users/favorite.blade.php ENDPATH**/ ?>