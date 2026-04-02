<?php
  $custom_labels = json_decode(session('business.custom_labels'), true);
  $user_custom_field1 = !empty($custom_labels['user']['custom_field_1']) ? $custom_labels['user']['custom_field_1'] : __('lang_v1.user_custom_field1');
  $user_custom_field2 = !empty($custom_labels['user']['custom_field_2']) ? $custom_labels['user']['custom_field_2'] : __('lang_v1.user_custom_field2');
  $user_custom_field3 = !empty($custom_labels['user']['custom_field_3']) ? $custom_labels['user']['custom_field_3'] : __('lang_v1.user_custom_field3');
  $user_custom_field4 = !empty($custom_labels['user']['custom_field_4']) ? $custom_labels['user']['custom_field_4'] : __('lang_v1.user_custom_field4');
?>
<!-- <div class="form-group col-md-3">
    <?php echo Form::label('user_dob', __( 'lang_v1.dob' ) . ':'); ?>

    <?php echo Form::text('dob', !empty($user->dob) ? \Carbon::createFromTimestamp(strtotime($user->dob))->format(session('business.date_format')) : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.dob'), 'readonly', 'id' => 'user_dob' ]); ?>

</div> -->
<div class="form-group col-md-3">
    <?php echo Form::label('gender', __( 'lang_v1.gender' ) . ':'); ?>

    <?php echo Form::select('gender', ['male' => __('lang_v1.male'), 'female' => __('lang_v1.female'), 'others' => __('lang_v1.others')], !empty($user->gender) ? $user->gender : null, ['class' => 'form-control', 'id' => 'gender', 'placeholder' => __( 'messages.please_select') ]); ?>

</div>
<div class="form-group col-md-3">
    <?php echo Form::label('marital_status', __( 'lang_v1.marital_status' ) . ':'); ?>

    <?php echo Form::select('marital_status', ['married' => __( 'lang_v1.married'), 'unmarried' => __( 'lang_v1.unmarried' ), 'divorced' => __( 'lang_v1.divorced' )], !empty($user->marital_status) ? $user->marital_status : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.marital_status') ]); ?>

</div>
<div class="form-group col-md-3">
    <?php echo Form::label('blood_group', __( 'lang_v1.blood_group' ) . ':'); ?>

    <?php echo Form::text('blood_group', !empty($user->blood_group) ? $user->blood_group : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.blood_group') ]); ?>

</div>
<div class="clearfix"></div>
<div class="form-group col-md-3">
    <?php echo Form::label('contact_number', __( 'lang_v1.mobile_number' ) . ':'); ?>

    <?php echo Form::text('contact_number', !empty($user->contact_number) ? $user->contact_number : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.mobile_number') ]); ?>

</div>
<!-- <div class="form-group col-md-3">
    <?php echo Form::label('alt_number', __( 'business.alternate_number' ) . ':'); ?>

    <?php echo Form::text('alt_number', !empty($user->alt_number) ? $user->alt_number : null, ['class' => 'form-control', 'placeholder' => __( 'business.alternate_number') ]); ?>

</div> 
<div class="form-group col-md-3">
    <?php echo Form::label('family_number', __( 'lang_v1.family_contact_number' ) . ':'); ?>

    <?php echo Form::text('family_number', !empty($user->family_number) ? $user->family_number : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.family_contact_number') ]); ?>

</div>
<div class="form-group col-md-3">
    <?php echo Form::label('fb_link', __( 'lang_v1.fb_link' ) . ':'); ?>

    <?php echo Form::text('fb_link', !empty($user->fb_link) ? $user->fb_link : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.fb_link') ]); ?>

</div>
<div class="form-group col-md-3">
    <?php echo Form::label('twitter_link', __( 'lang_v1.twitter_link' ) . ':'); ?>

    <?php echo Form::text('twitter_link', !empty($user->twitter_link) ? $user->twitter_link : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.twitter_link') ]); ?>

</div>
<div class="form-group col-md-3">
    <?php echo Form::label('social_media_1', __( 'lang_v1.social_media', ['number' => 1] ) . ':'); ?>

    <?php echo Form::text('social_media_1', !empty($user->social_media_1) ? $user->social_media_1 : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.social_media', ['number' => 1] ) ]); ?>

</div>
<div class="clearfix"></div>
<div class="form-group col-md-3">
    <?php echo Form::label('social_media_2', __( 'lang_v1.social_media', ['number' => 2] ) . ':'); ?>

    <?php echo Form::text('social_media_2', !empty($user->social_media_2) ? $user->social_media_2 : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.social_media', ['number' => 2] ) ]); ?>

</div>
<div class="form-group col-md-3">
    <?php echo Form::label('custom_field_1', $user_custom_field1 . ':'); ?>

    <?php echo Form::text('custom_field_1', !empty($user->custom_field_1) ? $user->custom_field_1 : null, ['class' => 'form-control', 'placeholder' => $user_custom_field1 ]); ?>

</div>
<div class="form-group col-md-3">
    <?php echo Form::label('custom_field_2', $user_custom_field2 . ':'); ?>

    <?php echo Form::text('custom_field_2', !empty($user->custom_field_2) ? $user->custom_field_2 : null, ['class' => 'form-control', 'placeholder' => $user_custom_field2 ]); ?>

</div>
<div class="form-group col-md-3">
    <?php echo Form::label('custom_field_3', $user_custom_field3 . ':'); ?>

    <?php echo Form::text('custom_field_3', !empty($user->custom_field_3) ? $user->custom_field_3 : null, ['class' => 'form-control', 'placeholder' => $user_custom_field3 ]); ?>

</div>
<div class="form-group col-md-3">
    <?php echo Form::label('custom_field_4', $user_custom_field4 . ':'); ?>

    <?php echo Form::text('custom_field_4', !empty($user->custom_field_4) ? $user->custom_field_4 : null, ['class' => 'form-control', 'placeholder' => $user_custom_field4 ]); ?>

</div>
<div class="form-group col-md-3">
    <?php echo Form::label('guardian_name', __( 'lang_v1.guardian_name') . ':'); ?>

    <?php echo Form::text('guardian_name', !empty($user->guardian_name) ? $user->guardian_name : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.guardian_name' ) ]); ?>

</div>
<div class="form-group col-md-3">
    <?php echo Form::label('id_proof_name', __( 'lang_v1.id_proof_name') . ':'); ?>

    <?php echo Form::text('id_proof_name', !empty($user->id_proof_name) ? $user->id_proof_name : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.id_proof_name' ) ]); ?>

</div>
<div class="form-group col-md-3">
    <?php echo Form::label('id_proof_number', __( 'lang_v1.id_proof_number') . ':'); ?>

    <?php echo Form::text('id_proof_number', !empty($user->id_proof_number) ? $user->id_proof_number : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.id_proof_number' ) ]); ?>

</div>
<div class="clearfix"></div>
<div class="form-group col-md-6">
    <?php echo Form::label('permanent_address', __( 'lang_v1.permanent_address') . ':'); ?>

    <?php echo Form::textarea('permanent_address', !empty($user->permanent_address) ? $user->permanent_address : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.permanent_address'), 'rows' => 3 ]); ?>

</div>-->
<div class="form-group col-md-6">
    <?php echo Form::label('current_address', __( 'lang_v1.current_address') . ':'); ?>

    <?php echo Form::textarea('current_address', !empty($user->current_address) ? $user->current_address : null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.current_address'), 'rows' => 1 ]); ?>

</div>
<div class="col-md-12">
    <hr>
    <h4><?php echo app('translator')->get('lang_v1.bank_details'); ?>:</h4>
</div>
<!--<div class="form-group col-md-3">
    <?php echo Form::label('account_holder_name', __( 'lang_v1.account_holder_name') . ':'); ?>

    <?php echo Form::text('bank_details[account_holder_name]', !empty($bank_details['account_holder_name']) ? $bank_details['account_holder_name'] : null , ['class' => 'form-control', 'id' => 'account_holder_name', 'placeholder' => __( 'lang_v1.account_holder_name') ]); ?>

</div> -->
<div class="form-group col-md-3">
    <?php echo Form::label('account_number', __( 'lang_v1.account_number') . ':'); ?>

    <?php echo Form::text('bank_details[account_number]', !empty($bank_details['account_number']) ? $bank_details['account_number'] : null, ['class' => 'form-control', 'id' => 'account_number', 'placeholder' => __( 'lang_v1.account_number') ]); ?>

</div>
<div class="form-group col-md-3">
    <?php echo Form::label('bank_name', __( 'lang_v1.bank_name') . ':'); ?>

    <?php echo Form::text('bank_details[bank_name]', !empty($bank_details['bank_name']) ? $bank_details['bank_name'] : null, ['class' => 'form-control', 'id' => 'bank_name', 'placeholder' => __( 'lang_v1.bank_name') ]); ?>

</div>
<!--<div class="form-group col-md-3">
    <?php echo Form::label('bank_code', __( 'lang_v1.bank_code') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.bank_code_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
    <?php echo Form::text('bank_details[bank_code]', !empty($bank_details['bank_code']) ? $bank_details['bank_code'] : null, ['class' => 'form-control', 'id' => 'bank_code', 'placeholder' => __( 'lang_v1.bank_code') ]); ?>

</div>
<div class="form-group col-md-3">
    <?php echo Form::label('branch', __( 'lang_v1.branch') . ':'); ?>

    <?php echo Form::text('bank_details[branch]', !empty($bank_details['branch']) ? $bank_details['branch'] : null, ['class' => 'form-control', 'id' => 'branch', 'placeholder' => __( 'lang_v1.branch') ]); ?>

</div>
<div class="form-group col-md-3">
    <?php echo Form::label('tax_payer_id', __( 'lang_v1.tax_payer_id') . ':'); ?>

    <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tax_payer_id_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
    <?php echo Form::text('bank_details[tax_payer_id]', !empty($bank_details['tax_payer_id']) ? $bank_details['tax_payer_id'] : null, ['class' => 'form-control', 'id' => 'tax_payer_id', 'placeholder' => __( 'lang_v1.tax_payer_id') ]); ?>

</div> -->
<div class="col-sm-3">
            <div class="form-group">
                <label for="type_count_id">Tpo de Cuenta:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-id-card"></i>
                    </span>
                    <select class="form-control select2" required id="type_count_id" name="type_count_id"><option value="">Seleccione</option><option value="1">Cuenta de Ahorros</option><option value="2">Cuenta Corriente</option><option value="3" selected="selected">Cuenta Xpress</option><option value="4">Cuenta de Nomina</option><option value="5">Cuenta para Pension</option></option></select>
                </div>
            </div>
        </div>

<div class="col-md-3">
		<div class="form-group">
			<label for="payment_method_id">Metodo de Pago:</label>
			<div class="form-group">
				<select class="form-control select2" style="width: 100%;" required id="payment_method_id" name="payment_method_id"><option value="">Seleccione</option><option value="1">Instrumento no definido</option><option value="2">Crédito ACH</option><option value="3">Débito ACH</option><option value="4">Reversión débito de demanda ACH</option><option value="5">Reversión crédito de demanda ACH </option><option value="6">Crédito de demanda ACH</option><option value="7">Débito de demanda ACH</option><option value="8">Mantener</option><option value="9">Clearing Nacional o Regional</option><option value="10" selected="selected">Efectivo</option><option value="11">Reversión Crédito Ahorro</option><option value="12">Reversión Débito Ahorro</option><option value="13">Crédito Ahorro</option><option value="14">Débito Ahorro</option><option value="15">Bookentry Crédito</option><option value="16">Bookentry Débito</option><option value="17">Concentración de la demanda en efectivo /Desembolso Crédito (CCD)</option><option value="18">Concentración de la demanda en efectivo / Desembolso (CCD) débito</option><option value="19">Crédito Pago negocio corporativo (CTP)</option><option value="20">Cheque</option><option value="21">Poyecto bancario</option><option value="22">Proyecto bancario certificado</option><option value="23">Cheque bancario</option><option value="24">Nota cambiaria esperando aceptación</option><option value="25">Cheque certificado</option><option value="26">Cheque Local</option><option value="27">Débito Pago Neogcio Corporativo (CTP)</option><option value="28">Crédito Negocio Intercambio Corporativo (CTX)</option><option value="29">Débito Negocio Intercambio Corporativo (CTX)</option><option value="30">Transferecia Crédito</option><option value="31">Transferencia Débito</option><option value="32">Concentración Efectivo / Desembolso Crédito plus (CCD+)</option><option value="33">Concentración Efectivo / Desembolso Débito plus (CCD+)</option><option value="34">Pago y depósito pre acordado (PPD)</option><option value="35">Concentración efectivo ahorros / Desembolso Crédito (CCD)</option><option value="36">Concentración efectivo ahorros / Desembolso Drédito (CCD)</option><option value="37">Pago Negocio Corporativo Ahorros Crédito (CTP)</option><option value="38">Pago Neogcio Corporativo Ahorros Débito (CTP)</option><option value="39">Crédito Negocio Intercambio Corporativo (CTX)</option><option value="40">Débito Negocio Intercambio Corporativo (CTX)</option><option value="41">Concentración efectivo/Desembolso Crédito plus (CCD+) </option><option value="42">Consiganción bancaria</option><option value="43">Concentración efectivo / Desembolso Débito plus (CCD+)</option><option value="44">Nota cambiaria</option><option value="45">Transferencia Crédito Bancario</option><option value="46">Transferencia Débito Interbancario</option><option value="47">Transferencia Débito Bancaria</option><option value="48">Tarjeta Crédito</option><option value="49">Tarjeta Débito</option><option value="50">Postgiro</option><option value="51">Telex estándar bancario francés</option><option value="52">Pago comercial urgente</option><option value="53">Pago Tesorería Urgente</option><option value="54">Nota promisoria</option><option value="55">Nota promisoria firmada por el acreedor</option><option value="56">Nota promisoria firmada por el acreedor, avalada por el banco</option><option value="57">Nota promisoria firmada por el acreedor, avalada por un tercero</option><option value="58">Nota promisoria firmada pro el banco</option><option value="59">Nota promisoria firmada por un banco avalada por otro banco</option><option value="60">Nota promisoria firmada </option><option value="61">Nota promisoria firmada por un tercero avalada por un banco</option><option value="62">Retiro de nota por el por el acreedor</option><option value="63">Retiro de nota por el por el acreedor sobre un banco</option><option value="64">Retiro de nota por el acreedor, avalada por otro banco</option><option value="65">Retiro de nota por el acreedor, sobre un banco avalada por un tercero</option><option value="66">Retiro de una nota por el acreedor sobre un tercero</option><option value="67">Retiro de una nota por el acreedor sobre un tercero avalada por un banco</option><option value="68">Nota bancaria tranferible</option><option value="69">Cheque local traferible</option><option value="70">Giro referenciado</option><option value="71">Giro urgente</option><option value="72">Giro formato abierto</option><option value="73">Método de pago solicitado no usuado</option><option value="74">Clearing entre partners</option><option value="75">Acuerdo mutuo</option></select>
			</div>
		</div>
	</div>
<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/user/form.blade.php ENDPATH**/ ?>