        <div class="modal-header">
            @if(!isset($is_print))

                <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @php
                  $title = $purchase->type == 'purchase_order' ? __('lang_v1.purchase_order_details') : __('purchase.purchase_details');
                  $custom_labels = json_decode(session('business.custom_labels'), true);
                @endphp
    
                <button class="btn btn-success" onclick="exportToXLSX()">Exportar Recepción Técnica</button>
            @endif
        </div>


    <div class="modal-header">
        @if(!isset($is_print))

    <button type="button" class="close no-print" data-dismiss="modal">
        <span>&times;</span>
    </button>

    <h4 class="modal-title">
        {{$title}} (<b>Factura:</b> #{{ $purchase->ref_no }})
    </h4>
@endif

    <div id="print-resumen" class="resumen-a4">
@if(!isset($is_print))

    <!-- ENCABEZADO -->
    <table class="header-table">
        <tr>
            <td colspan="12" class="center bold">
                RECEPCIÓN TÉCNICA<br>
                {{ $purchase->location->name }}<br>
               NIT {{ $purchase->business->nit }}
            </td>
        </tr>
        <tr>
            <td colspan="3"><b>Factura:</b> {{ $purchase->ref_no }}</td>
            <td colspan="3"><b>Proveedor:</b> {{ $purchase->contact->supplier_business_name }}</td>
            <td colspan="3"><b>Fecha de Ingreso:</b> {{ @format_date($purchase->transaction_date) }}</td>
            <td colspan="3"><b>Responsable:</b> ____________________</td>
        </tr>
    </table>


    <!-- TABLA PRINCIPAL -->
    <table class="detalle-table">
        <thead>
        <!-- FILA 1: ENCABEZADOS GENERALES -->
            <tr>
                
                <th rowspan="2">CUM</th>
                <th rowspan="2">Nombre Genérico</th>
                <th rowspan="2">Laboratorio</th>
                <th rowspan="2">Presentación</th>
                <th rowspan="2">Forma Farmacéutica</th>
                <th rowspan="2">Vencimiento</th>
                <th rowspan="2">Lote</th>
                <th rowspan="2">R. Sanitario</th>
                <th rowspan="2">Cant. Recibida</th>
                
    
                <th colspan="2">Confirmación Electrónica</th>
                <th colspan="3">Cadena de Frío</th>
                <th colspan="3">Especificaciones</th>
    
                <th rowspan="2">Condiciones Ambientales</th>
                <th rowspan="2">Aprobado / Rechazado</th>
            </tr>
    
            <!-- FILA 2: SUBENCABEZADOS -->
            <tr>
                <th>Alerta Sanitaria</th>
                <th>Estado RS</th>
                <th>Sí</th>
                <th>No</th>
                <th>Temp °C</th>
    
                <th>Administrativas</th>
                <th>Acondicionamiento</th>
                <th>Aspecto del Producto</th>
                
            </tr>
        </thead>

    <tbody>
        @foreach($purchase->purchase_lines as $line)
        <tr>
            <td>{{ $line->product->sku }}</td>
            <td>{{ $line->product->name }}</td>
            <td>{{ $line->product->brand->name ?? '' }}</td>
            <td>{{ $line->product->weight }}</td>
            <td>{{ $line->product->product_custom_field4 }}</td>
            <td>{{ $line->exp_date ? @format_date($line->exp_date) : '' }}</td>
            <td>{{ $line->lot_number }}</td>
            <td>{{ $line->product->product_custom_field1 }}</td>
            <td>{{ $line->quantity }}</td>
            <td>VIGENTE</td>

            <td>NO</td>

            <td></td>
            <td></td>
            <td>&lt;30</td>
            <td>C</td>
            <td>C</td>
            <td>C</td>
            

            <td>TERMOLÁBIL</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif









    <div id="print-completo">
        <!-- TODO el contenido actual de la factura -->
        <h3>Factura #{{ $purchase->ref_no }}</h3>
        
        <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
             <p class="pull-right"><b>@lang('messages.date'):</b> {{ @format_date($purchase->transaction_date) }}</p>
        </div>
    </div>
    
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      @lang('purchase.supplier'):
      <address>
        {!! $purchase->contact->contact_address !!}
        @if(!empty($purchase->contact->tax_number))
          <br>@lang('contact.tax_no'): {{$purchase->contact->tax_number}}
        @endif
        @if(!empty($purchase->contact->mobile))
          <br>@lang('contact.mobile'): {{$purchase->contact->mobile}}
        @endif
        @if(!empty($purchase->contact->email))
          <br>@lang('business.email'): {{$purchase->contact->email}}
        @endif
      </address>
      @if($purchase->document_path)
        
        <a href="{{$purchase->document_path}}" 
        download="{{$purchase->document_name}}" class="tw-dw-btn tw-dw-btn-success tw-text-white tw-dw-btn-sm pull-left no-print">
          <i class="fa fa-download"></i> 
            &nbsp;{{ __('purchase.download_document') }}
        </a>
      @endif
      @if($purchase->cufe)
        <span class="label label-success">CUFE: {{$purchase->cufe}}</span>
      @endif
      
      @if($purchase->is_valid == 1 && $purchase->e_invoice == 'si')
        <br/><a href="{{route('downloadPdfSupportDocument', [$purchase->id])}}" target="_blank" class="badge text-bg-success" style="background-color: #E83B1A; color: white;" rel="noopener noreferrer"><i class="fas fa-download"></i> Descargar PDF</a>
    @endif
    </div>

    <div class="col-sm-4 invoice-col">
      @lang('business.business'):
      <address>
        <strong>{{ $purchase->business->name }}</strong>
        {{ $purchase->location->name }}
        @if(!empty($purchase->location->landmark))
          <br>{{$purchase->location->landmark}}
        @endif
        @if(!empty($purchase->location->city) || !empty($purchase->location->state) || !empty($purchase->location->country))
          <br>{{implode(',', array_filter([$purchase->location->city, $purchase->location->state, $purchase->location->country]))}}
        @endif
        
        @if(!empty($purchase->business->tax_number_1))
          <br>{{$purchase->business->tax_label_1}}: {{$purchase->business->tax_number_1}}
        @endif

        @if(!empty($purchase->business->tax_number_2))
          <br>{{$purchase->business->tax_label_2}}: {{$purchase->business->tax_number_2}}
        @endif

        @if(!empty($purchase->location->mobile))
          <br>@lang('contact.mobile'): {{$purchase->location->mobile}}
        @endif
        @if(!empty($purchase->location->email))
          <br>@lang('business.email'): {{$purchase->location->email}}
        @endif
      </address>
      
    </div>

    <div class="col-sm-4 invoice-col">
      <b>@lang('purchase.ref_no'):</b> #{{ $purchase->ref_no }}<br/>
      <b>@lang('messages.date'):</b> {{ @format_date($purchase->transaction_date) }}<br/>
      @if(!empty($purchase->status))
        <b>@lang('purchase.purchase_status'):</b> @if($purchase->type == 'purchase_order'){{$po_statuses[$purchase->status]['label'] ?? ''}} @else {{ __('lang_v1.' . $purchase->status) }} @endif<br>
      @endif
      @if(!empty($purchase->payment_status))
      <b>@lang('purchase.payment_status'):</b> {{ __('lang_v1.' . $purchase->payment_status) }}
      @endif

      @if(!empty($custom_labels['purchase']['custom_field_1']))
        <br><strong>{{$custom_labels['purchase']['custom_field_1'] ?? ''}}: </strong> {{$purchase->custom_field_1}}
      @endif
      @if(!empty($custom_labels['purchase']['custom_field_2']))
        <br><strong>{{$custom_labels['purchase']['custom_field_2'] ?? ''}}: </strong> {{$purchase->custom_field_2}}
      @endif
      @if(!empty($custom_labels['purchase']['custom_field_3']))
        <br><strong>{{$custom_labels['purchase']['custom_field_3'] ?? ''}}: </strong> {{$purchase->custom_field_3}}
      @endif
      @if(!empty($custom_labels['purchase']['custom_field_4']))
        <br><strong>{{$custom_labels['purchase']['custom_field_4'] ?? ''}}: </strong> {{$purchase->custom_field_4}}
      @endif
      @if(!empty($purchase_order_nos))
            <strong>@lang('restaurant.order_no'):</strong>
            {{$purchase_order_nos}}
        @endif

        @if(!empty($purchase_order_dates))
            <br>
            <strong>@lang('lang_v1.order_dates'):</strong>
            {{$purchase_order_dates}}
        @endif
      @if($purchase->type == 'purchase_order')
        @php
          $custom_labels = json_decode(session('business.custom_labels'), true);
        @endphp
        <strong>@lang('sale.shipping'):</strong>
        <span class="label @if(!empty($shipping_status_colors[$purchase->shipping_status])) {{$shipping_status_colors[$purchase->shipping_status]}} @else {{'bg-gray'}} @endif">{{$shipping_statuses[$purchase->shipping_status] ?? '' }}</span><br>
        @if(!empty($purchase->shipping_address()))
          {{$purchase->shipping_address()}}
        @else
          {{$purchase->shipping_address ?? '--'}}
        @endif
        @if(!empty($purchase->delivered_to))
          <br><strong>@lang('lang_v1.delivered_to'): </strong> {{$purchase->delivered_to}}
        @endif
        @if(!empty($purchase->shipping_custom_field_1))
          <br><strong>{{$custom_labels['shipping']['custom_field_1'] ?? ''}}: </strong> {{$purchase->shipping_custom_field_1}}
        @endif
        @if(!empty($purchase->shipping_custom_field_2))
          <br><strong>{{$custom_labels['shipping']['custom_field_2'] ?? ''}}: </strong> {{$purchase->shipping_custom_field_2}}
        @endif
        @if(!empty($purchase->shipping_custom_field_3))
          <br><strong>{{$custom_labels['shipping']['custom_field_3'] ?? ''}}: </strong> {{$purchase->shipping_custom_field_3}}
        @endif
        @if(!empty($purchase->shipping_custom_field_4))
          <br><strong>{{$custom_labels['shipping']['custom_field_4'] ?? ''}}: </strong> {{$purchase->shipping_custom_field_4}}
        @endif
        @if(!empty($purchase->shipping_custom_field_5))
          <br><strong>{{$custom_labels['shipping']['custom_field_5'] ?? ''}}: </strong> {{$purchase->shipping_custom_field_5}}
        @endif
        @php
          $medias = $purchase->media->where('model_media_type', 'shipping_document')->all();
        @endphp
        @if(count($medias))
          @include('sell.partials.media_table', ['medias' => $medias])
        @endif
      @endif
    </div>
  </div>

  <br>
  <div class="row">
    <div class="col-sm-12 col-xs-12">
      <div class="table-responsive">
        <table class="table bg-white">
          <thead>
            <tr class="bg-info tw-text-white">
              <th>#</th>
              <th>@lang('product.product_name')</th>
              <th>@lang('product.sku')</th>
              @if($purchase->type == 'purchase_order')
                <th class="text-right">@lang( 'lang_v1.quantity_remaining' )</th>
              @endif
              <th class="text-right">@if($purchase->type == 'purchase_order') @lang('lang_v1.order_quantity') @else @lang('purchase.purchase_quantity') @endif</th>
              <th class="text-right">@lang( 'lang_v1.unit_cost_before_discount' )</th>
              <th class="text-right">@lang( 'lang_v1.discount_percent' )</th>
              <th class="no-print text-right">@lang('purchase.unit_cost_before_tax')</th>
              <th class="no-print text-right">@lang('purchase.subtotal_before_tax')</th>
              <th class="text-right">@lang('sale.tax')</th>
              <th class="text-right">@lang('purchase.unit_cost_after_tax')</th>
              @if($purchase->type != 'purchase_order')
              @if(session('business.enable_lot_number'))
                <th>@lang('lang_v1.lot_number')</th>
              @endif
              @if(session('business.enable_product_expiry'))
                <th>@lang('product.mfg_date')</th>
                <th>@lang('product.exp_date')</th>
              @endif
              @endif
              <th class="text-right">@lang('sale.subtotal')</th>
            </tr>
          </thead>
          @php 
            $total_before_tax = 0.00;
          @endphp
          @foreach($purchase->purchase_lines as $purchase_line)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                {{ $purchase_line->product->name }}
                 @if( $purchase_line->product->type == 'variable')
                  - {{ $purchase_line->variations->product_variation->name}}
                  - {{ $purchase_line->variations->name}}
                 @endif
              </td>
              <td>
                 @if( $purchase_line->product->type == 'variable')
                  {{ $purchase_line->variations->sub_sku}}
                  @else
                  {{ $purchase_line->product->sku }}
                 @endif
              </td>
              @if($purchase->type == 'purchase_order')
                <td>
                  <span class="display_currency" data-is_quantity="true" data-currency_symbol="false">{{ $purchase_line->quantity - $purchase_line->po_quantity_purchased }}</span> @if(!empty($purchase_line->actual_name)) {{$purchase_line->sub_unit->actual_name}} @else {{$purchase_line->product->unit->actual_name}} @endif
                </td>
              @endif
              <td>
                <span class="display_currency" data-is_quantity="true" data-currency_symbol="false">{{ $purchase_line->quantity }}</span> @if(!empty($purchase_line->sub_unit)) {{$purchase_line->sub_unit->actual_name}} @else {{$purchase_line->product->unit->actual_name}} @endif 
                @if($purchase_line->product->unit->sub_units)
                  @foreach($purchase_line->product->unit->sub_units as $sub_unit)
                    @if($sub_unit->id == $purchase_line->sub_unit_id)
                      ({{ (float) $sub_unit->base_unit_multiplier }}
                      {{ $purchase_line->product->unit->short_name }})
                    @endif
                  @endforeach
                @endif
                @if(!empty($purchase_line->product->second_unit) && $purchase_line->secondary_unit_quantity != 0)
                    <br>
                    <span class="display_currency" data-is_quantity="true" data-currency_symbol="false">{{ $purchase_line->secondary_unit_quantity }}</span> {{$purchase_line->product->second_unit->actual_name}}
                @endif

              </td>
              <td class="text-right"><span class="display_currency" data-currency_symbol="true">{{ $purchase_line->pp_without_discount}}</span></td>
              <td class="text-right"><span class="display_currency">{{ $purchase_line->discount_percent}}</span> %</td>
              <td class="no-print text-right"><span class="display_currency" data-currency_symbol="true">{{ $purchase_line->purchase_price }}</span></td>
              <td class="no-print text-right"><span class="display_currency" data-currency_symbol="true">{{ $purchase_line->quantity * $purchase_line->purchase_price }}</span></td>
              <td class="text-right"><span class="display_currency" data-currency_symbol="true">{{ $purchase_line->item_tax }} </span> <br/><small>@if(!empty($taxes[$purchase_line->tax_id])) ( {{ $taxes[$purchase_line->tax_id]}} ) </small>@endif</td>
              <td class="text-right"><span class="display_currency" data-currency_symbol="true">{{ $purchase_line->purchase_price_inc_tax }}</span></td>
              @if($purchase->type != 'purchase_order')
              @if(session('business.enable_lot_number'))
                <td>{{$purchase_line->lot_number}}</td>
              @endif

              @if(session('business.enable_product_expiry'))
              <td>
                @if(!empty($purchase_line->mfg_date))
                    {{ @format_date($purchase_line->mfg_date) }}
                @endif
              </td>
              <td>
                @if(!empty($purchase_line->exp_date))
                    {{ @format_date($purchase_line->exp_date) }}
                @endif
              </td>
              @endif
              @endif
              <td class="text-right"><span class="display_currency" data-currency_symbol="true">{{ $purchase_line->purchase_price_inc_tax * $purchase_line->quantity }}</span></td>
            </tr>
            @php 
              $total_before_tax += ($purchase_line->quantity * $purchase_line->purchase_price);
            @endphp
          @endforeach
        </table>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    @if(!empty($purchase->type == 'purchase'))
    <div class="col-sm-12 col-xs-12">
      <h4>{{ __('sale.payment_info') }}:</h4>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="table-responsive">
        <table class="table">
          <tr class="bg-gray">
            <th>#</th>
            <th>{{ __('messages.date') }}</th>
            <th>{{ __('purchase.ref_no') }}</th>
            <th>{{ __('sale.amount') }}</th>
            <th>{{ __('sale.payment_mode') }}</th>
            <th>{{ __('sale.payment_note') }}</th>
          </tr>
          @php
            $total_paid = 0;
          @endphp
          @forelse($purchase->payment_lines as $payment_line)
            @php
              $total_paid += $payment_line->amount;
            @endphp
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ @format_date($payment_line->paid_on) }}</td>
              <td>{{ $payment_line->payment_ref_no }}</td>
              <td><span class="display_currency" data-currency_symbol="true">{{ $payment_line->amount }}</span></td>
              <td>{{ $payment_methods[$payment_line->method] ?? '' }}</td>
              <td>@if($payment_line->note) 
                {{ ucfirst($payment_line->note) }}
                @else
                --
                @endif
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="text-center">
                @lang('purchase.no_payments')
              </td>
            </tr>
          @endforelse
        </table>
      </div>
    </div>
    @endif
    <div class="col-md-6 col-sm-12 col-xs-12 @if($purchase->type == 'purchase_order') col-md-offset-6 @endif">
      <div class="table-responsive">
        <table class="table">
          <!-- <tr class="hide">
            <th>@lang('purchase.total_before_tax'): </th>
            <td></td>
            <td><span class="display_currency pull-right">{{ $total_before_tax }}</span></td>
          </tr> -->
          <tr>
            <th>@lang('purchase.net_total_amount'): </th>
            <td></td>
            <td><span class="display_currency pull-right" data-currency_symbol="true">{{ $total_before_tax }}</span></td>
          </tr>
          <tr>
            <th>@lang('purchase.discount'):</th>
            <td>
              <b>(-)</b>
              @if($purchase->discount_type == 'percentage')
                ({{$purchase->discount_amount}} %)
              @endif
            </td>
            <td>
              <span class="display_currency pull-right" data-currency_symbol="true">
                @if($purchase->discount_type == 'percentage')
                  {{$purchase->discount_amount * $total_before_tax / 100}}
                @else
                  {{$purchase->discount_amount}}
                @endif                  
              </span>
            </td>
          </tr>
          <tr>
            <th>@lang('purchase.purchase_tax'):</th>
            <td><b>(+)</b></td>
            <td class="text-right">
                @if(!empty($purchase_taxes))
                  @foreach($purchase_taxes as $k => $v)
                    <strong><small>{{$k}}</small></strong> - <span class="display_currency pull-right" data-currency_symbol="true">{{ $v }}</span><br>
                  @endforeach
                @else
                0.00
                @endif
              </td>
          </tr>
          @if( !empty( $purchase->shipping_charges ) )
            <tr>
              <th>@lang('purchase.additional_shipping_charges'):</th>
              <td><b>(+)</b></td>
              <td><span class="display_currency pull-right" >{{ $purchase->shipping_charges }}</span></td>
            </tr>
          @endif
          @if( !empty( $purchase->additional_expense_value_1 )  && !empty( $purchase->additional_expense_key_1 ))
            <tr>
              <th>{{ $purchase->additional_expense_key_1 }}:</th>
              <td><b>(+)</b></td>
              <td><span class="display_currency pull-right" >{{ $purchase->additional_expense_value_1 }}</span></td>
            </tr>
          @endif
          @if( !empty( $purchase->additional_expense_value_2 )  && !empty( $purchase->additional_expense_key_2 ))
            <tr>
              <th>{{ $purchase->additional_expense_key_2 }}:</th>
              <td><b>(+)</b></td>
              <td><span class="display_currency pull-right" >{{ $purchase->additional_expense_value_2 }}</span></td>
            </tr>
          @endif
          @if( !empty( $purchase->additional_expense_value_3 )  && !empty( $purchase->additional_expense_key_3 ))
            <tr>
              <th>{{ $purchase->additional_expense_key_3 }}:</th>
              <td><b>(+)</b></td>
              <td><span class="display_currency pull-right" >{{ $purchase->additional_expense_value_3 }}</span></td>
            </tr>
          @endif
          @if( !empty( $purchase->additional_expense_value_4 ) && !empty( $purchase->additional_expense_key_4 ))
            <tr>
              <th>{{ $purchase->additional_expense_key_4 }}:</th>
              <td><b>(+)</b></td>
              <td><span class="display_currency pull-right" >{{ $purchase->additional_expense_value_4 }}</span></td>
            </tr>
          @endif
          <tr>
            <th>@lang('purchase.purchase_total'):</th>
            <td></td>
            <td><span class="display_currency pull-right" data-currency_symbol="true" >{{ $purchase->final_total }}</span></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <strong>@lang('purchase.shipping_details'):</strong><br>
      <p class="well well-sm no-shadow bg-whitw">
        {{ $purchase->shipping_details ?? '' }}

        @if(!empty($purchase->shipping_custom_field_1))
          <br><strong>{{$custom_labels['purchase_shipping']['custom_field_1'] ?? ''}}: </strong> {{$purchase->shipping_custom_field_1}}
        @endif
        @if(!empty($purchase->shipping_custom_field_2))
          <br><strong>{{$custom_labels['purchase_shipping']['custom_field_2'] ?? ''}}: </strong> {{$purchase->shipping_custom_field_2}}
        @endif
        @if(!empty($purchase->shipping_custom_field_3))
          <br><strong>{{$custom_labels['purchase_shipping']['custom_field_3'] ?? ''}}: </strong> {{$purchase->shipping_custom_field_3}}
        @endif
        @if(!empty($purchase->shipping_custom_field_4))
          <br><strong>{{$custom_labels['purchase_shipping']['custom_field_4'] ?? ''}}: </strong> {{$purchase->shipping_custom_field_4}}
        @endif
        @if(!empty($purchase->shipping_custom_field_5))
          <br><strong>{{$custom_labels['purchase_shipping']['custom_field_5'] ?? ''}}: </strong> {{$purchase->shipping_custom_field_5}}
        @endif
      </p>
    </div>
    <div class="col-sm-6">
      <strong>@lang('purchase.additional_notes'):</strong><br>
      <p class="well well-sm no-shadow bg-white">
        @if($purchase->additional_notes)
          {{ $purchase->additional_notes }}
        @else
          --
        @endif
      </p>
    </div>
    
  </div>
  @if(!empty($activities))
  <div class="row">
    <div class="col-md-12">
          <strong>{{ __('lang_v1.activities') }}:</strong><br>
          @includeIf('activity_log.activities', ['activity_type' => 'purchase'])
      </div>
  </div>
  @endif

  {{-- Barcode --}}
  <div class="row print_section">
    <div class="col-xs-12">
      <img class="center-block" src="data:image/png;base64,{{DNS1D::getBarcodePNG($purchase->ref_no, 'C128', 2,30,array(39, 48, 54), true)}}">
    </div>
    
