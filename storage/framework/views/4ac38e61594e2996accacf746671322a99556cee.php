
<?php $__env->startSection('title', __('business.business_locations')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get( 'business.business_locations' ); ?>
        <small class="tw-text-sm md:tw-text-base tw-text-gray-700 tw-font-semibold"><?php echo app('translator')->get( 'business.manage_your_business_locations' ); ?></small>
        
        <button class="tw-dw-btn tw-bg--to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-black tw-border-none tw-rounded-full pull-right tw-mb-2 btn-modal"
                    data-href="<?php echo e(action([\App\Http\Controllers\BusinessLocationController::class, 'create']), false); ?>" 
                    data-container=".location_add_modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                        viewBox="0 0 20 20" fill="none" stroke="" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 5l0 14" />
                                            <path d="M5 12l14 0" />
                                        </svg> <?php echo app('translator')->get(''); ?>
                </button>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <?php $__env->startComponent('components.widget', ['class' => 'box-primary', 'title' => __( 'business.all_your_business_locations' )]); ?>
        <?php $__env->slot('tool'); ?>
            <div class="box-tools">
               
                
            </div>
        <?php $__env->endSlot(); ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="business_location_table">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get( 'invoice.name' ); ?></th>
                        <th><?php echo app('translator')->get( 'lang_v1.location_id' ); ?></th>
                        <th><?php echo app('translator')->get( 'business.landmark' ); ?></th>
                        <th><?php echo app('translator')->get( 'business.city' ); ?></th>
                        <th><?php echo app('translator')->get( 'business.zip_code' ); ?></th>
                        <th><?php echo app('translator')->get( 'business.state' ); ?></th>
                        <th><?php echo app('translator')->get( 'business.country' ); ?></th>
                        <th><?php echo app('translator')->get( 'lang_v1.price_group' ); ?></th>
                        <th><?php echo app('translator')->get( 'invoice.invoice_scheme' ); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.invoice_layout_for_pos'); ?></th>
                        <th><?php echo app('translator')->get('lang_v1.invoice_layout_for_sale'); ?></th>
                        <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade location_add_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade location_edit_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\POS\alizazip\resources\views/business_location/index.blade.php ENDPATH**/ ?>