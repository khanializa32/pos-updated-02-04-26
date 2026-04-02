<?php $__env->startSection('title', 'Importar PUC Colombia'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('accounting::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black">Importar Plan Único de Cuentas (PUC)</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <?php if(session('error')): ?>
                <div class="alert alert-danger"><?php echo e(session('error'), false); ?></div>
            <?php endif; ?>

            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Subir archivo Excel Con Cuentas PUC</h3>
                </div>

                <?php echo Form::open(['route' => 'accounting.import-puc.store', 'method' => 'post', 'files' => true]); ?>


                <div class="box-body">
                    <div class="alert alert">
                        <strong style="color: black;">Formato requerido del archivo Excel:</strong>
                        <table class="table table-bordered table-condensed" style="margin-top:10px; background: #fff; color: #333;">
                            <thead>
                                <tr style="background: #f5f5f5; color: #333;">
                                    <th style="color: #333;">Columna</th>
                                    <th style="color: #333;">Campo</th>
                                    <th style="color: #333;">Ejemplo</th>
                                    <th style="color: #333;">Obligatorio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td style="color:#333;">A</td><td style="color:#333;">Código (PUC)</td><td style="color:#333;">110505</td><td style="color:#333;"><strong>Sí</strong></td></tr>
                                <tr><td style="color:#333;">B</td><td style="color:#333;">Nombre de la Cuenta</td><td style="color:#333;">Caja General</td><td style="color:#333;"><strong>Sí</strong></td></tr>
                                <tr><td style="color:#333;">C</td><td style="color:#333;">Clase</td><td style="color:#333;">Asset, Liability, etc.</td><td style="color:#333;">No (auto-detecta)</td></tr>
                                <tr><td style="color:#333;">D</td><td style="color:#333;">Naturaleza</td><td style="color:#333;">Debit / Credit</td><td style="color:#333;">No (auto-detecta)</td></tr>
                                <tr><td style="color:#333;">E</td><td style="color:#333;">Requiere Tercero</td><td style="color:#333;">Yes / No</td><td style="color:#333;">No</td></tr>
                                <tr><td style="color:#333;">F</td><td style="color:#333;">Requiere Centro de Costos</td><td style="color:#333;">Yes / No</td><td style="color:#333;">No</td></tr>
                                <tr><td style="color:#333;">G</td><td style="color:#333;">Nivel</td><td style="color:#333;">account_type, Group, etc.</td><td style="color:#333;">No (auto-detecta)</td></tr>
                            </tbody>
                        </table>
                        <p class="small" style="margin-top:5px; color: black;">Solo las columnas A (Código) y B (Nombre) son obligatorias. El resto se auto-detecta según el código PUC.
                        La primera fila se toma como encabezado y se omite.</p>
                    </div>

                    <div class="form-group">
                        <?php echo Form::label('puc_file', 'Archivo Excel (.xlsx, .xls, .csv):*'); ?>

                        <?php echo Form::file('puc_file', ['accept' => '.xlsx,.xls,.csv', 'required', 'class' => 'form-control']); ?>

                    </div>

                    <div class="alert alert-">
                        <i class="fas fa-exclamation-triangle"></i>
                        Las cuentas con código PUC duplicado serán omitidas automáticamente.
                        La jerarquía padre-hijo se establece automáticamente según la longitud del código.
                    </div>
                </div>

                <div class="box-footer">
                    <a href="<?php echo e(action([\Modules\Accounting\Http\Controllers\CoaController::class, 'index']), false); ?>" class="tw-dw-btn tw-dw-btn-neutral tw-text-white">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                    <button type="submit" class="tw-dw-btn pull-right" style="background-color: #20B2AA; color: white; border: none;">
    <i class="fas fa-file-import"></i> Importar Cuentas PUC
</button>
                </div>

                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/Accounting/Providers/../Resources/views/chart_of_accounts/import_puc.blade.php ENDPATH**/ ?>