

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-2">
        <?php $__env->startComponent('components.sidebar', ['categories' => $categories, 'major_categories' => $major_categories]); ?>
        <?php echo $__env->renderComponent(); ?>
    </div>
    <div class="col-9">
        <h1>おすすめ商品</h1>
        <div class="row">
            <?php $__currentLoopData = $recommend_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommend_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-4">
                <a href="<?php echo e(route('products.show', $recommend_product), false); ?>">
                    <?php if($recommend_product->image !== ""): ?>
                    <img src="<?php echo e(asset($recommend_product->image), false); ?>" class="img-thumbnail">
                    <?php else: ?>
                    <img src="<?php echo e(asset('img/dummy.png'), false); ?>" class="img-thumbnail">
                    <?php endif; ?>
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="samuraimart-product-label mt-2 mb-0">
                            <?php echo e($recommend_product->name, false); ?><br>
                            <div class="average-score mb-1">
                                    <div class="star-rating ">
                                        <?php $score_avg = $recommend_product->reviews->avg('score');
                                                $score_percentage = round($score_avg,1)*100/5;
                                                $reviewCount = $recommend_product->reviews->count();
                                        ?>
                                        <div class="star-rating-front" style="width: <?php echo $score_percentage?>%">★★★★★</div>
                                        <div class="star-rating-back">★★★★★</div>
                                    </div>
                                    <div class="average-score-display ms-1"> 
                                        <?php echo $reviewCount ?> 
                                    </div> 
                                 </div>
                            <label>￥<?php echo e($recommend_product->price, false); ?></label>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <h1>新着商品</h1>
        <div class="row">
        <?php $__currentLoopData = $recently_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recently_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-3">
                <a href="<?php echo e(route('products.show', $recently_product), false); ?>">
                    <?php if($recently_product->image !== ""): ?>
                    <img src="<?php echo e(asset($recently_product->image), false); ?>" class="img-thumbnail">
                    <?php else: ?>
                    <img src="<?php echo e(asset('img/dummy.png'), false); ?>" class="img-thumbnail">
                    <?php endif; ?>
                </a>
                <div class="row">
                    <div class="col-12">
                        <p class="samuraimart-product-label mt-2 mb-0">
                            <?php echo e($recently_product->name, false); ?><br>
                            <div class="average-score mb-1">
                                <div class="star-rating ">
                                    <?php $score_avg = $recently_product->reviews->avg('score');
                                        $score_percentage = round($score_avg,1)*100/5;
                                        $reviewCount = $recently_product->reviews->count();
                                    ?>
                                    <div class="star-rating-front" style="width: <?php echo $score_percentage?>%">★★★★★</div>
                                    <div class="star-rating-back">★★★★★</div>
                                </div>
                                <div class="average-score-display ms-1"> 
                                    <?php echo $reviewCount ?> 
                                </div> 
                            </div>
                            <label>￥<?php echo e($recently_product->price, false); ?></label>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-samuraimart\resources\views/web/index.blade.php ENDPATH**/ ?>