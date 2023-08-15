

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <span>
                <a href="<?php echo e(route('mypage'), false); ?>">マイページ</a> > <a href="<?php echo e(route('mypage.cart_history'), false); ?>">注文履歴</a> > 注文履歴詳細
            </span>

            <h1 class="mt-3">注文履歴詳細</h1>

            <h4 class="mt-3">ご注文情報</h4>

            <hr>

            <div class="row">
                <div class="col-5 mt-2">
                    注文番号
                </div>
                <div class="col-7 mt-2">
                    <?php echo e($cart_info->code, false); ?>

                </div>

                <div class="col-5 mt-2">
                    注文日時
                </div>
                <div class="col-7 mt-2">
                    <?php echo e($cart_info->updated_at, false); ?>

                </div>

                <div class="col-5 mt-2">
                    合計金額
                </div>
                <div class="col-7 mt-2">
                    <?php echo e($cart_info->price_total, false); ?>円
                </div>

                <div class="col-5 mt-2">
                    合計数量
                </div>
                <div class="col-7 mt-2">
                    <?php echo e($cart_info->qty, false); ?>

                </div>
            </div>

            <hr>

            <div class="row">
                <?php $__currentLoopData = $cart_contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-5 mt-2">
                    <a href="<?php echo e(route('products.show', $product->id), false); ?>" class="ml-4">
                        <?php if($product->options->image): ?>
                        <img src="<?php echo e(asset($product->options->image), false); ?>" class="img-fluid w-75">
                        <?php else: ?>
                        <img src="<?php echo e(asset('img/dummy.png'), false); ?>" class="img-fluid w-75">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="col-md-7 mt-2">
                    <div class="flex-column">
                        <p class="mt-4"><?php echo e($product->name, false); ?></p>
                        <div class="row">
                            <div class="col-2 mt-2">
                                数量
                            </div>
                            <div class="col-10 mt-2">
                                <?php echo e($product->qty, false); ?>

                            </div>

                            <div class="col-2 mt-2">
                                小計
                            </div>
                            <div class="col-10 mt-2">
                                ￥<?php echo e($product->qty * $product->price, false); ?>

                            </div>

                            <div class="col-2 mt-2">
                                送料
                            </div>
                            <div class="col-10 mt-2">
                                <?php if($product->options->carriage): ?>
                                ￥800
                                <?php else: ?>
                                ￥0
                                <?php endif; ?>
                            </div>

                            <div class="col-2 mt-2">
                                合計
                            </div>
                            <div class="col-10 mt-2">
                                <?php if($product->options->carriage): ?>
                                ￥<?php echo e(($product->qty * $product->price) + 800, false); ?>

                                <?php else: ?>
                                ￥<?php echo e($product->qty * $product->price, false); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-samuraimart\resources\views/users/cart_history_show.blade.php ENDPATH**/ ?>