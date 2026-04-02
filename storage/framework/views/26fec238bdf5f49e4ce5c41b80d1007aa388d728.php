<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-condensed bg-white">
				<thead>
					<tr class="bg-purple">
						<th>SKU</th>
						<th><?php echo app('translator')->get('business.product'); ?></th>
						<th><?php echo app('translator')->get('business.location'); ?></th>
						<th><?php echo app('translator')->get('sale.unit_price'); ?></th>
						<th><?php echo app('translator')->get('report.current_stock'); ?></th>
						<th><?php echo app('translator')->get('lang_v1.total_stock_price'); ?></th>
						<th><?php echo app('translator')->get('report.total_unit_sold'); ?></th>
						<th><?php echo app('translator')->get('lang_v1.total_unit_transfered'); ?></th>
						<th><?php echo app('translator')->get('lang_v1.total_unit_adjusted'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $product_stock_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($product->sku, false); ?></td>
							<td>
								<?php
									$name = $product->product;
									if ($product->type == 'variable') {
										$name .= ' - ' . $product->product_variation . '-' . $product->variation_name;
									}
								?>
								<?php echo e($name, false); ?>

							</td>
							<td><?php echo e($product->location_name, false); ?></td>
							<td>
								<span class="display_currency" data-currency_symbol=true><?php echo e($product->unit_price ?? 0, false); ?></span>
							</td>
							<td>
								<span data-is_quantity="true" class="display_currency"
									data-currency_symbol=false><?php echo e($product->stock ?? 0, false); ?></span><?php echo e($product->unit, false); ?>

							</td>
							<td>
								<span class="display_currency" data-currency_symbol=true><?php echo e($product->unit_price * $product->stock, false); ?></span>
							</td>
							<td>
								<span data-is_quantity="true" class="display_currency"
									data-currency_symbol=false><?php echo e($product->total_sold ?? 0, false); ?></span><?php echo e($product->unit, false); ?>

							</td>
							<td>
								<span data-is_quantity="true" class="display_currency"
									data-currency_symbol=false><?php echo e($product->total_transfered ?? 0, false); ?></span><?php echo e($product->unit, false); ?>

							</td>
							<td>
								<span data-is_quantity="true" class="display_currency"
									data-currency_symbol=false><?php echo e($product->total_adjusted ?? 0, false); ?></span><?php echo e($product->unit, false); ?>

							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php if(!empty($batch_details) && $batch_details->count() > 0): ?>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<strong><?php echo app('translator')->get('lang_v1.lot_n_expiry'); ?> - <?php echo app('translator')->get('lang_v1.product_stock_details'); ?></strong>
		</div>
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-condensed table-bordered bg-white" style="margin-top:6px;">
					<thead>
						<tr class="bg-info">
							<th>#</th>
							<th><?php echo app('translator')->get('business.location'); ?></th>
							<?php if(session('business.enable_lot_number')): ?>
								<th><?php echo app('translator')->get('lang_v1.lot_number'); ?></th>
							<?php endif; ?>
							<th><?php echo app('translator')->get('lang_v1.expiry_date'); ?></th>
							<th><?php echo app('translator')->get('lang_v1.quantity_error_msg_in_lot', ['qty' => '', 'unit' => '']); ?>
								<?php echo app('translator')->get('report.current_stock'); ?>
							</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $today = \Carbon\Carbon::today(); ?>
						<?php $__currentLoopData = $batch_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
								$isExpired = !empty($batch->exp_date) && \Carbon\Carbon::parse($batch->exp_date)->lt($today);
								$rowClass = $isExpired ? 'bg-danger' : '';
							?>
							<tr class="<?php echo e($rowClass, false); ?>">
								<td><?php echo e($index + 1, false); ?></td>
								<td><?php echo e($batch->location_name, false); ?></td>
								<?php if(session('business.enable_lot_number')): ?>
									<td><?php echo e($batch->lot_number ?? '--', false); ?></td>
								<?php endif; ?>
								<td>
									<?php if(!empty($batch->exp_date)): ?>
										<?php echo e(\Carbon\Carbon::parse($batch->exp_date)->format(session('business.date_format', 'Y-m-d')), false); ?>

									<?php else: ?>
										<span class="label label-primary">No Expiry &ndash; Sold First</span>
									<?php endif; ?>
								</td>
								<td>
									<span class="label label-<?php echo e($isExpired ? 'danger' : 'success', false); ?>">
										<?php echo e($batch->qty_available, false); ?>

									</span>
								</td>
								<td>
									<?php if($isExpired): ?>
										<span class="label label-danger"><?php echo app('translator')->get('lang_v1.available_stock_expired'); ?></span>
									<?php else: ?>
										<span class="label label-success"><?php echo app('translator')->get('lang_v1.available'); ?></span>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif; ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/product/partials/product_stock_details.blade.php ENDPATH**/ ?>