<?php
    $is_mobile = isMobile();
?>


                
                

                <?php if(!$is_mobile): ?>
                    <div class="hidden bg-navy pos-total text-white ">
					    <span class="text"><?php echo app('translator')->get('sale.total_payable'); ?></span>
					    <input type="hidden" name="final_total" 
												id="final_total_input" value=0>
					    <span id="total_payable" class="number">0</span>
					</div>
                    <div class="hidden pos-total md:tw-flex md:tw-items-center md:tw-gap-3 tw-hidden">
                        <div
                            class="tw-text-black tw-font-bold tw-text-base md:tw-text-2xl tw-flex tw-items-center tw-flex-col">
                            <div><?php echo app('translator')->get('sale.total'); ?></div>
                            <div><?php echo app('translator')->get('lang_v1.payable'); ?>:</div>
                        </div>
                        <input type="hidden" name="final_total" id="final_total_input" value="0.00">
                        <span id="total_payable"
                            class="tw-text-green-900 tw-font-bold tw-text-base md:tw-text-2xl number">0.00</span>
                    </div>
                <?php endif; ?>
            </div>

	         <div class="tw-w-full md:tw-w-fit tw-flex tw-flex-row tw-items-center tw-justify-center tw-gap-3 tw-hidden md:tw-flex">


                <?php if(!isset($pos_settings['hide_recent_trans']) || $pos_settings['hide_recent_trans'] == 0): ?>
                    <button
                        type="button"
                        data-toggle="modal"
                        data-target="#recent_transactions_modal" id="recent-transactions" class="tw-flex tw-items-center tw-justify-center tw-h-10 tw-w-10">
                        <i class="fas fa-layer-group tw-text-teal-600 tw-text-xl"></i>
                    </button>

                <?php endif; ?>
                
                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                    <button
                        type="button"
                        id="pos-quotation"
                        class="tw-flex tw-items-center tw-justify-center tw-h-10 tw-px-4 tw-font-bold tw-text-gray-700 tw-text-xs md:tw-text-sm"
                        <?php if(!empty($only_payment)): ?> disabled <?php endif; ?>>
                        <i class="fas fa-edit tw-text-[#E7A500] tw-mr-2"></i>
                        <?php echo app('translator')->get('lang_v1.quotation'); ?>
                    </button>
                <?php endif; ?>


                    </div>
                </div>
                </div>
               
                </div>

            <?php if(isset($transaction)): ?>
                <?php echo $__env->make('sale_pos.partials.edit_discount_modal', [
                    'sales_discount' => $transaction->discount_amount,
                    'discount_type' => $transaction->discount_type,
                    'rp_redeemed' => $transaction->rp_redeemed,
                    'rp_redeemed_amount' => $transaction->rp_redeemed_amount,
                    'max_available' => !empty($redeem_details['points']) ? $redeem_details['points'] : 0,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('sale_pos.partials.edit_discount_modal', [
                    'sales_discount' => $business_details->default_sales_discount,
                    'discount_type' => 'percentage',
                    'rp_redeemed' => 0,
                    'rp_redeemed_amount' => 0,
                    'max_available' => 0,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            
            <?php if(isset($transaction)): ?>
                <?php echo $__env->make('sale_pos.partials.edit_order_tax_modal', ['selected_tax' => $transaction->tax_id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('sale_pos.partials.edit_order_tax_modal', [
                    'selected_tax' => $business_details->default_sales_tax,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

<?php echo $__env->make('sale_pos.partials.edit_shipping_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/sale_pos/partials/pos_form_actions.blade.php ENDPATH**/ ?>