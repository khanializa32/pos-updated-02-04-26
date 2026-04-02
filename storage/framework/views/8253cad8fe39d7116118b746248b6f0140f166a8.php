

<?php $__env->startSection('title', 'Configuración Información Exógena'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('accounting::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="content-header">
    <h1>Configuración Información Exógena</h1>
</section>

<section class="content">

<form method="POST" action="<?php echo e(route('exogena.save'), false); ?>">
<?php echo csrf_field(); ?>

<div class="box box-primary">

<div class="box-header with-border">

<div class="row">

<div class="col-md-2">

<label>Año gravable</label>

<select class="form-control" name="anio">

<option value="2024">2024</option>
<option value="2023">2023</option>
<option value="2022">2022</option>

</select>

</div>

<div class="col-md-10 text-right" style="margin-top:25px">

<button type="button" class="btn btn-success" id="add_row">

<i class="fa fa-plus"></i> Agregar registro

</button>

<button type="submit" class="btn btn-primary">
<i class="fa fa-save"></i> Guardar configuración
</button>

</div>

</div>

</div>


<div class="box-body">

<table class="table table-bordered table-striped" id="tabla_exogena">

<thead>

<tr>

<th width="25%">Cuenta contable</th>
<th width="15%">Formato</th>
<th width="20%">Concepto DIAN</th>
<th width="15%">Categoría</th>
<th width="15%">Valor</th>
<th width="5%"></th>

</tr>

</thead>

<tbody>

<tr>

<td>

<select class="form-control" name="cuenta[]">
    <option value="">Seleccione cuenta</option>
    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($account->id, false); ?>">
            <?php echo e($account->gl_code, false); ?> - <?php echo e($account->name, false); ?>

        </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>


</td>

<td>

<select class="form-control formato_select" name="formato[]">

<option value="">Seleccione</option>

<?php $__currentLoopData = $formatos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<option value="<?php echo e($f->formato, false); ?>">
<?php echo e($f->formato, false); ?>

</option>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</select>

</td>

<td>

<select class="form-control concepto_select" name="concepto[]">

<option value="">Seleccione concepto</option>

<?php $__currentLoopData = $conceptos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<option value="<?php echo e($c->concepto, false); ?>" data-formato="<?php echo e($c->formato, false); ?>">

<?php echo e($c->concepto, false); ?> - <?php echo e($c->descripcion, false); ?>


</option>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</select>

</td>

<td>

<select class="form-control" name="categoria[]">

<option value="debito">Débito</option>
<option value="credito">Crédito</option>
<option value="saldo">Saldo</option>

</select>

</td>

<td>

<select class="form-control" name="valor[]">

<option value="base">Base</option>
<option value="impuesto">Impuesto</option>
<option value="retencion">Retención</option>

</select>

</td>

<td>

<button type="button" class="btn btn-danger delete_row">

<i class="fa fa-trash"></i>

</button>

</td>

</tr>

</tbody>

</table>

</div>

</div>

</form>

</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>

<script>
   $(document).ready(function(){

/* ocultar conceptos al iniciar */

$('.concepto_select option').hide();
$('.concepto_select option:first').show();

/* filtrar conceptos por formato */

$(document).on('change','.formato_select',function(){

var formato = $(this).val();
var row = $(this).closest('tr');
var concepto = row.find('.concepto_select');

concepto.val('');

concepto.find('option').hide();

concepto.find('option').each(function(){

if($(this).data('formato') == formato || $(this).val() == ''){

$(this).show();

}

});

});

/* agregar fila */

$('#add_row').click(function(){

var row = $('#tabla_exogena tbody tr:first').clone();

row.find('select').val('');

row.find('.concepto_select option').hide();
row.find('.concepto_select option:first').show();

$('#tabla_exogena tbody').append(row);

});

/* eliminar fila */

$(document).on('click','.delete_row',function(){

if($('#tabla_exogena tbody tr').length > 1){

$(this).closest('tr').remove();

}

});

});

</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/Accounting/Providers/../Resources/views/exogena/configuracion.blade.php ENDPATH**/ ?>