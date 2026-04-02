
<?php $__env->startSection('title', __('essentials::lang.hrm')); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('essentials::layouts.nav_hrm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Main content -->
    <section class="content">
        <div class="row ">
            <div class="col-md-4 col-sm-6 col-xs-12 col-custom">
                <?php $__env->startComponent('components.widget', [
                    'class' => '',
                    'title' => __('essentials::lang.my_leaves'),
                    'icon' => '<i class="fas fa-sign-out-alt"></i>',
                ]); ?>
                    <table class="table no-margin">
                        <thead>
                            <?php $__empty_1 = true; $__currentLoopData = $users_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <?php echo e(\Carbon::createFromTimestamp(strtotime($user_leave->start_date))->format(session('business.date_format')), false); ?>

                                        - <?php echo e(\Carbon::createFromTimestamp(strtotime($user_leave->end_date))->format(session('business.date_format')), false); ?>

                                    </td>
                                    <td>
                                        <?php echo e($user_leave->leave_type->leave_type, false); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <?php echo app('translator')->get('lang_v1.no_data'); ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </thead>
                    </table>
                <?php echo $__env->renderComponent(); ?>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 col-custom">
                <?php $__env->startComponent('components.widget', [
                    'class' => '',
                    'title' => __('essentials::lang.my_sales_targets'),
                    'icon' => '<i class="fas fa-bullseye"></i>',
                ]); ?>
                    <div class="">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <td>
                                        <strong><?php echo app('translator')->get('essentials::lang.target_achieved_last_month'); ?>:
                                        </strong>
                                        <h4 class="text-success"><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $target_achieved_last_month, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?></h4>
                                    </td>
                                    <td>
                                        <strong><?php echo app('translator')->get('essentials::lang.target_achieved_this_month'); ?>:
                                        </strong>
                                        <h4 class="text-success"><?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $target_achieved_this_month, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <?php echo app('translator')->get('essentials::lang.targets'); ?>
                                    </th>
                                    <th>
                                        <?php echo app('translator')->get('essentials::lang.commission_percent'); ?>
                                    </th>
                                </tr>
                                <?php $__empty_1 = true; $__currentLoopData = $sales_targets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $target): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $target->target_start, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?>
                                            - <?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $target->target_end, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?>
                                        </td>
                                        <td>
                                            <?php echo e(number_format($target->commission_percent, 2), false); ?>%
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <?php echo app('translator')->get('lang_v1.no_data'); ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </thead>
                        </table>
                    </div>
                <?php echo $__env->renderComponent(); ?>
            </div>
            <?php echo $__env->make('essentials::dashboard.birthdays', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(!$is_admin): ?>
                <?php echo $__env->make('essentials::dashboard.holidays', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                <a href="<?php echo e(action([\Modules\Essentials\Http\Controllers\PayrollController::class, 'getMyPayrolls']), false); ?>"
                    class="tw-dw-btn tw-dw-btn-lg bg-info tw-text-white tw-dw-btn-lg">
                    <i class="fas fa-coins"></i>
                    <?php echo app('translator')->get('essentials::lang.my_payrolls'); ?>
                </a>
            </div>
            
            <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                <a href="	https://antecedentes.policia.gov.co:7005/WebJudicial/antecedentes.xhtml" target=»_blank
                    class="tw-dw-btn tw-dw-btn-lg bg-info tw-text-white tw-dw-btn-lg">
                    <i class="fas fa-balance-scale"></i>
                    <?php echo app('translator')->get('essentials::lang.background'); ?>
                </a>
            </div>
            
            
            <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                <a href="https://ruaf.sispro.gov.co/Filtro.aspx" target=»_blank
                    class="tw-dw-btn tw-dw-btn-lg bg-info tw-text-white tw-dw-btn-lg">
                    <i class="fas fa-microscope"></i>
                    <?php echo app('translator')->get('essentials::lang.social_security'); ?>
                </a>
            </div>
        </div>
        <?php if($is_admin): ?>
            <hr>
        <?php endif; ?>
        <div class="row">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.view')): ?>
                <div class="col-md-4 col-sm-6 col-xs-12 col-custom">
                    <?php $__env->startComponent('components.widget', [
                        'class' => '',
                        'title' => __('user.users'),
                        'icon' => '<i class="fas fa-users"></i>',
                    ]); ?>
                        <table class="table no-margin">
                            <tr>
                                <th class="bg-light-gray" colspan="2"><?php echo app('translator')->get('home.today'); ?></th>
                            </tr>
                            <?php $__empty_1 = true; $__currentLoopData = $todays_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <?php echo e(\Carbon::createFromTimestamp(strtotime($leave->start_date))->format(session('business.date_format')), false); ?>

                                        - <?php echo e(\Carbon::createFromTimestamp(strtotime($leave->end_date))->format(session('business.date_format')), false); ?>

                                    </td>
                                    <td>
                                        <?php echo e($leave->leave_type->leave_type, false); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <?php echo app('translator')->get('lang_v1.no_data'); ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <th class="bg-light-gray" colspan="2"><?php echo app('translator')->get('lang_v1.upcoming'); ?></th>
                            </tr>
                            <?php $__empty_1 = true; $__currentLoopData = $upcoming_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <?php echo e(\Carbon::createFromTimestamp(strtotime($leave->start_date))->format(session('business.date_format')), false); ?>

                                        - <?php echo e(\Carbon::createFromTimestamp(strtotime($leave->end_date))->format(session('business.date_format')), false); ?>

                                    </td>
                                    <td>
                                        <?php echo e($leave->leave_type->leave_type, false); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <?php echo app('translator')->get('lang_v1.no_data'); ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    <?php echo $__env->renderComponent(); ?>
                </div>

            <?php endif; ?>
           
            <?php if($is_admin): ?>
                <?php echo $__env->make('essentials::dashboard.holidays', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
        <div class="row row-custom">
            
        </div>

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            if ($('#sales_targets_table').length) {
                var sales_targets_table = $('#sales_targets_table').DataTable({
                    processing: true,
                    serverSide: true,
                    searching: false,
                    scrollY: "75vh",
                    scrollX: true,
                    scrollCollapse: true,
                    dom: 'Btirp',
                    fixedHeader: false,
                    ajax: "<?php echo e(action([\Modules\Essentials\Http\Controllers\DashboardController::class, 'getUserSalesTargets']), false); ?>"
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/Essentials/Providers/../Resources/views/dashboard/hrm_dashboard.blade.php ENDPATH**/ ?>