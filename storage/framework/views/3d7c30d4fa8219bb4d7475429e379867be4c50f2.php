<?php $__currentLoopData = $increaseProductReport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr id="<?php echo e($loop->iteration, false); ?>">
    <?php
        $vars = $variations->where('id',$product->pivot->variation_id)->first();
        $varname='';
        $varname = ($varname == ''?'':' ( '. $vars->name .' )') ;
        $skuAndSubSku = ($product->type =='single'?$vars->sku  : $vars->sub_sku) ;

        // Use the stored price from inventory_products (respects pricing method)
        $unitPrice = $product->pivot->purchase_price ?? $vars->dpp_inc_tax;
    ?>
    <td style="text-align: left;"><?php echo e($product->name . $varname, false); ?></td>
   <!-- <td style="text-align: left;"><?php echo e($skuAndSubSku, false); ?></td> -->
    <td style="text-align: left;"><?php echo e(intval($product->pivot->qty_before), false); ?></td>
    <td style="text-align: left;"><?php echo e($product->pivot->amount_after_inventory, false); ?></td>
    <td style="text-align: left;"><?php echo e($product->pivot->Amount_difference, false); ?></td>
    <td style="text-align: left;"><?php echo e(number_format($unitPrice), false); ?></td>
    <td style="text-align: left;"><?php echo e(number_format($product->pivot->total ?? ($product->pivot->Amount_difference * $unitPrice)), false); ?></td>
    <td style="text-align: left;">-</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/InventoryManagement/Providers/../Resources/views/partials/increaseReports.blade.php ENDPATH**/ ?>