
<?php $__env->startSection('title', __('hms::lang.hms')); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('hms::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="content no-print">
        <div class="row">
            <div class="col-md-4">
                

                <?php $__env->startComponent('components.widget'); ?>
                    <table class="table no-margin">
                        <tr>
                            <th><?php echo app('translator')->get('hms::lang.rooms_booked_today'); ?></th>
                            <td><?php echo e($room_count->booked_rooms ?? 0, false); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->get('hms::lang.pending_rooms_today'); ?></th>
                            <td><?php echo e($room_count->pending_rooms ?? 0, false); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->get('hms::lang.available_rooms_today'); ?></th>
                            <td><?php echo e($room_count->unbooked_rooms ?? 0, false); ?></td>
                        </tr>
                    </table>
                <?php echo $__env->renderComponent(); ?>

                <?php $__env->startComponent('components.widget', ['title' => __('hms::lang.available_rooms_by_type')]); ?>
                    <table class="table no-margin">
                        <?php $__currentLoopData = $unbooked_rooms_by_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($types->room_type, false); ?></th>
                                <td><?php echo e($types->unbooked_count ?? 0, false); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                <?php echo $__env->renderComponent(); ?>
                <?php $__env->startComponent('components.widget', ['title' => __('hms::lang.guests')]); ?>
                    <table class="table no-margin">
                        <tr>
                            <th><?php echo app('translator')->get('hms::lang.staying_tonight'); ?></th>
                            <td><?php echo e($guest_count_tonight->sum('adult_guests') + $guest_count_tonight->sum('child_guests'), false); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo app('translator')->get('hms::lang.adults'); ?></td>
                            <td><?php echo e($guest_count_tonight->sum('adult_guests') ?? 0, false); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo app('translator')->get('hms::lang.childrens'); ?></td>
                            <td><?php echo e($guest_count_tonight->sum('child_guests') ?? 0, false); ?></td>
                        </tr>
                    </table>
                    <table class="table no-margin">
                        <tr>
                            <th><?php echo app('translator')->get('hms::lang.arriving_today'); ?></th>
                            <td><?php echo e($arrive_today->sum('adult_guests') + $arrive_today->sum('child_guests'), false); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo app('translator')->get('hms::lang.adults'); ?></td>
                            <td><?php echo e($arrive_today->sum('adult_guests') ?? 0, false); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo app('translator')->get('hms::lang.childrens'); ?></td>
                            <td><?php echo e($arrive_today->sum('child_guests') ?? 0, false); ?></td>
                        </tr>
                    </table>
                    <table class="table no-margin">
                        <tr>
                            <th><?php echo app('translator')->get('hms::lang.leaving_today'); ?></th>
                            <td><?php echo e($leave_today->sum('adult_guests') + $leave_today->sum('child_guests'), false); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo app('translator')->get('hms::lang.adults'); ?></td>
                            <td><?php echo e($leave_today->sum('adult_guests') ?? 0, false); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo app('translator')->get('hms::lang.childrens'); ?></td>
                            <td><?php echo e($leave_today->sum('child_guests') ?? 0, false); ?></td>
                        </tr>
                    </table>
                <?php echo $__env->renderComponent(); ?>
            </div>
            <div class="col-md-4">

                <?php $__env->startComponent('components.widget'); ?>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#cn_1" data-toggle="tab" aria-expanded="true">
                                    <?php echo app('translator')->get('hms::lang.arrivals'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="#cn_2" data-toggle="tab" aria-expanded="true">
                                    <?php echo app('translator')->get('hms::lang.departures'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="#cn_3" data-toggle="tab" aria-expanded="true">
                                    <?php echo app('translator')->get('hms::lang.latest'); ?>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="cn_1">
                                <?php $__empty_1 = true; $__currentLoopData = $today_arrivales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php echo $__env->make('hms::dashboard.partial.booking_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php echo app('translator')->get('hms::lang.no_arrivals_today'); ?>
                                <?php endif; ?>
                            </div>
                            <div class="tab-pane" id="cn_2">
                                <?php $__empty_1 = true; $__currentLoopData = $today_departure; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php echo $__env->make('hms::dashboard.partial.booking_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php echo app('translator')->get('hms::lang.no_departures_today'); ?>
                                <?php endif; ?>
                            </div>
                            <div class="tab-pane" id="cn_3">
                                <?php $__empty_1 = true; $__currentLoopData = $latest_bookig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php echo $__env->make('hms::dashboard.partial.booking_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php echo app('translator')->get('hms::lang.no_latest'); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php echo $__env->renderComponent(); ?>
            </div>

            <div class="col-md-4">

                <?php $__env->startComponent('components.widget'); ?>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#chat_1" data-toggle="tab" aria-expanded="true">
                                    <?php echo app('translator')->get('hms::lang.upcoming_bookings'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="#chat_2" data-toggle="tab" aria-expanded="true">
                                    <?php echo app('translator')->get('hms::lang.past_bookings'); ?>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="chat_1">
                                <?php echo $booking_chart->container(); ?>

                            </div>
                            <div class="tab-pane" id="chat_2">
                                <?php echo $past_booking_chart->container(); ?>

                            </div>
                        </div>
                    </div>
                <?php echo $__env->renderComponent(); ?>


            </div>
        </div>
        </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('javascript'); ?>
        <?php echo $booking_chart->script(); ?>

        <?php echo $past_booking_chart->script(); ?>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/Hms/Resources/views/dashboard/index.blade.php ENDPATH**/ ?>