</div>
</div>


<!-- =============================
     BLOQUE SOLO NOMBRE Y CANTIDAD
==============================-->
@if(!isset($is_print))
<div id="print-simple">
    <h3>Resumen de Productos</h3>
    <p><b>Factura:</b> #{{ $purchase->ref_no }}</p>

    <table style="width:100%; border-collapse: collapse;">
        <thead>
            <tr style="background:#f2f2f2;">
                <th style="border:1px solid #000; padding:6px;">Producto</th>
                <th style="border:1px solid #000; padding:6px;">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            {{-- Ordenamos por el nombre del producto relacionado --}}
            @foreach($purchase->purchase_lines->sortBy('product.name') as $line)
            <tr>
                <td style="border:1px solid #000; padding:6px;">
                    {{ $line->product->name }}
                </td>
                <td style="border:1px solid #000; padding:6px; text-align:center;">
                    {{ $line->quantity }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<button type="button" onclick="printThermalOxxo()" 
        style="background-color: #004C6E; color: white; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer;">
    Imprimir Productos
</button>
@endif



<script>
function printThermalOxxo() {
    var fullRef = "{{ $purchase->ref_no }}";
    var partes = fullRef.split('/');
    var consecutivoFormateado = partes.length > 1 ? partes[partes.length - 1] : fullRef;
    
    var date = new Date().toLocaleString();
    var rows = "";

    {{-- Ordenamos aquí también para el ticket --}}
    @foreach($purchase->purchase_lines->sortBy('product.name') as $line)
        rows += `
            <tr>
                <td style="padding: 3px 0; font-weight: bold;">{{ Str::limit($line->product->name, 80) }}</td>
                <td style="text-align:right; vertical-align: top; font-weight: bold;">{{ $line->quantity }}</td>
            </tr>
        `;
    @endforeach

    var printWindow = window.open('', '', 'width=400,height=600');

    printWindow.document.write(`
        <html>
        <head>
            <title>Ticket #${consecutivoFormateado}</title>
            <style>
                @page { size: 80mm auto; margin: 0; }
                body {
                    width: 72mm;
                    font-family: 'Courier New', Courier, monospace;
                    font-size: 13px;
                    margin: 0;
                    padding: 4mm;
                }
                .center { text-align: center; }
                .bold { font-weight: bold; }
                table { width: 100%; font-size: 12px; border-collapse: collapse; margin-top: 5px; }
                .line { border-top: 1px dashed #000; margin: 8px 0; }
                .consecutivo-box { 
                    border: 1.5px solid #000; 
                    display: inline-block; 
                    padding: 5px 15px; 
                    margin: 10px 0;
                    font-size: 18px;
                    font-weight: bold;
                }
                .footer { margin-top: 30px; text-align: center; font-size: 11px; }
            </style>
        </head>
        <body>

            <div class="center">
                
                <div class="consecutivo-box">
                    PEDIDO # ${consecutivoFormateado}
                </div>
                <div class="line"></div>
            </div>

            <div style="font-size: 11px;">
                <strong>Factura Original:</strong> ${fullRef}<br>
                <strong>Fecha/Hora:</strong> ${date}
            </div>

            <div class="line"></div>

            <table>
                <thead>
                    <tr>
                        <th style="text-align:left; border-bottom: 1px solid #000;">DESCRIPCIÓN</th>
                        <th style="text-align:right; border-bottom: 1px solid #000;">CANT.</th>
                    </tr>
                </thead>
                <tbody>
                    ${rows}
                </tbody>
            </table>

            <div class="line"></div>

            <div class="footer">
                <br><br><br>
                ______________________________<br>
                FIRMA ALMACENISTA RECEPCIÓN
            </div>

            <div style="margin-top: 50px;">.</div>

        </body>
        </html>
    `);

    printWindow.document.close();
    printWindow.focus();
    
    setTimeout(function(){ 
        printWindow.print();
        printWindow.close();
    }, 300);
}
</script>






<style>


/* IMPRESIÓN */
@media print {
    body.print-resumen #print-resumen {
        display: block !important;
        visibility: visible !important;
    }

    body.print-completo #print-completo {
        display: block !important;
        visibility: visible !important;
    }
}
.resumen-a4 {
    width: 100%;
    font-size: 11px;
    color: #000;
}

