<?php
	$subtype = '';
?>
<?php if(!empty($transaction_sub_type)): ?>
	<?php
		$subtype = '?sub_type='.$transaction_sub_type;
	?>
<?php endif; ?>

<?php if(!empty($transactions)): ?>
	<table class="table">
		<?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr class="cursor-pointer" 
	    		title="Customer: <?php echo e($transaction->contact?->name, false); ?> 
		    		<?php if(!empty($transaction->contact->mobile) && $transaction->contact->is_default == 0): ?>
		    			<br/>Mobile: <?php echo e($transaction->contact->mobile, false); ?>

		    		<?php endif; ?>
	    		" >
				<td>
					<?php echo e($loop->iteration, false); ?>.
				</td>
				<td class="col-md-4">
					<?php echo e($transaction->invoice_no, false); ?> (<?php echo e($transaction->contact?->name, false); ?>)
					<?php if(!empty($transaction->table)): ?>
						- <?php echo e($transaction->table->name, false); ?>

					<?php endif; ?>
				</td>
				<td class="display_currency col-md-2">
					<?php echo e($transaction->final_total, false); ?>

				</td>
				<td class="">
			

	    			<a href="<?php echo e(action([\App\Http\Controllers\SellPosController::class, 'printInvoice'], [$transaction->id]), false); ?>" class="print-invoice-link tw-dw-btn tw-dw-btn-outline tw-dw-btn-success">
	    				<i class="fa fa-print text-muted" aria-hidden="true" title="<?php echo e(__('lang_v1.click_to_print'), false); ?>"></i>
                        <?php echo app('translator')->get('messages.print'); ?>
	    			</a>

                   
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
<?php else: ?>
	<p><?php echo app('translator')->get('sale.no_recent_transactions'); ?></p>
<?php endif; ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/sale_pos/partials/recent_transactions.blade.php ENDPATH**/ ?>