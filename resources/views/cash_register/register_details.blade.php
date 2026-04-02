<div class="modal-dialog" role="document">
  <div class="modal-content">

    <div class="modal-header mini_print">
      <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h5 class="modal-title"><h5>@lang( 'cash_register.current_register' )</h5>
      <b>@lang('business.enterprise'):</b> {{ $register_details->location_name}}
          </br>
          
        @if($register_details->open_time)
          Apertura:  {{ \Carbon::createFromFormat('Y-m-d H:i:s', $register_details->open_time)->format('jS M, Y h:i A') }} </br>
         @if($register_details->closed_at)
    Cierre: {{ \Carbon::parse($register_details->closed_at)->format('jS M, Y h:i A') }}
@endif

          
        @else
          ( @lang('cash_register.register_not_opened') )
        @endif
      </h4>
      
      
    <!--DELIO -->   
      
           <div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-striped">
            
            <tbody>
                <tr>
                    <td><strong>Factura Inicial:</strong></td>
                    <td class="text-right">
                        <span class="" style="font-size: 14px;">
                            {{ $first_invoice->invoice_no ?? 'N/A' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td><strong>Factura Final:</strong></td>
                    <td class="text-right">
                        <span class="" style="font-size: 14px;">
                            {{ $last_invoice->invoice_no ?? 'N/A' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td><strong>Total Documentos Emitidos:</strong></td>
                    <td class="text-right">
                        <strong style="font-size: 16px;">{{ $total_sales_count }}</strong>
                    </td>
                </tr>
                
            @can('dashboard.data')
                <tr class="bg-neutral hidden-print"> 
                    <td colspan="2">
                        <strong class="text-purple">Utilidad del Turno:</strong>
                        <span class="display_currency text-purple" data-currency_symbol="true" style="font-weight: bold; margin-left: 10px;">
                            {{ $total_profit ?? 0 }}
                        </span>
                    </td>
                </tr>
            @endcan
                
                
            </tbody>
        </table>
    </div>
</div>

     <!--DELIO -->     

      
    <b>@lang('report.user'):</b> {{ $register_details->user_name}}
    
     <!-- Indicador de caja cerrada -->
  <div style="display: flex; align-items: center; gap: 10px; color: red;">
    <i class="fa fa-lock" aria-hidden="true"></i>
    <strong>CAJA CERRADA</strong>
  </div>
      
    </div>
    

    <div class="modal-body">
        
    @include('cash_register.payment_details')
      
      
      
      <table class="table table-condensed">
    
    <tr>
        <td><strong>Diferencia (Sobrante/Faltante):</strong></td>
        <td>
            @if($register_details->difference_amount < 0)
                <span class="display_currency" data-currency_symbol="true" style="color: red; font-weight: bold;">
                    {{ $register_details->difference_amount }} (Faltante)
                </span>
            @elseif($register_details->difference_amount > 0)
                <span class="display_currency" data-currency_symbol="true" style="color: green; font-weight: bold;">
                    {{ $register_details->difference_amount }} (Sobrante)
                </span>
            @else
                <span class="display_currency" data-currency_symbol="true">
                    {{ $register_details->difference_amount }} (Cuadrado)
                </span>
            @endif
        </td>
    </tr>
</table>
      
      <hr>
      @if(!empty($register_details->denominations))
        @php
          $total = 0;
        @endphp
        <div class="row">
          <div class="col-md-8 col-sm-12">
            <h3>@lang( 'lang_v1.cash_denominations' )</h3>
            <table class="table table-slim">
              <thead>
                <tr>
                  <th width="20%" class="text-right">@lang('lang_v1.denomination')</th>
                  <th width="20%">&nbsp;</th>
                  <th width="20%" class="text-center">@lang('lang_v1.count')</th>
                  <th width="20%">&nbsp;</th>
                  <th width="20%" class="text-left">@lang('sale.subtotal')</th>
                </tr>
              </thead>
              <tbody>
                @foreach($register_details->denominations as $key => $value)
                <tr>
                  <td class="text-right">{{$key}}</td>
                  <td class="text-center">X</td>
                  <td class="text-center">{{$value ?? 0}}</td>
                  <td class="text-center">=</td>
                  <td class="text-left">
                    @format_currency($key * $value)
                  </td>
                </tr>
                @php
                  $total += ($key * $value);
                @endphp
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="4" class="text-center">@lang('sale.total')</th>
                  <td>@format_currency($total)</td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      @endif
      
      
      
    <div class="row">
        
        </div>
      
      <div class="row">
        <div class="col-xs-6">
          <!--<b>@lang('report.user'):</b> {{ $register_details->user_name}}<br>-->
          <!--<b>@lang('business.email'):</b> {{ $register_details->email}}<br>-->
          <!--<b>@lang('business.business_location'):</b> {{ $register_details->location_name}}<br>-->
        </div>
        @if(!empty($register_details->closing_note))
          <div class="col-xs-6">
            <strong>@lang('cash_register.closing_note'):</strong><br>
            {{$register_details->closing_note}}
          </div>
        @endif
      </div>
    </div>

    <div class="modal-footer">
  <button type="button" class="tw-dw-btn tw-dw-btn-warning tw-text-white no-print print-mini-button" 
          aria-label="Print">
      <i class="fa fa-print"></i> @lang('messages.print_mini')
  </button>
      <button type="button" class="tw-dw-btn tw-dw-btn-success tw-text-white no-print" 
        aria-label="Print" 
          onclick="$(this).closest('div.modal').printThis();">
        <i class="fa fa-print"></i> @lang( 'messages.print_detailed' )
      </button>

      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white no-print" 
        data-dismiss="modal">@lang( 'messages.cancel' )
      </button>
    </div>

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->


        <style type="text/css">
          @media print {
            .modal {
                position: absolute;
                left: 0;
                top: 0;
                margin: 0;
                padding: 0;
                overflow: visible!important;
            }
        }
        
        .mini_print,
        .mini_print * {
            font-weight: bold !important;
        }
        
        @media print {
            .mini_print,
            .mini_print * {
                font-weight: bold !important;
            }
        }
        
        .mini_print,
        .mini_print * {
            font-weight: 700 !important;
        }
        
        @media print {
        
          @page {
            size: 80mm auto;
            margin: 0;
          }
        
          html, body {
            width: 78mm;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 11px;
          }
        
          /* Modal */
          .modal,
          .modal-dialog,
          .modal-content {
            width: 80mm !important;
            max-width: 80mm !important;
            margin: 0 !important;
            padding: 0 !important;
            border: none !important;
            box-shadow: none !important;
          }
        
          .modal-header,
          .modal-body,
          .modal-footer {
            padding: 3px !important;
          }
        
          /* Quitar bootstrap grid */
          .row,
          [class*="col-"] {
            width: 100% !important;
            float: none !important;
            margin: 0 !important;
            padding: 0 !important;
          }
        
          /* Tablas */
          table {
            width: 100% !important;
            border-collapse: collapse;
            font-size: 10px;
          }
        
          th, td {
            padding: 2px !important;
            word-break: break-word;
          }
        
          /* Títulos */
          h3, h5 {
            margin: 3px 0;
            font-size: 12px;
            text-align: center;
          }
        
          /* Botones y cosas que no se imprimen */
          .no-print,
          button {
            display: none !important;
          }
        }
        
        </style>




    <script>
      $(document).ready(function () {
          $(document).on('click', '.print-mini-button', function () {
              $('.mini_print').printThis();
          });
      });
    </script>
