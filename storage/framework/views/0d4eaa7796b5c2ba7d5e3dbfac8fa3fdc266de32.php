<?php
    $lang_v1_total_decrease =0.0;
?>
<?php if($disabilityProductReport && count($disabilityProductReport) > 0): ?>
    <?php $__currentLoopData = $disabilityProductReport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="<?php echo e($loop->iteration, false); ?>">
            <?php
                $varname='';
                $vars = null;
                if($variations && $variations->count() > 0) {
                    $vars = $variations->where('id',$product->pivot->variation_id)->first();
                }
                
                if($vars) {
                    $varname = ($vars->name == ''?'':' ( '. $vars->name .' )');
                    $unitPrice = $product->pivot->purchase_price ?? $vars->dpp_inc_tax;
                } else {
                    $unitPrice = $product->pivot->purchase_price ?? 0;
                }
                
                $lang_v1_total_decrease += $product->pivot->total ?? ($product->pivot->Amount_difference * $unitPrice);
            ?>
            <td style="text-align: left;"><?php echo e($product->name . $varname, false); ?></td>
            <td style="text-align: left;"><?php echo e(intval($product->pivot->qty_before), false); ?></td>
            <td style="text-align: left;"><?php echo e($product->pivot->amount_after_inventory, false); ?></td>
            <td style="text-align: left;"><?php echo e($product->pivot->Amount_difference, false); ?></td>
            <td style="text-align: left;"><?php echo e(number_format($unitPrice), false); ?></td>
            <td style="text-align: left;"><?php echo e(number_format($product->pivot->total ?? ($product->pivot->Amount_difference * $unitPrice)), false); ?></td>
            <td style="text-align: left;">-</td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/InventoryManagement/Providers/../Resources/views/partials/disabilityReports.blade.php ENDPATH**/ ?>