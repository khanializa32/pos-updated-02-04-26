<div class="modal-dialog modal-xl" role="document">
  <div class="modal-content">
    <?php echo $__env->make('purchase.partials.show_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="modal-footer">
      <!--<button type="button" class="tw-dw-btn bg-info tw-text-white no-print" aria-label="Print" -->
      <!--onclick="$(this).closest('div.modal-content').printThis();"><i class="fa fa-print"></i> <?php echo app('translator')->get( 'messages.print' ); ?>-->
      <!--</button>-->
          <a href="#" class="print-invoice tw-dw-btn bg-info tw-text-white no-print" data-dismiss="modal" data-href="<?php echo e(action([\App\Http\Controllers\PurchaseController::class, 'printInvoice'], [$purchase->id]), false); ?>"><i class="fas fa-print"  aria-hidden="true"></i><?php echo app('translator')->get('messages.print'); ?></a>
      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white no-print" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var element = $('div.modal-xl');
		__currency_convert_recursively(element);
	});
</script>
<?php /**PATH C:\laragon\www\POS\alizazip\resources\views/purchase/show.blade.php ENDPATH**/ ?>