<div class="modal-dialog modal-xs" role="document">
  <div class="modal-content">
    @include('purchase.partials.radian_details')
    <div class="modal-footer">
      {{-- <button type="button" class="tw-dw-btn bg-info tw-text-white no-print" aria-label="Print" 
      onclick="$(this).closest('div.modal-content').printThis();"><i class="fa fa-print"></i> @lang( 'messages.print' )
      </button> --}}
      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white no-print" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var element = $('div.modal-xl');
		__currency_convert_recursively(element);

    $(document).on('submit', 'form#radian_form', function (e) {
      var newAmount = __read_number($('#withdrawal-amount'));
    $('#withdrawal-amount').val(newAmount);
    
    e.preventDefault();
    var data = $(this).serialize();

    $.ajax({
        method: 'POST',
        url: $(this).attr('action'),
        dataType: 'json',
        data: data,
        success: function (result) {
            if (result.success == true) {
                $('#radian-modal').modal('hide');
                toastr.success(result.msg);
            } else {
                toastr.error(result.msg);
            }
        },
    });
});
	});
</script>
