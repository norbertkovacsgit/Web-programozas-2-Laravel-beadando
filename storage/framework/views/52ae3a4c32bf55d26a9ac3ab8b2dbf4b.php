

<?php $__env->startSection('title', 'Üzenetek'); ?>

<?php $__env->startSection('header'); ?>
<span class="icon solid fa-envelope"></span>
<h2>Üzenetek</h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?>
<style>
    .messages-page .wrapper.style4.container {
        max-width: 80em;
        width: 100%;
        box-sizing: border-box;
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    .messages-table-wrapper {
        background: #ffffff;
        border-radius: 6px;
        padding: 2rem 2.5rem;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.03);
        margin: 0 auto;
        max-width: 100%;
        overflow-x: auto;
    }

    .messages-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 800px;
    }

    .messages-table thead {
        background: #f5f7fa;
    }

    .messages-table thead th {
        text-transform: uppercase;
        letter-spacing: .08em;
        font-size: 0.75rem;
        font-weight: 700;
        padding: 0.85rem 0.75rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        text-align: left;
        color: #878787;
        white-space: nowrap;
    }

    .messages-table tbody tr:nth-child(even) {
        background: #fafbfc;
    }

    .messages-table tbody tr:hover {
        background: #f1f8f6;
    }

    .messages-table tbody td {
        padding: 0.75rem 0.75rem;
        font-size: 0.85rem;
        color: #555;
        vertical-align: top;
    }

    .messages-table tbody td.message-body {
        max-width: 420px;
    }

    .messages-table tbody td.message-body p {
        margin: 0;
    }

    .messages-table time {
        font-size: 0.8rem;
        color: #999;
        white-space: nowrap;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('wrapper_class', 'style4 container messages-page'); ?>

<?php $__env->startSection('content'); ?>
<div class="messages-table-wrapper">
    <?php if($messages->isEmpty()): ?>
    <p style="text-align:center; margin: 2rem 0;">
        Nincs megjeleníthető üzenet.
    </p>
    <?php else: ?>
    <table class="messages-table">
        <thead>
            <tr>
                <th>Név</th>
                <th>Email</th>
                <th>Tárgy</th>
                <th>Üzenet</th>
                <th>Küldés ideje</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($msg->name); ?></td>
                <td><?php echo e($msg->email); ?></td>
                <td><?php echo e($msg->subject); ?></td>
                <td class="message-body">
                    <p><?php echo e($msg->message); ?></p>
                </td>
                <td>
                    <time datetime="<?php echo e($msg->created_at->toIso8601String()); ?>">
                        <?php echo e($msg->created_at->format('Y.m.d H:i')); ?>

                    </time>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\forma1\resources\views/messages/index.blade.php ENDPATH**/ ?>