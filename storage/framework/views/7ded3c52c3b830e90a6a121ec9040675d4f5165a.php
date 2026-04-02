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
                <a class="navbar-brand" href="<?php echo e(action([\Modules\Accounting\Http\Controllers\AccountingController::class, 'dashboard']), false); ?>"><i class="fas fa fa-broadcast-tower"></i> <?php echo e(__('accounting::lang.accounting'), false); ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if(auth()->user()->can('accounting.manage_accounts')): ?>
                        <li <?php if(request()->segment(2) == 'chart-of-accounts'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action([\Modules\Accounting\Http\Controllers\CoaController::class, 'index']), false); ?>"><?php echo app('translator')->get('accounting::lang.chart_of_accounts'); ?></a></li>
                    <?php endif; ?>
                    
                    <?php if(auth()->user()->can('accounting.view_journal')): ?>
                        <li <?php if(request()->segment(2) == 'journal-entry'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action([\Modules\Accounting\Http\Controllers\JournalEntryController::class, 'index']), false); ?>"><?php echo app('translator')->get('accounting::lang.journal_entry'); ?></a></li>
                    <?php endif; ?>

                    <?php if(auth()->user()->can('accounting.view_transfer')): ?>
                        <li <?php if(request()->segment(2) == 'transfer'): ?> class="active" <?php endif; ?>>
                            <a href="<?php echo e(action([\Modules\Accounting\Http\Controllers\TransferController::class, 'index']), false); ?>">
                                <?php echo app('translator')->get('accounting::lang.transfer'); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <li <?php if(request()->segment(2) == 'transactions'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action([\Modules\Accounting\Http\Controllers\TransactionController::class, 'index']), false); ?>"><?php echo app('translator')->get('accounting::lang.transactions'); ?></a></li>

                    <!-- <?php if(auth()->user()->can('accounting.manage_budget')): ?>
                        <li <?php if(request()->segment(2) == 'budget'): ?> class="active" <?php endif; ?>>
                            <a href="<?php echo e(action([\Modules\Accounting\Http\Controllers\BudgetController::class, 'index']), false); ?>">
                                <?php echo app('translator')->get('accounting::lang.budget'); ?>
                            </a>
                        </li>
                    <?php endif; ?>  -->
                    
               <?php if(auth()->user()->can('accounting.view_reports')): ?>
                    <li <?php if(request()->segment(2) == 'reports'): ?> class="active" <?php endif; ?>><a href="<?php echo e(action([\Modules\Accounting\Http\Controllers\ReportController::class, 'index']), false); ?>">
                        <?php echo app('translator')->get('accounting::lang.reports'); ?>
                    </a></li>
                    <?php endif; ?>

                    <li class="dropdown <?php if(request()->segment(2) == 'settings' || request()->segment(2) == 'cost-centers' || request()->segment(2) == 'taxes'): ?> active open <?php endif; ?>">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-cogs"></i> <?php echo app('translator')->get('messages.settings'); ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li <?php if(request()->segment(2) == 'settings'): ?> class="active" <?php endif; ?>>
                                <a href="<?php echo e(action([\Modules\Accounting\Http\Controllers\SettingsController::class, 'index']), false); ?>">
                                    <i class="fa fa-wrench"></i> Asientos Automaticos
                                </a>
                            </li>
                             <li <?php if(request()->segment(2) == 'cost-centers'): ?> class="active" <?php endif; ?>>
                                <a href="<?php echo e(url('/accounting/cost-centers'), false); ?>">
                                    <i class="fa fa-map-marker"></i> Centros de Costos
                                </a>
                            </li>
                            
                            
                            <li class="<?php echo e(request()->segment(2) == 'retentions-accounting-report' ? 'active' : '', false); ?>">
                                <a href="<?php echo e(url('/accounting/retentions-accounting-report'), false); ?>">
                                    <i class="fa fa-file"></i> Retenciones
                                </a>
                            </li>                     


                            <li <?php if(request()->segment(2) == 'cost'): ?> class="active" <?php endif; ?>>
                                <a href="<?php echo e(url('/accounting/period'), false); ?>">
                                    <i class="fa fa-map"></i> Cierres de Periodo
                                </a>
                            </li>
                            
                            
                            
                            
   
                        </ul>
                    </li>
                    
                   
                    
                    <li class="dropdown 
                        <?php if(request()->segment(2) == 'exogena'): ?> active open <?php endif; ?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        
                        <i class="fa fa-file-text"></i> Información Exógena <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        
                        <li <?php if(request()->segment(3) == 'configuracion'): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('/accounting/exogena/configuracion'), false); ?>">
                            <i class="fa fa-cogs"></i> Configuración</a>
                        </li>
                        
                        <li <?php if(request()->segment(3) == 'generar'): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('/accounting/exogena/generar'), false); ?>">
                        <i class="fa fa-play"></i> Generar formatos</a>
                        </li>

                        </ul>
                        
                    </li>                    
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</section><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/Accounting/Providers/../Resources/views/layouts/nav.blade.php ENDPATH**/ ?>