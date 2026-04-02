
<?php $__env->startSection('title', 'Auxiliar de Retenciones'); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <h1>Reporte de Retenciones</h1>
</section>

<section class="content">
<div class="box">
<div class="box-body">

<form method="GET" action="<?php echo e(url('/accounting/retentions-accounting-report'), false); ?>">
    <div class="row">
        <div class="col-md-3">
            <label>Fecha Inicio</label>
            <input type="date" name="start_date" class="form-control" value="<?php echo e(request()->start_date, false); ?>">
        </div>

        <div class="col-md-3">
            <label>Fecha Fin</label>
            <input type="date" name="end_date" class="form-control" value="<?php echo e(request()->end_date, false); ?>">
        </div>

        <div class="col-md-4">
    <label>Tercero (Cliente / Proveedor)</label>
    <select name="contact_id" class="form-control select2" style="width: 100%;">
        <option value="">Todos</option>
        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($contact->id, false); ?>"
                <?php echo e(request()->contact_id == $contact->id ? 'selected' : '', false); ?>>
                <?php echo e($contact->name, false); ?> - <?php echo e($contact->contact_id, false); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

        <div class="col-md-2">
            <br>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-search"></i> Filtrar
            </button>
        </div>

        <div class="col-md-12" style="margin-top:10px;">
            <a href="<?php echo e(url('/accounting/generate-retention-certificates?year='.date('Y')), false); ?>" 
               class="btn btn-success">
               Generar certificados año <?php echo e(date('Y'), false); ?>

            </a>
        </div>
    </div>
</form>

<hr>

<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Comprobante</th>
            <th>Factura</th>
            <th>NIT</th>
            <th>Tercero</th>
            <th>Cuenta</th>
            <th>Centro Costo</th>
            <th>Base Retención</th>
            <th>Valor Retención</th>
            <th class="text-center">Acciones</th> 
        </tr>
    </thead>
    <tbody>
        <?php
            $total_base = 0;
            $total_retencion = 0;
        ?>

        <?php $__currentLoopData = $retentions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($r->fecha, false); ?></td>
            <td><?php echo e($r->comprobante, false); ?></td>
            <td><?php echo e($r->factura, false); ?></td>
            <td><?php echo e($r->nit, false); ?></td>
            <td><?php echo e($r->tercero, false); ?></td>
            <td><?php echo e($r->cuenta, false); ?></td>
            <td><?php echo e($r->centro_costo, false); ?></td>
            <td class="text-right"><?php echo e(number_format($r->base_retencion, 0), false); ?></td>
            <td class="text-right"><?php echo e(number_format($r->valor_retencion, 0), false); ?></td>
            <td class="text-center">
                
                <a href="<?php echo e(url('/accounting/download-certificate/'.$r->id), false); ?>" 
                   class="btn btn-xs btn-success" 
                   title="Descargar Certificado">
                    <i class="fa fa-download"></i>
                </a>
            </td>
        </tr>

        <?php
            $total_base += $r->base_retencion;
            $total_retencion += $r->valor_retencion;
        ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

    <tfoot>
        <tr>
            
            <th colspan="7" class="text-right">TOTALES</th>
            <th class="text-right"><?php echo e(number_format($total_base, 0), false); ?></th>
            <th class="text-right"><?php echo e(number_format($total_retencion, 0), false); ?></th>
            <th></th> 
        </tr>
    </tfoot>
</table>
</div>

</div>
</div>

<?php $__env->startSection('javascript'); ?>
<script>
$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Buscar tercero...",
        allowClear: true
    });
});
</script>
<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/Accounting/Providers/../Resources/views/report/retentions_accounting_report.blade.php ENDPATH**/ ?>