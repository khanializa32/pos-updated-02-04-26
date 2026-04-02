
<?php $__env->startSection('title',  __('cash_register.open_cash_register')); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">



</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get('cash_register.open_cash_register'); ?></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
<?php echo Form::open(['url' => action([\App\Http\Controllers\CashRegisterController::class, 'store']), 'method' => 'post', 
'id' => 'add_cash_register_form' ]); ?>

  <div class="box box-solid">
    <div class="box-body">
    <br><br><br>
    <input type="hidden" name="sub_type" value="<?php echo e($sub_type, false); ?>">
      <div class="row">
        <?php if($business_locations->count() > 0): ?>
        <div class="col-sm-8 col-sm-offset-2">
          <div class="form-group">
            <?php echo Form::label('amount', __('cash_register.cash_in_hand') . ':*'); ?>

            <?php echo Form::text('amount', null, ['class' => 'form-control input_number',
              'placeholder' => __('cash_register.enter_amount'), 'required']); ?>

          </div>
        </div>
        <?php if(count($business_locations) > 1): ?>
        <div class="clearfix"></div>
        <div class="col-sm-8 col-sm-offset-2">
          <div class="form-group">
            <?php echo Form::label('location_id', __('business.business_location') . ':'); ?>

              <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2',
              'placeholder' => __('lang_v1.select_location')]); ?>

          </div>
        </div>
        <?php else: ?>
          <?php echo Form::hidden('location_id', array_key_first($business_locations->toArray()) ); ?>

        <?php endif; ?>
        <?php if(count($cash_register_info) > 1): ?>
        <div class="clearfix"></div>
        <div class="col-sm-8 col-sm-offset-2">
          <div class="form-group">
            <?php echo Form::label('cash_register_information_id',   'Cajas Registradoras:'); ?>

              <?php echo Form::select('cash_register_information_id', $cash_register_info, null, ['class' => 'form-control select2',
              'placeholder' => 'Cajas Registradoras']); ?>

          </div>
        </div>
        <?php else: ?>
          <?php echo Form::hidden('cash_register_information_id', array_key_first($cash_register_info->toArray()) ); ?>

        <?php endif; ?>
        <div class="col-sm-8 col-sm-offset-2">
          <button type="submit" class="tw-dw-btn tw-dw-btn-success tw-text-white pull-right"><?php echo app('translator')->get('cash_register.open_register'); ?></button>
        </div>
        <?php else: ?>
        <div class="col-sm-8 col-sm-offset-2 text-center">
          <h3><?php echo app('translator')->get('lang_v1.no_location_access_found'); ?></h3>
        </div>
      <?php endif; ?>
      </div>
      <br><br><br>
    </div>
  </div>
  <?php echo Form::close(); ?>

</section>

    <script>
            document.addEventListener('DOMContentLoaded', function () {
            
                const amountInput = document.querySelector('input[name="amount"]');
            
                if (amountInput) {
            
                    // Formatear mientras escribe
                    amountInput.addEventListener('input', function (e) {
                        let value = this.value.replace(/\./g, '').replace(/[^0-9]/g, '');
            
                        if (value !== '') {
                            this.value = new Intl.NumberFormat('es-CO').format(value);
                        } else {
                            this.value = '';
                        }
                    });
            
                    // Antes de enviar el formulario quitar los puntos
                    document.getElementById('add_cash_register_form')
                        .addEventListener('submit', function () {
                            amountInput.value = amountInput.value.replace(/\./g, '');
                        });
                }
            });
    </script>

<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/cash_register/create.blade.php ENDPATH**/ ?>