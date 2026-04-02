
<?php $__env->startSection('title', __('cash_register.cash_register')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get( 'cash_register.cash_register' ); ?>
        <small class="tw-text-sm md:tw-text-base tw-text-gray-700 tw-font-semibold"><?php echo app('translator')->get( 'cash_register.manage_your_cash_register' ); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-header">
        	<h3 class="box-title"><?php echo app('translator')->get( 'cash_register.all_your_cash_register' ); ?></h3>
        	<div class="box-tools">
    <a href="<?php echo e(action([\App\Http\Controllers\CashRegisterController::class, 'create']), false); ?>" 
       class="btn btn-block btn-warning">
        <i class="fa fa-plus"></i> <?php echo app('translator')->get('messages.add'); ?>
    </a>
</div>
        </div>
        <div class="box-body">
        	<table class="table table-bordered table-striped" id="cash_registers_table">
        		<thead>
        			<tr>
        				<th><?php echo app('translator')->get( 'invoice.name' ); ?></th>
                        <th><?php echo app('translator')->get( 'messages.action' ); ?></th>
        			</tr>
        		</thead>
        	</table>
        </div>
    </div>

    <div class="modal fade location_add_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade location_edit_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/cash_register/index.blade.php ENDPATH**/ ?>