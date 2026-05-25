@extends('layouts.app')



@section('title', 'Convertir a Factura a Documento Soporte')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black">Convertir a Factura a Documento Soporte</h1>
</section>
<!-- Main content -->
<section class="content no-print">

	{!! Form::open(['url' => action([\App\Http\Controllers\PurchaseController::class, 'ConvertToInvoiceDianStore']), 'method' => 'post', 'id' => 'convert_sell_to_invoice_dian_form']) !!}
        @component('components.widget', ['class' => 'box-solid'])

        <table class="table">
            <thead>
              <tr>
				<th scope="col">NIT</th>
				<th scope="col">Cliente</th>
				<th scope="col">Referencia</th>
				<th scope="col">Número de Factura</th>
                <th scope="col">Fecha de Factura</th>
                <th scope="col">Total</th>
                <th scope="col">Estado</th>
                <th scope="col">Método de pago</th>
                <th scope="col">Dian</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$purchase->contact->contact_id}}-{{$purchase->contact->dv}}</td>
                <td>{{$purchase->contact->name}}</td>
                <td>{{$purchase->ref_no}}</td>
                <td>{{$purchase->invoice_no}}</td>
                <td>{{$purchase->transaction_date}}</td>
                <td>{{number_format($purchase->final_total, 1, '.', ',')}}</td>
                <td>{{$purchase->status}}</td>
                <td>{{$purchase->payment_lines[0]->method ?? ''}}</td>
                <td>{!! $purchase->is_valid ? '<span style="color:#009166;background-color:#98D973 !important;font-weight:bolder;" class="label is_valid-label"><i class="fas fa-shield-alt"></i> enviado</span>' : '<span style="color:#ffffff;background-color:#ffad46 !important;font-weight:bolder;" class="label is_valid-label"><i class="fas fa-exclamation-triangle"></i> pendiente</span>'!!}</td>
              </tr>
            </tbody>
        </table>

        @endcomponent

        @component('components.widget', ['class' => 'box-solid'])


		<div class="row">
			<div class="col-sm-4">
        @if($purchase->invoice_no == '' && $purchase->resolution == '' && $purchase->e_invoice == 'no' && $purchase->is_valid == 0)
				<div class="form-group">
					{!! Form::label('invoice_scheme_id', __('Resolución de Factura') . ':*') !!}
					{!! Form::select('invoice_scheme_id', $invoice_schemes, $default_invoice_scheme->id, ['class' => 'form-control select2', 'required', 'placeholder' => __('messages.please_select')]); !!}
				</div>
        @endif
			</div>
		</div>
		<input type="hidden" name="purchase_id" value="{{$purchase->id}}">


		@if(session('success'))
		<div class="alert alert-info" role="alert">
			{{ session('success') }}
		  </div>
		@endif
		  
      @if($purchase->invoice_no == '' && $purchase->resolution == '' && $purchase->e_invoice == 'no')
        <button type="submit" class="tw-dw-btn tw-dw-btn-success tw-dw-btn-sm tw-text-black">Generar Documento Soporte</button>
      @else
        <button type="submit" formaction="{{ action([\App\Http\Controllers\PurchaseController::class, 'sendToDian']) }}" class="tw-dw-btn tw-dw-btn-success tw-dw-btn-sm tw-text-black">Enviar a la DIAN</button>
      @endif
        @endcomponent

    {!! Form::close() !!}
    @stop

@section('javascript')
	<script src="{{ asset('js/pos.js?v=' . $asset_v) }}"></script>
	<script src="{{ asset('js/product.js?v=' . $asset_v) }}"></script>
	<script src="{{ asset('js/opening_stock.js?v=' . $asset_v) }}"></script>

    <script type="text/javascript">
    	$(document).ready( function() {


    	});
    </script>
@endsection
