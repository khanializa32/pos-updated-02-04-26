<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action([\App\Http\Controllers\TaxRateController::class, 'update'], [$tax_rate->id]), 'method' => 'PUT', 'id' => 'tax_rate_edit_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'tax_rate.edit_taxt_rate' ); ?></h4>
    </div>

    <div class="modal-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <?php echo Form::label('name', __( 'tax_rate.name' ) . ':*'); ?>

              <?php echo Form::text('name', $tax_rate->name, ['class' => 'form-control', 'required', 'placeholder' => __( 'tax_rate.name' )]); ?>

          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <?php echo Form::label('amount', __( 'tax_rate.rate' ) . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tax_exempt_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
              <?php echo Form::text('amount', $tax_rate->amount, ['class' => 'form-control input_number', 'required']); ?>

          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <?php echo Form::label('code', __( 'Tipo de Impuesto' ) . ':*'); ?>

              <?php echo Form::select('code', $taxes, $tax_rate->code, ['class' => 'form-control', 'required', 'placeholder' => __( 'Seleccione el tipo de impuesto' )]); ?>

          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <?php echo Form::label('base', __( 'tax_rate.base' ) . ':'); ?>

              <?php echo Form::text('base', null, ['class' => 'form-control', 'placeholder' => __( 'tax_rate.base' )]); ?>

          </div>
        </div>
        
           <!-- DELIO NOTE: IT'S JUST THE VIEW; IT INDICATES THAT THE CHART OF ACCOUNTS MUST BE CALLED FROM THE DB -->
        
        <div class="col-md-6">
    <div class="form-group">
        <?php echo Form::label('sales_account_id', 'Cuenta contable IVA ventas:'); ?>

        <select name="sales_account_id" class="form-control select2-account">

<option value="">Seleccione cuenta</option>

<?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<option value="<?php echo e($account->id, false); ?>"
data-code="<?php echo e($account->gl_code, false); ?>"
<?php if($tax_rate->sales_account_id == $account->id): ?> selected <?php endif; ?>>

<?php echo e($account->gl_code, false); ?> - <?php echo e($account->name, false); ?>


</option>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</select>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <?php echo Form::label('purchase_account_id', 'Cuenta contable IVA compras:'); ?>

        <select name="purchase_account_id" class="form-control select2-account">

<option value="">Seleccione cuenta</option>

<?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<option value="<?php echo e($account->id, false); ?>"
data-code="<?php echo e($account->gl_code, false); ?>"
<?php if($tax_rate->purchase_account_id == $account->id): ?> selected <?php endif; ?>>

<?php echo e($account->gl_code, false); ?> - <?php echo e($account->name, false); ?>


</option>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</select>
    </div>
</div>
        
        <!-- FIN DELIO NOTE:  -->
        
      </div>

      <div class="form-group">
        <div class="checkbox">
          <label>
             <?php echo Form::checkbox('for_tax_group', 1, !empty($tax_rate->for_tax_group), [ 'class' => 'input_icheck']); ?> <?php echo app('translator')->get( 'lang_v1.for_tax_group_only' ); ?>
          </label> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.for_tax_group_only_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
        </div>
      </div>

    </div>

    <div class="modal-footer">
      <button type="submit" class="tw-dw-btn bg-info tw-text-white"><?php echo app('translator')->get( 'messages.update' ); ?></button>
      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<?php /**PATH C:\laragon\www\POS\alizazip\resources\views/tax_rate/edit.blade.php ENDPATH**/ ?>