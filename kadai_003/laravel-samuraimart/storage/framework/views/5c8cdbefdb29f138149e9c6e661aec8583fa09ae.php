

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-center">
    <div class="row w-75">
        <div class="col-5 offset-1">
            <?php if($product->image): ?>
            <img src="<?php echo e(asset($product->image), false); ?>" class="w-100 img-fluid">
            <?php else: ?>
            <img src="<?php echo e(asset('img/dummy.png'), false); ?>" class="w-100 img-fluid">
            <?php endif; ?>
        </div>
        <div class="col">
            <div class="d-flex flex-column">
                <h1 class="">
                    <?php echo e($product->name, false); ?>

                </h1>
                <div class="average-score mb-3">
                    <div class="star-rating ">
                        <div class="star-rating-front" style="width: <?php echo $score_percentage?>%">★★★★★</div>
                        <div class="star-rating-back">★★★★★</div>
                    </div>
                    <div class="average-score-display ms-1"> 
                        <?php echo $reviewCount ?> 
                    </div> 
                </div>
                <p class="">
                    <?php echo e($product->description, false); ?>

                </p>
                <hr>
                <p class="d-flex align-items-end">
                    ￥<?php echo e($product->price, false); ?>(税込)
                </p>
                <hr>
            </div>
            <?php if(auth()->guard()->check()): ?>
            <form method="POST" action="<?php echo e(route('carts.store'), false); ?>" class="m-3 align-items-end">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($product->id, false); ?>">
                <input type="hidden" name="name" value="<?php echo e($product->name, false); ?>">
                <input type="hidden" name="price" value="<?php echo e($product->price, false); ?>">
                <input type="hidden" name="image" value="<?php echo e($product->image, false); ?>">
                <input type="hidden" name="carriage" value="<?php echo e($product->carriage_flag, false); ?>">
                <div class="form-group row">
                    <label for="quantity" class="col-sm-2 col-form-label">数量</label>
                    <div class="col-sm-10">
                        <input type="number" id="quantity" name="qty" min="1" value="1" class="form-control w-25">
                    </div>
                </div>
                <input type="hidden" name="weight" value="0">
                <div class="row">
                    <div class="col-7">
                        <button type="submit" class="btn samuraimart-submit-button w-100">
                            <i class="fas fa-shopping-cart"></i>
                            カートに追加
                        </button>
                    </div>
                    <div class="col-5">
                        <?php if($product->isFavoritedBy(Auth::user())): ?>
                        <a href="<?php echo e(route('products.favorite', $product), false); ?>" class="btn samuraimart-favorite-button text-favorite w-100">
                            <i class="fa fa-heart"></i>
                            お気に入り解除
                        </a>
                        <?php else: ?>
                        <a href="<?php echo e(route('products.favorite', $product), false); ?>" class="btn samuraimart-favorite-button text-favorite w-100">
                            <i class="fa fa-heart"></i>
                            お気に入り
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
            <?php endif; ?>
        </div>

        <div class="offset-1 col-11">
            <hr class="w-100">
            <h3 class="float-left">カスタマーレビュー</h3>
            <div class="average-score mb-3">
                <div class="star-rating ">
                    <div class="star-rating-front" style="width: <?php echo $score_percentage?>%">★★★★★</div>
                    <div class="star-rating-back">★★★★★</div>
                </div>
                <div class="average-score-display ms-1"> 
                    <?php echo $reviewCount ?> 
                </div> 
            </div>
        </div>
    
        <div class="offset-1 col-10">
            <div class="row">
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="offset-md-5 col-md-5">
                <h3 class="review-score-color"><?php echo e(str_repeat('★', $review->score), false); ?></h3>
                    <p class="h3"><?php echo e($review->content, false); ?></p>
                    <label><?php echo e($review->created_at, false); ?> <?php echo e($review->user->name, false); ?></label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><br />
 
            <?php if(auth()->guard()->check()): ?>
            <div class="row">
                <div class="offset-md-5 col-md-5">
                    <form method="POST" action="<?php echo e(route('reviews.store'), false); ?>">
                        <?php echo csrf_field(); ?>
                        <h4>評価</h4>
                        <select name="score" class="form-control m-2 review-score-color">
                            <option value="5" class="review-score-color">★★★★★</option>
                            <option value="4" class="review-score-color">★★★★</option>
                            <option value="3" class="review-score-color">★★★</option>
                            <option value="2" class="review-score-color">★★</option>
                            <option value="1" class="review-score-color">★</option>
                        </select>
                        <h4>レビュー内容</h4>
                        <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <strong>レビュー内容を入力してください</strong>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <textarea name="content" class="form-control m-2"></textarea>
                        <input type="hidden" name="product_id" value="<?php echo e($product->id, false); ?>">
                        <button type="submit" class="btn samuraimart-submit-button ml-2">レビューを追加</button>
                    </form>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-samuraimart\resources\views/products/show.blade.php ENDPATH**/ ?>