.resumen-a4 table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 10px;
}

.resumen-a4 td,
.resumen-a4 th {
    border: 1px solid #000;
    padding: 4px;
}

.center {
    text-align: center;
}

.bold {
    font-weight: bold;
}

/* ENCABEZADO */
.header-table td {
    background: #f2f2f2;
}

/* TABLA PRINCIPAL */
.detalle-table th {
    background: #b7f7f0;
    text-align: center;
    font-size: 10px;
}

/* FIRMAS */
.firmas-table td {
    border: none;
    padding-top: 30px;
    text-align: center;
}
 {

    /* Ocultar todo */
    body * {
        visibility: hidden;
    }

    /* Mostrar solo el bloque que quiero imprimir */
    body.print-resumen #print-resumen,
    body.print-resumen #print-resumen * {
        visibility: visible;
    }

    body.print-completo #print-completo,
    body.print-completo #print-completo * {
        visibility: visible;
    }

    /* Posicionar el bloque en el inicio de la hoja */
    #print-resumen,
    #print-completo {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }
}



</style>


<script>
function printResumen() {
    document.body.classList.remove('print-completo');
    document.body.classList.add('print-resumen');
    window.print();
}

function printCompleto() {
    document.body.classList.remove('print-resumen');
    document.body.classList.add('print-completo');
    window.print();
}
window.onafterprint = function () {
    document.body.classList.remove('print-resumen', 'print-completo');
};

