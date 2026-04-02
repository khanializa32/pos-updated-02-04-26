<div class="modal fade" id="add_payment_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo Form::open(['url' => action([\App\Http\Controllers\TransactionPaymentController::class, 'add_payment']), 'method' => 'post']); ?>

            <input type="hidden" name="contact_id" value="<?php echo e($contact->id, false); ?>">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo app('translator')->get('lang_v1.purchase_payment'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?php echo Form::label('payment_date', __( 'lang_v1.date' ) . ':*'); ?>

                      <?php echo Form::text('date', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'lang_v1.date' ), 'id' => 'payment_date']); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('amount', __( 'sale.amount' ) . ':*'); ?>

                      <?php echo Form::text('amount', null, ['class' => 'form-control input_number', 'required', 'placeholder' => __( 'sale.amount' ) ]); ?>

                </div>

                <?php if($contact->type == 'both'): ?>
                <div class="form-group">
                    <?php echo Form::label('sub_type', __( 'lang_v1.payment_for' ) . ':'); ?>

                      <?php echo Form::select('sub_type', ['sell_payment' => __('sale.sale'), 'purchase_payment' => __('lang_v1.purchase')], 'sell', ['class' => 'form-control', 'required' ]); ?>

                </div>
                <?php endif; ?>
                <div class="form-group">
                    <?php echo Form::label('note', __( 'brand.note' ) . ':'); ?>

                      <?php echo Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => __( 'brand.note'), 'rows' => 3 ]); ?>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="tw-dw-btn tw-dw-btn-lg bg-info tw-text-white"><?php echo app('translator')->get( 'messages.submit' ); ?></button>
                <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
            </div>
            <?php echo Form::close(); ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->   
</div>
<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/contact/partials/add_payment.blade.php ENDPATH**/ ?>