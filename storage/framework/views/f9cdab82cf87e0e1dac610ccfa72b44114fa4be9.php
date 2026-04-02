<?php if($tables_enabled): ?>
<div class="col-sm-4">
	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon">
				<i class="fa fa-table"></i>
			</span>
			<?php echo Form::select('res_table_id', $tables, $view_data['res_table_id'], ['class' => 'form-control', 'placeholder' => __('restaurant.select_table')]); ?>

		</div>
	</div>
</div>
<?php endif; ?>
<?php if($waiters_enabled): ?>
<div class="col-sm-4">
	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon">
				<i class="fa fa-user-secret"></i>
			</span>
			<select class="form-control" name="res_waiter_id" id="res_waiter_id" <?php if($is_service_staff_required): ?> 
			required
			<?php endif; ?>>
				<option selected value=""><?php echo e(__('restaurant.select_service_staff'), false); ?></option>
				 <?php $__currentLoopData = $waiters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $waiter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option <?php echo e($waiter->id == $view_data['res_waiter_id'] ? 'selected' : '', false); ?> value="<?php echo e($waiter->id, false); ?>" data-is_enable="<?php echo e($waiter->is_enable_service_staff_pin, false); ?>"><?php echo e($waiter->first_name .  $waiter->last_name, false); ?></option>
				 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
			<?php if(!empty($pos_settings['inline_service_staff'])): ?>
			<div class="input-group-btn">
                <button type="button" class="btn btn-default bg-white btn-flat" id="select_all_service_staff" data-toggle="tooltip" title="<?php echo app('translator')->get('lang_v1.select_same_for_all_rows'); ?>"><i class="fa fa-check"></i></button>
            </div>
            <?php endif; ?>
		</div>
	</div>
</div>
<?php endif; ?><?php /**PATH C:\laragon\www\POS\alizazip\resources\views/restaurant/partials/pos_table_dropdown.blade.php ENDPATH**/ ?>