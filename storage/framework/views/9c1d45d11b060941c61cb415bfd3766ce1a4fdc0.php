<h3 class="text-muted mb-0">
    <?php echo app('translator')->get('lang_v1.cogs2'); ?> 
    <span class="display_currency" data-currency_symbol="true"> 
        <?php echo e(($data['total_sell'] - $data['gross_profit']), false); ?>

    </span>
</h3>
<small class="help-block">
       Costo de Ventas
    </small>


<h3 class="text-muted mb-0">
    <?php echo app('translator')->get('lang_v1.cogs'); ?> <span class="display_currency" data-currency_symbol="true"> <?php echo e(($data['total_sell'] ), false); ?></span>
</h3>
    <small class="help-block">
       Valor de Ventas
    </small>
    
    
    
<h3 class="text-muted mb-0">
    <?php echo e(__('lang_v1.gross_profit'), false); ?>: 
    <span class="display_currency" data-currency_symbol="true"><?php echo e($data['gross_profit'], false); ?></span>
</h3>
<small class="help-block">
     <?php echo app('translator')->get('lang_v1.cogs_help_text'); ?>
    <?php if(!empty($data['gross_profit_label'])): ?>
        
        <?php $__currentLoopData = $data['gross_profit_label']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            + <?php echo e($val, false); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</small>

<h3 class="text-muted mb-0">
    <?php echo e(__('report.net_profit'), false); ?>: 
    <span class="display_currency" data-currency_symbol="true"><?php echo e($data['net_profit'], false); ?></span>
</h3>
<small class="help-block"><?php echo app('translator')->get('lang_v1.gross_profit'); ?> + (<?php echo app('translator')->get('lang_v1.total_sell_shipping_charge'); ?> + <?php echo app('translator')->get('lang_v1.sell_additional_expense'); ?> + <?php echo app('translator')->get('report.total_stock_recovered'); ?> + <?php echo app('translator')->get('lang_v1.total_purchase_discount'); ?> + <?php echo app('translator')->get('lang_v1.total_sell_round_off'); ?> 
<?php $__currentLoopData = $data['right_side_module_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(!empty($module_data['add_to_net_profit'])): ?>
        + <?php echo e($module_data['label'], false); ?> 
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
) <br> - ( <?php echo app('translator')->get('report.total_stock_adjustment'); ?> + <?php echo app('translator')->get('report.total_expense'); ?> + <?php echo app('translator')->get('lang_v1.total_purchase_shipping_charge'); ?> + <?php echo app('translator')->get('lang_v1.total_transfer_shipping_charge'); ?> + <?php echo app('translator')->get('lang_v1.purchase_additional_expense'); ?> + <?php echo app('translator')->get('lang_v1.total_sell_discount'); ?> + <?php echo app('translator')->get('lang_v1.total_reward_amount'); ?> 
<?php $__currentLoopData = $data['left_side_module_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(!empty($module_data['add_to_net_profit'])): ?>
        + <?php echo e($module_data['label'], false); ?>

    <?php endif; ?> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> )</small><?php /**PATH C:\laragon\www\POS\alizazip\resources\views/report/partials/net_gross_profit_report_details.blade.php ENDPATH**/ ?>