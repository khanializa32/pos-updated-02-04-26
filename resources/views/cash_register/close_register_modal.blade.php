<div class="modal-dialog" role="document">
  <div class="modal-content">
    {!! Form::open(['url' => action([\App\Http\Controllers\CashRegisterController::class, 'postCloseRegister']), 'method' => 'post' ]) !!}

    {!! Form::hidden('user_id', $register_details->user_id); !!}
    
    
    <div class="modal-header">
        
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
      </h5>
    
    <div class="modal-header">
   
    
    <b>@lang('report.user'):</b> {{ $register_details->user_name}}<br>
    
     <!-- Indicador de caja cerrada -->
      <div style="display: flex; align-items: center; gap: 10px; color: green;">
        <i class="fa fa-lock" aria-hidden="true"></i>
        <strong>CAJA ABIERTA</strong>
      </div>
      
    <div class="modal-body">
        @include('cash_register.payment_details')
        <hr>
    
        
        
        
    <div class="row">
        <div class="col-sm-4">
        <div class="form-group" style="font-size:18px; color:orange">
            {!! Form::label('closing_amount', __( 'cash_register.total_cash' ) . ':*') !!}
            {!! Form::text('closing_amount', @num_format($register_details->cash_in_hand + $backendPaymentAmount + $register_details->total_cash - $register_details->total_cash_refund - $register_details->total_cash_expense - ($modalCashSellReturnRefund ?? 0 ) - $cashWithdrawalAmount), ['class' => 'form-control input_number', 'id' => 'system_amount', 'readonly']); !!}
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group" style="font-size:18px; color:blue">
            <label for="physical_amount">Conteo Físico:*</label>
            <input type="text" id="physical_amount" class="form-control input_number" placeholder="Ingrese dinero real" required>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group" style="font-size:18px;">
            <label>Diferencia:</label>
            <div id="diff_display" style="font-weight: bold; padding: 4px; border-radius: 4px; border: 1px solid #ccc; text-align: center;">
                0.00
            </div>
            <input type="hidden" name="difference_amount" id="difference_amount_input">
        </div>
    </div>
</div>






        <!-- <div class="col-sm-4">
          <div class="form-group">
            {!! Form::label('total_card_slips', __( 'cash_register.total_card_slips' ) . ':*') !!} @show_tooltip(__('tooltip.total_card_slips'))
              {!! Form::number('total_card_slips', $register_details->total_card_slips, ['class' => 'form-control', 'required', 'placeholder' => __( 'cash_register.total_card_slips' ), 'min' => 0 ]); !!}
          </div>
        </div> 
        <div class="col-sm-4">
          <div class="form-group">
            {!! Form::label('total_cheques', __( 'cash_register.total_cheques' ) . ':*') !!} @show_tooltip(__('tooltip.total_cheques'))
              {!! Form::number('total_cheques', $register_details->total_cheques, ['class' => 'form-control', 'required', 'placeholder' => __( 'cash_register.total_cheques' ), 'min' => 0 ]); !!}
          </div>
        </div> 
        <hr> -->
        <div class="col-md-8 col-sm-12">
          <h3>@lang( 'lang_v1.cash_denominations' )</h3>
          @if(!empty($pos_settings['cash_denominations']))
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
                @foreach(explode(',', $pos_settings['cash_denominations']) as $dnm)
                <tr>
                  <td class="text-right">{{$dnm}}</td>
                  <td class="text-center" >X</td>
                  <td>{!! Form::number("denominations[$dnm]", null, ['class' => 'form-control cash_denomination input-sm', 'min' => 0, 'data-denomination' => $dnm, 'style' => 'width: 100px; margin:auto;' ]); !!}</td>
                  <td class="text-center">=</td>
                  <td class="text-left">
                    <span class="denomination_subtotal">0</span>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="4" class="text-center">@lang('sale.total')</th>
                  <td><span class="denomination_total">0</span></td>
                </tr>
              </tfoot>
            </table>
          @else
            <p class="help-block">@lang('lang_v1.denomination_add_help_text')</p>
          @endif
        </div>  
        <hr>
         <div class="col-sm-12">
          <div class="form-group">
            {!! Form::label('closing_note', __( 'cash_register.closing_note' ) . ':') !!}
              {!! Form::textarea('closing_note', null, ['class' => 'form-control', 'placeholder' => __( 'cash_register.closing_note' ), 'rows' => 3 ]); !!}
          </div>
        </div>
      </div> 
      

      <div class="row">
        <div class="col-xs-6">
          <!--<b>@lang('report.user'):</b> {{ $register_details->user_name}}<br> -->
          <!--<b>@lang('business.email'):</b> {{ $register_details->email}}<br>-->
          <!--<b>@lang('business.business_location'):</b> {{ $register_details->location_name}}<br> -->
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
        <button type="submit" class="tw-dw-btn tw-dw-btn-warning tw-text-black">@lang( 'cash_register.close_register' )</button>
         <button type="button" class="tw-dw-btn tw-dw-btn-success tw-text-white no-print" 
        aria-label="Print" 
          onclick="$(this).closest('div.modal').printThis();">
        <i class="fa fa-print"></i> @lang( 'messages.print' )
      </button>
      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal">@lang( 'messages.cancel' )</button>
      
    </div>
    {!! Form::close() !!}
  </div>
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

  <style>
@media print {
    body * {
        font-weight: bold !important;
    }
}
</style>

<style>
@media print {
    .mini_print {
        font-family: Arial Black !important;
    }

    .mini_print * {
        font-family: Arial Black !important;
        font-weight: normal !important;
    }
}
</style>
  
  <script>
$(document).on('input', '#physical_amount', function() {
    // 1. Obtener valores y limpiar formatos
    let systemAmount = __read_number($('#system_amount'));
    let physicalAmount = __read_number($('#physical_amount'));
    
    // 2. Calcular diferencia
    let difference = physicalAmount - systemAmount;
    
    // 3. Formatear y mostrar
    let diffDisplay = $('#diff_display');
    let diffInput = $('#difference_amount_input');
    
    // Usamos la función nativa de contabilidad del sistema para el formato
    let formattedDiff = __number_f(difference, true);
    diffDisplay.text(formattedDiff);
    diffInput.val(difference);

    // 4. Aplicar colores dinámicos
    if (difference < 0) {
        // Faltante: Rojo
        diffDisplay.css({'color': 'white', 'background-color': '#e74c3c', 'border-color': '#c0392b'});
    } else if (difference > 0) {
        // Sobrante: Verde
        diffDisplay.css({'color': 'white', 'background-color': '#27ae60', 'border-color': '#1e8449'});
    } else {
        // Exacto: Gris/Neutral
        diffDisplay.css({'color': '#333', 'background-color': '#f1f1f1', 'border-color': '#ccc'});
    }
});
</script> <!-- /.modal-content 
</div><!-- /.modal-dialog 


