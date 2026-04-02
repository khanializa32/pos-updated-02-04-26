<div class="modal-dialog modal-xl" role="document">
  <div class="modal-content">
    @include('purchase.partials.show_details')
    <div class="modal-footer">
      <!--<button type="button" class="tw-dw-btn bg-info tw-text-white no-print" aria-label="Print" -->
      <!--onclick="$(this).closest('div.modal-content').printThis();"><i class="fa fa-print"></i> @lang( 'messages.print' )-->
      <!--</button>-->
          <a href="#" class="print-invoice tw-dw-btn bg-info tw-text-white no-print" data-dismiss="modal" data-href="{{ action([\App\Http\Controllers\PurchaseController::class, 'printInvoice'], [$purchase->id]) }}"><i class="fas fa-print"  aria-hidden="true"></i>@lang('messages.print')</a>
      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white no-print" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var element = $('div.modal-xl');
		__currency_convert_recursively(element);
	});
</script>
