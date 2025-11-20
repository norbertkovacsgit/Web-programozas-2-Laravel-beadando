

<?php $__env->startSection('title', 'Kapcsolat'); ?>

<?php $__env->startSection('wrapper_class', 'style4 special container medium'); ?>
<?php $__env->startSection('inner_class', 'content'); ?>

<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?>
<style>
    .contact-success {
        background: #e6ffed;
        border: 1px solid #b7ebc6;
        color: #14532d;
        padding: 0.75em 1em;
        border-radius: 4px;
        margin-bottom: 1.5rem;
        text-align: center;
        font-size: 0.95rem;
    }

    .contact-error {
        background: #ffecec;
        border: 1px solid #f5c2c7;
        color: #7a1212;
        padding: 0.75em 1em;
        border-radius: 4px;
        margin-bottom: 1.5rem;
        text-align: center;
        font-size: 0.95rem;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<span class="icon solid fa-envelope"></span>
<h2>Kapcsolat</h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
<p class="contact-success"><?php echo e(session('success')); ?></p>
<?php endif; ?>

<?php if($errors->any()): ?>
<p class="contact-error">Kérjük töltsön ki minden mezőt!</p>
<?php endif; ?>

<form method="POST" action="<?php echo e(route('contact.submit')); ?>" novalidate>
    <?php echo csrf_field(); ?>

    <div class="row gtr-50">
        <div class="col-6 col-12-mobile">
            <input
                type="text"
                name="name"
                placeholder="Név"
                required
                value="<?php echo e(old('name')); ?>" />
        </div>

        <div class="col-6 col-12-mobile">
            <input
                type="email"
                name="email"
                placeholder="Email"
                required
                value="<?php echo e(old('email')); ?>" />
        </div>

        <div class="col-12">
            <input
                type="text"
                name="subject"
                placeholder="Tárgy"
                required
                value="<?php echo e(old('subject')); ?>" />
        </div>

        <div class="col-12">
            <textarea
                name="message"
                placeholder="Üzenet"
                rows="7"
                required><?php echo e(old('message')); ?></textarea>
        </div>

        <div class="col-12">
            <ul class="buttons">
                <li>
                    <input type="submit" class="special" value="Küldés" />
                </li>
            </ul>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\forma1\resources\views/contact/form.blade.php ENDPATH**/ ?>