<div class="col-md-4 col-sm-6 col-xs-12 col-custom">
    <?php $__env->startComponent('components.widget', [
        'class' => '',
        'title' => __('essentials::lang.holidays'),
        'icon' => '<i class="fas fa-suitcase-rolling"></i>',
    ]); ?>
      <div class="">
        <table class="table no-margin">
            <tbody>
                <tr>
                    <th class="bg-light-gray" colspan="3"><?php echo app('translator')->get('home.today'); ?></th>
                </tr>
                <?php $__empty_1 = true; $__currentLoopData = $todays_holidays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holiday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $start_date = \Carbon::parse($holiday->start_date);
                        $end_date = \Carbon::parse($holiday->end_date);

                        $diff = $start_date->diffInDays($end_date);
                        $diff += 1;
                    ?>
                    <tr>
                        <td><?php echo e($holiday->name, false); ?></td>
                        <td><?php echo e(\Carbon::createFromTimestamp(strtotime($holiday->start_date))->format(session('business.date_format')), false); ?> (<?php echo e($diff . ' ' . Str::plural(__('lang_v1.day'), $diff), false); ?>)</td>
                        <td><?php echo e($holiday->location->name ?? __("lang_v1.all"), false); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3" class="text-center"><?php echo app('translator')->get('lang_v1.no_data'); ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <th class="bg-light-gray" colspan="3"><?php echo app('translator')->get('lang_v1.upcoming'); ?></th>
                </tr>
                <?php $__empty_1 = true; $__currentLoopData = $upcoming_holidays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holiday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $start_date = \Carbon::parse($holiday->start_date);
                        $end_date = \Carbon::parse($holiday->end_date);

                        $diff = $start_date->diffInDays($end_date);
                        $diff += 1;
                    ?>
                    <tr>
                        <td><?php echo e($holiday->name, false); ?></td>
                        <td><?php echo e(\Carbon::createFromTimestamp(strtotime($holiday->start_date))->format(session('business.date_format')), false); ?> (<?php echo e($diff . ' ' . Str::plural(__('lang_v1.day'), $diff), false); ?>)</td>
                        <td><?php echo e($holiday->location->name ?? __("lang_v1.all"), false); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3" class="text-center"><?php echo app('translator')->get('lang_v1.no_data'); ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php echo $__env->renderComponent(); ?>
</div><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/Essentials/Providers/../Resources/views/dashboard/holidays.blade.php ENDPATH**/ ?>