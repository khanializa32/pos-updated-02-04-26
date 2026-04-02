
    <tr id="<?php echo e($variations->id, false); ?>" >
        <td ><?php echo e($product->name. ($variations->name == 'DUMMY'?'':' ( '. $variations->name .' )'), false); ?></td>
        <!--<td><?php echo e($variations->sub_sku, false); ?></td>-->
        <td id="productQuantity_<?php echo e($variations->id, false); ?>"><?php echo e($productQuantity, false); ?></td>
        <td onchange="updateInventoryAmount(this , <?php echo e($variations->id, false); ?>)">
            <input type="hidden" value="<?php echo e($variations->id, false); ?>" name="variation_id">
        <input type="hidden" value="<?php echo e($product->id, false); ?>" name="product_id">
            <input value="0" type="text" id="productAfterInventory_<?php echo e($variations->id, false); ?>"/>
        </td>
        <td id="difference_<?php echo e($variations->id, false); ?>"></td>
        <td>
            <button class="btn btn-danger delete_row" name="delete" >
                <i class="fa-solid fa-trash-can"></i>
                <span class="m-2"><?php echo app('translator')->get('inventorymanagement::inventory.delete'); ?></span>
            </button>
            <i class="fa-thin fa-badge-check"></i>
        </td>
    </tr>
    <i class="fa-thin fa-badge-check"></i>




<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/InventoryManagement/Providers/../Resources/views/partials/tablerow.blade.php ENDPATH**/ ?>