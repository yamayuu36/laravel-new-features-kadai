

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <span>
                <a href="<?php echo e(route('mypage'), false); ?>">マイページ</a> > 注文履歴
            </span>

            <div class="container mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">注文番号</th>
                            <th scope="col">購入日時</th>
                            <th scope="col">合計金額</th>
                            <th scope="col">詳細</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $billings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $billing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($billing['code'], false); ?></td>
                            <td><?php echo e($billing['created_at'], false); ?></td>
                            <td><?php echo e($billing['total'], false); ?></td>
                            <td>
                                <a href="<?php echo e(route('mypage.cart_history_show', $billing['id']), false); ?>">
                                    詳細を確認する
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <?php echo e($billings->links(), false); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-samuraimart\resources\views/users/cart_history_index.blade.php ENDPATH**/ ?>