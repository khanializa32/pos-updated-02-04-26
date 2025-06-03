<div class="pos-tab-content">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('tax_label_1', __('business.tax_1_name') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('tax_label_1', $business->tax_label_1, ['class' => 'form-control','placeholder' => __('business.tax_1_placeholder')]); !!}
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('tax_number_1', __('business.tax_1_no') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('tax_number_1', $business->tax_number_1, ['class' => 'form-control']); !!}
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('tax_label_2', __('business.tax_2_name') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('tax_label_2', $business->tax_label_2, ['class' => 'form-control','placeholder' => __('business.tax_1_placeholder')]); !!}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('tax_number_2', __('business.tax_2_no') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('tax_number_2', $business->tax_number_2, ['class' => 'form-control']); !!}
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                <div class="checkbox">
                <br>
                  <label>
                    {!! Form::checkbox('enable_inline_tax', 1, $business->enable_inline_tax , 
                    [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.enable_inline_tax' ) }}
                  </label>
                </div>
                
                <!-- INICIO DE CODIGO SOLO PARA LA VISTA RETENCIONES (CONFIGURAR SEGUN IMAGEN), TAMBIEN PARA CONFIGURAR RETE ICA-->
                
        <div class="col-md-3"><h4>@lang('lang_v1.retention'):</h4></div>
            </div>
            
            <div class="col-sm-12">
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input id="enable_rete_ica" name="enable_rete_ica" type="checkbox" value="1"> 
                        Habilitar Rete ICA
                    </label>
                </div>
            </div>
        </div>
                <!-- Campos adicionales de Rete ICA -->
        <div id="rete_ica_fields" style="display: none;">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="valor_por_1000">Valor por 1000:*</label>
                    <input class="form-control" id="valor_por_1000" name="valor_por_1000" type="text">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="base_ica">Base de retenci&oacute;n ICA:*</label>
                    <input class="form-control" id="base_ica" name="base_ica" type="text">
                </div>
            </div>
            
            
          
    <!-- FIN DE CODIGO SOLO PARA LA VISTA RETENCIONES (CONFIGURAR SEGUN IMAGEN), TAMBIEN PARA CONFIGURAR RETE ICA-->
            </div>
            
        </div>
        
        
    </div>
</div>