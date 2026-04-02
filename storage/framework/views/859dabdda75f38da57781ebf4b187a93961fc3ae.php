<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

    <?php echo Form::open(['url' => action([\Modules\Accounting\Http\Controllers\CoaController::class, 'store']), 'method' => 'post', 'id' => 'create_client_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get( 'accounting::lang.add_account' ); ?> (Normativa PUC Colombia)</h4>
    </div>

    <div class="modal-body">
        
        <div class="alert alert-info" id="puc_info_banner" style="display:none;">
            <strong>PUC:</strong> <span id="puc_info_text"></span>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('gl_code', 'Código PUC (GL Code):*'); ?>

                    <?php echo Form::text('gl_code', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ej: 11050501', 'id' => 'gl_code', 'maxlength' => '10' ]); ?>

                    <p class="help-block" id="gl_code_help">Longitud: 1 (Clase), 2 (Grupo), 4 (Cuenta), 6 (Subcuenta), 8+ (Auxiliar)</p>
                    <p class="text-danger" id="gl_code_error" style="display:none;"></p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <?php echo Form::label('name', 'Nombre de la Cuenta:*'); ?>

                    <?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Ej: Caja General' ]); ?>

                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <?php echo Form::label('parent_account_id', 'Cuenta Padre (Superior):'); ?>

                    <select class="form-control select2" name="parent_account_id" id="parent_account_id" style="width: 100%;">
                        <option value="">-- Ninguno (Cuenta raíz) --</option>
                        <?php if(isset($parent_accounts)): ?>
                            <?php $__currentLoopData = $parent_accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($pa->id, false); ?>"><?php echo e($pa->gl_code, false); ?> - <?php echo e($pa->name, false); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                    <p class="help-block" id="parent_help">Seleccione la cuenta de nivel superior (Ej: Si crea 1105, el padre es 11)</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('account_primary_type', 'Tipo de Cuenta (Clase):*'); ?>

                    <select class="form-control" name="account_primary_type" id="account_primary_type" required>
                        <option value=""><?php echo app('translator')->get('messages.please_select'); ?></option>
                        <?php $__currentLoopData = $account_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account_type => $account_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($account_type, false); ?>"><?php echo e(__('accounting::lang.' .$account_type), false); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('nature', 'Naturaleza:'); ?>

                    <?php echo Form::text('nature_display', null, ['class' => 'form-control', 'readonly', 'id' => 'nature_display', 'placeholder' => 'Se auto-asigna según Código PUC' ]); ?>

                    <p class="help-block small">Débito: Clases 1, 5, 6 | Crédito: Clases 2, 3, 4</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('level_display', 'Nivel:'); ?>

                    <?php echo Form::text('level_display', null, ['class' => 'form-control', 'readonly', 'id' => 'level_display', 'placeholder' => 'Se auto-asigna según Código PUC' ]); ?>

                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('requires_third_party', '¿Requiere Tercero?:'); ?>

                    <?php echo Form::select('requires_third_party', ['0' => 'No', '1' => 'Sí'], 0, ['class' => 'form-control', 'id' => 'requires_third_party']); ?>

                    <p class="help-block small">Obligatorio para CxC, CxP y Gastos.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('requires_cost_center', '¿Usa Centro de Costos?:'); ?>

                    <?php echo Form::select('requires_cost_center', ['0' => 'No', '1' => 'Sí'], 0, ['class' => 'form-control', 'id' => 'requires_cost_center']); ?>

                </div>
            </div>
            
            <div class="col-md-12" id="cost_centers_div" style="display:none;">
                <div class="form-group">
                    <?php echo Form::label('cost_centers', 'Centros de Costo Permitidos:'); ?>

                    <select name="cost_centers[]" class="form-control select2" multiple style="width:100%;">
                        <?php $__currentLoopData = $cost_centers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cc->id, false); ?>">
                                <?php echo e($cc->code, false); ?> - <?php echo e($cc->name, false); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <p class="help-block small">Seleccione los centros que podrán usarse con esta cuenta.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('balance', 'Saldo Inicial:'); ?>

                    <?php echo Form::text('balance', null, ['class' => 'form-control input_number', 'placeholder' => '0.00' ]); ?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo Form::label('description', 'Descripción/Notas:'); ?>

                    <?php echo Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Opcional...' ]); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="tw-dw-btn bg-info tw-text-white" id="puc_save_btn"><?php echo app('translator')->get( 'messages.save' ); ?></button>
      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div>
</div>

<script>
$(document).ready(function(){

    // PUC Colombia Class mapping
    var classMap = {
        '1': {type: 'asset', label: 'Activo', nature: 'Débito'},
        '2': {type: 'liability', label: 'Pasivo', nature: 'Crédito'},
        '3': {type: 'equity', label: 'Patrimonio', nature: 'Crédito'},
        '4': {type: 'income', label: 'Ingresos', nature: 'Crédito'},
        '5': {type: 'expenses', label: 'Gastos', nature: 'Débito'},
        '6': {type: 'expenses', label: 'Costos de Venta', nature: 'Débito'}
    };

    var levelMap = {
        1: 'Clase',
        2: 'Grupo',
        4: 'Cuenta',
        6: 'Subcuenta'
    };

    // Select2 for parent account search (local data)
    var $modal = $('#parent_account_id').closest('.modal');
    $modal.removeAttr('tabindex');
    $('#parent_account_id').select2({
        dropdownParent: $modal,
        allowClear: true,
        placeholder: 'Buscar por código o nombre...',
        closeOnSelect: true
    });

    // Main PUC auto-detection on gl_code input
    
    if (firstDigit === '5' || firstDigit === '6') {
    $('#requires_cost_center').val('1').trigger('change');}

    $('#gl_code').on('input keyup', function(){
        var code = $(this).val().trim();
        var len = code.length;

        // Reset
        $('#gl_code_error').hide();
        $('#puc_info_banner').hide();
        $('#nature_display').val('');
        $('#level_display').val('');

        if (code === '') return;

        // Validate numeric
        if (!/^\d+$/.test(code)) {
            $('#gl_code_error').text('El código debe ser numérico.').show();
            return;
        }

        // Validate length
        var validLengths = [1, 2, 4, 6];
        if (!validLengths.includes(len) && len < 8) {
            $('#gl_code_error').text('Longitud ' + len + ' no es válida en PUC. Use: 1, 2, 4, 6 u 8+ dígitos.').show();
            return;
        }

        var firstDigit = code.charAt(0);
        var classInfo = classMap[firstDigit];

        if (classInfo) {
            // Auto-select account type
            $('#account_primary_type').val(classInfo.type);

            // Show nature
            $('#nature_display').val(classInfo.nature + ' (' + classInfo.label + ')');

            // Show level
            var levelLabel = levelMap[len] || (len >= 8 ? 'Auxiliar' : '...');
            $('#level_display').val('Nivel ' + (len <= 6 ? ({1:1, 2:2, 4:3, 6:4}[len] || '?') : '5') + ' - ' + levelLabel);

            // Info banner
            var infoText = 'Clase ' + firstDigit + ': ' + classInfo.label +
                           ' | Naturaleza: ' + classInfo.nature +
                           ' | Nivel: ' + levelLabel;
            $('#puc_info_text').text(infoText);
            $('#puc_info_banner').show();

            // Auto-suggest parent code
            var parentCode = '';
            if (len >= 8) parentCode = code.substring(0, 6);
            else if (len == 6) parentCode = code.substring(0, 4);
            else if (len == 4) parentCode = code.substring(0, 2);
            else if (len == 2) parentCode = code.substring(0, 1);

            if (parentCode) {
                $('#parent_help').html('Cuenta padre sugerida: <strong>' + parentCode + '</strong>');
            }

            // Auto-set cost center for Class 5 (Expenses)
            if (firstDigit === '5') {
                $('#requires_cost_center').val('1');
            }
        } else {
            $('#gl_code_error').text('El primer dígito debe ser 1-6 según PUC Colombia.').show();
        }
    });
    
    $('#requires_cost_center').change(function(){
    if($(this).val() == '1'){
        $('#cost_centers_div').show();
    } else {
        $('#cost_centers_div').hide();
    }
    });

    // Form validation before submit
    $('#create_client_form').on('submit', function(e){
        var code = $('#gl_code').val().trim();
        var len = code.length;
        var validLengths = [1, 2, 4, 6];

        if (!/^\d+$/.test(code)) {
            e.preventDefault();
            alert('El Código PUC debe ser numérico.');
            return false;
        }

        if (!validLengths.includes(len) && len < 8) {
            e.preventDefault();
            alert('Longitud del Código PUC inválida. Use: 1, 2, 4, 6 u 8+ dígitos.');
            return false;
        }

        var firstDigit = code.charAt(0);
        if (!classMap[firstDigit]) {
            e.preventDefault();
            alert('El primer dígito debe ser 1-6 según PUC Colombia.');
            return false;
        }
    });
});
</script>
<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/Accounting/Providers/../Resources/views/chart_of_accounts/create.blade.php ENDPATH**/ ?>