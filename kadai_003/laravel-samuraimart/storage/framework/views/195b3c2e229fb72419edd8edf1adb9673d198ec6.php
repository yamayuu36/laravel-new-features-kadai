

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="text-center">会員登録ありがとうございます！</h3>

            <p class="text-center">
                現在、仮会員の状態です。  
            </p>

            <p class="text-center">
                ただいま、ご入力頂いたメールアドレス宛に、ご本人様確認用のメールをお送りしました。  
            </p>

            <p class="text-center">
                メール本文内のURLをクリックすると本会員登録が完了となります。  
            </p>
            <div class="text-center">
                <a href="<?php echo e(url('/')); ?>" class="btn samuraimart-submit-button w-50 text-white">トップページへ</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-samuraimart\resources\views/auth/verify.blade.php ENDPATH**/ ?>