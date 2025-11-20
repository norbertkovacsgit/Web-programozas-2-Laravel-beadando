

<?php $__env->startSection('title', 'Versenyek'); ?>

<?php $__env->startSection('body_class', 'races-page'); ?>

<?php $__env->startSection('head'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('head'); ?>
<style>
    .races-page .wrapper.style4.container {
        max-width: 90em;
        width: 100%;
        box-sizing: border-box;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .race-table-wrapper {
        background: #ffffff;
        border-radius: 6px;
        padding: 2rem 0.5rem;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.03);
        margin: 0 auto;
        max-width: 100%;
        overflow-x: auto;
    }

    .race-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1100px;
    }

    .race-table th,
    .race-table td {
        padding: 0.75rem 0.9rem;
        vertical-align: middle;
        font-size: 0.9rem;
        text-align: center;
    }

    .race-table thead th {
        background: rgba(0, 0, 0, 0.03);
        border-bottom: 2px solid rgba(0, 0, 0, 0.06);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        font-size: 0.8rem;
        white-space: nowrap;
    }

    .race-table tbody tr:nth-child(even) {
        background: rgba(0, 0, 0, 0.01);
    }

    .race-table tbody tr:hover {
        background: rgba(0, 0, 0, 0.03);
    }

    .race-table tbody td {
        border-bottom: 1px solid rgba(0, 0, 0, 0.03);
    }

    .race-table td:nth-child(4),
    .race-table td:nth-child(9),
    .race-table td:nth-child(10),
    .race-table td:nth-child(11) {
        text-align: left;
    }

    .race-table td:nth-child(1),
    .race-table td:nth-child(7),
    .race-table td:nth-child(8),
    .race-table td:last-child {
        white-space: nowrap;
    }

    .race-pagination {
        margin-top: 1.5rem;
        display: flex;
        justify-content: center;
    }

    .race-pagination .pager-wrap {
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        gap: 0.4rem;
    }

    .race-pagination .pager-ctrls {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .race-pagination .pager-info {
        font-size: 0.9rem;
        opacity: 0.85;
    }

    .race-pagination .pager-btn,
    .race-pagination .pager-page {
        border-radius: 3px;
        padding: 0.3em 0.65em;
        font-size: 0.9rem;
        line-height: 1.1;
        border: 1px solid rgba(0, 0, 0, 0.15);
        background: #ffffff;
        color: #555;
        text-decoration: none;
        min-width: 2.2em;
        text-align: center;
    }

    .race-pagination .pager-btn:hover,
    .race-pagination .pager-page:hover {
        background: #e5faf6;
        border-color: #63c5b8;
        color: #2c736a;
    }

    .race-pagination .pager-page.active {
        background: #63c5b8;
        border-color: #63c5b8;
        color: #fff;
        font-weight: 600;
    }

    .race-pagination .pager-btn.disabled {
        opacity: 0.4;
        cursor: default;
        background: #f7f7f7;
    }

    .race-pagination .pager-ellipsis {
        padding: 0 0.3rem;
        opacity: 0.6;
    }

    .race-pagination .pager-size-form select {
        padding: 0.3em 0.65em;
        font-size: 0.9rem;
        line-height: 1.1;
        text-align: center;
        text-align-last: center;
    }

    .race-pagination .pager-size-form {
        margin-top: 0.15rem;
        display: flex;
        justify-content: center;
    }

    .race-pagination .pager-size-form select {
        border-radius: 3px;
        padding: 0.3em 0.65em;
        font-size: 0.9rem;
        line-height: 1.1;
        border: 1px solid rgba(0, 0, 0, 0.15);
        background: #ffffff;
        color: #555;
        text-align: center;
        text-align-last: center;
        min-width: 3.5em;
    }

    .race-pagination .pager-size-form select:hover {
        background: #e5faf6;
        border-color: #63c5b8;
        color: #2c736a;
    }

    .race-status {
        color: #c0392b;
        font-style: italic;
        font-size: 0.85rem;
        white-space: nowrap;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<span class="icon solid fa-flag-checkered"></span>
<h2>Versenyek</h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="race-table-wrapper">
    <?php if($results->count()): ?>
    <table class="race-table" id="racesTable">
        <thead>
            <tr>
                <th>Dátum</th>
                <th>Nagydíj neve</th>
                <th>Helyszín</th>

                <th>Pilóta neve</th>
                <th>Nem</th>
                <th>Nemzet</th>

                <th>Pilóta azonosító</th>
                <th>Helyezés</th>
                <th>Csapat</th>
                <th>Típus</th>
                <th>Motor</th>
                <th>Hiba</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($row->gp_date ?? $row->result_date); ?></td>
                <td><?php echo e($row->gp_name ?? '-'); ?></td>
                <td><?php echo e($row->gp_location ?? '-'); ?></td>

                <td><?php echo e($row->pilot_name); ?></td>
                <td><?php echo e($row->pilot_gender ?? '-'); ?></td>
                <td><?php echo e($row->pilot_nationality ?? '-'); ?></td>

                <td><?php echo e($row->pilot_id); ?></td>
                <td>
                    <?php if(is_null($row->position)): ?>
                    –
                    <?php else: ?>
                    <?php echo e($row->position); ?>.
                    <?php endif; ?>
                </td>
                <td><?php echo e($row->team ?? '-'); ?></td>
                <td><?php echo e($row->car_type ?? '-'); ?></td>
                <td><?php echo e($row->engine ?? '-'); ?></td>
                <td>
                    <?php if(!is_null($row->position) && $row->position !== ''): ?>
                    -
                    <?php elseif(!empty($row->error_status)): ?>
                    <span class="race-status"><?php echo e($row->error_status); ?></span>
                    <?php else: ?>
                    <small>Nincs adat.</small>
                    <?php endif; ?>
                </td>


            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php
    $currentPage = $results->currentPage();
    $lastPage = $results->lastPage();
    $total = $results->total();
    $firstItem = $results->firstItem() ?? 0;
    $lastItem = $results->lastItem() ?? 0;

    // Oldallista: [1, ..., current-2..current+2, ..., last]
    $pages = [];

    if ($lastPage > 0) {
    $pages[] = 1;

    $start = max(2, $currentPage - 2);
    $end = min($lastPage - 1, $currentPage + 2);

    if ($start > 2) {
    $pages[] = '...';
    }

    for ($i = $start; $i <= $end; $i++) {
        $pages[]=$i;
        }

        if ($end < $lastPage - 1) {
        $pages[]='...' ;
        }

        if ($lastPage> 1) {
        $pages[] = $lastPage;
        }
        }

        $perPageOptions = [5, 10, 25, 50, 100, 200];
        ?>

        <div class="race-pagination">
            <div class="pager-wrap">

                <div class="pager-wrap">

                    <div class="pager-ctrls">

                        
                        <?php if($results->onFirstPage()): ?>
                        <span class="pager-btn disabled">&laquo;</span>
                        <?php else: ?>
                        <a class="pager-btn" href="<?php echo e($results->previousPageUrl()); ?>">&laquo;</a>
                        <?php endif; ?>

                        
                        <div class="pager-pages">
                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($p === '...'): ?>
                            <span class="pager-ellipsis">…</span>
                            <?php elseif($p == $currentPage): ?>
                            <span class="pager-page active"><?php echo e($p); ?></span>
                            <?php else: ?>
                            <a class="pager-page" href="<?php echo e($results->url($p)); ?>"><?php echo e($p); ?></a>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        
                        <?php if($results->hasMorePages()): ?>
                        <a class="pager-btn" href="<?php echo e($results->nextPageUrl()); ?>">&raquo;</a>
                        <?php else: ?>
                        <span class="pager-btn disabled">&raquo;</span>
                        <?php endif; ?>
                    </div>

                    
                    <form method="GET" class="pager-size-form">
                        <select name="size" onchange="this.form.submit()">
                            <?php $__currentLoopData = $perPageOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($opt); ?>" <?php echo e($results->perPage() == $opt ? 'selected' : ''); ?>>
                                <?php echo e($opt); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </form>

                    <div class="pager-info">
                        <?php echo e($firstItem); ?> - <?php echo e($lastItem); ?> a <?php echo e($total); ?> - ből.
                    </div>
                </div>
                <?php else: ?>
                <p style="text-align: center; margin: 2rem 0">
                    Nincs megjeleníthető verseny.
                </p>
                <?php endif; ?>
            </div>
            <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\forma1\resources\views/races/index.blade.php ENDPATH**/ ?>