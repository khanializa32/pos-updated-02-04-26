<div class="col-md-12">
    <div class="box box-solid payment_row bg-lightgray">
        <?php if($removable): ?>
            <div class="box-header">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool remove_payment_row"><i
                            class="fa fa-times fa-2x"></i></button>
                </div>
            </div>
        <?php endif; ?>

        <?php if(!empty($payment_line['id'])): ?>
            <?php echo Form::hidden("payment[$row_index][payment_id]", $payment_line['id']); ?>

        <?php endif; ?>

        <?php
            $pos_settings = !empty(session()->get('business.pos_settings')) ? json_decode(session()->get('business.pos_settings'), true) : [];
            $show_in_pos = '';
            if (isset($pos_settings['enable_cash_denomination_on']) && ($pos_settings['enable_cash_denomination_on'] == 'all_screens' || $pos_settings['enable_cash_denomination_on'] == 'pos_screen')) {
                $show_in_pos = true;
            }
        ?>

        <div class="box-body">
            <?php echo $__env->make('sale_pos.partials.payment_row_form', [
                'row_index' => $row_index,
                'payment_line' => $payment_line,
                'show_denomination' => true,
				'show_in_pos' => $show_in_pos
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/sale_pos/partials/payment_row.blade.php ENDPATH**/ ?>