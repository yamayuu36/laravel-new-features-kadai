

<?php $__env->startSection('content'); ?>
<main class="py-4 mb-5">

    <div class="d-flex justify-content-center">
        <div class="container w-50">
            <?php if(!empty($card)): ?>
            <h3>登録済みのクレジットカード</h3>

            <hr>
            <h4><?php echo e($card["brand"], false); ?></h4>
            <p>有効期限: <?php echo e($card["exp_year"], false); ?>/<?php echo e($card["exp_month"], false); ?></p>
            <p>カード番号: ************<?php echo e($card["last4"], false); ?></p>
            <?php endif; ?>

            <form action="<?php echo e(route('mypage.token'), false); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php if(empty($card)): ?>
                <script type="text/javascript" src="https://checkout.pay.jp/" class="payjp-button" data-key="<?php echo e(ENV('PAYJP_PUBLIC_KEY'), false); ?>" data-on-created="onCreated" data-text="カードを登録する" data-submit-text="カードを登録する"></script>
                <?php else: ?>
                <script type="text/javascript" src="https://checkout.pay.jp/" class="payjp-button" data-key="<?php echo e(ENV('PAYJP_PUBLIC_KEY'), false); ?>" data-on-created="onCreated" data-text="カードを更新する" data-submit-text="カードを更新する"></script>
                <?php endif; ?>
            </form>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-samuraimart\resources\views/users/register_card.blade.php ENDPATH**/ ?>