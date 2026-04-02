<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action([\App\Http\Controllers\TaxRateController::class, 'store']), 'method' => 'post', 'id' => 'tax_rate_add_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'tax_rate.add_tax_rate' ); ?></h4>
    </div>

    <div class="modal-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <?php echo Form::label('name', __( 'tax_rate.name' ) . ':*'); ?>

              <?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'tax_rate.name' )]); ?>

          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?php echo Form::label('code', __( 'Tipo de Impuesto' ) . ':*'); ?>

              <?php echo Form::select('code', $taxes, null, ['class' => 'form-control', 'required', 'placeholder' => __( 'Seleccione el tipo de impuesto' )]); ?>


          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?php echo Form::label('amount', __( 'tax_rate.rate' ) . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tax_exempt_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
              <?php echo Form::text('amount', null, ['class' => 'form-control input_number', 'required']); ?>

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

        <?php echo Form::select('sales_account_id', $accounts, null, [
            'class' => 'form-control select2',
            'placeholder' => 'Seleccione cuenta'
        ]); ?>

    </div>
</div>
        
        <div class="col-md-6">
    <div class="form-group">
        <?php echo Form::label('purchase_account_id', 'Cuenta contable IVA compras:'); ?>

        <?php echo Form::select('purchase_account_id', $accounts, null, [
            'class' => 'form-control select2',
            'placeholder' => 'Seleccione cuenta'
        ]); ?>

    </div>
</div>
        
        
        <!-- FIN DELIO NOTE:  -->
        
      </div>
      


      <div class="form-group">
        <div class="checkbox">
          <label>
             <?php echo Form::checkbox('for_tax_group', 1, false, [ 'class' => 'input_icheck']); ?> <?php echo app('translator')->get( 'lang_v1.for_tax_group_only' ); ?>
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
      <button type="submit" class="tw-dw-btn bg-info tw-text-white"><?php echo app('translator')->get( 'Crear Impuesto' ); ?></button>
      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/tax_rate/create.blade.php ENDPATH**/ ?>