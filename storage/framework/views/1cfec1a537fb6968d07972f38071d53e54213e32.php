<?php $__currentLoopData = $inventories->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="<?php echo e($loop->iteration, false); ?>">
        <?php
            $varname='';
            $vars = $variationsIn->where('id',$product->pivot->variation_id)->first();
            $varname = $vars->name;
            $varname = ($varname == 'DUMMY'?'':' ( '. $vars->name .' )') ;
            $skuAndSubSku = ($product->type =='single'? $product->sku  : $vars->sub_sku) ;
        ?>

        <td><?php echo e($product->name . $varname, false); ?></td>
        <td><?php echo e($skuAndSubSku, false); ?></td>
        
        <td><?php echo e(intval($product->pivot->qty_before), false); ?></td>
        <td><?php echo e($product->pivot->amount_after_inventory, false); ?></td>
        <td><?php echo e($product->pivot->Amount_difference, false); ?></td>
    </tr>
    <i class="fa-thin fa-badge-check"></i>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/InventoryManagement/Providers/../Resources/views/partials/inventoryDoneList.blade.php ENDPATH**/ ?>