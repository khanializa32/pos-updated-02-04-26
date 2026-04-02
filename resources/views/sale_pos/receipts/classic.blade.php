<!-- business information here -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <title>Receipt-{{$receipt_details->invoice_no}}</title>
    </head>
    <body>
        <div class="ticket">
        	@if(empty($receipt_details->letter_head))
			@if(!empty($receipt_details->logo))
				<img style="max-height: 120px; width: auto;" src="{{$receipt_details->logo}}" class="img img-responsive center-block">
			@endif
				
				<div class="text-box">
				<!-- Logo -->
				<p class="centered">
					<!-- Header text -->
					@if(!empty($receipt_details->header_text))
						<span class="headings">{!! $receipt_details->header_text !!}</span>
						<br/>
					@endif

					<!-- business information here -->
					@if(!empty($receipt_details->display_name))
						<span class="headings">
							{{$receipt_details->display_name}}
						</span>
					<br/>
					@endif

				<b class="centered sub-headings">NIT</b> @if (!empty($receipt_details->nit))
					<b> {!! $receipt_details->type_document !!}:</b> <b>{!! $receipt_details->nit !!}-{!! $receipt_details->dv !!}</b>  <br>
					@endif
					 <div class="sub-headings centered" style="line-height: 1.2; margin-top: 5px;">
                        @if (!empty($receipt_details->address))
                            <b>{!! $receipt_details->address !!}</b> <br>
                        @endif
                        
                        @if (!empty($receipt_details->type_organization))
                            <b>{!! $receipt_details->type_organization !!}</b> <br>
                        @endif
                        
                        @if (!empty($receipt_details->type_regime))
                            <b>{!! $receipt_details->type_regime !!}</b> <br>
                        @endif
                        
                         &nbsp;
				    @if(!empty($receipt_details->sub_heading_line1))
						<b>{{ $receipt_details->sub_heading_line1 }}</b><br/>
					@endif
					&nbsp;
					@if(!empty($receipt_details->sub_heading_line2))
						<b style="font-size: 14px;">{{ $receipt_details->sub_heading_line2 }}</b><br/>
					@endif
					&nbsp;
					@if(!empty($receipt_details->sub_heading_line3))
						<b>{{ $receipt_details->sub_heading_line3 }}</b>
                    
                       
                    </div>
				   <br/>
				
				
				</div>
					@if(!empty($receipt_details->contact))
						{!! $receipt_details->contact !!}
					@endif
					@if(!empty($receipt_details->contact) && !empty($receipt_details->website))
						, 
					@endif
					@if(!empty($receipt_details->website))
						<br>{{ $receipt_details->website }}
					@endif
					@if(!empty($receipt_details->location_custom_fields))
						<br>{{ $receipt_details->location_custom_fields }}
					@endif

					
					@endif
					@if(!empty($receipt_details->sub_heading_line4))
						{{ $receipt_details->sub_heading_line4 }}<br/>
					@endif		
					@if(!empty($receipt_details->sub_heading_line5))
						{{ $receipt_details->sub_heading_line5 }}<br/>
					@endif

					@if(!empty($receipt_details->tax_info1))
						<br><b>{{ $receipt_details->tax_label1 }}</b> {{ $receipt_details->tax_info1 }}
					@endif

					@if(!empty($receipt_details->tax_info2))
						<b>{{ $receipt_details->tax_label2 }}</b> {{ $receipt_details->tax_info2 }}
					@endif
				
				</p>
				</div>
				
			@endif
				@if(!empty($receipt_details->letter_head))
					<div class="text-box">
						<img style="width: 100%;margin-bottom: 10px;" src="{{$receipt_details->letter_head}}">
					</div>
				@endif
			<div class="border-top border-bottom sub-headings" style="padding: 5px 0; line-height: 1.1;">
    
    <div class="flex-box">
        <span><b>F.E.V. Nro: {{$receipt_details->invoice_no}}</b></span>
        <span><b>Fecha: {{$receipt_details->invoice_date}}</b></span>
    </div>

    @if(!empty($receipt_details->sales_person) || !empty($receipt_details->service_staff))
        <div class="flex-box" style="font-size: 11px !important;">
            <span><b>Vendedor: {{$receipt_details->sales_person}}</b></span>
            @if(!empty($receipt_details->service_staff))
                <span>Staff:</b> {{$receipt_details->service_staff}}<b></span>
            @endif
        </div>
    @endif

    @if(!empty($receipt_details->table) || !empty($receipt_details->repair_brand))
        <div class="flex-box" style="font-size: 11px !important;">
            @if(!empty($receipt_details->table)) <span><b>Mesa: {{$receipt_details->table}}</b></span> @endif
            @if(!empty($receipt_details->repair_brand)) <span><b>Equipo:{{$receipt_details->repair_brand}} {{$receipt_details->repair_model_no}}</b> </span> @endif
        </div>
    @endif

    <div class="border-bottom-dotted" style="margin: 3px 0;"></div>

    <div class="bw">
        <b>Cliente: {!! $receipt_details->customer_info !!}</b><br>
        <b>NIT/CC: {{ $receipt_details->client_id }}</b>
        @if(!empty($receipt_details->contact)) | <b>Tel: {{ $receipt_details->contact }} </b> @endif
        
        @if(!empty($receipt_details->customer_custom_fields))
            <br><small>{!! $receipt_details->customer_custom_fields !!}</small>
        @endif
    </div>

    @if(!empty($receipt_details->sell_custom_field_1_value) || !empty($receipt_details->sell_custom_field_2_value))
        <div style="font-size: 10px; border-top: 1px dotted #ccc; margin-top: 3px;">
            @if(!empty($receipt_details->sell_custom_field_1_value)) <span>{{$receipt_details->sell_custom_field_1_label}}: {{$receipt_details->sell_custom_field_1_value}}</span> @endif
            @if(!empty($receipt_details->sell_custom_field_2_value)) | <span>{{$receipt_details->sell_custom_field_2_label}}: {{$receipt_details->sell_custom_field_2_value}}</span> @endif
        </div>
    @endif
