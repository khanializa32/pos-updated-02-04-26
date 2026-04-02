<br>
<?php echo app('translator')->get('lang_v1.allowed_file'); ?>:
	<?php $__currentLoopData = config('constants.document_upload_mimes_types'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if(!$loop->last): ?>
			<?php echo e($value . ',', false); ?>

		<?php else: ?>
			<?php echo e($value, false); ?>

	    <?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/components/document_help_text.blade.php ENDPATH**/ ?>