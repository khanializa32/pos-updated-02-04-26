<div class="row mini_print">
    <div class="col-sm-12">
        <table class="table table-condensed">
            <tr>
                <th><?php echo app('translator')->get('lang_v1.payment_method'); ?></th>
                <th><?php echo app('translator')->get('sale.sale'); ?></th>
                <th><?php echo app('translator')->get('lang_v1.expense'); ?></th>
            </tr>
            <tr>
                <td>
                    <?php echo app('translator')->get('cash_register.cash_in_hand'); ?>:
                </td>
                <td>
                    <span class="display_currency"
                        data-currency_symbol="true"><?php echo e($register_details->cash_in_hand, false); ?></span>
                </td>
                <td>--</td>
            </tr>
            <tr>
                <td>
                    <?php echo app('translator')->get('cash_register.cash_payment'); ?>:
                </td>
                <td>
                    <span class="display_currency"
                        data-currency_symbol="true"><?php echo e($register_details->total_cash, false); ?></span>
                </td>
                <td>
                    <span class="display_currency"
                        data-currency_symbol="true"><?php echo e($register_details->total_cash_expense, false); ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo app('translator')->get('cash_register.checque_payment'); ?>:
                </td>
                <td>
                    <span class="display_currency"
                        data-currency_symbol="true"><?php echo e($register_details->total_cheque, false); ?></span>
                </td>
                <td>
                    <span class="display_currency"
                        data-currency_symbol="true"><?php echo e($register_details->total_cheque_expense, false); ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo app('translator')->get('cash_register.card_payment'); ?>:
                </td>
                <td>
                    <span class="display_currency"
                        data-currency_symbol="true"><?php echo e($register_details->total_card, false); ?></span>
                </td>
                <td>
                    <span class="display_currency"
                        data-currency_symbol="true"><?php echo e($register_details->total_card_expense, false); ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo app('translator')->get('cash_register.bank_transfer'); ?>:
                </td>
                <td>
                    <span class="display_currency"
                        data-currency_symbol="true"><?php echo e($register_details->total_bank_transfer, false); ?></span>
                </td>
                <td>
                    <span class="display_currency"
                        data-currency_symbol="true"><?php echo e($register_details->total_bank_transfer_expense, false); ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo app('translator')->get('lang_v1.advance_payment'); ?>:
                </td>
                <td>
                    <span class="display_currency"
                        data-currency_symbol="true"><?php echo e($register_details->total_advance, false); ?></span>
                </td>
                <td>
                    <span class="display_currency"
                        data-currency_symbol="true"><?php echo e($register_details->total_advance_expense, false); ?></span>
                </td>
            </tr>
            <?php if(array_key_exists('custom_pay_1', $payment_types)): ?>
                <tr>
                    <td>
                        <?php echo e($payment_types['custom_pay_1'], false); ?>:
                    </td>
                    <td>
                        <span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_1, false); ?></span>
                    </td>
                    <td>
                        <span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_1_expense, false); ?></span>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if(array_key_exists('custom_pay_2', $payment_types)): ?>
                <tr>
                    <td>
                        <?php echo e($payment_types['custom_pay_2'], false); ?>:
                    </td>
                    <td>
                        <span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_2, false); ?></span>
                    </td>
                    <td>
                        <span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_2_expense, false); ?></span>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if(array_key_exists('custom_pay_3', $payment_types)): ?>
                <tr>
                    <td>
                        <?php echo e($payment_types['custom_pay_3'], false); ?>:
                    </td>
                    <td>
                        <span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_3, false); ?></span>
                    </td>
                    <td>
                        <span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_3_expense, false); ?></span>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if(array_key_exists('custom_pay_4', $payment_types)): ?>
                <tr>
                    <td>
                        <?php echo e($payment_types['custom_pay_4'], false); ?>:
                    </td>
                    <td>
                        <span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_4, false); ?></span>
                    </td>
                    <td>
                        <span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_4_expense, false); ?></span>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if(array_key_exists('custom_pay_5', $payment_types)): ?>
                <tr>
                    <td>
                        <?php echo e($payment_types['custom_pay_5'], false); ?>:
                    </td>
                    <td>
                        <span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_5, false); ?></span>
                    </td>
                    <td>
                        <span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_5_expense, false); ?></span>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if(array_key_exists('custom_pay_6', $payment_types)): ?>
                <tr>
                    <td>
                        <?php echo e($payment_types['custom_pay_6'], false); ?>:
                    </td>
                    <td>
                        <span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_6, false); ?></span>
                    </td>
                    <td>
                        <span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_6_expense, false); ?></span>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if(array_key_exists('custom_pay_7', $payment_types)): ?>
                <tr>
                    <td>
                        <?php echo e($payment_types['custom_pay_7'], false); ?>:
                    </td>
                    <td>
                        <span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_7, false); ?></span>
                    </td>
                    <td>
                        <span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_custom_pay_7_expense, false); ?></span>
                    </td>
                </tr>
            <?php endif; ?>
            <tr>
                <td>
                    <?php echo app('translator')->get('cash_register.other_payments'); ?>:
                </td>
                <td>
                    <span class="display_currency"
                        data-currency_symbol="true"><?php echo e($register_details->total_other, false); ?></span>
                </td>
                <td>
                    <span class="display_currency"
                        data-currency_symbol="true"><?php echo e($register_details->total_other_expense, false); ?></span>
                </td>
            </tr>
        </table>
        <hr>
        <table class="table table-condensed">
            <tr>
                <td>
                    a) <?php echo app('translator')->get('cash_register.total_sales'); ?>:
                </td>
                <td>
                    <span class="display_currency"
                        data-currency_symbol="true"><?php echo e($register_details->total_sale, false); ?></span>
                </td>
            </tr>
            <tr class="">
                <th>
                    b) <?php echo app('translator')->get('cash_register.total_refund'); ?>:
                </th>
                <td>
                    <b><span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_refund + ($modalSellReturnRefundTotal ?? 0), false); ?></span></b>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <small>
                        <?php ($cash_refund_total = $register_details->total_cash_refund + ($modalRefundsByMethod['cash'] ?? 0)); ?>
                        <?php if($cash_refund_total != 0): ?>
                            Efectivo: <span class="display_currency"
                                data-currency_symbol="true"><?php echo e($cash_refund_total, false); ?></span><br>
                        <?php endif; ?>
                        <?php ($cheque_refund_total = $register_details->total_cheque_refund + ($modalRefundsByMethod['cheque'] ?? 0)); ?>
                        <?php if($cheque_refund_total != 0): ?>
                            Mequi: <span class="display_currency"
                                data-currency_symbol="true"><?php echo e($cheque_refund_total, false); ?></span><br>
                        <?php endif; ?>
                        <?php ($card_refund_total = $register_details->total_card_refund + ($modalRefundsByMethod['card'] ?? 0)); ?>
                        <?php if($card_refund_total != 0): ?>
                            Tarjetas: <span class="display_currency"
                                data-currency_symbol="true"><?php echo e($card_refund_total, false); ?></span><br>
                        <?php endif; ?>
                        <?php ($bt_refund_total = $register_details->total_bank_transfer_refund + ($modalRefundsByMethod['bank_transfer'] ?? 0)); ?>
                        <?php if($bt_refund_total != 0): ?>
                            Tranferencia B: <span class="display_currency"
                                data-currency_symbol="true"><?php echo e($bt_refund_total, false); ?></span><br>
                        <?php endif; ?>
                        <?php ($cp1_refund_total = $register_details->total_custom_pay_1_refund + ($modalRefundsByMethod['custom_pay_1'] ?? 0)); ?>
                        <?php if(array_key_exists('custom_pay_1', $payment_types) && $cp1_refund_total != 0): ?>
                            <?php echo e($payment_types['custom_pay_1'], false); ?>: <span class="display_currency"
                                data-currency_symbol="true"><?php echo e($cp1_refund_total, false); ?></span><br>
                        <?php endif; ?>
                        <?php ($cp2_refund_total = $register_details->total_custom_pay_2_refund + ($modalRefundsByMethod['custom_pay_2'] ?? 0)); ?>
                        <?php if(array_key_exists('custom_pay_2', $payment_types) && $cp2_refund_total != 0): ?>
                            <?php echo e($payment_types['custom_pay_2'], false); ?>: <span class="display_currency"
                                data-currency_symbol="true"><?php echo e($cp2_refund_total, false); ?></span><br>
                        <?php endif; ?>
                        <?php ($cp3_refund_total = $register_details->total_custom_pay_3_refund + ($modalRefundsByMethod['custom_pay_3'] ?? 0)); ?>
                        <?php if(array_key_exists('custom_pay_3', $payment_types) && $cp3_refund_total != 0): ?>
                            <?php echo e($payment_types['custom_pay_3'], false); ?>: <span class="display_currency"
                                data-currency_symbol="true"><?php echo e($cp3_refund_total, false); ?></span><br>
                        <?php endif; ?>
                        <?php ($cp4_refund_total = $register_details->total_custom_pay_4_refund + ($modalRefundsByMethod['custom_pay_4'] ?? 0)); ?>
                        <?php if(array_key_exists('custom_pay_4', $payment_types) && $cp4_refund_total != 0): ?>
                            <?php echo e($payment_types['custom_pay_4'], false); ?>: <span class="display_currency"
                                data-currency_symbol="true"><?php echo e($cp4_refund_total, false); ?></span><br>
                        <?php endif; ?>
                        <?php ($cp5_refund_total = $register_details->total_custom_pay_5_refund + ($modalRefundsByMethod['custom_pay_5'] ?? 0)); ?>
                        <?php if(array_key_exists('custom_pay_5', $payment_types) && $cp5_refund_total != 0): ?>
                            <?php echo e($payment_types['custom_pay_5'], false); ?>: <span class="display_currency"
                                data-currency_symbol="true"><?php echo e($cp5_refund_total, false); ?></span><br>
                        <?php endif; ?>
                        <?php ($cp6_refund_total = $register_details->total_custom_pay_6_refund + ($modalRefundsByMethod['custom_pay_6'] ?? 0)); ?>
                        <?php if(array_key_exists('custom_pay_6', $payment_types) && $cp6_refund_total != 0): ?>
                            <?php echo e($payment_types['custom_pay_6'], false); ?>: <span class="display_currency"
                                data-currency_symbol="true"><?php echo e($cp6_refund_total, false); ?></span><br>
                        <?php endif; ?>
                        <?php ($cp7_refund_total = $register_details->total_custom_pay_7_refund + ($modalRefundsByMethod['custom_pay_7'] ?? 0)); ?>
                        <?php if(array_key_exists('custom_pay_7', $payment_types) && $cp7_refund_total != 0): ?>
                            <?php echo e($payment_types['custom_pay_7'], false); ?>: <span class="display_currency"
                                data-currency_symbol="true"><?php echo e($cp7_refund_total, false); ?></span><br>
                        <?php endif; ?>
                        <?php ($other_refund_total = $register_details->total_other_refund + ($modalRefundsByMethod['other'] ?? 0)); ?>
                        <?php if($other_refund_total != 0): ?>
                            Other: <span class="display_currency"
                                data-currency_symbol="true"><?php echo e($other_refund_total, false); ?></span>
                        <?php endif; ?>
                    </small>
                </td>
            </tr>
            <tr class="">
                <th>
                    c) <?php echo app('translator')->get('lang_v1.total_payment'); ?>:
                </th>
                <td>
                    <b><span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->cash_in_hand + $register_details->total_cash - $register_details->total_cash_refund - ($modalCashSellReturnRefund ?? 0), false); ?></span></b>
                </td>
            </tr>
            <tr class="">
                <th>
                    d) <?php echo app('translator')->get('lang_v1.credit_sales'); ?>:
                </th>
                <td>
                    <b><span class="display_currency"
                            data-currency_symbol="true"><?php echo e($details['transaction_details']->total_sales - $register_details->total_sale, false); ?></span></b>
                </td>
            </tr>
            <tr class="">
                <th>
                     e) <?php echo app('translator')->get('cash_register.total_sales'); ?> (a + d - b):
                </th>
                <td>
                        <b><span class="display_currency" data-currency_symbol="true">
                            <?php echo e(($details['transaction_details']->total_sales) - ($register_details->total_refund + ($modalSellReturnRefundTotal ?? 0)), false); ?></span></b>
                </td>
            </tr>
            <tr class="">
                <th>
                    f) <?php echo app('translator')->get('report.total_expense'); ?>:
                </th>
                <td>
                    <b><span class="display_currency"
                            data-currency_symbol="true"><?php echo e($register_details->total_expense, false); ?></span></b>
                </td>
            </tr>
            <tr class="">
                <th>
                    g) <?php echo app('translator')->get('cash_register.total_backend_payment'); ?> (<?php echo app('translator')->get('cash_register.cash_payment'); ?>):
                </th>
                <td>
                    <b><span class="display_currency" data-currency_symbol="true"><?php echo e($backendPaymentAmount, false); ?></span></b>
                </td>
            </tr>
            <tr class="">
                <th>
                    h) <?php echo app('translator')->get('cash_register.cash_withdrawals'); ?>:
                </th>
                <td>
                    <b><span class="display_currency" data-currency_symbol="true"><?php echo e($cashWithdrawalAmount, false); ?></span></b>
                </td>
            </tr>
        </table>

         <div class="form-group" style="font-size:18px; color:orange">
            <?php echo Form::label('closing_amount', __( 'cash_register.total_cash' ) . ':*'); ?>

            <?php echo Form::text('closing_amount', number_format($register_details->cash_in_hand + $backendPaymentAmount + $register_details->total_cash - $register_details->total_cash_refund - $register_details->total_cash_expense - ($modalCashSellReturnRefund ?? 0 ) - $cashWithdrawalAmount, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number', 'id' => 'system_amount', 'readonly']); ?>

        </div>
        <hr>
        <h4 style="color: red;"><?php echo app('translator')->get('lang_v1.credit_sales'); ?></h4>

        <?php if(!empty($creditSalesDetails) && count($creditSalesDetails) > 0): ?>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo app('translator')->get('lang_v1.customer'); ?></th>
                    <th><?php echo app('translator')->get('lang_v1.invoice'); ?></th>
                    <th class="text-right"><?php echo app('translator')->get('lang_v1.amount'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php ($credit_sales_total = 0); ?>
                <?php $__currentLoopData = $creditSalesDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($credit_sales_total += $sale->amount); ?>
                            <tr>
                                <td><?php echo e($key + 1, false); ?></td>
                                <td><?php echo e($sale->customer_name != '' ? $sale->customer_name : $sale->business_name, false); ?></td>
                                <td><?php echo e($sale->invoice_number, false); ?></td>
                                <td class="text-right">
                                    <span class="display_currency" data-currency_symbol="true"><?php echo e($sale->amount, false); ?></span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr class="active">
                                <th colspan="3"><?php echo app('translator')->get('sale.total'); ?></th>
                                <th class="text-right">
                                    <span class="display_currency"
                                        data-currency_symbol="true"><?php echo e($creditSalesDetails->sum('amount'), false); ?></span>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                <?php else: ?>
        <p class="text-muted"><?php echo app('translator')->get('lang_v1.no_data'); ?></p>
        <?php endif; ?>

        <hr>
        <h4 style="color: green;"><?php echo app('translator')->get('cash_register.total_backend_payment'); ?> <small>(<?php echo app('translator')->get('lang_v1.informational_purposes'); ?>)</small></h4>

        <?php if(!empty($backendPaymentsDetails) && count($backendPaymentsDetails) > 0): ?>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo app('translator')->get('lang_v1.customer'); ?></th>
                    <th class="text-right"><?php echo app('translator')->get('lang_v1.amount'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php ($backend_payments_total = 0); ?>
                <?php $__currentLoopData = $backendPaymentsDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($backend_payments_total += $payment->paid_amount); ?>
                <tr>
                    <td><?php echo e($key + 1, false); ?></td>
                    <td>
                        <?php if(!empty($payment->customer_name)): ?>
                            <?php echo e($payment->customer_name, false); ?>


                        <?php elseif(!empty($payment->business_name)): ?>
                            <?php echo e($payment->business_name, false); ?>


                        <?php elseif(isset($payment->child_payments[0]->transaction->contact)): ?>
                            <?php if(!empty($payment->child_payments[0]->transaction->contact->name)): ?>
                                <?php echo e($payment->child_payments[0]->transaction->contact->name, false); ?>

                            <?php elseif(!empty($payment->child_payments[0]->transaction->contact->supplier_business_name)): ?>
                                <?php echo e($payment->child_payments[0]->transaction->contact->supplier_business_name, false); ?>

                            <?php else: ?>
                                N/A
                            <?php endif; ?>

                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>

                    <td class="text-right">
                        <span class="display_currency" data-currency_symbol="true"><?php echo e($payment->paid_amount, false); ?></span>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr class="active">
                    <th colspan="2"><?php echo app('translator')->get('sale.total'); ?></th>
                    <th class="text-right">
                        <span class="display_currency" data-currency_symbol="true"><?php echo e($backend_payments_total, false); ?></span>
                    </th>
                </tr>
            </tfoot>
        </table>
        <?php endif; ?>

        <hr>
        <h4 style="color: green;"><?php echo app('translator')->get('lang_v1.payments_received_by_account'); ?> <small>(<?php echo app('translator')->get('lang_v1.informational_only'); ?>)</small></h4>

        <?php if(!empty($customerPaymentsByAccount) && count($customerPaymentsByAccount) > 0): ?>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo app('translator')->get('lang_v1.payment_account'); ?></th>
                    <th class="text-right"><?php echo app('translator')->get('lang_v1.amount'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php ($customer_payments_total = 0); ?>
                <?php $__currentLoopData = $customerPaymentsByAccount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($customer_payments_total += $payment->total_amount); ?>
                            <tr>
                                <td><?php echo e($key + 1, false); ?></td>
                                <td><?php echo e($payment->account_name, false); ?></td>
                                <td class="text-right">
                                    <span class="display_currency" data-currency_symbol="true"><?php echo e($payment->total_amount, false); ?></span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr class="active">
                                <th colspan="2"><?php echo app('translator')->get('sale.total'); ?></th>
                                <th class="text-right">
                                    <span class="display_currency" data-currency_symbol="true"><?php echo e($customer_payments_total, false); ?></span>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                <?php else: ?>
        <p class="text-muted"><?php echo app('translator')->get('lang_v1.no_data'); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php echo $__env->make('cash_register.register_product_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/cash_register/payment_details.blade.php ENDPATH**/ ?>