</div>
            <table style="margin-top: 25px !important" class="border-bottom width-100 table-f-12 mb-10">
                <thead class="border-bottom-dotted">
                    <tr>
                        
                        <th class="description text-left sub-headings" width="30%">
                        	Producto {{$receipt_details->table_product_label}}
                        </th>
                        <th class="quantity text-right sub-headings">
                        	Cant {{$receipt_details->table_qty_label}}
                        </th>
                        @if(empty($receipt_details->hide_price))
                        <!--<th class="unit_price text-right">
                        	Precio U.{{$receipt_details->table_unit_price_label}}
                        </th> -->
                        @if(!empty($receipt_details->discounted_unit_price_label))
							<th class="text-center sub-headings">
								{{$receipt_details->discounted_unit_price_label}}
							</th>
						@endif
                        @if(!empty($receipt_details->item_discount_label))
							<th class="text-right sub-headings">{{$receipt_details->item_discount_label}}</th>
						@endif
                        <th class="price text-center sub-headings">Total {{$receipt_details->table_subtotal_label}}</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
            @php
                $locIds = collect($receipt_details->lines ?? [])->pluck('line_location_id')->filter()->map(function($v){return (int)$v;})->unique()->sort()->values()->all();
                $hasMultiLocs = count($locIds) > 1;
                $locCodeMap = collect();
                    $locCodeMap = \App\BusinessLocation::whereIn('id', $locIds)->pluck('location_id','id');

            @endphp
            	@forelse($receipt_details->lines as $line)
                    <tr>
                        
                        <td class="description text-left sub-headings">
                                @php $locCode = $locCodeMap[(int)($line['line_location_id'] ?? 0)] ?? null; @endphp
                                @if($locCode)
                                    <strong>({{ $locCode }})</strong>
                                @endif
                        	{{$line['name']}} {{$line['product_variation']}} {{$line['variation']}} 
                        	@if(!empty($line['sub_sku'])), {{$line['sub_sku']}} @endif @if(!empty($line['brand'])), {{$line['brand']}} @endif @if(!empty($line['cat_code'])), {{$line['cat_code']}}@endif
                        	@if(!empty($line['product_custom_fields'])), {{$line['product_custom_fields']}} @endif
                        	@if(!empty($line['product_description']))
                            	<div class="f-8">
                            		{!!$line['product_description']!!}
                            	</div>
                            @endif
                        	@if(!empty($line['sell_line_note']))
                        	<br>
                        	<span class="f-8">
                        	{!!$line['sell_line_note']!!}
                        	</span>
                        	@endif 
                        	@if(!empty($line['lot_number']))<br> {{$line['lot_number_label']}}:  {{$line['lot_number']}} @endif 
                        	@if(!empty($line['product_expiry'])), {{$line['product_expiry_label']}}:  {{$line['product_expiry']}} @endif
                        	@if(!empty($line['warranty_name']))
                            	<br>
                            	<small>
                            		{{$line['warranty_name']}}
                            	</small>
                            @endif
                            @if(!empty($line['warranty_exp_date']))
                            	<small>
                            		- {{@format_date($line['warranty_exp_date'])}}
                            	</small>
                            @endif
                            @if(!empty($line['warranty_description']))
                            	<small> {{$line['warranty_description'] ?? ''}}</small>
                            @endif

                            @if($receipt_details->show_base_unit_details && $line['quantity'] && $line['base_unit_multiplier'] !== 1)
                            	<br><small>
                            		1 {{$line['units']}} = {{$line['base_unit_multiplier']}} {{$line['base_unit_name']}} <br>
                            					{{$line['base_unit_price']}} x {{$line['orig_quantity']}} = {{$line['line_total']}}
                            	</small>
                            	@endif
                        </td>
	                        <td class="quantity text-center sub-headings">{{$line['quantity']}}  @if($receipt_details->show_base_unit_details && $line['quantity'] && $line['base_unit_multiplier'] !== 1)
                            <br><small>
                            	{{$line['quantity']}} x {{$line['base_unit_multiplier']}} = {{$line['orig_quantity']}} {{$line['base_unit_name']}}
                            </small>
                            @endif</td>
	                        @if(empty($receipt_details->hide_price))
	                       <!-- <td class="unit_price text-right">{{$line['unit_price_before_discount']}}</td> -->

	                        @if(!empty($receipt_details->discounted_unit_price_label))
								<td class="text-center sub-headings">
									{{$line['unit_price_inc_tax']}} 
								</td>
							@endif

	                        @if(!empty($receipt_details->item_discount_label))
								<td class="text-right sub-headings">
									{{$line['total_line_discount'] ?? '0.00'}}
									@if(!empty($line['line_discount_percent']))
								 		({{$line['line_discount_percent']}}%)
									@endif
								</td>
							@endif
	                        <td class="price text-right sub-headings">{{$line['line_total']}}</td>
	                        @endif
	                    </tr>
	                    @if(!empty($line['modifiers']))
							@foreach($line['modifiers'] as $modifier)
								<tr>
									<td>
										&nbsp;
									</td>
									<td>
			                            {{$modifier['name']}} {{$modifier['variation']}} 
			                            @if(!empty($modifier['sub_sku'])), {{$modifier['sub_sku']}} @endif @if(!empty($modifier['cat_code'])), {{$modifier['cat_code']}}@endif
			                            @if(!empty($modifier['sell_line_note']))({!!$modifier['sell_line_note']!!}) @endif 
			                        </td>
									<td class="text-right sub-headings">{{$modifier['quantity']}} {{$modifier['units']}} </td>
									@if(empty($receipt_details->hide_price))
									<td class="text-right">{{$modifier['unit_price_inc_tax']}}</td>
									@if(!empty($receipt_details->discounted_unit_price_label))
										<td class="text-right sub-headings">{{$modifier['unit_price_exc_tax']}}</td>
									@endif
									@if(!empty($receipt_details->item_discount_label))
										<td class="text-right sub-headings">0.00</td>
									@endif
									<td class="text-right sub-headings">{{$modifier['line_total']}}</td>
									@endif
								</tr>
							@endforeach
						@endif
                    @endforeach
                    <tr>
                    	<td @if(!empty($receipt_details->item_discount_label)) colspan="6" @else colspan="5" @endif>&nbsp;</td>
                    	@if(!empty($receipt_details->discounted_unit_price_label))
    					<td></td>
    					@endif
                    </tr>
                </tbody>
            </table>
            @if(!empty($receipt_details->total_items_label))
				<div class="flex-box">
					<p class="left text-left sub-headings">
						 {!! $receipt_details->total_items_label !!}  {{$receipt_details->total_items}}
					</p>
				</div>
			@endif
			
			@if(!empty($receipt_details->total_quantity_label))
				<div class="flex-box">
					<p class="left text-left sub-headings">
						{!! $receipt_details->total_quantity_label !!}  {{$receipt_details->total_quantity}}
					</p>
				</div>
			@endif
			
			
			
		@if(empty($receipt_details->hide_price))
		
		
		
		
 @php
    function limpiar_numero($valor){
        $valor = str_replace(['$'. ' '], '', $valor);
        $valor = str_replace(',', '', $valor);
        $valor = str_replace('.', ',', $valor);
        return (float) $valor;
    }

    $total = limpiar_numero($receipt_details->total);

    // Impuestos
    $total_impuestos = 0;
    if(!empty($receipt_details->taxes)){
        foreach($receipt_details->taxes as $tax){
            $total_impuestos += limpiar_numero($tax);
        }
    }

    // Descuento
    $descuento = !empty($receipt_details->discount) 
        ? limpiar_numero($receipt_details->discount) 
        : 0;

    // Envío
    $envio = !empty($receipt_details->shipping_charges) 
        ? limpiar_numero($receipt_details->shipping_charges) 
        : 0;

    // Propina
    $propina = !empty($receipt_details->tip) 
        ? limpiar_numero($receipt_details->tip) 
        : 0;

    // Redondeo
    $redondeo = !empty($receipt_details->round_off) 
        ? limpiar_numero($receipt_details->round_off) 
        : 0;

    // BASE IMPONIBLE (CORREGIDO)
    $base_imponible = $total + $descuento - $envio - $propina - $redondeo;
