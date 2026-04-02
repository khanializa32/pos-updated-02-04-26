<div class="row pos_form_totals">
	<div class="col-md-12">
		<table class=" table table-condensed">
			<tbody style="display: flex">
				<tr style="display: flex; flex-direction: column; flex:1; font-size: ;">
					<b class="tw-text-base md:tw-text-lg tw-font-bold" style="font-size: 14px"><?php echo app('translator')->get('sale.item'); ?>:</b>&nbsp;
						<span class="total_quantity tw-text-base md:tw-text-lg tw-font-semibold" style="font-size: 20px ;color:purple">0</span>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					 <?php if(empty($edit)): ?>
                    <button type="button"
                        class=""
                        id="pos-cancel"> <i class="fas fa-trash"style=" font-size:18px ;color:red"></i> <?php echo app('translator')->get('Vaciar Carrito'); ?></button>
                <?php else: ?>
                    <button type="button"
                        class="tw-font-bold tw-text-white tw-cursor-pointer tw-text-xs md:tw-text-sm tw-bg-red-600 tw-p-2 tw-rounded-md tw-w-[9rem] tw-hidden md:tw-flex lg:tw-flex lg:tw-flex-row lg:tw-items-center lg:tw-justify-center lg:tw-gap-1 hide"
                        id="pos-delete" <?php if(!empty($only_payment)): ?> disabled <?php endif; ?>> <i
                            class="fas fa-trash"></i> <?php echo app('translator')->get('messages.delete'); ?></button>
                <?php endif; ?>
					
					<td <?php if(!Gate::check('disable_discount') || auth()->user()->can('superadmin') || auth()->user()->can('admin')): ?> class="" <?php else: ?> class="hide" <?php endif; ?>>
						<b class="tw-text-base md:tw-text-lg tw-font-bold" style="font-size: 14px">
							<?php if($is_discount_enabled): ?>
								<?php echo app('translator')->get('sale.discount'); ?>
								
							<?php endif; ?>
							<?php if($is_rp_enabled): ?>
								<?php echo e(session('business.rp_name'), false); ?>

							<?php endif; ?>
							<?php if($is_discount_enabled): ?>
								(-):
								<?php if($edit_discount): ?>
								<i class="fas fa-edit cursor-pointer" id="pos-edit-discount" title="<?php echo app('translator')->get('sale.edit_discount'); ?>" aria-hidden="true" style="font-size:24px ;color:red"data-toggle="modal" data-target="#posEditDiscountModal"></i>
								<?php endif; ?>

								<span class="tw-text-base md:tw-text-lg tw-font-semibold" id="total_discount" style="font-size: 14px">0</span>
							<?php endif; ?>
								<input type="hidden" name="discount_type" id="discount_type" value="<?php if(empty($edit)): ?><?php echo e('percentage', false); ?><?php else: ?><?php echo e($transaction->discount_type, false); ?><?php endif; ?>" data-default="percentage">
								<input type="hidden" name="discount_amount" id="discount_amount" value="<?php if(empty($edit)): ?> <?php echo e(number_format($business_details->default_sales_discount, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php else: ?> <?php echo e(number_format($transaction->discount_amount, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php endif; ?>" data-default="<?php echo e($business_details->default_sales_discount, false); ?>">
								<input type="hidden" name="rp_redeemed" id="rp_redeemed" value="<?php if(empty($edit)): ?><?php echo e('0', false); ?><?php else: ?><?php echo e($transaction->rp_redeemed, false); ?><?php endif; ?>">
								<input type="hidden" name="rp_redeemed_amount" id="rp_redeemed_amount" value="<?php if(empty($edit)): ?><?php echo e('0', false); ?><?php else: ?> <?php echo e($transaction->rp_redeemed_amount, false); ?> <?php endif; ?>">

								</span>
						</b> 
					
					
					<td class="<?php if($pos_settings['disable_order_tax'] != 0): ?> hide <?php endif; ?>">
						<span class="tw-text-base md:tw-text-lg tw-font-semibold">
							<b class="tw-text-base md:tw-text-lg tw-font-bold" style="font-size: 14px"><?php echo app('translator')->get('Imp'); ?>(+): </b>
							<i class="fas fa-edit cursor-pointer" title="<?php echo app('translator')->get('sale.edit_order_tax'); ?>" aria-hidden="true" style="font-size:24px ;color:orange" data-toggle="modal" data-target="#posEditOrderTaxModal" id="pos-edit-tax" ></i> 
							<span class="tw-text-base md:tw-text-lg tw-font-semibold" id="order_tax">
								<?php if(empty($edit)): ?>
									0
								<?php else: ?>
									<?php echo e($transaction->tax_amount, false); ?>

								<?php endif; ?>
							</span>
							<input type="hidden" name="tax_rate_id" 
								id="tax_rate_id" 
								value="<?php if(empty($edit)): ?> <?php echo e($business_details->default_sales_tax, false); ?> <?php else: ?> <?php echo e($transaction->tax_id, false); ?> <?php endif; ?>" 
								data-default="<?php echo e($business_details->default_sales_tax, false); ?>">

							<input type="hidden" name="tax_calculation_amount" id="tax_calculation_amount" 
								value="<?php if(empty($edit)): ?> <?php echo e(number_format($business_details->tax_calculation_amount, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php else: ?> <?php echo e(number_format($transaction->tax?->amount, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php endif; ?>" data-default="<?php echo e($business_details->tax_calculation_amount, false); ?>">
						</span>
					
					
						<span class="tw-text-base md:tw-text-lg tw-font-semibold">
							<b class="tw-text-base md:tw-text-lg tw-font-bold" style="font-size: 12px"><?php echo app('translator')->get(''); ?>   
								
							</b> 
							<i class="fas fa-motorcycle"  title="<?php echo app('translator')->get('sale.shipping'); ?>" aria-hidden="true" style="font-size:24px ;color:green" data-toggle="modal" data-target="#posShippingModal"></i>
							<span id="shipping_charges_amount" style="font-size: 14px">0</span>
							<input type="hidden" name="shipping_details" id="shipping_details" value="<?php if(empty($edit)): ?><?php echo e('', false); ?><?php else: ?><?php echo e($transaction->shipping_details, false); ?><?php endif; ?>" data-default="">
							<input type="hidden" name="shipping_address" id="shipping_address" value="<?php if(empty($edit)): ?><?php echo e('', false); ?><?php else: ?><?php echo e($transaction->shipping_address, false); ?><?php endif; ?>">
							<input type="hidden" name="shipping_status" id="shipping_status" value="<?php if(empty($edit)): ?><?php echo e('', false); ?><?php else: ?><?php echo e($transaction->shipping_status, false); ?><?php endif; ?>">
							<input type="hidden" name="delivered_to" id="delivered_to" value="<?php if(empty($edit)): ?><?php echo e('', false); ?><?php else: ?><?php echo e($transaction->delivered_to, false); ?><?php endif; ?>">
							<input type="hidden" name="delivery_person" id="delivery_person" value="<?php if(empty($edit)): ?><?php echo e('', false); ?><?php else: ?><?php echo e($transaction->delivery_person, false); ?><?php endif; ?>">
							<input type="hidden" name="shipping_charges" id="shipping_charges" value="<?php if(empty($edit)): ?><?php echo e(number_format(0.00, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php else: ?><?php echo e(number_format($transaction->shipping_charges, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> <?php endif; ?>" data-default="0.00">
						</span>
					
					<?php if(in_array('types_of_service', $enabled_modules)): ?>
						<td class="col-sm-10 col-xs-8 d-inline-table">
							<b class="tw-text-base md:tw-text-lg tw-font-bold" style="font-size: 14px"><?php echo app('translator')->get('lang_v1.packing_charge'); ?>(+):</b>
							<i class="fas fa-edit cursor-pointer service_modal_btn"aria-hidden="true" style="font-size:24px ;color:green"></i> 
							<span  class="tw-text-base md:tw-text-lg tw-font-semibold" style="font-size: 14px" id="packing_charge_text">
								0
							</span>
						
					<?php endif; ?>
					<?php if(!empty($pos_settings['amount_rounding_method']) && $pos_settings['amount_rounding_method'] > 0): ?>
					<td>
						<b class="tw-text-base md:tw-text-lg tw-font-bold" id="round_off"><?php echo app('translator')->get('lang_v1.round_off'); ?>:</b> <span id="round_off_text">0</span>								
						<input type="hidden" name="round_off_amount" id="round_off_amount" value=0>
					</td>
					<?php endif; ?>
				</tr>
				<tr style="align-content: center">
					<td style="border:0px; background-color: black; color: white; font-size: 28px">
						<b class=""><?php echo app('translator')->get('$'); ?></b> &nbsp;
						<span id="price_total" class="price_total"  >0</span>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php /**PATH C:\laragon\www\POS\alizazip\resources\views/sale_pos/partials/pos_form_totals.blade.php ENDPATH**/ ?>