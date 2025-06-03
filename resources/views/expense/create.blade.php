@extends('layouts.app')
@section('title', __('expense.add_expense'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black">@lang('expense.add_expense')
    
     &nbsp; <button style='font-size:36px;color:red'><i class='fab fa-youtube id='modal-video-tutorial' data-toggle="modal" data-target="#stack"></i></button>
					

	    </h4>
       
       
    <div data-width="500" tabindex="-1" class="modal fade" id="stack" style="display: none;">
     <div class="modal-dialog">
        <div class="modal-content" style="padding-bottom: 40px">
               <div class="modal-header">
                  <button type="button" id='close-modal' class="close" data-dismiss="modal" rel=0;aria-hidden="true"></button>
                <div id="title-tutorial">
                Modulo Gastos           
                </div>
        </div>
            <div class="modal-body">
                <div id="video-tutorial">
                    
                <iframe width="560" height="315" src="https://www.youtube.com/embed/HBV8Mn4lCyk?si=kYkTV6AbRGAX_cZd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>                
                </div>
                <p id="description-tutorial">Cree y administre sus gastos</p>

                
            </div>
        </div>
      </div>
    
    </h1>
</section>

<!-- Main content -->
<section class="content">
	{!! Form::open(['url' => action([\App\Http\Controllers\ExpenseController::class, 'store']), 'method' => 'post', 'id' => 'add_expense_form', 'files' => true ]) !!}
	<div class="box box-solid">
		<div class="box-body">
			<div class="row">

				@if(count($business_locations) == 1)
					@php 
						$default_location = current(array_keys($business_locations->toArray())) 
					@endphp
				@else
					@php $default_location = null; @endphp
				@endif
				<div class="col-sm-4">
					<div class="form-group">
						{!! Form::label('location_id', __('purchase.business_location').':*') !!}
						{!! Form::select('location_id', $business_locations, $default_location, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required'], $bl_attributes); !!}
					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						{!! Form::label('expense_category_id', __('expense.expense_category').':') !!}
						{!! Form::select('expense_category_id', $expense_categories, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); !!}
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
			            {!! Form::label('expense_sub_category_id', __('product.sub_category') . ':') !!}
			              {!! Form::select('expense_sub_category_id', [],  null, ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2']); !!}
			          </div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						{!! Form::label('ref_no', __('purchase.ref_no').':') !!}
						{!! Form::text('ref_no', null, ['class' => 'form-control']); !!}
						<p class="help-block">
			                @lang('lang_v1.leave_empty_to_autogenerate')
			            </p>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-4">
					<div class="form-group">
						{!! Form::label('transaction_date', __('messages.date') . ':*') !!}
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							{!! Form::text('transaction_date', @format_datetime('now'), ['class' => 'form-control', 'readonly', 'required', 'id' => 'expense_transaction_date']); !!}
						</div>
					</div>
				</div>
				
				
				
				
				
		<!-- Campos para documento soporte y grupo contable-->
				
				
				
				<div class="col-sm-3">
				<div class="form-group">
					<label for="expense_category_id">Grupos Contables:</label>
					<select class="form-control select2" id="expense_category_id" name="expense_category_id"><option selected="selected" value="">Seleccione</option><option value="1600">Excento</option></select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="expense_for">Gasto por:</label> <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="Elija el usuario para el que está relacionado el gasto. <I> (Opcional) </i> <br/> <small> Ejemplo: salario de un empleado. </small>" data-html="true" data-trigger="hover"></i>					<select class="form-control select2" id="expense_for" name="expense_for"><option selected="selected" value="">Seleccione</option><option value="" selected="selected">Ninguna</option><option value="2560"> Delio Ospino Barros</option></select>
				</div>
			</div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="checkbox" name="dse" id="dse" value="1" checked> <label for="dse">Documento Soporte Electronico</label>
                </div>
            </div>
			
		</div>
 
 
 
 
		<!-- Documento Adjunto-->
 
 
   <!-- /.box-body -->
</div>
	<div class="box box-primary" >
                
    <div class="box-body">
        <div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-search"></i>
						</span>
						<input class="form-control mousetrap" id="search_product_e" placeholder="Introduzca el nombre del producto / SKU / código de barras de escaneo" autofocus name="search_product_e" type="text">
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
					<button tabindex="-1" type="button" class="btn btn-link btn-modal"data-href="https://sistema.zisco.cloud/products/quick_add" 
            	data-container=".quick_add_product_modal"><i class="fa fa-plus"></i> Agregar nuevo producto </button>
				</div>
			</div>
		</div>
				<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive">
					<table class="table table-condensed table-bordered table-th-green text-center table-striped" id="purchase_entry_table">
						<thead>
							<tr>
								<th>#</th>
								<th>Servicio o producto</th>
								<th>Observacion</th>
								<th>Cantidad</th>
								<th style="display: none">Valor Unitario</th>
								<th style="display: none">Descuento porcentual</th>
								<th>Costo unitario</th>
								<th class="hide">Subtotal</th>
								<th class="hide">Impuesto</th>
								<th class="hide">Coste neto</th>
								<th>Linea total</th>
								<th class="" style="display: none">
									Profit Margin %								</th>
								<th style="display: none">
									Precio de venta unitario								</th>
																								<th>Centro de Costo</th>
								<th>% rte</th>
								<th>Valor Rte</th>
								<th style="display: none">Calidad</th>
								<th><i class="fa fa-trash" aria-hidden="true"></i></th>
								<th style="display: none">Cupo Disponible</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<hr/>
				<div class="pull-right col-md-5">
					<table class="pull-right col-md-12">
						<tr>
							<th class="col-md-7 text-right">Total artículos:</th>
							<td class="col-md-5 text-left">
								<span id="total_quantity" class="display_currency" data-currency_symbol="false"></span>
							</td>
						</tr>
						<tr class="hide">
							<th class="col-md-7 text-right">Subtotal:</th>
							<td class="col-md-5 text-left">
							  <span id="subtotal_before_discount" class="display_currency"></span>
							  <input type="hidden" id="st_before_discount_input" value=0>
							</td>
						  </tr>
						  <tr class="hide">
							<th class="col-md-7 text-right">Descuento:</th>
							<td class="col-md-5 text-left">
							  <span id="total_discount" class="display_currency"></span>
							  <input type="hidden" id="total_discount_input" name="total_discount_input" value=0>
							</td>
						  </tr>
						  <tr>
							<th class="col-md-7 text-right">Total antes de impuestos:</th>
							<td class="col-md-5 text-left">
								<span id="total_st_before_tax" class="display_currency"></span>
								<input type="hidden" id="st_before_tax_input" value=0 name="total_before_tax">
							</td>
						</tr>
						   <!--Adicione este tr para mostrar el iva en la Vista-->
						   <tr>
							<th class="col-md-7 text-right">Iva:</th>
							<td class="col-md-5 text-left">
								<span id="total_iva" class="display_currency"></span>
								<!-- This is total before purchase tax-->
								<input type="hidden" id="total_iva_input" value=0  name="total_iva">
							</td>
						</tr>
						<!--Adicione este tr para mostrar retefuente en la Vista-->
						<tr>
							<th class="col-md-7 text-right">Retefuente:</th>
							<td class="col-md-5 text-left">
								<span id="retefuente" class="display_currency"></span>
								<!-- This is total before purchase tax-->
								<input type="hidden" id="retefuente_input" value=0  name="retefuente_input">
							</td>
						</tr>
						<tr>
							<th class="col-md-7 text-right">Importe total neto:</th>
							<td class="col-md-5 text-left">
								<span id="total_subtotal" class="display_currency"></span>
								<!-- This is total before purchase tax-->
								<input type="hidden" id="total_subtotal_input" value=0>
							</td>
						</tr>
					</table>
				</div>

				<input type="hidden" id="row_count" value="0">
			</div>
		</div>
    </div>
    <!-- /.box-body -->
</div>
	<div class="box box-primary" >
                
    <div class="box-body">
        <div class="row">
			<div class="col-sm-12">
			<table class="table">
				<!--retefuente -->
				<tr style="">
					<td class="col-md-3">
						<div class="form-group">
							<label for="retefuente_type">Tipo de Retefuente:</label>
							<select class="form-control select2" id="retefuente_type" name="retefuente_type"><option value="" selected="selected">Ninguna</option><option value="fixed">Fijo</option><option value="percentage">Porcentaje</option></select>
						</div>
					</td>
					<td class="col-md-3">
						<div class="form-group">
						<label for="retefuente_amount">Monto:</label>
						<input class="form-control input_number" required name="retefuente_amount" type="text" value="0" id="retefuente_amount">
						</div>
					</td>
					<td class="col-md-3">
						&nbsp;
					</td>
					<td class="col-md-3">
						<b>Descuento:</b>(-) 
						<span id="discount_calculated_amount" class="display_currency">0</span>
					</td>
				</tr>
				<tr class="hide">
					<td class="col-md-3">
						<div class="form-group">
							<label for="discount_type">Tipo de descuento:</label>
							<select class="form-control select2" id="discount_type" name="discount_type"><option value="" selected="selected">Ninguna</option><option value="fixed">Fijo</option><option value="percentage">Porcentaje</option></select>
						</div>
					</td>
					<td class="col-md-3">
						<div class="form-group">
						<label for="discount_amount">Importe de descuento:</label>
						<input class="form-control input_number" required name="discount_amount" type="text" value="0" id="discount_amount">
						</div>
					</td>
					<td class="col-md-3">
						&nbsp;
					</td>
					<td class="col-md-3">
						<b>Descuento:</b>(-) 
						<span id="discount_calculated_amount" class="display_currency">0</span>
					</td>
				</tr>
				<tr style="display: none">
					<td>
						<div class="form-group">
						<label for="tax_id">Impuesto de compra:</label>
						<select name="tax_id" id="tax_id" class="form-control select2" placeholder="'Please Select'">
							<option value="" data-tax_amount="0" data-tax_type="fixed" selected>Ninguna</option>
													</select>
						<input id="tax_amount" name="tax_amount" type="hidden" value="0">
						</div>
						<div class="form-group">
							<label for="tax_id">Impuesto de compra:</label>
							<select name="tax2_id" id="tax2_id" class="form-control select2" placeholder="'Please Select'">
								<option value="" data-tax_amount="0" data-tax_type="fixed" selected>Ninguna</option>
															</select>
							<input id="tax_amount2" name="tax_amount2" type="hidden" value="0">
							</div>
					</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>
						<b>Impuesto de compra:</b>(+) 
						<span id="tax_calculated_amount" class="display_currency">0</span>
					</td>
				</tr>

				<tr style="display: none">
					<td>
						<div class="form-group">
						<label for="shipping_details">Detalles de env&iacute;o:</label>
						<input class="form-control" name="shipping_details" type="text" id="shipping_details">
						</div>
					</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>
						<div class="form-group">
						<label for="shipping_charges">(+) Cargos de env&iacute;o adicionales:</label>
						<input class="form-control input_number" required name="shipping_charges" type="text" value="0" id="shipping_charges">
						</div>
					</td>
				</tr>

				<tr style="display: none">
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>
						<input id="grand_total_hidden" name="final_total" type="hidden" value="0">
						<b>Total compra: </b><span id="grand_total" class="display_currency" data-currency_symbol='true'>0</span>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						<div class="form-group">
							<label for="additional_notes">Notas adicionales</label>
							<textarea class="form-control" rows="3" name="additional_notes" cols="50" id="additional_notes"></textarea>
						</div>
					</td>
				</tr>

			</table>
			</div>
		</div>
    </div>
    <!-- /.box-body -->
				
				
				
				<div class="col-sm-4">
					<div class="form-group">
						{!! Form::label('expense_for', __('expense.expense_for').':') !!} @show_tooltip(__('tooltip.expense_for'))
						{!! Form::select('expense_for', $users, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); !!}
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						{!! Form::label('contact_id', __('lang_v1.expense_for_contact').':') !!} 
						{!! Form::select('contact_id', $contacts, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]); !!}
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('document', __('purchase.attach_document') . ':') !!}
                        {!! Form::file('document', ['id' => 'upload_document', 'accept' => implode(',', array_keys(config('constants.document_upload_mimes_types')))]); !!}
                        <small><p class="help-block">@lang('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)])
                        @includeIf('components.document_help_text')</p></small>
                    </div>
                </div>
                
              
                
                
				<div class="col-md-4">
			    	<div class="form-group">
			            {!! Form::label('tax_id', __('product.applicable_tax') . ':' ) !!}
			            <div class="input-group">
			                <span class="input-group-addon">
			                    <i class="fa fa-info"></i>
			                </span>
			                {!! Form::select('tax_id', $taxes['tax_rates'], null, ['class' => 'form-control'], $taxes['attributes']); !!}

							<input type="hidden" name="tax_calculation_amount" id="tax_calculation_amount" 
							value="0">
			            </div>
			        </div>
			    </div>
			    <div class="col-sm-4">
					<div class="form-group">
						{!! Form::label('final_total', __('sale.total_amount') . ':*') !!}
						{!! Form::text('final_total', null, ['class' => 'form-control input_number', 'placeholder' => __('sale.total_amount'), 'required']); !!}
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-4">
					<div class="form-group">
						{!! Form::label('additional_notes', __('expense.expense_note') . ':') !!}
								{!! Form::textarea('additional_notes', null, ['class' => 'form-control', 'rows' => 3]); !!}
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<br>
					<label>
		              {!! Form::checkbox('is_refund', 1, false, ['class' => 'input-icheck', 'id' => 'is_refund']); !!} @lang('lang_v1.is_refund')?
		            </label>@show_tooltip(__('lang_v1.is_refund_help'))
				</div>
			</div>
		</div>
	</div> <!--box end-->
	@include('expense.recur_expense_form_part')
	@component('components.widget', ['class' => 'box-solid', 'id' => "payment_rows_div", 'title' => __('purchase.add_payment')])
	<div class="payment_row">
		@include('sale_pos.partials.payment_row_form', ['row_index' => 0, 'show_date' => true])
		<hr>
		<div class="row">
			<div class="col-sm-12">
				<div class="pull-right">
					<strong>@lang('purchase.payment_due'):</strong>
					<span id="payment_due">{{@num_format(0)}}</span>
				</div>
			</div>
		</div>
	</div>
	@endcomponent
	<div class="col-sm-12 text-center">
		<button type="submit" class="tw-dw-btn tw-dw-btn-warning tw-dw-btn-lg tw-text-black">@lang('messages.save')</button>
	</div>
{!! Form::close() !!}
</section>
@endsection
@section('javascript')
<script type="text/javascript">
	$(document).ready( function(){
		$('.paid_on').datetimepicker({
            format: moment_date_format + ' ' + moment_time_format,
            ignoreReadonly: true,
        });
	});
	
	__page_leave_confirmation('#add_expense_form');
	$(document).on('change', 'input#final_total, input.payment-amount', function() {
		calculateExpensePaymentDue();
	});

	function calculateExpensePaymentDue() {
		var final_total = __read_number($('input#final_total'));
		var payment_amount = __read_number($('input.payment-amount'));
		var payment_due = final_total - payment_amount;
		$('#payment_due').text(__currency_trans_from_en(payment_due, true, false));
	}

	$(document).on('change', '#recur_interval_type', function() {
	    if ($(this).val() == 'months') {
	        $('.recur_repeat_on_div').removeClass('hide');
	    } else {
	        $('.recur_repeat_on_div').addClass('hide');
	    }
	});

	$('#is_refund').on('ifChecked', function(event){
		$('#recur_expense_div').addClass('hide');
	});
	$('#is_refund').on('ifUnchecked', function(event){
		$('#recur_expense_div').removeClass('hide');
	});

	$(document).on('change', '.payment_types_dropdown, #location_id', function(e) {
	    var default_accounts = $('select#location_id').length ? 
	                $('select#location_id')
	                .find(':selected')
	                .data('default_payment_accounts') : [];
	    var payment_types_dropdown = $('.payment_types_dropdown');
	    var payment_type = payment_types_dropdown.val();
	    if (payment_type) {
	        var default_account = default_accounts && default_accounts[payment_type]['account'] ? 
	            default_accounts[payment_type]['account'] : '';
	        var payment_row = payment_types_dropdown.closest('.payment_row');
	        var row_index = payment_row.find('.payment_row_index').val();

	        var account_dropdown = payment_row.find('select#account_' + row_index);
	        if (account_dropdown.length && default_accounts) {
	            account_dropdown.val(default_account);
	            account_dropdown.change();
	        }
	    }
	});
</script>
@endsection