<!-- business information here -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <title>Receipt-<?php echo e($receipt_details->invoice_no, false); ?></title>
    </head>
    <body>
        <div class="ticket">
        	<?php if(empty($receipt_details->letter_head)): ?>
			<?php if(!empty($receipt_details->logo)): ?>
				<img style="max-height: 120px; width: auto;" src="<?php echo e($receipt_details->logo, false); ?>" class="img img-responsive center-block">
			<?php endif; ?>
				
				<div class="text-box">
				<!-- Logo -->
				<p class="centered">
					<!-- Header text -->
					<?php if(!empty($receipt_details->header_text)): ?>
						<span class="headings"><?php echo $receipt_details->header_text; ?></span>
						<br/>
					<?php endif; ?>

					<!-- business information here -->
					<?php if(!empty($receipt_details->display_name)): ?>
						<span class="headings">
							<?php echo e($receipt_details->display_name, false); ?>

						</span>
					<br/>
					<?php endif; ?>

				<b class="centered sub-headings">NIT</b> <?php if(!empty($receipt_details->nit)): ?>
					<b> <?php echo $receipt_details->type_document; ?>:</b> <b><?php echo $receipt_details->nit; ?>-<?php echo $receipt_details->dv; ?></b>  <br>
					<?php endif; ?>
					 <div class="sub-headings centered" style="line-height: 1.2; margin-top: 5px;">
                        <?php if(!empty($receipt_details->address)): ?>
                            <b><?php echo $receipt_details->address; ?></b> <br>
                        <?php endif; ?>
                        
                        <?php if(!empty($receipt_details->type_organization)): ?>
                            <b><?php echo $receipt_details->type_organization; ?></b> <br>
                        <?php endif; ?>
                        
                        <?php if(!empty($receipt_details->type_regime)): ?>
                            <b><?php echo $receipt_details->type_regime; ?></b> <br>
                        <?php endif; ?>
                        
                         &nbsp;
				    <?php if(!empty($receipt_details->sub_heading_line1)): ?>
						<b><?php echo e($receipt_details->sub_heading_line1, false); ?></b><br/>
					<?php endif; ?>
					&nbsp;
					<?php if(!empty($receipt_details->sub_heading_line2)): ?>
						<b style="font-size: 14px;"><?php echo e($receipt_details->sub_heading_line2, false); ?></b><br/>
					<?php endif; ?>
					&nbsp;
					<?php if(!empty($receipt_details->sub_heading_line3)): ?>
						<b><?php echo e($receipt_details->sub_heading_line3, false); ?></b>
                    
                       
                    </div>
				   <br/>
				
				
				</div>
					<?php if(!empty($receipt_details->contact)): ?>
						<?php echo $receipt_details->contact; ?>

					<?php endif; ?>
					<?php if(!empty($receipt_details->contact) && !empty($receipt_details->website)): ?>
						, 
					<?php endif; ?>
					<?php if(!empty($receipt_details->website)): ?>
						<br><?php echo e($receipt_details->website, false); ?>

					<?php endif; ?>
					<?php if(!empty($receipt_details->location_custom_fields)): ?>
						<br><?php echo e($receipt_details->location_custom_fields, false); ?>

					<?php endif; ?>

					
					<?php endif; ?>
					<?php if(!empty($receipt_details->sub_heading_line4)): ?>
						<?php echo e($receipt_details->sub_heading_line4, false); ?><br/>
					<?php endif; ?>		
					<?php if(!empty($receipt_details->sub_heading_line5)): ?>
						<?php echo e($receipt_details->sub_heading_line5, false); ?><br/>
					<?php endif; ?>

					<?php if(!empty($receipt_details->tax_info1)): ?>
						<br><b><?php echo e($receipt_details->tax_label1, false); ?></b> <?php echo e($receipt_details->tax_info1, false); ?>

					<?php endif; ?>

					<?php if(!empty($receipt_details->tax_info2)): ?>
						<b><?php echo e($receipt_details->tax_label2, false); ?></b> <?php echo e($receipt_details->tax_info2, false); ?>

					<?php endif; ?>
				
				</p>
				</div>
				
			<?php endif; ?>
				<?php if(!empty($receipt_details->letter_head)): ?>
					<div class="text-box">
						<img style="width: 100%;margin-bottom: 10px;" src="<?php echo e($receipt_details->letter_head, false); ?>">
					</div>
				<?php endif; ?>
			<div class="border-top border-bottom sub-headings" style="padding: 5px 0; line-height: 1.1;">
    
    <div class="flex-box">
        <span><b>F.E.V. Nro: <?php echo e($receipt_details->invoice_no, false); ?></b></span>
        <span><b>Fecha: <?php echo e($receipt_details->invoice_date, false); ?></b></span>
    </div>

    <?php if(!empty($receipt_details->sales_person) || !empty($receipt_details->service_staff)): ?>
        <div class="flex-box" style="font-size: 11px !important;">
            <span><b>Vendedor: <?php echo e($receipt_details->sales_person, false); ?></b></span>
            <?php if(!empty($receipt_details->service_staff)): ?>
                <span>Staff:</b> <?php echo e($receipt_details->service_staff, false); ?><b></span>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(!empty($receipt_details->table) || !empty($receipt_details->repair_brand)): ?>
        <div class="flex-box" style="font-size: 11px !important;">
            <?php if(!empty($receipt_details->table)): ?> <span><b>Mesa: <?php echo e($receipt_details->table, false); ?></b></span> <?php endif; ?>
            <?php if(!empty($receipt_details->repair_brand)): ?> <span><b>Equipo:<?php echo e($receipt_details->repair_brand, false); ?> <?php echo e($receipt_details->repair_model_no, false); ?></b> </span> <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="border-bottom-dotted" style="margin: 3px 0;"></div>

    <div class="bw">
        <b>Cliente: <?php echo $receipt_details->customer_info; ?></b><br>
        <b>NIT/CC: <?php echo e($receipt_details->client_id, false); ?></b>
        <?php if(!empty($receipt_details->contact)): ?> | <b>Tel: <?php echo e($receipt_details->contact, false); ?> </b> <?php endif; ?>
        
        <?php if(!empty($receipt_details->customer_custom_fields)): ?>
            <br><small><?php echo $receipt_details->customer_custom_fields; ?></small>
        <?php endif; ?>
    </div>

    <?php if(!empty($receipt_details->sell_custom_field_1_value) || !empty($receipt_details->sell_custom_field_2_value)): ?>
        <div style="font-size: 10px; border-top: 1px dotted #ccc; margin-top: 3px;">
            <?php if(!empty($receipt_details->sell_custom_field_1_value)): ?> <span><?php echo e($receipt_details->sell_custom_field_1_label, false); ?>: <?php echo e($receipt_details->sell_custom_field_1_value, false); ?></span> <?php endif; ?>
            <?php if(!empty($receipt_details->sell_custom_field_2_value)): ?> | <span><?php echo e($receipt_details->sell_custom_field_2_label, false); ?>: <?php echo e($receipt_details->sell_custom_field_2_value, false); ?></span> <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
            <table style="margin-top: 25px !important" class="border-bottom width-100 table-f-12 mb-10">
                <thead class="border-bottom-dotted">
                    <tr>
                        
                        <th class="description text-left sub-headings" width="30%">
                        	Producto <?php echo e($receipt_details->table_product_label, false); ?>

                        </th>
                        <th class="quantity text-right sub-headings">
                        	Cant <?php echo e($receipt_details->table_qty_label, false); ?>

                        </th>
                        <?php if(empty($receipt_details->hide_price)): ?>
                        <!--<th class="unit_price text-right">
                        	Precio U.<?php echo e($receipt_details->table_unit_price_label, false); ?>

                        </th> -->
                        <?php if(!empty($receipt_details->discounted_unit_price_label)): ?>
							<th class="text-center sub-headings">
								<?php echo e($receipt_details->discounted_unit_price_label, false); ?>

							</th>
						<?php endif; ?>
                        <?php if(!empty($receipt_details->item_discount_label)): ?>
							<th class="text-right sub-headings"><?php echo e($receipt_details->item_discount_label, false); ?></th>
						<?php endif; ?>
                        <th class="price text-center sub-headings">Total <?php echo e($receipt_details->table_subtotal_label, false); ?></th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
            <?php
                $locIds = collect($receipt_details->lines ?? [])->pluck('line_location_id')->filter()->map(function($v){return (int)$v;})->unique()->sort()->values()->all();
                $hasMultiLocs = count($locIds) > 1;
                $locCodeMap = collect();
                    $locCodeMap = \App\BusinessLocation::whereIn('id', $locIds)->pluck('location_id','id');

            ?>
            	<?php $__empty_1 = true; $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        
                        <td class="description text-left sub-headings">
                                <?php $locCode = $locCodeMap[(int)($line['line_location_id'] ?? 0)] ?? null; ?>
                                <?php if($locCode): ?>
                                    <strong>(<?php echo e($locCode, false); ?>)</strong>
                                <?php endif; ?>
                        	<?php echo e($line['name'], false); ?> <?php echo e($line['product_variation'], false); ?> <?php echo e($line['variation'], false); ?> 
                        	<?php if(!empty($line['sub_sku'])): ?>, <?php echo e($line['sub_sku'], false); ?> <?php endif; ?> <?php if(!empty($line['brand'])): ?>, <?php echo e($line['brand'], false); ?> <?php endif; ?> <?php if(!empty($line['cat_code'])): ?>, <?php echo e($line['cat_code'], false); ?><?php endif; ?>
                        	<?php if(!empty($line['product_custom_fields'])): ?>, <?php echo e($line['product_custom_fields'], false); ?> <?php endif; ?>
                        	<?php if(!empty($line['product_description'])): ?>
                            	<div class="f-8">
                            		<?php echo $line['product_description']; ?>

                            	</div>
                            <?php endif; ?>
                        	<?php if(!empty($line['sell_line_note'])): ?>
                        	<br>
                        	<span class="f-8">
                        	<?php echo $line['sell_line_note']; ?>

                        	</span>
                        	<?php endif; ?> 
                        	<?php if(!empty($line['lot_number'])): ?><br> <?php echo e($line['lot_number_label'], false); ?>:  <?php echo e($line['lot_number'], false); ?> <?php endif; ?> 
                        	<?php if(!empty($line['product_expiry'])): ?>, <?php echo e($line['product_expiry_label'], false); ?>:  <?php echo e($line['product_expiry'], false); ?> <?php endif; ?>
                        	<?php if(!empty($line['warranty_name'])): ?>
                            	<br>
                            	<small>
                            		<?php echo e($line['warranty_name'], false); ?>

                            	</small>
                            <?php endif; ?>
                            <?php if(!empty($line['warranty_exp_date'])): ?>
                            	<small>
                            		- <?php echo e(\Carbon::createFromTimestamp(strtotime($line['warranty_exp_date']))->format(session('business.date_format')), false); ?>

                            	</small>
                            <?php endif; ?>
                            <?php if(!empty($line['warranty_description'])): ?>
                            	<small> <?php echo e($line['warranty_description'] ?? '', false); ?></small>
                            <?php endif; ?>

                            <?php if($receipt_details->show_base_unit_details && $line['quantity'] && $line['base_unit_multiplier'] !== 1): ?>
                            	<br><small>
                            		1 <?php echo e($line['units'], false); ?> = <?php echo e($line['base_unit_multiplier'], false); ?> <?php echo e($line['base_unit_name'], false); ?> <br>
                            					<?php echo e($line['base_unit_price'], false); ?> x <?php echo e($line['orig_quantity'], false); ?> = <?php echo e($line['line_total'], false); ?>

                            	</small>
                            	<?php endif; ?>
                        </td>
	                        <td class="quantity text-center sub-headings"><?php echo e($line['quantity'], false); ?>  <?php if($receipt_details->show_base_unit_details && $line['quantity'] && $line['base_unit_multiplier'] !== 1): ?>
                            <br><small>
                            	<?php echo e($line['quantity'], false); ?> x <?php echo e($line['base_unit_multiplier'], false); ?> = <?php echo e($line['orig_quantity'], false); ?> <?php echo e($line['base_unit_name'], false); ?>

                            </small>
                            <?php endif; ?></td>
	                        <?php if(empty($receipt_details->hide_price)): ?>
	                       <!-- <td class="unit_price text-right"><?php echo e($line['unit_price_before_discount'], false); ?></td> -->

	                        <?php if(!empty($receipt_details->discounted_unit_price_label)): ?>
								<td class="text-center sub-headings">
									<?php echo e($line['unit_price_inc_tax'], false); ?> 
								</td>
							<?php endif; ?>

	                        <?php if(!empty($receipt_details->item_discount_label)): ?>
								<td class="text-right sub-headings">
									<?php echo e($line['total_line_discount'] ?? '0.00', false); ?>

									<?php if(!empty($line['line_discount_percent'])): ?>
								 		(<?php echo e($line['line_discount_percent'], false); ?>%)
									<?php endif; ?>
								</td>
							<?php endif; ?>
	                        <td class="price text-right sub-headings"><?php echo e($line['line_total'], false); ?></td>
	                        <?php endif; ?>
	                    </tr>
	                    <?php if(!empty($line['modifiers'])): ?>
							<?php $__currentLoopData = $line['modifiers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td>
										&nbsp;
									</td>
									<td>
			                            <?php echo e($modifier['name'], false); ?> <?php echo e($modifier['variation'], false); ?> 
			                            <?php if(!empty($modifier['sub_sku'])): ?>, <?php echo e($modifier['sub_sku'], false); ?> <?php endif; ?> <?php if(!empty($modifier['cat_code'])): ?>, <?php echo e($modifier['cat_code'], false); ?><?php endif; ?>
			                            <?php if(!empty($modifier['sell_line_note'])): ?>(<?php echo $modifier['sell_line_note']; ?>) <?php endif; ?> 
			                        </td>
									<td class="text-right sub-headings"><?php echo e($modifier['quantity'], false); ?> <?php echo e($modifier['units'], false); ?> </td>
									<?php if(empty($receipt_details->hide_price)): ?>
									<td class="text-right"><?php echo e($modifier['unit_price_inc_tax'], false); ?></td>
									<?php if(!empty($receipt_details->discounted_unit_price_label)): ?>
										<td class="text-right sub-headings"><?php echo e($modifier['unit_price_exc_tax'], false); ?></td>
									<?php endif; ?>
									<?php if(!empty($receipt_details->item_discount_label)): ?>
										<td class="text-right sub-headings">0.00</td>
									<?php endif; ?>
									<td class="text-right sub-headings"><?php echo e($modifier['line_total'], false); ?></td>
									<?php endif; ?>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    	<td <?php if(!empty($receipt_details->item_discount_label)): ?> colspan="6" <?php else: ?> colspan="5" <?php endif; ?>>&nbsp;</td>
                    	<?php if(!empty($receipt_details->discounted_unit_price_label)): ?>
    					<td></td>
    					<?php endif; ?>
                    </tr>
                </tbody>
            </table>
            <?php if(!empty($receipt_details->total_items_label)): ?>
				<div class="flex-box">
					<p class="left text-left sub-headings">
						 <?php echo $receipt_details->total_items_label; ?>  <?php echo e($receipt_details->total_items, false); ?>

					</p>
				</div>
			<?php endif; ?>
			
			<?php if(!empty($receipt_details->total_quantity_label)): ?>
				<div class="flex-box">
					<p class="left text-left sub-headings">
						<?php echo $receipt_details->total_quantity_label; ?>  <?php echo e($receipt_details->total_quantity, false); ?>

					</p>
				</div>
			<?php endif; ?>
			
			
			
		<?php if(empty($receipt_details->hide_price)): ?>
		
		
		
		
 <?php
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
?>


<div class="flex-box">
    <p class="left text-right sub-headings">SubTotal</p>
    <p class="width-50 text-right sub-headings">
        <?php echo e(number_format($base_imponible, 0, ',', '.'), false); ?>

    </p>
</div>



<?php if(!empty($receipt_details->taxes)): ?>
    <?php $__currentLoopData = $receipt_details->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="flex-box">
            <p class="left text-right sub-headings"><?php echo e($key, false); ?></p>
            <p class="width-50 text-right sub-headings"><?php echo e($val, false); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<div class="flex-box">
    <p class="left text-right sub-headings">TOTAL</p>
    <p class="width-50 text-right sub-headings">
        <?php echo e($receipt_details->total, false); ?>

    </p>
</div>



            
            
            

                <!-- Shipping Charges -->
				<?php if(!empty($receipt_details->shipping_charges)): ?>
					<div class="flex-box">
						<p class="left text-right sub-headings">
							<?php echo $receipt_details->shipping_charges_label; ?>

						</p>
						<p class="width-50 text-right sub-headings">
							<?php echo e($receipt_details->shipping_charges, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<?php if(!empty($receipt_details->packing_charge)): ?>
					<div class="flex-box">
						<p class="left text-right sub-headings">
							<?php echo $receipt_details->packing_charge_label; ?>

						</p>
						<p class="width-50 text-right sub-headings">
							<?php echo e($receipt_details->packing_charge, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<!-- Discount -->
				<?php if( !empty($receipt_details->discount) ): ?>
					<div class="flex-box">
						<p class="width-50 text-right sub-headings">
							<?php echo $receipt_details->discount_label; ?>

						</p>

						<p class="width-50 text-right sub-headings">
							(-) <?php echo e($receipt_details->discount, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<?php if( !empty($receipt_details->total_line_discount) ): ?>
					<div class="flex-box">
						<p class="width-50 text-right sub-headings">
							<?php echo $receipt_details->line_discount_label; ?>

						</p>

						<p class="width-50 text-right sub-headings">
							(-) <?php echo e($receipt_details->total_line_discount, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<?php if( !empty($receipt_details->additional_expenses) ): ?>
					<?php $__currentLoopData = $receipt_details->additional_expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="flex-box">
							<p class="width-50 text-right sub-headings">
								<?php echo e($key, false); ?>:
							</p>

							<p class="width-50 text-right sub-headings">
								(+) <?php echo e($val, false); ?>

							</p>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>

				<?php if(!empty($receipt_details->reward_point_label) ): ?>
					<div class="flex-box">
						<p class="width-50 text-right sub-headings">
							<?php echo $receipt_details->reward_point_label; ?>

						</p>

						<p class="width-50 text-right sub-headings">
							(-) <?php echo e($receipt_details->reward_point_amount, false); ?>

						</p>
					</div>
				<?php endif; ?>

			

				<?php if( $receipt_details->round_off_amount > 0): ?>
					<div class="flex-box">
						<p class="width-50 text-right sub-headings">
							<?php echo $receipt_details->round_off_label; ?> 
						</p>
						<p class="width-50 text-right sub-headings">
							<?php echo e($receipt_details->round_off, false); ?>

						</p>
					</div>
				<?php endif; ?>

		    	<!--<div class="flex-box">
					<p class="width-50 text-right sub-headings">
						<?php echo $receipt_details->total_label; ?>

					</p>
					<p class="width-50 text-right sub-headings">
						<?php echo e($receipt_details->total, false); ?>

					</p>
				</div> -->
				
				
				<?php if(!empty($receipt_details->total_in_words)): ?>
				<p colspan="2" class="text-right  sub-headings mb-0">
					<small>
					(<?php echo e($receipt_details->total_in_words, false); ?>)
					</small>
				</p>
				<?php endif; ?>
				<?php if(!empty($receipt_details->payments)): ?>
					<?php $__currentLoopData = $receipt_details->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="flex-box">
							<p class="width-50 text-right sub-headings"><?php echo e($payment['method'], false); ?>  </p>
							<p class="width-50 text-right sub-headings"><?php echo e($payment['amount'], false); ?></p>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>

				<!-- Total Paid-->
				<?php if(!empty($receipt_details->total_paid)): ?>
					<div class="flex-box">
						<p class="width-50 text-right sub-headings">
							<?php echo $receipt_details->total_paid_label; ?>

						</p>
						<p class="width-50 text-right sub-headings">
							<?php echo e($receipt_details->total_paid, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<!-- Total Due-->
				<?php if(!empty($receipt_details->total_due) && !empty($receipt_details->total_due_label)): ?>
					<div class="flex-box">
						<p class="width-50 text-right sub-headings">
							<?php echo $receipt_details->total_due_label; ?>

						</p>
						<p class="width-50 text-right sub-headings">
							<?php echo e($receipt_details->total_due, false); ?>

						</p>
					</div>
				<?php endif; ?>

				<?php if(!empty($receipt_details->all_due)): ?>
					<div class="flex-box">
						<p class="width-50 text-right sub-headings">
							<?php echo $receipt_details->all_bal_label; ?>

						</p>
						<p class="width-50 text-right sub-headings">
							<?php echo e($receipt_details->all_due, false); ?>

						</p>
					</div>
				<?php endif; ?>
			<?php endif; ?>
            
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
    <?php
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
    ?>

    <?php $__currentLoopData = $receipt_details->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
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
        ?>
        <tr>
            <td><?php echo e($key, false); ?></td>
            <td style="text-align:right;">
                <?php echo e(number_format($base_especifica, 0, ',', '.'), false); ?>

            </td>
            <td style="text-align:right;"><?php echo e($porcentaje, false); ?>%</td>
            <td style="text-align:right;"><?php echo e($val, false); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <tr style="border-top: 1px solid black; font-weight: bold;">
        <td>Total Imp</td>
        <td style="text-align:right;">
            
            <?php echo e(number_format($total_todas_las_bases, 0, ',', '.'), false); ?>

        </td>
        <td></td>
        <td style="text-align:right;">
            <?php echo e(number_format($total_impuestos_valor, 0, ',', '.'), false); ?>

        </td>
    </tr>
</tbody>
            </table>

            
            
            <div class="border-bottom width-100">&nbsp;</div>
            <?php if(empty($receipt_details->hide_price) && !empty($receipt_details->tax_summary_label) ): ?>

            
            <?php if(!empty($receipt_details->taxes)): ?> <?php endif; ?>
            
	            <!-- tax -->
	           <!-- <?php if(!empty($receipt_details->taxes)): ?>
	            	<table class="border-bottom width-100 table-f-12">
	            		<tr>
	            			<th colspan="2" class="text-center sub-headings"><?php echo e($receipt_details->tax_summary_label, false); ?></th>
	            		</tr>
	            		<?php $__currentLoopData = $receipt_details->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            			<tr>
	            				<td class="left sub-headings"><?php echo e($key, false); ?></td>
	            				<td class="right sub-headings"><?php echo e($val, false); ?></td>
	            			</tr>
	            		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	            	</table>
	            <?php endif; ?>
            <?php endif; ?> -->

            <?php if(!empty($receipt_details->additional_notes)): ?>
	            <p class="centered">
	            	<?php echo nl2br($receipt_details->additional_notes); ?>

	            </p>
            <?php endif; ?>

            
			<?php if($receipt_details->show_barcode): ?>
				<br/>
				<img class="center-block" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true), false); ?>">
			<?php endif; ?>

				
			<?php if($receipt_details->show_qr_code && !empty($receipt_details->qrstr)): ?>
                
				<b><p class="centered sub-headings">DOCUMENTO ELECTRÓNICO DE VENTA</b></p>
				<b><p class="centered sub-headings">Representación Gráfica de<br>Facturación Electrónica</b>
                    <img class="center-block mt-5" style="max-height: 150px; width: auto;"
                    src="data:image/png;base64,<?php echo e(DNS2D::getBarcodePNG($receipt_details->qrstr, 'QRCODE'), false); ?>">
                
                
			<?php endif; ?>
				<br>
            <?php if(!empty($receipt_details->cufe)): ?>
                <div class="cufe-section centered">
                    <b class="sub-headings">CUFE:</b><br>
                    <span class="sub-headings bw" style="display: block; line-height: 1.1;">
                        <?php echo $receipt_details->cufe; ?>

                    </span>
                </div>
            <?php endif; ?>
            
             <?php if($receipt_details->resolution != '-'): ?>
                <div class="centered sub-headings" style="margin-top: 5px; line-height: 1.1; font-size: 12px !important;">
                    <b>Res. DIAN N°: <?php echo $receipt_details->resolution; ?></b><br>
                    <b><?php echo e($receipt_details->resolution_prefix, false); ?> del <?php echo e($receipt_details->resolution_start_number, false); ?> al <?php echo e($receipt_details->resolution_end_number, false); ?></b><br>
                    <b>Vence: <?php echo e($receipt_details->resolution_date, false); ?> al <?php echo e($receipt_details->resolution_end_date, false); ?></b>
                </div>
            <?php endif; ?>
				<br>
			<?php if(!empty($receipt_details->footer_text)): ?>
				<p class="centered sub-headings">
					<?php echo $receipt_details->footer_text; ?>

				</p>
			<?php endif; ?>
        </div>
		<div class="border-bottom width-100">&nbsp;</div>
		<div class="textbox-info  sub-headings">
			
            <p class="text-center sub-headings">
                        Software <?php echo e(config('app.name', 'ultimatePOS'), false); ?> - V<?php echo e(config('author.app_version', 'title'), false); ?>

                    </b> &copy; <?php echo e(date('Y'), false); ?><br>Elaborado Por ZISCO Software<br>Nit:84.091.069-1  www.ziscoplus.com 
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
<?php /**PATH C:\laragon\www\POS\alizazip\resources\views/sale_pos/receipts/classic.blade.php ENDPATH**/ ?>