@endphp


<div class="flex-box">
    <p class="left text-right sub-headings">SubTotal</p>
    <p class="width-50 text-right sub-headings">
        {{ number_format($base_imponible, 0, ',', '.') }}
    </p>
</div>



@if(!empty($receipt_details->taxes))
    @foreach($receipt_details->taxes as $key => $val)
        <div class="flex-box">
            <p class="left text-right sub-headings">{{$key}}</p>
            <p class="width-50 text-right sub-headings">{{$val}}</p>
        </div>
    @endforeach
@endif

<div class="flex-box">
    <p class="left text-right sub-headings">TOTAL</p>
    <p class="width-50 text-right sub-headings">
        {{$receipt_details->total}}
    </p>
</div>



            
            
            

                <!-- Shipping Charges -->
				@if(!empty($receipt_details->shipping_charges))
					<div class="flex-box">
						<p class="left text-right sub-headings">
							{!! $receipt_details->shipping_charges_label !!}
						</p>
						<p class="width-50 text-right sub-headings">
							{{$receipt_details->shipping_charges}}
						</p>
					</div>
				@endif

				@if(!empty($receipt_details->packing_charge))
					<div class="flex-box">
						<p class="left text-right sub-headings">
							{!! $receipt_details->packing_charge_label !!}
						</p>
						<p class="width-50 text-right sub-headings">
							{{$receipt_details->packing_charge}}
						</p>
					</div>
				@endif

				<!-- Discount -->
				@if( !empty($receipt_details->discount) )
					<div class="flex-box">
						<p class="width-50 text-right sub-headings">
							{!! $receipt_details->discount_label !!}
						</p>

						<p class="width-50 text-right sub-headings">
							(-) {{$receipt_details->discount}}
						</p>
					</div>
				@endif

				@if( !empty($receipt_details->total_line_discount) )
					<div class="flex-box">
						<p class="width-50 text-right sub-headings">
							{!! $receipt_details->line_discount_label !!}
						</p>

						<p class="width-50 text-right sub-headings">
							(-) {{$receipt_details->total_line_discount}}
						</p>
					</div>
				@endif

				@if( !empty($receipt_details->additional_expenses) )
					@foreach($receipt_details->additional_expenses as $key => $val)
						<div class="flex-box">
							<p class="width-50 text-right sub-headings">
								{{$key}}:
							</p>

							<p class="width-50 text-right sub-headings">
								(+) {{$val}}
							</p>
						</div>
					@endforeach
				@endif

				@if(!empty($receipt_details->reward_point_label) )
					<div class="flex-box">
						<p class="width-50 text-right sub-headings">
							{!! $receipt_details->reward_point_label !!}
						</p>

						<p class="width-50 text-right sub-headings">
							(-) {{$receipt_details->reward_point_amount}}
						</p>
					</div>
				@endif

			

				@if( $receipt_details->round_off_amount > 0)
					<div class="flex-box">
						<p class="width-50 text-right sub-headings">
							{!! $receipt_details->round_off_label !!} 
						</p>
						<p class="width-50 text-right sub-headings">
							{{$receipt_details->round_off}}
						</p>
					</div>
				@endif

		    	<!--<div class="flex-box">
					<p class="width-50 text-right sub-headings">
						{!! $receipt_details->total_label !!}
					</p>
					<p class="width-50 text-right sub-headings">
						{{$receipt_details->total}}
					</p>
				</div> -->
				
				
				@if(!empty($receipt_details->total_in_words))
				<p colspan="2" class="text-right  sub-headings mb-0">
					<small>
					({{$receipt_details->total_in_words}})
					</small>
				</p>
				@endif
				@if(!empty($receipt_details->payments))
					@foreach($receipt_details->payments as $payment)
						<div class="flex-box">
							<p class="width-50 text-right sub-headings">{{$payment['method']}}  </p>
							<p class="width-50 text-right sub-headings">{{$payment['amount']}}</p>
						</div>
					@endforeach
				@endif

				<!-- Total Paid-->
				@if(!empty($receipt_details->total_paid))
					<div class="flex-box">
						<p class="width-50 text-right sub-headings">
							{!! $receipt_details->total_paid_label !!}
						</p>
						<p class="width-50 text-right sub-headings">
							{{$receipt_details->total_paid}}
						</p>
					</div>
				@endif

				<!-- Total Due-->
				@if(!empty($receipt_details->total_due) && !empty($receipt_details->total_due_label))
					<div class="flex-box">
						<p class="width-50 text-right sub-headings">
							{!! $receipt_details->total_due_label !!}
						</p>
						<p class="width-50 text-right sub-headings">
							{{$receipt_details->total_due}}
						</p>
					</div>
				@endif

				@if(!empty($receipt_details->all_due))
					<div class="flex-box">
						<p class="width-50 text-right sub-headings">
							{!! $receipt_details->all_bal_label !!}
						</p>
						<p class="width-50 text-right sub-headings">
							{{$receipt_details->all_due}}
						</p>
					</div>
				@endif
			@endif
            
            <br>



            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                        <th style="text-align:left;">Impuesto</th>
                        <th style="text-align:right;">Base</th>
                        <th style="text-align:right;">%</th>
                        <th style="text-align:right;">Valor</th>
                    </tr>
                </thead>
                <tbody>
    @php
        // 1. Calculamos la base para productos con IVA 0% (Exentos/Excluidos)
        $base_iva_0 = 0;
        foreach($receipt_details->lines as $line) {
            // Verificamos si el item tiene impuesto 0
            if (isset($line['tax_percent']) && (float)$line['tax_percent'] == 0) {
                // Importante: Usar el valor que representa el subtotal neto del item
                $base_iva_0 += (float)limpiar_numero($line['line_total']);
            }
        }

        $total_todas_las_bases = 0;
        $total_impuestos_valor = 0;
    @endphp

    @foreach($receipt_details->taxes as $key => $val)
        @php
            // Saltamos cualquier fila que ya sea un total para no duplicar valores
            if (str_contains(strtolower($key), 'total')) continue;

            $valor_impuesto = limpiar_numero($val);
            $porcentaje = (float) filter_var($key, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            
            // Cálculo de base específica
            if ($porcentaje > 0) {
                // Base = Impuesto / (Porcentaje / 100)
                $base_especifica = $valor_impuesto / ($porcentaje / 100);
            } else {
                // Para el 0%, usamos la sumatoria de los items que calculamos arriba
                $base_especifica = $base_iva_0;
            }

            // Acumulamos los totales con máxima precisión
            $total_todas_las_bases += $base_especifica;
            $total_impuestos_valor += $valor_impuesto;
        @endphp
        <tr>
            <td>{{ $key }}</td>
            <td style="text-align:right;">
                {{ number_format($base_especifica, 0, ',', '.') }}
            </td>
            <td style="text-align:right;">{{ $porcentaje }}%</td>
            <td style="text-align:right;">{{ $val }}</td>
        </tr>
    @endforeach

    {{-- FILA FINAL DE TOTALES --}}
    <tr style="border-top: 1px solid black; font-weight: bold;">
        <td>Total Imp</td>
        <td style="text-align:right;">
            {{-- La suma de estas bases ahora coincidirá con el Subtotal --}}
            {{ number_format($total_todas_las_bases, 0, ',', '.') }}
        </td>
        <td></td>
        <td style="text-align:right;">
            {{ number_format($total_impuestos_valor, 0, ',', '.') }}
        </td>
    </tr>
</tbody>
            </table>

            
            
            <div class="border-bottom width-100">&nbsp;</div>
            @if(empty($receipt_details->hide_price) && !empty($receipt_details->tax_summary_label) )

            
            @if(!empty($receipt_details->taxes)) @endif
            
	            <!-- tax -->
	           <!-- @if(!empty($receipt_details->taxes))
	            	<table class="border-bottom width-100 table-f-12">
	            		<tr>
	            			<th colspan="2" class="text-center sub-headings">{{$receipt_details->tax_summary_label}}</th>
	            		</tr>
	            		@foreach($receipt_details->taxes as $key => $val)
	            			<tr>
	            				<td class="left sub-headings">{{$key}}</td>
	            				<td class="right sub-headings">{{$val}}</td>
	            			</tr>
	            		@endforeach
	            	</table>
	            @endif
            @endif -->

            @if(!empty($receipt_details->additional_notes))
	            <p class="centered">
	            	{!! nl2br($receipt_details->additional_notes) !!}
	            </p>
            @endif

            {{-- Barcode --}}
			@if($receipt_details->show_barcode)
				<br/>
				<img class="center-block" src="data:image/png;base64,{{DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true)}}">
			@endif

				
			@if ($receipt_details->show_qr_code && !empty($receipt_details->qrstr))
                {{-- @if (empty($receipt_details->qrstr))
                    <img class="center-block mt-5" style="max-height: 130px; width: auto;"
                    src="data:image/png;base64,{{ DNS2D::getBarcodePNG($receipt_details->qr_code_text, 'QRCODE') }}">
                @else --}}
				<b><p class="centered sub-headings">DOCUMENTO ELECTRÓNICO DE VENTA</b></p>
				<b><p class="centered sub-headings">Representación Gráfica de<br>Facturación Electrónica</b>
                    <img class="center-block mt-5" style="max-height: 150px; width: auto;"
                    src="data:image/png;base64,{{ DNS2D::getBarcodePNG($receipt_details->qrstr, 'QRCODE') }}">
                {{-- @endif --}}
                
			@endif
				<br>
            @if (!empty($receipt_details->cufe))
                <div class="cufe-section centered">
                    <b class="sub-headings">CUFE:</b><br>
                    <span class="sub-headings bw" style="display: block; line-height: 1.1;">
                        {!! $receipt_details->cufe !!}
                    </span>
                </div>
            @endif
            
             @if ($receipt_details->resolution != '-')
                <div class="centered sub-headings" style="margin-top: 5px; line-height: 1.1; font-size: 12px !important;">
                    <b>Res. DIAN N°: {!! $receipt_details->resolution !!}</b><br>
                    <b>{{ $receipt_details->resolution_prefix }} del {{ $receipt_details->resolution_start_number }} al {{ $receipt_details->resolution_end_number }}</b><br>
                    <b>Vence: {{ $receipt_details->resolution_date }} al {{ $receipt_details->resolution_end_date }}</b>
                </div>
            @endif
				<br>
			@if(!empty($receipt_details->footer_text))
				<p class="centered sub-headings">
					{!! $receipt_details->footer_text !!}
				</p>
			@endif
        </div>
		<div class="border-bottom width-100">&nbsp;</div>
		<div class="textbox-info  sub-headings">
			{{-- DATOS DE ZISCO --}}
            <p class="text-center sub-headings">
                        Software {{ config('app.name', 'ultimatePOS') }} - V{{ config('author.app_version', 'title') }}
                    </b> &copy; {{ date('Y') }}<br>Elaborado Por ZISCO Software<br>Nit:84.091.069-1  www.ziscoplus.com 
            </p>
        </div>
        <!-- <button id="btnPrint" class="hidden-print">Print</button>
        <script src="script.js"></script> -->
    </body>
</html>

<style type="text/css">
.f-8 {
	font-size: 8px !important;
}
body {
	color: #000000;
}
@media print {
	* {
	    
	    
	    font-family: 'Courier New', Courier, monospace; /* Fuente monoespaciada para mejor alineación */
        box-sizing: border-box;
    }
    
    body {
        width: 100%;
        margin: 0;
        padding: 0;
    }

    .ticket {
        width: 76mm; /* Dejamos 4mm de margen de seguridad total */
        max-width: 76mm;
        margin: 0 auto;
        padding: 2mm;
        word-wrap: break-word;
    }

    /* Forzar que las imágenes (Logo/QR) no se salgan */
    img {
        max-width: 100% !important;
        height: auto !important;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    /* Tabla de productos compacta */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 3px 0;
        vertical-align: top;
    }

    /* Ajuste de fuentes para jerarquía */
    .headings {
        font-size: 14px !important;
        line-height: 1.2;
    }

    .sub-headings {
        font-size: 12px !important;
    }

    /* Contenedor de Totales con Flexbox */
    .flex-box {
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
        margin-top: 2px;
    }

    /* Clases de utilidad para alineación */
    .text-right { text-align: right; }
    .text-center { text-align: center; }
    .text-left { text-align: left; }

    /* Ocultar botones y elementos innecesarios al imprimir */
    .hidden-print {
        display: none !important;
    }
}


    /* Evita que el bloque legal se parta en dos */
    .legal-footer, .qr-container, .cufe-section {
        page-break-inside: avoid;
        break-inside: avoid;
        display: block; /* Importante para que el avoid funcione */
    }
    
    /* Específicamente para tu estructura de CUFE */
    /* Fuerza el salto de línea del CUFE */
.cufe-section {
    display: block !important;
    width: 100% !important;
    word-break: break-all !important; /* Rompe el texto en cualquier carácter */
    overflow-wrap: break-word !important; 
    white-space: normal !important; /* Cancela cualquier herencia de nowrap */
    font-size: 9px !important;
    line-height: 1.2;
    margin-top: 5px;
    text-align: center;
}



    	font-size: 11px;
    	/* font-family: 'arial', arial, helvetica; */
    	word-break: break-all;
	}
	.f-8 {
		font-size: 8px !important;
	}
	.f-15 {
		font-size: 15px !important;
	}

	
