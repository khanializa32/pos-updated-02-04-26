<div class="modal-dialog modal-xl" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action([\Modules\Essentials\Http\Controllers\AttendanceController::class, 'store']), 'method' => 'post', 'id' => 'attendance_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'essentials::lang.add_latest_attendance' ); ?></h4>
    </div>

    <div class="modal-body">
    	<div class="row">
    		<div class="form-group col-md-12">
		        <?php echo Form::label('employee', __('essentials::lang.select_employee') . ':'); ?>

		        <?php echo Form::select('employee', $employees, null, ['class' => 'form-control select2', 'style' => 'width: 100%;', 'id' => 'select_employee', 'placeholder' => __('essentials::lang.select_employee') ]); ?>

    		</div>
    		<table class="table" id="employee_attendance_table">
    			<thead>
    				<th width="10%"><?php echo app('translator')->get('essentials::lang.employee'); ?></th>
    				<th width="15%"><?php echo app('translator')->get('essentials::lang.clock_in_time'); ?></th>
    				<th width="15%"><?php echo app('translator')->get('essentials::lang.clock_out_time'); ?></th>
    				<th width="15%"><?php echo app('translator')->get('essentials::lang.shift'); ?></th>
    				<th width="12%"><?php echo app('translator')->get('essentials::lang.ip_address'); ?></th>
    				<th width="15%"><?php echo app('translator')->get('essentials::lang.clock_in_note'); ?></th>
    				<th width="15%"><?php echo app('translator')->get('essentials::lang.clock_out_note'); ?></th>
    				<th width="3%">&nbsp;</th>
    			</thead>
    			<tbody>
    			</tbody>
    		</table>
    	</div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="tw-dw-btn bg-info tw-text-white tw-text-white"><?php echo app('translator')->get( 'messages.save' ); ?></button>
      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog --><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/Essentials/Providers/../Resources/views/attendance/create.blade.php ENDPATH**/ ?>