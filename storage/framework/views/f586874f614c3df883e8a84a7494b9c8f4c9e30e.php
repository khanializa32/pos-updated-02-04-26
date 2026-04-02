
<?php $__currentLoopData = $inventories->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr id="<?php echo e($product->id, false); ?>" data-skip="1">
        <?php
            $vars = $products->where('var_id',$product->pivot->variation_id)->first();
            $varname = $vars->var_name ;
            $skuAndSubSku = ($product->type =='single'?$vars->sku  : $vars->sub_sku) ;
        ?>
        <td ><?php echo e($product->name. ($varname == 'DUMMY'?'':' ( '. $varname .' )'), false); ?></td>
        <!--<td><?php echo e($skuAndSubSku, false); ?></td>-->

        <td><?php echo e(number_format($product->pivot->qty_before), false); ?></td>
        <td>
            <input value="<?php echo e($product->pivot->amount_after_inventory, false); ?>" type="text"  disabled="true"/>
            <input type="hidden" name="product_id" value="<?php echo e($product->pivot->variation_id, false); ?>" disabled readonly>
            <input type="hidden" value="<?php echo e($product->pivot->variation_id, false); ?>" disabled readonly>
        </td>
        <?php
            $amountDifference = $product->pivot->amount_after_inventory - $product->pivot->qty_before ;
            $encValues = Crypt::encrypt([
                'var_id'=>$product->pivot->variation_id,
                'product_inv_id'=>$product->id,
                'inv_id'=>$inventories->id
            ]);
        ?>
        
        
        <td>
            <?php if($amountDifference > 0): ?>
                <span style="color:green; font-weight:bold;">
                    +<?php echo e(number_format($amountDifference), false); ?>

                </span>
            <?php elseif($amountDifference < 0): ?>
                <span style="color:red; font-weight:bold;">
                    <?php echo e(number_format($amountDifference), false); ?>

                </span>
            <?php else: ?>
                <span>
                    <?php echo e(number_format($amountDifference), false); ?>

                </span>
            <?php endif; ?>
        </td>


        <td>
            <button class="btn btn- edit_current_row" data-values="<?php echo e($encValues, false); ?>">
               Editar <i class='fas fa-edit' style='font-size:20px;color:orange'></i>
            </button>
            <!--<button class="btn btn-danger delete_current_row" data-values="<?php echo e($encValues, false); ?>">
                <i class="fa-solid fa-trash-can"></i>
            </button> -->
            <i class="fa-thin fa-badge-check"></i></td>
    </tr>
    <i class="fa-thin fa-badge-check"></i>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/InventoryManagement/Providers/../Resources/views/partials/tableRowForListing.blade.php ENDPATH**/ ?>