<section class="no-print">
    <nav class="navbar-default tw-transition-all tw-duration-5000 tw-shrink-0 tw-rounded-2xl tw-m-[16px] tw-border-2 !tw-bg-white">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="margin-top: 3px; margin-right: 3px;">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(action([\Modules\Hms\Http\Controllers\HmsController::class, 'index']), false); ?>"><i class="fas fa-hotel"></i><?php echo app('translator')->get('hms::lang.hms'); ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hms.manage_rooms')): ?>
                    <ul class="nav navbar-nav">
                        <li <?php if(request()->segment(1) == 'hms' && request()->segment(2) == 'rooms'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action([Modules\Hms\Http\Controllers\RoomController::class, 'index']), false); ?>"><?php echo app('translator')->get('hms::lang.rooms'); ?></a></li>
                    </ul>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hms.manage_price')): ?>
                    <ul class="nav navbar-nav">
                        <li <?php if(request()->segment(1) == 'hms' && request()->segment(2) == 'room' && request()->segment(3) == 'pricing'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action([Modules\Hms\Http\Controllers\RoomController::class, 'pricing']), false); ?>"><?php echo app('translator')->get('hms::lang.prices'); ?></a></li>
                    </ul>
                <?php endif; ?>
                <ul class="nav navbar-nav">
                    <li <?php if(request()->segment(1) == 'hms' && request()->segment(2) == 'bookings'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action([Modules\Hms\Http\Controllers\HmsBookingController::class, 'index']), false); ?>"><?php echo app('translator')->get('hms::lang.bookings'); ?></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li <?php if(request()->segment(1) == 'hms' && request()->segment(2) == 'calendar'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action([Modules\Hms\Http\Controllers\HmsBookingController::class, 'calendar']), false); ?>"><?php echo app('translator')->get('hms::lang.calendar'); ?></a></li>
                </ul>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hms.manage_extra')): ?>
                    <ul class="nav navbar-nav">
                        <li <?php if(request()->segment(1) == 'hms' && request()->segment(2) == 'extras'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action([Modules\Hms\Http\Controllers\ExtraController::class, 'index']), false); ?>"><?php echo app('translator')->get('hms::lang.extras'); ?></a></li>
                    </ul>
                <?php endif; ?>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hms.manage_amenities')): ?>
                    <ul class="nav navbar-nav">
                            <li <?php if(request()->get('type') == 'amenities'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action([\App\Http\Controllers\TaxonomyController::class, 'index']) . '?type=amenities', false); ?>"><?php echo app('translator')->get('hms::lang.amenities'); ?></a></li>
                    </ul>
                <?php endif; ?>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hms.manage_unavailable')): ?>
                    <ul class="nav navbar-nav">
                        <li <?php if(request()->segment(1) == 'hms' && request()->segment(2) == 'unavailables'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action([Modules\Hms\Http\Controllers\UnavailableController::class, 'index']), false); ?>"><?php echo app('translator')->get('hms::lang.unavailable'); ?></a></li>
                    </ul>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hms.manage_coupon')): ?>
                    <ul class="nav navbar-nav">
                        <li <?php if(request()->segment(1) == 'hms' && request()->segment(2) == 'coupons'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action([Modules\Hms\Http\Controllers\HmsCouponController::class, 'index']), false); ?>"><?php echo app('translator')->get('hms::lang.coupons'); ?></a></li>
                    </ul>
                <?php endif; ?>
                <ul class="nav navbar-nav">
                    <li <?php if(request()->segment(1) == 'hms' && request()->segment(2) == 'reports'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action([Modules\Hms\Http\Controllers\HmsReportController::class, 'index']), false); ?>"><?php echo app('translator')->get('hms::lang.reports'); ?></a></li>
                </ul>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hms.manage_settings')): ?>
                    <ul class="nav navbar-nav">
                        <li <?php if(request()->segment(1) == 'hms' && request()->segment(2) == 'settings'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action([Modules\Hms\Http\Controllers\HmsSettingController::class, 'index']), false); ?>"><?php echo app('translator')->get('messages.settings'); ?></a></li>
                    </ul>
                <?php endif; ?>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/Hms/Resources/views/layouts/nav.blade.php ENDPATH**/ ?>