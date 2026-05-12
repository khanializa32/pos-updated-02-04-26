<div class="modal-dialog" role="document">
  <div class="modal-content">

    <div class="modal-header mini_print">
      <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h5 class="modal-title"><h5><?php echo app('translator')->get( 'cash_register.current_register' ); ?></h5>
      <b><?php echo app('translator')->get('business.enterprise'); ?>:</b> <?php echo e($register_details->location_name, false); ?>

          </br>
          
        <?php if($register_details->open_time): ?>
          Apertura:  <?php echo e(\Carbon::createFromFormat('Y-m-d H:i:s', $register_details->open_time)->format('jS M, Y h:i A'), false); ?> </br>
         <?php if($register_details->closed_at): ?>
    Cierre: <?php echo e(\Carbon::parse($register_details->closed_at)->format('jS M, Y h:i A'), false); ?>

<?php endif; ?>

          
        <?php else: ?>
          ( <?php echo app('translator')->get('cash_register.register_not_opened'); ?> )
        <?php endif; ?>
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
                            <?php echo e($first_invoice->invoice_no ?? 'N/A', false); ?>

                        </span>
                    </td>
                </tr>
                <tr>
                    <td><strong>Factura Final:</strong></td>
                    <td class="text-right">
                        <span class="" style="font-size: 14px;">
                            <?php echo e($last_invoice->invoice_no ?? 'N/A', false); ?>

                        </span>
                    </td>
                </tr>
                <tr>
                    <td><strong>Total Documentos Emitidos:</strong></td>
                    <td class="text-right">
                        <strong style="font-size: 16px;"><?php echo e($total_sales_count, false); ?></strong>
                    </td>
                </tr>
                
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard.data')): ?>
                <tr class="bg-neutral hidden-print"> 
                    <td colspan="2">
                        <strong class="text-purple">Utilidad del Turno:</strong>
                        <span class="display_currency text-purple" data-currency_symbol="true" style="font-weight: bold; margin-left: 10px;">
                            <?php echo e($total_profit ?? 0, false); ?>

                        </span>
                    </td>
                </tr>
            <?php endif; ?>
                
                
            </tbody>
        </table>
    </div>
</div>

     <!--DELIO -->     

      
    <b><?php echo app('translator')->get('report.user'); ?>:</b> <?php echo e($register_details->user_name, false); ?>

    
     <!-- Indicador de caja cerrada -->
  <div style="display: flex; align-items: center; gap: 10px; color: red;">
    <i class="fa fa-lock" aria-hidden="true"></i>
    <strong>CAJA CERRADA</strong>
  </div>
      
    </div>
    

    <div class="modal-body">
        
    <?php echo $__env->make('cash_register.payment_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      
      
      
      <table class="table table-condensed">
    
    <tr>
        <td><strong>Diferencia (Sobrante/Faltante):</strong></td>
        <td>
            <?php if($register_details->difference_amount < 0): ?>
                <span class="display_currency" data-currency_symbol="true" style="color: red; font-weight: bold;">
                    <?php echo e($register_details->difference_amount, false); ?> (Faltante)
                </span>
            <?php elseif($register_details->difference_amount > 0): ?>
                <span class="display_currency" data-currency_symbol="true" style="color: green; font-weight: bold;">
                    <?php echo e($register_details->difference_amount, false); ?> (Sobrante)
                </span>
            <?php else: ?>
                <span class="display_currency" data-currency_symbol="true">
                    <?php echo e($register_details->difference_amount, false); ?> (Cuadrado)
                </span>
            <?php endif; ?>
        </td>
    </tr>
</table>
      
      <hr>
      <?php if(!empty($register_details->denominations)): ?>
        <?php
          $total = 0;
        ?>
        <div class="row">
          <div class="col-md-8 col-sm-12">
            <h3><?php echo app('translator')->get( 'lang_v1.cash_denominations' ); ?></h3>
            <table class="table table-slim">
              <thead>
                <tr>
                  <th width="20%" class="text-right"><?php echo app('translator')->get('lang_v1.denomination'); ?></th>
                  <th width="20%">&nbsp;</th>
                  <th width="20%" class="text-center"><?php echo app('translator')->get('lang_v1.count'); ?></th>
                  <th width="20%">&nbsp;</th>
                  <th width="20%" class="text-left"><?php echo app('translator')->get('sale.subtotal'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $register_details->denominations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td class="text-right"><?php echo e($key, false); ?></td>
                  <td class="text-center">X</td>
                  <td class="text-center"><?php echo e($value ?? 0, false); ?></td>
                  <td class="text-center">=</td>
                  <td class="text-left">
                    <?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $key * $value, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?>
                  </td>
                </tr>
                <?php
                  $total += ($key * $value);
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="4" class="text-center"><?php echo app('translator')->get('sale.total'); ?></th>
                  <td><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $total, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      <?php endif; ?>
      
      
      
    <div class="row">
        
        </div>
      
      <div class="row">
        <div class="col-xs-6">
          <!--<b><?php echo app('translator')->get('report.user'); ?>:</b> <?php echo e($register_details->user_name, false); ?><br>-->
          <!--<b><?php echo app('translator')->get('business.email'); ?>:</b> <?php echo e($register_details->email, false); ?><br>-->
          <!--<b><?php echo app('translator')->get('business.business_location'); ?>:</b> <?php echo e($register_details->location_name, false); ?><br>-->
        </div>
        <?php if(!empty($register_details->closing_note)): ?>
          <div class="col-xs-6">
            <strong><?php echo app('translator')->get('cash_register.closing_note'); ?>:</strong><br>
            <?php echo e($register_details->closing_note, false); ?>

          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="modal-footer">
  <button type="button" class="tw-dw-btn tw-dw-btn-warning tw-text-white no-print print-mini-button" 
          aria-label="Print">
      <i class="fa fa-print"></i> <?php echo app('translator')->get('messages.print_mini'); ?>
  </button>
      <button type="button" class="tw-dw-btn tw-dw-btn-success tw-text-white no-print" 
        aria-label="Print" 
          onclick="$(this).closest('div.modal').printThis();">
        <i class="fa fa-print"></i> <?php echo app('translator')->get( 'messages.print_detailed' ); ?>
      </button>

      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white no-print" 
        data-dismiss="modal"><?php echo app('translator')->get( 'messages.cancel' ); ?>
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
<?php /**PATH C:\laragon\www\POS\resources\views/cash_register/register_details.blade.php ENDPATH**/ ?>