<div class="modal-dialog" role="document">
    <div class="modal-content">
        <?php echo Form::open(['url' => action([\App\Http\Controllers\CashWithdrawalController::class, 'store']), 'method' => 'post', 'id' => 'cash_withdrawal_form']); ?>

        
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><?php echo app('translator')->get('cash_register.add_cash_withdrawal'); ?></h4>
        </div>

        <div class="modal-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo Form::label('location_id', __('business.business_locations') . ':*'); ?>

                        <?php echo Form::select('location_id', $locations, null, ['class' => 'form-control select2', 'required']); ?>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo Form::label('amount', __('sale.amount') . ':*'); ?>

                        <?php echo Form::text('amount', null, ['class' => 'form-control input_number', 'id' => 'withdrawal-amount', 'required']); ?>

                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-12">
                    <div class="form-group">
                        <?php echo Form::label('note', __('lang_v1.suspend_note') . ':'); ?>

                        <?php echo Form::textarea('note', null, ['class' => 'form-control', 'rows' => 1]); ?>

                    </div>
                </div>

            </div>
        </div>

        <div class="modal-footer">
            <button type="submit"  id="submit-withdrawal-form" class="tw-dw-btn bg-info tw-text-white">
                <?php echo app('translator')->get('messages.save'); ?>
            </button>
            <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal">
                <?php echo app('translator')->get('messages.close'); ?>
            </button>
        </div>

        <?php echo Form::close(); ?>

    </div>
</div>
<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/cash_withdrawal/create_modal.blade.php ENDPATH**/ ?>