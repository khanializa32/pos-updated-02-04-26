<div class="modal" tabindex="-1" id="editProductModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo app('translator')->get('inventorymanagement::inventory.edit_inv'); ?> <span id="editProductModal_product_name"></span></h4>

            </div>
            <div class="modal-body">
              <input type="hidden" id="values_in">
                <div class="form-group">
                    <label for="new_product_qty"><?php echo app('translator')->get('inventorymanagement::inventory.current_product_qty'); ?></label>
                    <input type="number" class="form-control" id="new_product_qty" readonly>
                  </div>
                <div class="form-group">
                    <label for="inv_product_before_qty"><?php echo app('translator')->get('inventorymanagement::inventory.current_amount'); ?></label>
                    <input type="number" class="form-control" id="inv_product_before_qty" readonly>
                  </div>
                  <div class="form-group">
                      <label for="produ_after_inv"><?php echo app('translator')->get('inventorymanagement::inventory.amount_after_inventory'); ?></label>
                      <input type="number" class="form-control" id="produ_after_inv" >
                    </div>
                  
                <div class="form-group">
                    <label for="product_fa_qty"><?php echo app('translator')->get('inventorymanagement::inventory.amount_difference'); ?></label>
                    <input type="number" class="form-control" id="product_fa_qty" readonly>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" aria-label="<?php echo app('translator')->get('inventorymanagement::inventory.close'); ?>" data-dismiss="modal" id="editProductModalClose"><?php echo app('translator')->get('inventorymanagement::inventory.close'); ?></button>
                <button type="button" class="btn bg-info tw-text-white" id="save_new_inv_qty"><?php echo app('translator')->get('inventorymanagement::inventory.save_changes'); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/InventoryManagement/Providers/../Resources/views/partials/modals/editProductInventoryModal.blade.php ENDPATH**/ ?>