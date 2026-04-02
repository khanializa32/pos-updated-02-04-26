

<?php $__env->startSection('title', __('lang_v1.reset_password')); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-4">
    </div>
    <div class="col-md-4 col-xs-12">
        <div
            class=" tw-p-2 sm:tw-p-3 tw-mb-4 tw-transition-all tw-duration-200  tw-bg-white tw-shadow-sm tw-rounded-xl tw-ring-1 tw-ring-gray-200">
            <div class="tw-flex tw-flex-col tw-gap-4 tw-dw-rounded-box tw-dw-p-6 tw-dw-max-w-md">

                <h3 class="tw-text-sm tw-font-medium tw-text-gray-500 tw-self-center"><?php echo app('translator')->get('lang_v1.send_password_reset_link'); ?></h3>

                <?php if(session('status') && is_string(session('status'))): ?>
                    <div class="alert alert-info" role="alert"><?php echo e(session('status'), false); ?></div>
                <?php endif; ?>


                <form method="POST" action="<?php echo e(route('password.email'), false); ?>">
                    <?php echo e(csrf_field(), false); ?>

                    <div class="form-group has-feedback <?php echo e($errors->has('email') ? ' has-error' : '', false); ?>">
                        <label class="tw-dw-form-control">
                            <div class="tw-dw-label">
                                <span class="tw-text-xs md:tw-text-sm tw-font-medium tw-text-black"><?php echo app('translator')->get('Email'); ?></span>
                            </div>
                                <input id="email" type="email" class="tw-border tw-border-[#D1D5DA] tw-outline-none tw-h-12 tw-bg-transparent tw-rounded-lg tw-px-3 tw-font-medium tw-text-black placeholder:tw-text-gray-500 placeholder:tw-font-medium" name="email" value="<?php echo e(old('email'), false); ?>" required autofocus placeholder="<?php echo app('translator')->get('lang_v1.email_address'); ?>">

                                <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email'), false); ?></strong>
                                </span>
                            <?php endif; ?>
                        </label>
                    </div>

                    <button type="submit" class="tw-bg-gradient-to-r tw-from-indigo-500 tw-to-blue-500 tw-h-12 tw-rounded-xl tw-text-sm md:tw-text-base tw-text-white tw-font-semibold tw-w-full tw-max-w-full mt-2 hover:tw-from-indigo-600 hover:tw-to-blue-600 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-blue-500 focus:tw-ring-offset-2 active:tw-from-indigo-700 active:tw-to-blue-700">
                        <?php echo app('translator')->get('lang_v1.send_password_reset_link'); ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.change_lang').click(function() {
                window.location = "<?php echo e(route('password.request'), false); ?>?lang=" + $(this).attr('value');
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>