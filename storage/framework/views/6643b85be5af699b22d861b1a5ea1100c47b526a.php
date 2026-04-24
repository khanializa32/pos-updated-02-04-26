        <div class="modal-header">
            <?php if(!isset($is_print)): ?>

                <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php
                  $title = $purchase->type == 'purchase_order' ? __('lang_v1.purchase_order_details') : __('purchase.purchase_details');
                  $custom_labels = json_decode(session('business.custom_labels'), true);
                ?>
    
                <button class="btn btn-success" onclick="exportToXLSX()">Exportar Recepción Técnica</button>
            <?php endif; ?>
        </div>


    <div class="modal-header">
        <?php if(!isset($is_print)): ?>

    <button type="button" class="close no-print" data-dismiss="modal">
        <span>&times;</span>
    </button>

    <h4 class="modal-title">
        <?php echo e($title, false); ?> (<b>Factura:</b> #<?php echo e($purchase->ref_no, false); ?>)
    </h4>
<?php endif; ?>

    <div id="print-resumen" class="resumen-a4">
<?php if(!isset($is_print)): ?>

    <!-- ENCABEZADO -->
    <table class="header-table">
        <tr>
            <td colspan="12" class="center bold">
                RECEPCIÓN TÉCNICA<br>
                <?php echo e($purchase->location->name, false); ?><br>
               NIT <?php echo e($purchase->business->nit, false); ?>

            </td>
        </tr>
        <tr>
            <td colspan="3"><b>Factura:</b> <?php echo e($purchase->ref_no, false); ?></td>
            <td colspan="3"><b>Proveedor:</b> <?php echo e($purchase->contact->supplier_business_name, false); ?></td>
            <td colspan="3"><b>Fecha de Ingreso:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase->transaction_date))->format(session('business.date_format')), false); ?></td>
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
        <?php $__currentLoopData = $purchase->purchase_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($line->product->sku, false); ?></td>
            <td><?php echo e($line->product->name, false); ?></td>
            <td><?php echo e($line->product->brand->name ?? '', false); ?></td>
            <td><?php echo e($line->product->weight, false); ?></td>
            <td><?php echo e($line->product->product_custom_field4, false); ?></td>
            <td><?php echo e($line->exp_date ? \Carbon::createFromTimestamp(strtotime($line->exp_date))->format(session('business.date_format')) : '', false); ?></td>
            <td><?php echo e($line->lot_number, false); ?></td>
            <td><?php echo e($line->product->product_custom_field1, false); ?></td>
            <td><?php echo e($line->quantity, false); ?></td>
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php endif; ?>









    <div id="print-completo">
        <!-- TODO el contenido actual de la factura -->
        <h3>Factura #<?php echo e($purchase->ref_no, false); ?></h3>
        
        <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
             <p class="pull-right"><b><?php echo app('translator')->get('messages.date'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase->transaction_date))->format(session('business.date_format')), false); ?></p>
        </div>
    </div>
    
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <?php echo app('translator')->get('purchase.supplier'); ?>:
      <address>
        <?php echo $purchase->contact->contact_address; ?>

        <?php if(!empty($purchase->contact->tax_number)): ?>
          <br><?php echo app('translator')->get('contact.tax_no'); ?>: <?php echo e($purchase->contact->tax_number, false); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->contact->mobile)): ?>
          <br><?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($purchase->contact->mobile, false); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->contact->email)): ?>
          <br><?php echo app('translator')->get('business.email'); ?>: <?php echo e($purchase->contact->email, false); ?>

        <?php endif; ?>
      </address>
      <?php if($purchase->document_path): ?>
        
        <a href="<?php echo e($purchase->document_path, false); ?>" 
        download="<?php echo e($purchase->document_name, false); ?>" class="tw-dw-btn tw-dw-btn-success tw-text-white tw-dw-btn-sm pull-left no-print">
          <i class="fa fa-download"></i> 
            &nbsp;<?php echo e(__('purchase.download_document'), false); ?>

        </a>
      <?php endif; ?>
      <?php if($purchase->cufe): ?>
        <span class="label label-success">CUFE: <?php echo e($purchase->cufe, false); ?></span>
      <?php endif; ?>
      
      <?php if($purchase->is_valid == 1 && $purchase->e_invoice == 'si'): ?>
        <br/><a href="<?php echo e(route('downloadPdfSupportDocument', [$purchase->id]), false); ?>" target="_blank" class="badge text-bg-success" style="background-color: #E83B1A; color: white;" rel="noopener noreferrer"><i class="fas fa-download"></i> Descargar PDF</a>
    <?php endif; ?>
    </div>

    <div class="col-sm-4 invoice-col">
      <?php echo app('translator')->get('business.business'); ?>:
      <address>
        <strong><?php echo e($purchase->business->name, false); ?></strong>
        <?php echo e($purchase->location->name, false); ?>

        <?php if(!empty($purchase->location->landmark)): ?>
          <br><?php echo e($purchase->location->landmark, false); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->location->city) || !empty($purchase->location->state) || !empty($purchase->location->country)): ?>
          <br><?php echo e(implode(',', array_filter([$purchase->location->city, $purchase->location->state, $purchase->location->country])), false); ?>

        <?php endif; ?>
        
        <?php if(!empty($purchase->business->tax_number_1)): ?>
          <br><?php echo e($purchase->business->tax_label_1, false); ?>: <?php echo e($purchase->business->tax_number_1, false); ?>

        <?php endif; ?>

        <?php if(!empty($purchase->business->tax_number_2)): ?>
          <br><?php echo e($purchase->business->tax_label_2, false); ?>: <?php echo e($purchase->business->tax_number_2, false); ?>

        <?php endif; ?>

        <?php if(!empty($purchase->location->mobile)): ?>
          <br><?php echo app('translator')->get('contact.mobile'); ?>: <?php echo e($purchase->location->mobile, false); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->location->email)): ?>
          <br><?php echo app('translator')->get('business.email'); ?>: <?php echo e($purchase->location->email, false); ?>

        <?php endif; ?>
      </address>
      
    </div>

    <div class="col-sm-4 invoice-col">
      <b><?php echo app('translator')->get('purchase.ref_no'); ?>:</b> #<?php echo e($purchase->ref_no, false); ?><br/>
      <b><?php echo app('translator')->get('messages.date'); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase->transaction_date))->format(session('business.date_format')), false); ?><br/>
      <?php if(!empty($purchase->status)): ?>
        <b><?php echo app('translator')->get('purchase.purchase_status'); ?>:</b> <?php if($purchase->type == 'purchase_order'): ?><?php echo e($po_statuses[$purchase->status]['label'] ?? '', false); ?> <?php else: ?> <?php echo e(__('lang_v1.' . $purchase->status), false); ?> <?php endif; ?><br>
      <?php endif; ?>
      <?php if(!empty($purchase->payment_status)): ?>
      <b><?php echo app('translator')->get('purchase.payment_status'); ?>:</b> <?php echo e(__('lang_v1.' . $purchase->payment_status), false); ?>

      <?php endif; ?>

      <?php if(!empty($custom_labels['purchase']['custom_field_1'])): ?>
        <br><strong><?php echo e($custom_labels['purchase']['custom_field_1'] ?? '', false); ?>: </strong> <?php echo e($purchase->custom_field_1, false); ?>

      <?php endif; ?>
      <?php if(!empty($custom_labels['purchase']['custom_field_2'])): ?>
        <br><strong><?php echo e($custom_labels['purchase']['custom_field_2'] ?? '', false); ?>: </strong> <?php echo e($purchase->custom_field_2, false); ?>

      <?php endif; ?>
      <?php if(!empty($custom_labels['purchase']['custom_field_3'])): ?>
        <br><strong><?php echo e($custom_labels['purchase']['custom_field_3'] ?? '', false); ?>: </strong> <?php echo e($purchase->custom_field_3, false); ?>

      <?php endif; ?>
      <?php if(!empty($custom_labels['purchase']['custom_field_4'])): ?>
        <br><strong><?php echo e($custom_labels['purchase']['custom_field_4'] ?? '', false); ?>: </strong> <?php echo e($purchase->custom_field_4, false); ?>

      <?php endif; ?>
      <?php if(!empty($purchase_order_nos)): ?>
            <strong><?php echo app('translator')->get('restaurant.order_no'); ?>:</strong>
            <?php echo e($purchase_order_nos, false); ?>

        <?php endif; ?>

        <?php if(!empty($purchase_order_dates)): ?>
            <br>
            <strong><?php echo app('translator')->get('lang_v1.order_dates'); ?>:</strong>
            <?php echo e($purchase_order_dates, false); ?>

        <?php endif; ?>
      <?php if($purchase->type == 'purchase_order'): ?>
        <?php
          $custom_labels = json_decode(session('business.custom_labels'), true);
        ?>
        <strong><?php echo app('translator')->get('sale.shipping'); ?>:</strong>
        <span class="label <?php if(!empty($shipping_status_colors[$purchase->shipping_status])): ?> <?php echo e($shipping_status_colors[$purchase->shipping_status], false); ?> <?php else: ?> <?php echo e('bg-gray', false); ?> <?php endif; ?>"><?php echo e($shipping_statuses[$purchase->shipping_status] ?? '', false); ?></span><br>
        <?php if(!empty($purchase->shipping_address())): ?>
          <?php echo e($purchase->shipping_address(), false); ?>

        <?php else: ?>
          <?php echo e($purchase->shipping_address ?? '--', false); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->delivered_to)): ?>
          <br><strong><?php echo app('translator')->get('lang_v1.delivered_to'); ?>: </strong> <?php echo e($purchase->delivered_to, false); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->shipping_custom_field_1)): ?>
          <br><strong><?php echo e($custom_labels['shipping']['custom_field_1'] ?? '', false); ?>: </strong> <?php echo e($purchase->shipping_custom_field_1, false); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->shipping_custom_field_2)): ?>
          <br><strong><?php echo e($custom_labels['shipping']['custom_field_2'] ?? '', false); ?>: </strong> <?php echo e($purchase->shipping_custom_field_2, false); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->shipping_custom_field_3)): ?>
          <br><strong><?php echo e($custom_labels['shipping']['custom_field_3'] ?? '', false); ?>: </strong> <?php echo e($purchase->shipping_custom_field_3, false); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->shipping_custom_field_4)): ?>
          <br><strong><?php echo e($custom_labels['shipping']['custom_field_4'] ?? '', false); ?>: </strong> <?php echo e($purchase->shipping_custom_field_4, false); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->shipping_custom_field_5)): ?>
          <br><strong><?php echo e($custom_labels['shipping']['custom_field_5'] ?? '', false); ?>: </strong> <?php echo e($purchase->shipping_custom_field_5, false); ?>

        <?php endif; ?>
        <?php
          $medias = $purchase->media->where('model_media_type', 'shipping_document')->all();
        ?>
        <?php if(count($medias)): ?>
          <?php echo $__env->make('sell.partials.media_table', ['medias' => $medias], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
      <?php endif; ?>
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
              <th><?php echo app('translator')->get('product.product_name'); ?></th>
              <th><?php echo app('translator')->get('product.sku'); ?></th>
              <?php if($purchase->type == 'purchase_order'): ?>
                <th class="text-right"><?php echo app('translator')->get( 'lang_v1.quantity_remaining' ); ?></th>
              <?php endif; ?>
              <th class="text-right"><?php if($purchase->type == 'purchase_order'): ?> <?php echo app('translator')->get('lang_v1.order_quantity'); ?> <?php else: ?> <?php echo app('translator')->get('purchase.purchase_quantity'); ?> <?php endif; ?></th>
              <th class="text-right"><?php echo app('translator')->get( 'lang_v1.unit_cost_before_discount' ); ?></th>
              <th class="text-right"><?php echo app('translator')->get( 'lang_v1.discount_percent' ); ?></th>
              <th class="no-print text-right"><?php echo app('translator')->get('purchase.unit_cost_before_tax'); ?></th>
              <th class="no-print text-right"><?php echo app('translator')->get('purchase.subtotal_before_tax'); ?></th>
              <th class="text-right"><?php echo app('translator')->get('sale.tax'); ?></th>
              <th class="text-right"><?php echo app('translator')->get('purchase.unit_cost_after_tax'); ?></th>
              <?php if($purchase->type != 'purchase_order'): ?>
              <?php if(session('business.enable_lot_number')): ?>
                <th><?php echo app('translator')->get('lang_v1.lot_number'); ?></th>
              <?php endif; ?>
              <?php if(session('business.enable_product_expiry')): ?>
                <th><?php echo app('translator')->get('product.mfg_date'); ?></th>
                <th><?php echo app('translator')->get('product.exp_date'); ?></th>
              <?php endif; ?>
              <?php endif; ?>
              <th class="text-right"><?php echo app('translator')->get('sale.subtotal'); ?></th>
            </tr>
          </thead>
          <?php 
            $total_before_tax = 0.00;
          ?>
          <?php $__currentLoopData = $purchase->purchase_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($loop->iteration, false); ?></td>
              <td>
                <?php echo e($purchase_line->product->name, false); ?>

                 <?php if( $purchase_line->product->type == 'variable'): ?>
                  - <?php echo e($purchase_line->variations->product_variation->name, false); ?>

                  - <?php echo e($purchase_line->variations->name, false); ?>

                 <?php endif; ?>
              </td>
              <td>
                 <?php if( $purchase_line->product->type == 'variable'): ?>
                  <?php echo e($purchase_line->variations->sub_sku, false); ?>

                  <?php else: ?>
                  <?php echo e($purchase_line->product->sku, false); ?>

                 <?php endif; ?>
              </td>
              <?php if($purchase->type == 'purchase_order'): ?>
                <td>
                  <span class="display_currency" data-is_quantity="true" data-currency_symbol="false"><?php echo e($purchase_line->quantity - $purchase_line->po_quantity_purchased, false); ?></span> <?php if(!empty($purchase_line->actual_name)): ?> <?php echo e($purchase_line->sub_unit->actual_name, false); ?> <?php else: ?> <?php echo e($purchase_line->product->unit->actual_name, false); ?> <?php endif; ?>
                </td>
              <?php endif; ?>
              <td>
                <span class="display_currency" data-is_quantity="true" data-currency_symbol="false"><?php echo e($purchase_line->quantity, false); ?></span> <?php if(!empty($purchase_line->sub_unit)): ?> <?php echo e($purchase_line->sub_unit->actual_name, false); ?> <?php else: ?> <?php echo e($purchase_line->product->unit->actual_name, false); ?> <?php endif; ?> 
                <?php if($purchase_line->product->unit->sub_units): ?>
                  <?php $__currentLoopData = $purchase_line->product->unit->sub_units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($sub_unit->id == $purchase_line->sub_unit_id): ?>
                      (<?php echo e((float) $sub_unit->base_unit_multiplier, false); ?>

                      <?php echo e($purchase_line->product->unit->short_name, false); ?>)
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if(!empty($purchase_line->product->second_unit) && $purchase_line->secondary_unit_quantity != 0): ?>
                    <br>
                    <span class="display_currency" data-is_quantity="true" data-currency_symbol="false"><?php echo e($purchase_line->secondary_unit_quantity, false); ?></span> <?php echo e($purchase_line->product->second_unit->actual_name, false); ?>

                <?php endif; ?>

              </td>
              <td class="text-right"><span class="display_currency" data-currency_symbol="true"><?php echo e($purchase_line->pp_without_discount, false); ?></span></td>
              <td class="text-right"><span class="display_currency"><?php echo e($purchase_line->discount_percent, false); ?></span> %</td>
              <td class="no-print text-right"><span class="display_currency" data-currency_symbol="true"><?php echo e($purchase_line->purchase_price, false); ?></span></td>
              <td class="no-print text-right"><span class="display_currency" data-currency_symbol="true"><?php echo e($purchase_line->quantity * $purchase_line->purchase_price, false); ?></span></td>
              <td class="text-right"><span class="display_currency" data-currency_symbol="true"><?php echo e($purchase_line->item_tax, false); ?> </span> <br/><small><?php if(!empty($taxes[$purchase_line->tax_id])): ?> ( <?php echo e($taxes[$purchase_line->tax_id], false); ?> ) </small><?php endif; ?></td>
              <td class="text-right"><span class="display_currency" data-currency_symbol="true"><?php echo e($purchase_line->purchase_price_inc_tax, false); ?></span></td>
              <?php if($purchase->type != 'purchase_order'): ?>
              <?php if(session('business.enable_lot_number')): ?>
                <td><?php echo e($purchase_line->lot_number, false); ?></td>
              <?php endif; ?>

              <?php if(session('business.enable_product_expiry')): ?>
              <td>
                <?php if(!empty($purchase_line->mfg_date)): ?>
                    <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase_line->mfg_date))->format(session('business.date_format')), false); ?>

                <?php endif; ?>
              </td>
              <td>
                <?php if(!empty($purchase_line->exp_date)): ?>
                    <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase_line->exp_date))->format(session('business.date_format')), false); ?>

                <?php endif; ?>
              </td>
              <?php endif; ?>
              <?php endif; ?>
              <td class="text-right"><span class="display_currency" data-currency_symbol="true"><?php echo e($purchase_line->purchase_price_inc_tax * $purchase_line->quantity, false); ?></span></td>
            </tr>
            <?php 
              $total_before_tax += ($purchase_line->quantity * $purchase_line->purchase_price);
            ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <?php if(!empty($purchase->type == 'purchase')): ?>
    <div class="col-sm-12 col-xs-12">
      <h4><?php echo e(__('sale.payment_info'), false); ?>:</h4>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="table-responsive">
        <table class="table">
          <tr class="bg-gray">
            <th>#</th>
            <th><?php echo e(__('messages.date'), false); ?></th>
            <th><?php echo e(__('purchase.ref_no'), false); ?></th>
            <th><?php echo e(__('sale.amount'), false); ?></th>
            <th><?php echo e(__('sale.payment_mode'), false); ?></th>
            <th><?php echo e(__('sale.payment_note'), false); ?></th>
          </tr>
          <?php
            $total_paid = 0;
          ?>
          <?php $__empty_1 = true; $__currentLoopData = $purchase->payment_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
              $total_paid += $payment_line->amount;
            ?>
            <tr>
              <td><?php echo e($loop->iteration, false); ?></td>
              <td><?php echo e(\Carbon::createFromTimestamp(strtotime($payment_line->paid_on))->format(session('business.date_format')), false); ?></td>
              <td><?php echo e($payment_line->payment_ref_no, false); ?></td>
              <td><span class="display_currency" data-currency_symbol="true"><?php echo e($payment_line->amount, false); ?></span></td>
              <td><?php echo e($payment_methods[$payment_line->method] ?? '', false); ?></td>
              <td><?php if($payment_line->note): ?> 
                <?php echo e(ucfirst($payment_line->note), false); ?>

                <?php else: ?>
                --
                <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
              <td colspan="5" class="text-center">
                <?php echo app('translator')->get('purchase.no_payments'); ?>
              </td>
            </tr>
          <?php endif; ?>
        </table>
      </div>
    </div>
    <?php endif; ?>
    <div class="col-md-6 col-sm-12 col-xs-12 <?php if($purchase->type == 'purchase_order'): ?> col-md-offset-6 <?php endif; ?>">
      <div class="table-responsive">
        <table class="table">
          <!-- <tr class="hide">
            <th><?php echo app('translator')->get('purchase.total_before_tax'); ?>: </th>
            <td></td>
            <td><span class="display_currency pull-right"><?php echo e($total_before_tax, false); ?></span></td>
          </tr> -->
          <tr>
            <th><?php echo app('translator')->get('purchase.net_total_amount'); ?>: </th>
            <td></td>
            <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($total_before_tax, false); ?></span></td>
          </tr>
          <tr>
            <th><?php echo app('translator')->get('purchase.discount'); ?>:</th>
            <td>
              <b>(-)</b>
              <?php if($purchase->discount_type == 'percentage'): ?>
                (<?php echo e($purchase->discount_amount, false); ?> %)
              <?php endif; ?>
            </td>
            <td>
              <span class="display_currency pull-right" data-currency_symbol="true">
                <?php if($purchase->discount_type == 'percentage'): ?>
                  <?php echo e($purchase->discount_amount * $total_before_tax / 100, false); ?>

                <?php else: ?>
                  <?php echo e($purchase->discount_amount, false); ?>

                <?php endif; ?>                  
              </span>
            </td>
          </tr>
          <tr>
            <th><?php echo app('translator')->get('purchase.purchase_tax'); ?>:</th>
            <td><b>(+)</b></td>
            <td class="text-right">
                <?php if(!empty($purchase_taxes)): ?>
                  <?php $__currentLoopData = $purchase_taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong><small><?php echo e($k, false); ?></small></strong> - <span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($v, false); ?></span><br>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                0.00
                <?php endif; ?>
              </td>
          </tr>
          <?php if( !empty( $purchase->shipping_charges ) ): ?>
            <tr>
              <th><?php echo app('translator')->get('purchase.additional_shipping_charges'); ?>:</th>
              <td><b>(+)</b></td>
              <td><span class="display_currency pull-right" ><?php echo e($purchase->shipping_charges, false); ?></span></td>
            </tr>
          <?php endif; ?>
          <?php if( !empty( $purchase->additional_expense_value_1 )  && !empty( $purchase->additional_expense_key_1 )): ?>
            <tr>
              <th><?php echo e($purchase->additional_expense_key_1, false); ?>:</th>
              <td><b>(+)</b></td>
              <td><span class="display_currency pull-right" ><?php echo e($purchase->additional_expense_value_1, false); ?></span></td>
            </tr>
          <?php endif; ?>
          <?php if( !empty( $purchase->additional_expense_value_2 )  && !empty( $purchase->additional_expense_key_2 )): ?>
            <tr>
              <th><?php echo e($purchase->additional_expense_key_2, false); ?>:</th>
              <td><b>(+)</b></td>
              <td><span class="display_currency pull-right" ><?php echo e($purchase->additional_expense_value_2, false); ?></span></td>
            </tr>
          <?php endif; ?>
          <?php if( !empty( $purchase->additional_expense_value_3 )  && !empty( $purchase->additional_expense_key_3 )): ?>
            <tr>
              <th><?php echo e($purchase->additional_expense_key_3, false); ?>:</th>
              <td><b>(+)</b></td>
              <td><span class="display_currency pull-right" ><?php echo e($purchase->additional_expense_value_3, false); ?></span></td>
            </tr>
          <?php endif; ?>
          <?php if( !empty( $purchase->additional_expense_value_4 ) && !empty( $purchase->additional_expense_key_4 )): ?>
            <tr>
              <th><?php echo e($purchase->additional_expense_key_4, false); ?>:</th>
              <td><b>(+)</b></td>
              <td><span class="display_currency pull-right" ><?php echo e($purchase->additional_expense_value_4, false); ?></span></td>
            </tr>
          <?php endif; ?>
          <tr>
            <th><?php echo app('translator')->get('purchase.purchase_total'); ?>:</th>
            <td></td>
            <td><span class="display_currency pull-right" data-currency_symbol="true" ><?php echo e($purchase->final_total, false); ?></span></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <strong><?php echo app('translator')->get('purchase.shipping_details'); ?>:</strong><br>
      <p class="well well-sm no-shadow bg-whitw">
        <?php echo e($purchase->shipping_details ?? '', false); ?>


        <?php if(!empty($purchase->shipping_custom_field_1)): ?>
          <br><strong><?php echo e($custom_labels['purchase_shipping']['custom_field_1'] ?? '', false); ?>: </strong> <?php echo e($purchase->shipping_custom_field_1, false); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->shipping_custom_field_2)): ?>
          <br><strong><?php echo e($custom_labels['purchase_shipping']['custom_field_2'] ?? '', false); ?>: </strong> <?php echo e($purchase->shipping_custom_field_2, false); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->shipping_custom_field_3)): ?>
          <br><strong><?php echo e($custom_labels['purchase_shipping']['custom_field_3'] ?? '', false); ?>: </strong> <?php echo e($purchase->shipping_custom_field_3, false); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->shipping_custom_field_4)): ?>
          <br><strong><?php echo e($custom_labels['purchase_shipping']['custom_field_4'] ?? '', false); ?>: </strong> <?php echo e($purchase->shipping_custom_field_4, false); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->shipping_custom_field_5)): ?>
          <br><strong><?php echo e($custom_labels['purchase_shipping']['custom_field_5'] ?? '', false); ?>: </strong> <?php echo e($purchase->shipping_custom_field_5, false); ?>

        <?php endif; ?>
      </p>
    </div>
    <div class="col-sm-6">
      <strong><?php echo app('translator')->get('purchase.additional_notes'); ?>:</strong><br>
      <p class="well well-sm no-shadow bg-white">
        <?php if($purchase->additional_notes): ?>
          <?php echo e($purchase->additional_notes, false); ?>

        <?php else: ?>
          --
        <?php endif; ?>
      </p>
    </div>
    
  </div>
  <?php if(!empty($activities)): ?>
  <div class="row">
    <div class="col-md-12">
          <strong><?php echo e(__('lang_v1.activities'), false); ?>:</strong><br>
          <?php if ($__env->exists('activity_log.activities', ['activity_type' => 'purchase'])) echo $__env->make('activity_log.activities', ['activity_type' => 'purchase'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
  </div>
  <?php endif; ?>

  
  <div class="row print_section">
    <div class="col-xs-12">
      <img class="center-block" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($purchase->ref_no, 'C128', 2,30,array(39, 48, 54), true), false); ?>">
    </div>
    
</div>
</div>


<!-- =============================
     BLOQUE SOLO NOMBRE Y CANTIDAD
==============================-->
<?php if(!isset($is_print)): ?>
<div id="print-simple">
    <h3>Resumen de Productos</h3>
    <p><b>Factura:</b> #<?php echo e($purchase->ref_no, false); ?></p>

    <table style="width:100%; border-collapse: collapse;">
        <thead>
            <tr style="background:#f2f2f2;">
                <th style="border:1px solid #000; padding:6px;">Producto</th>
                <th style="border:1px solid #000; padding:6px;">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $__currentLoopData = $purchase->purchase_lines->sortBy('product.name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="border:1px solid #000; padding:6px;">
                    <?php echo e($line->product->name, false); ?>

                </td>
                <td style="border:1px solid #000; padding:6px; text-align:center;">
                    <?php echo e($line->quantity, false); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<button type="button" onclick="printThermalOxxo()" 
        style="background-color: #004C6E; color: white; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer;">
    Imprimir Productos
</button>
<?php endif; ?>



<script>
function printThermalOxxo() {
    var fullRef = "<?php echo e($purchase->ref_no, false); ?>";
    var partes = fullRef.split('/');
    var consecutivoFormateado = partes.length > 1 ? partes[partes.length - 1] : fullRef;
    
    var date = new Date().toLocaleString();
    var rows = "";

    
    <?php $__currentLoopData = $purchase->purchase_lines->sortBy('product.name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        rows += `
            <tr>
                <td style="padding: 3px 0; font-weight: bold;"><?php echo e(Str::limit($line->product->name, 80), false); ?></td>
                <td style="text-align:right; vertical-align: top; font-weight: bold;"><?php echo e($line->quantity, false); ?></td>
            </tr>
        `;
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
    ws["A2"] = { v: "<?php echo e($purchase->location->name, false); ?>  -  NIT <?php echo e($purchase->business->nit, false); ?>", t: "s", s: headerStyle };
  
    

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
    ws["E3"] = { v: "<?php echo e($purchase->custom_field_1, false); ?>", t: "s", s: cellStyle };

    ws["D4"] = { v: "Proveedor:", t: "s", s: cellStyle };
    ws["E4"] = { v: "<?php echo e($purchase->contact->supplier_business_name, false); ?>", t: "s", s: cellStyle };
    
    ws["D5"] = { v: "NIT:", t: "s", s: cellStyle };
    ws["E5"] = { v: "<?php echo e($purchase->contact->contact_id, false); ?>", t: "s", s: cellStyle };

    ws["G3"] = { v: "Fecha de Ingreso:", t: "s", s: cellStyle };
    ws["H3"] = { v: "<?php echo e(\Carbon::createFromTimestamp(strtotime($purchase->transaction_date))->format(session('business.date_format')), false); ?>", t: "s", s: cellStyle };
    
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


<?php /**PATH C:\laragon\www\POS\alizazip\resources\views/purchase/partials/show_details.blade.php ENDPATH**/ ?>