<?php $__currentLoopData = $nodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li <?php if($loop->index == 0 && $depth < 2): ?> data-jstree='{ "opened" : true }' <?php endif; ?>
        <?php if(count($account->child_accounts_recursive) == 0): ?> data-jstree='{ "icon" : "fas fa-arrow-alt-circle-right" }' <?php endif; ?>>

        <strong><?php echo e($account->gl_code, false); ?></strong> - <?php echo e($account->name, false); ?>

        <?php if($account->status == 'active'): ?>
            <span><i class="fas fa-check text-success" title="<?php echo app('translator')->get('accounting::lang.active'); ?>"></i></span>
        <?php elseif($account->status == 'inactive'): ?>
            <span><i class="fas fa-times text-danger" title="<?php echo app('translator')->get('lang_v1.inactive'); ?>" style="font-size: 14px;"></i></span>
        <?php endif; ?>
        <small class="text-muted">(<?php echo e($account->nature ?? '', false); ?>)</small>

        <span class="tree-actions">
            <a class="btn btn-xs btn-default text-success ledger-link"
                title="<?php echo app('translator')->get('accounting::lang.ledger'); ?>"
                href="<?php echo e(action([\Modules\Accounting\Http\Controllers\CoaController::class, 'ledger'], $account->id), false); ?>">
                <i class="fas fa-file-alt"></i></a>
            <a class="btn-modal btn-xs btn-default text-primary" title="<?php echo app('translator')->get('messages.edit'); ?>"
                href="<?php echo e(action([\Modules\Accounting\Http\Controllers\CoaController::class, 'edit'], $account->id), false); ?>"
                data-href="<?php echo e(action([\Modules\Accounting\Http\Controllers\CoaController::class, 'edit'], $account->id), false); ?>"
                data-container="#create_account_modal">
            <i class="fas fa-edit"></i></a>
            <a class="activate-deactivate-btn text-warning btn-xs btn-default"
                title="<?php if($account->status=='active'): ?> <?php echo app('translator')->get('messages.deactivate'); ?> <?php else: ?> <?php echo app('translator')->get('messages.activate'); ?> <?php endif; ?>"
                href="<?php echo e(action([\Modules\Accounting\Http\Controllers\CoaController::class, 'activateDeactivate'], $account->id), false); ?>">
                <i class="fas fa-power-off"></i>
            </a>
        </span>

        <?php if(count($account->child_accounts_recursive) > 0): ?>
            <ul>
                <?php echo $__env->make('accounting::chart_of_accounts.puc_tree_node', ['nodes' => $account->child_accounts_recursive, 'depth' => $depth + 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
        <?php endif; ?>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/Accounting/Providers/../Resources/views/chart_of_accounts/puc_tree_node.blade.php ENDPATH**/ ?>