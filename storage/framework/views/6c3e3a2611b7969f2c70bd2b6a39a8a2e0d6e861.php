<table class="table table-striped">
    <tr>
        <th><?php echo e(__('report.opening_stock'), false); ?> <br><small class="text-muted">(<?php echo app('translator')->get('lang_v1.by_purchase_price'); ?>)</small>:</th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['opening_stock'], false); ?></span>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('report.opening_stock'), false); ?> <br><small class="text-muted">(<?php echo app('translator')->get('lang_v1.by_sale_price'); ?>)</small>:</th>
        <td>
            <?php if(isset($stocks['opening_stock_by_sp'])): ?>
                <span class="display_currency" data-currency_symbol="true"><?php echo e($stocks['opening_stock_by_sp'], false); ?></span>
            <?php else: ?>
                 <span id="opening_stock_by_sp"><i class="fa fa-sync fa-spin fa-fw "></i></span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('home.total_purchase'), false); ?>:<br><small class="text-muted">(<?php echo app('translator')->get('product.exc_of_tax'); ?>, <?php echo app('translator')->get('sale.discount'); ?>)</small></th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_purchase'], false); ?></span>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('report.total_stock_adjustment'), false); ?>:</th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_adjustment'], false); ?></span>
        </td>
    </tr> 
    <tr>
        <th><?php echo e(__('report.total_expense'), false); ?>:</th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_expense'], false); ?></span>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('lang_v1.total_purchase_shipping_charge'), false); ?>:</th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_purchase_shipping_charge'], false); ?></span>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('lang_v1.purchase_additional_expense'), false); ?>:</th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_purchase_additional_expense'], false); ?></span>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('lang_v1.total_transfer_shipping_charge'), false); ?>:</th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_transfer_shipping_charges'], false); ?></span>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('lang_v1.total_sell_discount'), false); ?>:</th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_sell_discount'], false); ?></span>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('lang_v1.total_reward_amount'), false); ?>:</th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_reward_amount'], false); ?></span>
        </td>
    </tr>
    <tr>
        <th><?php echo e(__('lang_v1.total_sell_return'), false); ?>:</th>
        <td>
            <span class="display_currency" data-currency_symbol="true"><?php echo e($data['total_sell_return'], false); ?></span>
        </td>
    </tr>
    <?php $__currentLoopData = $data['left_side_module_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th><?php echo e($module_data['label'], false); ?>:</th>
            <td>
                <span class="display_currency" data-currency_symbol="true"><?php echo e($module_data['value'], false); ?></span>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table><?php /**PATH C:\laragon\www\POS\alizazip\resources\views/report/partials/opening_stock_report_table.blade.php ENDPATH**/ ?>