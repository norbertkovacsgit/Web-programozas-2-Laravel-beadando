

<?php $__env->startSection('title', 'Admin'); ?>

<?php $__env->startSection('body_class', 'admin-page'); ?>

<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?>
<style>
    .admin-page .admin-box {
        background: #ffffff;
        border: 1px solid rgba(124, 128, 129, 0.2);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.06);
        padding: 2.5em;
        min-height: 240px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-size: 1.15em;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<span class="icon solid fa-user-shield"></span>
<h2>Admin felület</h2>
<p>
    Üdv,
    <strong><?php echo e(auth()->user()->name); ?></strong>!
</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('wrapper_class', 'style3 container special'); ?>
<?php $__env->startSection('inner_class', 'row aln-center'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-10 col-12-narrower">
    <div class="admin-box">
        <strong>Admin szerepkör számára fentartott oldal.</strong>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\forma1\resources\views/admin/index.blade.php ENDPATH**/ ?>