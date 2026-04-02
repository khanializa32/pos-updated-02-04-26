<?php $__currentLoopData = $notExistsProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="<?php echo e($loop->iteration, false); ?>">
        <td><?php echo e($loop->iteration, false); ?></td>
        <?php
            $varname='';
            $varname = $product->var_name ;
            $varname = ($varname == 'DUMMY'?'':' ( '. $product->var_name .' )') ;
            $skuAndSubSku = ($product->type =='single'?$product->sku  : $product->sub_sku) ;
        ?>
        <td><?php echo e($product->name . $varname, false); ?></td>
        <td><?php echo e($skuAndSubSku, false); ?></td>
        <td><?php echo e(intval($product->qty_left), false); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/InventoryManagement/Providers/../Resources/views/partials/inventoryNotDoneList.blade.php ENDPATH**/ ?>