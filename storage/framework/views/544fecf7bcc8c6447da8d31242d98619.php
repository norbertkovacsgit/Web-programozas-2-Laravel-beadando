

<?php $__env->startSection('title', 'Regisztráció'); ?>

<?php $__env->startSection('body_class', 'register-page'); ?>

<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?>
<style>
    .register-wrapper {
        display: flex;
        justify-content: center;
    }

    .register-box {
        display: inline-block;
        background: #ffffff;
        padding: 2.5rem 3rem;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.02);
    }

    .register-box form {
        margin: 0;
    }

    .register-box label {
        display: block;
        margin-bottom: 1rem;
        font-weight: 400;
    }

    .register-box input[type="text"],
    .register-box input[type="email"],
    .register-box input[type="password"] {
        width: 100%;
        box-sizing: border-box;
    }

    .register-box .button {
        display: block;
        width: 100%;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .alert-box.alert-error {
        background: rgba(192, 57, 43, 0.08);
        border: 1px solid rgba(192, 57, 43, 0.4);
        color: #c0392b;
        padding: 0.75rem 1rem;
        border-radius: 4px;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
        text-align: center;
    }

    .alert-box.alert-error p {
        margin: 0;
    }

    .register-page .wrapper.style4.container {
        background: transparent;
        box-shadow: none;
        border: none;
        padding-top: 0;
        padding-bottom: 0;
    }

    .register-page .wrapper.style4.container .content {
        padding: 0;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<span class="icon solid fa-user-plus"></span>
<h2>Regisztráció</h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="register-wrapper">
    <div class="register-box">

        <?php if($errors->any()): ?>
        <div class="alert-box alert-error">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($err); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>

            <label>Név
                <input type="text" name="name" value="<?php echo e(old('name')); ?>">
            </label>

            <label>Email
                <input type="email" name="email" value="<?php echo e(old('email')); ?>">
            </label>

            <label>Jelszó
                <input type="password" name="password">
            </label>

            <label>Jelszó megerősítése
                <input type="password" name="password_confirmation">
            </label>

            <button type="submit" class="button primary">
                Regisztráció
            </button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\forma1\resources\views/auth/register.blade.php ENDPATH**/ ?>