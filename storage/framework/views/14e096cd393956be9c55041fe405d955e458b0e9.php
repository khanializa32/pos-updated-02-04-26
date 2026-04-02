<div class="modal fade" id="credit_create_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo Form::open(['url' => action([\App\Http\Controllers\LoanPaymentController::class, 'store']), 'contact' => $contact->id]); ?>

            <input type="hidden" name="contact_id" value="<?php echo e($contact->id, false); ?>">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Crear Creditos</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?php echo Form::label('amount', __( 'sale.amount' ) . ':*'); ?>

                      <?php echo Form::text('amount', null, ['class' => 'form-control input_number', 'required', 'placeholder' => __( 'sale.amount' ) ]); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('note', __( 'brand.note' ) . ':'); ?>

                      <?php echo Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => __( 'brand.note'), 'rows' => 3 ]); ?>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="tw-dw-btn tw-dw-btn-primary tw-text-white"><?php echo app('translator')->get( 'messages.submit' ); ?></button>
                <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
            </div>
            <?php echo Form::close(); ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->   
</div><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/contact/partials/edit_credits.blade.php ENDPATH**/ ?>