.headings{
	font-size: 16px;
	font-weight: 700;
	text-transform: uppercase;
	white-space: nowrap;
}

.sub-headings{
	font-size: 15px !important;
	font-weight: 700 !important;
}

.border-top{
    border-top: 1px solid #242424;
}
.border-bottom{
	border-bottom: 1px solid #242424;
}

.border-bottom-dotted{
	border-bottom: 1px dotted darkgray;
}

td.serial_number, th.serial_number{
	width: 5%;
    max-width: 5%;
}

td.description,
th.description {
    width: 35%;
    max-width: 35%;
}

td.quantity,
th.quantity {
    width: 15%;
    max-width: 15%;
    word-break: break-all;
}
td.unit_price, th.unit_price{
	width: 25%;
    max-width: 25%;
    word-break: break-all;
}

td.price,
td.price, th.price {
    width: 25%;
    max-width: 25%;
    text-align: right;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 100%;
    max-width: 100%;
}

img {
    max-width: inherit;
    width: auto;
}

    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
.table-info {
	width: 100%;
}
.table-info tr:first-child td, .table-info tr:first-child th {
	padding-top: 8px;
}
.table-info th {
	text-align: left;
}
.table-info td {
	text-align: right;
}
.logo {
	float: left;
	width:35%;
	padding: 10px;
}

.text-with-image {
	float: left;
	width:65%;
}
.text-box {
	width: 100%;
	height: auto;
}
.m-0 {
	margin:0;
}
.textbox-info {
	clear: both;
}
.textbox-info p {
	margin-bottom: 0px
}
.flex-box {
	display: flex;
	width: 100%;
}
.flex-box p {
	width: 50%;
	margin-bottom: 0px;
	white-space: nowrap;
}

.table-f-12 th, .table-f-12 td {
	font-size: 12px;
	word-break: break-word;
}

.table-f-15 th, .table-f-15 td {
	font-size: 15px;
	word-break: break-word;
}

.bw {
	word-break: break-word;
}
.bb-lg {
	border-bottom: 1px solid lightgray;
}
</style>
