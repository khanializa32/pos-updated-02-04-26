<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-condensed bg-white">
				<thead>
					<tr class="bg-purple">
						<th>SKU</th>
						<th>@lang('business.product')</th>
						<th>@lang('business.location')</th>
						<th>@lang('sale.unit_price')</th>
						<th>@lang('report.current_stock')</th>
						<th>@lang('lang_v1.total_stock_price')</th>
						<th>@lang('report.total_unit_sold')</th>
						<th>@lang('lang_v1.total_unit_transfered')</th>
						<th>@lang('lang_v1.total_unit_adjusted')</th>
					</tr>
				</thead>
				<tbody>
					@foreach($product_stock_details as $product)
						<tr>
							<td>{{$product->sku}}</td>
							<td>
								@php
									$name = $product->product;
									if ($product->type == 'variable') {
										$name .= ' - ' . $product->product_variation . '-' . $product->variation_name;
									}
								@endphp
								{{$name}}
							</td>
							<td>{{$product->location_name}}</td>
							<td>
								<span class="display_currency" data-currency_symbol=true>{{$product->unit_price ?? 0}}</span>
							</td>
							<td>
								<span data-is_quantity="true" class="display_currency"
									data-currency_symbol=false>{{$product->stock ?? 0}}</span>{{$product->unit}}
							</td>
							<td>
								<span class="display_currency" data-currency_symbol=true>{{$product->unit_price * $product->stock}}</span>
							</td>
							<td>
								<span data-is_quantity="true" class="display_currency"
									data-currency_symbol=false>{{$product->total_sold ?? 0}}</span>{{$product->unit}}
							</td>
							<td>
								<span data-is_quantity="true" class="display_currency"
									data-currency_symbol=false>{{$product->total_transfered ?? 0}}</span>{{$product->unit}}
							</td>
							<td>
								<span data-is_quantity="true" class="display_currency"
									data-currency_symbol=false>{{$product->total_adjusted ?? 0}}</span>{{$product->unit}}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

{{-- Batch / Lot & Expiry detail table --}}
@if(!empty($batch_details) && $batch_details->count() > 0)
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<strong>@lang('lang_v1.lot_n_expiry') - @lang('lang_v1.product_stock_details')</strong>
		</div>
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-condensed table-bordered bg-white" style="margin-top:6px;">
					<thead>
						<tr class="bg-info">
							<th>#</th>
							<th>@lang('business.location')</th>
							@if(session('business.enable_lot_number'))
								<th>@lang('lang_v1.lot_number')</th>
							@endif
							<th>@lang('lang_v1.expiry_date')</th>
							<th>@lang('lang_v1.quantity_error_msg_in_lot', ['qty' => '', 'unit' => ''])
								@lang('report.current_stock')
							</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@php $today = \Carbon\Carbon::today(); @endphp
						@foreach($batch_details as $index => $batch)
							@php
								$isExpired = !empty($batch->exp_date) && \Carbon\Carbon::parse($batch->exp_date)->lt($today);
								$rowClass = $isExpired ? 'bg-danger' : '';
							@endphp
							<tr class="{{ $rowClass }}">
								<td>{{ $index + 1 }}</td>
								<td>{{ $batch->location_name }}</td>
								@if(session('business.enable_lot_number'))
									<td>{{ $batch->lot_number ?? '--' }}</td>
								@endif
								<td>
									@if(!empty($batch->exp_date))
										{{ \Carbon\Carbon::parse($batch->exp_date)->format(session('business.date_format', 'Y-m-d')) }}
									@else
										<span class="label label-primary">No Expiry &ndash; Sold First</span>
									@endif
								</td>
								<td>
									<span class="label label-{{ $isExpired ? 'danger' : 'success' }}">
										{{ $batch->qty_available }}
									</span>
								</td>
								<td>
									@if($isExpired)
										<span class="label label-danger">@lang('lang_v1.available_stock_expired')</span>
									@else
										<span class="label label-success">@lang('lang_v1.available')</span>
									@endif
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endif