</script>


<script src="https://cdn.jsdelivr.net/npm/xlsx-js-style/dist/xlsx.bundle.js"></script>


<script>
    
   

function exportToXLSX() {

    const wb = XLSX.utils.book_new();
    const ws = {};
    ws['!merges'] = [];

    const headerStyle = {
        font: { bold: true, color: { rgb: "FFFFFF" }, sz: 12 },
        fill: { fgColor: { rgb: "2BB3B0" } },
        alignment: { horizontal: "center", vertical: "center", wrapText: true },
        border: {
            top: { style: "thin" },
            bottom: { style: "thin" },
            left: { style: "thin" },
            right: { style: "thin" }
        }
    };

    const cellStyle = {
        font: { sz: 10 },
        alignment: { horizontal: "center", vertical: "center", wrapText: true },
        border: {
            top: { style: "thin" },
            bottom: { style: "thin" },
            left: { style: "thin" },
            right: { style: "thin" }
        }
    };

    /* =========================
       ENCABEZADO MANUAL
    ==========================*/

    // FILA 1
    ws["A1"] = { v: "RECEPCIÓN TÉCNICA", t: "s", s: headerStyle };
    ws["A2"] = { v: "{{ $purchase->location->name }}  -  NIT {{ $purchase->business->nit }}", t: "s", s: headerStyle };
  
    

    // Combinar A1 hasta R1
    ws['!merges'].push({
        s: { r: 0, c: 0 },
        e: { r: 0, c: 18 }
    });

    ws['!merges'].push({
        s: { r: 1, c: 0 },
        e: { r: 1, c: 18 }
    });

    // FILA 3 - Datos
    
    ws["A3"] = { v: "MEDICAMENTOS:", t: "s", s: cellStyle };
    ws["B3"] = { v: "", t: "s", s: cellStyle };
    
    ws["A4"] = { v: "DISPOSITIVOS MEDICOS:", t: "s", s: cellStyle };
    ws["B4"] = { v: "", t: "s", s: cellStyle };
    
    ws["A5"] = { v: "RESPONSABLE:", t: "s", s: cellStyle };
    ws["B5"] = { v: "", t: "s", s: cellStyle };
    
    
    ws["D3"] = { v: "Factura:", t: "s", s: cellStyle };
    ws["E3"] = { v: "{{ $purchase->custom_field_1 }}", t: "s", s: cellStyle };

    ws["D4"] = { v: "Proveedor:", t: "s", s: cellStyle };
    ws["E4"] = { v: "{{ $purchase->contact->supplier_business_name }}", t: "s", s: cellStyle };
    
    ws["D5"] = { v: "NIT:", t: "s", s: cellStyle };
    ws["E5"] = { v: "{{ $purchase->contact->contact_id }}", t: "s", s: cellStyle };

    ws["G3"] = { v: "Fecha de Ingreso:", t: "s", s: cellStyle };
    ws["H3"] = { v: "{{ @format_date($purchase->transaction_date) }}", t: "s", s: cellStyle };
    
    ws["G4"] = { v: "TOTAL DE CAJAS: ", t: "s", s: cellStyle };
    ws["H4"] = { v: "", t: "s", s: cellStyle };
    
    ws["J3"] = { v: "C  CUMPLE:", t: "s", s: cellStyle };
     
    ws["K3"] = { v: "NC  NO CUMPLE:", t: "s", s: cellStyle };
     
    ws["L3"] = { v: "A   APROBADO:", t: "s", s: cellStyle };
     
    ws["M3"] = { v: "R   RECHAZADO:", t: "s", s: cellStyle };
    

    /* =========================
       AHORA AGREGAMOS EL DETALLE
    ==========================*/

    const detalleTable = document.querySelector('.detalle-table');
    const wsDetalle = XLSX.utils.table_to_sheet(detalleTable);

    let rangeDetalle = XLSX.utils.decode_range(wsDetalle['!ref']);
    const offset = 5; // empieza debajo del header

    for (let R = rangeDetalle.s.r; R <= rangeDetalle.e.r; ++R) {
        for (let C = rangeDetalle.s.c; C <= rangeDetalle.e.c; ++C) {

            let sourceRef = XLSX.utils.encode_cell({ c: C, r: R });
            let targetRef = XLSX.utils.encode_cell({ c: C, r: R + offset });

            if (wsDetalle[sourceRef]) {

                let isHeaderRow = R <= 1;

                ws[targetRef] = {
                    v: wsDetalle[sourceRef].v,
                    t: "s",
                    s: isHeaderRow ? headerStyle : cellStyle
                };
            }
        }
    }

    // Ajustar merges del detalle
    if (wsDetalle['!merges']) {
        wsDetalle['!merges'].forEach(merge => {
            ws['!merges'].push({
                s: { r: merge.s.r + offset, c: merge.s.c },
                e: { r: merge.e.r + offset, c: merge.e.c }
            });
        });
    }

    /* =========================
       ANCHO DE COLUMNAS
    ==========================*/

    ws['!cols'] = [];
    for (let i = 0; i < 20; i++) {
        ws['!cols'].push({ wch: 18 });
    }

    ws['!ref'] = XLSX.utils.encode_range({
        s: { r: 0, c: 0 },
        e: { r: offset + rangeDetalle.e.r, c: 18 }
    });

    XLSX.utils.book_append_sheet(wb, ws, "Recepcion Tecnica");

    XLSX.writeFile(wb, "Recepcion_Tecnica_INVIMA.xlsx");
}



</script>



  </div>
</div>


