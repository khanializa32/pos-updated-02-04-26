<div class="row">
    <div class="col-md-12">
        <?php $__env->startComponent('components.widget', ['title' => __('lang_v1.more_info')]); ?>
            <?php echo $__env->make('user.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->renderComponent(); ?>
    </div>
</div>
<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/user/edit_profile_form_part.blade.php ENDPATH**/ ?>