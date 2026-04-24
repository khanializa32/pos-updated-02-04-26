
<?php $__env->startSection('title', __('manufacturing::lang.production')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('manufacturing::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get('manufacturing::lang.production'); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('productstion_list_filter_location_id',  __('purchase.business_location') . ':'); ?>


                <?php echo Form::select('productstion_list_filter_location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all') ]); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo Form::label('production_list_filter_date_range', __('report.date_range') . ':'); ?>

                <?php echo Form::text('production_list_filter_date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'readonly']); ?>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="checkbox">
                    <br>
                    <label>
                      <?php echo Form::checkbox('production_list_is_final', 1, false, 
                      [ 'class' => 'input-icheck', 'id' => 'production_list_is_final']); ?> <?php echo e(__('manufacturing::lang.finalize'), false); ?>

                    </label>
                </div>
            </div>
        </div>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools">
                
                <a class="tw-dw-btn tw-bg--to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-black tw-border-none tw-rounded-full pull-right"
                    href="<?php echo e(action([\Modules\Manufacturing\Http\Controllers\ProductionController::class, 'create']), false); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" 
                                        viewBox="0 0 20 20" fill="none" stroke="teal" stroke-width="3" stroke-linecap="round"
                                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 5l0 14" />
                                            <path d="M5 12l14 0" />
                                        </svg> <?php echo app('translator')->get('messages.add_production'); ?>
                </a>
                
            </div>
        <?php $__env->endSlot(); ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="productions_table">
                 <thead>
                    <tr>
                        <th><?php echo app('translator')->get('messages.date'); ?></th>
                        <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                        <th><?php echo app('translator')->get('purchase.location'); ?></th>
                        <th><?php echo app('translator')->get('sale.product'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.quantity'); ?></th>
                        <th><?php echo app('translator')->get('manufacturing::lang.total_cost'); ?></th>
                        <th><?php echo app('translator')->get('messages.action'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    <?php echo $__env->renderComponent(); ?>
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <?php echo $__env->make('manufacturing::layouts.partials.common_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\POS\alizazip\Modules\Manufacturing\Providers/../Resources/views/production/index.blade.php ENDPATH**/ ?>