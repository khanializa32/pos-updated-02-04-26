

<?php $__env->startSection('title', __('accounting::lang.reports')); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('accounting::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get( 'accounting::lang.accounting_reports' ); ?></h1>
</section>

<section class="content">
    
    <section class="content-header">
        <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get('accounting::lang.colombian_reports'); ?></h1>
    </section>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get('accounting::lang.balance_general'); ?></h3>
                </div>
                <div class="box-body">
                    <?php echo app('translator')->get('accounting::lang.balance_general_desc'); ?>
                    <br/>
                    <a href="<?php echo e(route('accounting.balanceGeneral'), false); ?>" class="tw-dw-btn bg-success tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get('accounting::lang.view_report'); ?></a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get('accounting::lang.estado_resultados'); ?></h3>
                </div>
                <div class="box-body">
                    <?php echo app('translator')->get('accounting::lang.estado_resultados_desc'); ?>
                    <br/>
                    <a href="<?php echo e(route('accounting.estadoResultados'), false); ?>" class="tw-dw-btn bg-success tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get('accounting::lang.view_report'); ?></a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get('accounting::lang.flujo_efectivo'); ?></h3>
                </div>
                <div class="box-body">
                    <?php echo app('translator')->get('accounting::lang.flujo_efectivo_desc'); ?>
                    <br/>
                    <a href="<?php echo e(route('accounting.flujoEfectivo'), false); ?>" class="tw-dw-btn bg-success tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get('accounting::lang.view_report'); ?></a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get('accounting::lang.cambios_patrimonio'); ?></h3>
                </div>
                <div class="box-body">
                    <?php echo app('translator')->get('accounting::lang.cambios_patrimonio_desc'); ?>
                    <br/>
                    <a href="<?php echo e(route('accounting.cambiosPatrimonio'), false); ?>" class="tw-dw-btn bg-success tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get('accounting::lang.view_report'); ?></a>
                </div>
            </div>
        </div>
    </div>

    
    <section class="content-header">
        <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get('accounting::lang.colombian_detail_reports'); ?></h1>
    </section>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get('accounting::lang.auxiliares_cuenta'); ?></h3>
                </div>
                <div class="box-body">
                    <?php echo app('translator')->get('accounting::lang.auxiliares_cuenta_desc'); ?>
                    <br/>
                    <a href="<?php echo e(route('accounting.auxiliaresCuenta'), false); ?>" class="tw-dw-btn bg-info tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get('accounting::lang.view_report'); ?></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get('accounting::lang.libro_diario'); ?></h3>
                </div>
                <div class="box-body">
                    <?php echo app('translator')->get('accounting::lang.libro_diario_desc'); ?>
                    <br/>
                    <a href="<?php echo e(route('accounting.libroDiario'), false); ?>" class="tw-dw-btn bg-info tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get('accounting::lang.view_report'); ?></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get('accounting::lang.mayor_balance'); ?></h3>
                </div>
                <div class="box-body">
                    <?php echo app('translator')->get('accounting::lang.mayor_balance_desc'); ?>
                    <br/>
                    <a href="<?php echo e(route('accounting.mayorBalance'), false); ?>" class="tw-dw-btn bg-info tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get('accounting::lang.view_report'); ?></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get('accounting::lang.libro_inventarios'); ?></h3>
                </div>
                <div class="box-body">
                    <?php echo app('translator')->get('accounting::lang.libro_inventarios_desc'); ?>
                    <br/>
                    <a href="<?php echo e(route('accounting.libroInventarios'), false); ?>" class="tw-dw-btn bg-info tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get('accounting::lang.view_report'); ?></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get('accounting::lang.comprobantes'); ?></h3>
                </div>
                <div class="box-body">
                    <?php echo app('translator')->get('accounting::lang.comprobantes_desc'); ?>
                    <br/>
                    <a href="<?php echo e(route('accounting.comprobantes'), false); ?>" class="tw-dw-btn bg-info tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get('accounting::lang.view_report'); ?></a>
                </div>
            </div>
        </div>
    </div>

    
    <section class="content-header">
        <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get('accounting::lang.accounting_reports'); ?></h1>
    </section>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get( 'accounting::lang.trial_balance'); ?></h3>
                </div>

                <div class="box-body">
                    <?php echo app('translator')->get( 'accounting::lang.trial_balance_description'); ?>
                    <br/>
                    <a href="<?php echo e(route('accounting.trialBalance'), false); ?>" class="tw-dw-btn bg-info tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get( 'accounting::lang.view_report'); ?></a>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get( 'accounting::lang.ledger_report'); ?></h3>
                </div>

                <div class="box-body">
                    <?php echo app('translator')->get( 'accounting::lang.ledger_report_description'); ?>
                    <br/>
                    <a <?php if($ledger_url): ?> href="<?php echo e($ledger_url, false); ?>" <?php else: ?> onclick="alert(' <?php echo app('translator')->get( 'accounting::lang.ledger_add_account'); ?> ')" <?php endif; ?> class="tw-dw-btn bg-info tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get( 'accounting::lang.view_report'); ?></a>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get( 'accounting::lang.balance_sheet'); ?></h3>
                </div>

                <div class="box-body">
                    <?php echo app('translator')->get( 'accounting::lang.balance_sheet_description'); ?>
                    <br/>
                    <a href="<?php echo e(route('accounting.balanceSheet'), false); ?>" class="tw-dw-btn bg-info tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get( 'accounting::lang.view_report'); ?></a>
                </div>

            </div>
        </div>




       

    </div>
    <section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get( 'accounting::lang.auxiliary_reports' ); ?></h1>
    </section>
    </br>
    
    <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get( '*accounting::lang.account_recievable_ageing_report'); ?></h3>
                </div>
                <div class="box-body">
                    <?php echo app('translator')->get( 'accounting::lang.account_recievable_ageing_report_description'); ?>
                    <br/>
                    <a href="<?php echo e(route('accounting.account_receivable_ageing_report'), false); ?>" 
                    class="tw-dw-btn bg-info tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get( 'accounting::lang.view_report'); ?></a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get( 'accounting::lang.account_payable_ageing_report'); ?></h3>
                </div>
                <div class="box-body">
                    <?php echo app('translator')->get( 'accounting::lang.account_payable_ageing_report_description'); ?>
                    <br/>
                    <a href="<?php echo e(route('accounting.account_payable_ageing_report'), false); ?>" 
                    class="tw-dw-btn bg-info tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get( 'accounting::lang.view_report'); ?></a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get( 'accounting::lang.account_receivable_ageing_details'); ?></h3>
                </div>
                <div class="box-body">
                    <?php echo app('translator')->get( 'accounting::lang.account_receivable_ageing_details_description'); ?>
                    <br/>
                    <a href="<?php echo e(route('accounting.account_receivable_ageing_details'), false); ?>" 
                    class="tw-dw-btn bg-info tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get( 'accounting::lang.view_report'); ?></a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get( 'accounting::lang.account_payable_ageing_details'); ?></h3>
                </div>
                <div class="box-body">
                    <?php echo app('translator')->get( 'accounting::lang.account_payable_ageing_details_description'); ?>
                    <br/>
                    <a href="<?php echo e(route('accounting.account_payable_ageing_details'), false); ?>" 
                    class="tw-dw-btn bg-info tw-text-white tw-dw-btn-sm pt-2"><?php echo app('translator')->get( 'accounting::lang.view_report'); ?></a>
                </div>
            </div>
        </div>




</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/Accounting/Providers/../Resources/views/report/index.blade.php ENDPATH**/ ?>