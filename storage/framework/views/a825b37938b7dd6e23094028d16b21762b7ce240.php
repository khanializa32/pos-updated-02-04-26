<div class="pos-tab-content active">
    <div class="row">
        
        
        <div class="col-sm-20">
            <div class="form-group">
                <?php echo Form::label('name',__('business.business_name') . ':*'); ?>

                <?php echo Form::text('name', $business->name, ['class' => 'form-control', 'required',
                'placeholder' => __('business.business_name')]); ?>


      </div>
      </div>
        
        <div class="clearfix"></div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php echo Form::label('type_document_identification_id', __('Tipo de documento') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fas fa-money-bill-alt"></i>
                    </span>
                    <?php echo Form::select('type_document_identification_id', $type_document_identifications, $business->type_document_identification_id, ['class' => 'form-control','placeholder' => 'Tipo de documento', 'required']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="nit">Numero de Identificacion:*</label>
                <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="Digite el Numero de Identificacion, Persona natural o Juridica" data-html="true" data-trigger="hover"></i>                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-id-card"></i>
                    </span>
                    <?php echo Form::text('nit', $business->nit, ['class' => 'form-control']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-1">
            <div class="form-group">
                <label for="dv">DV</label>
                <div class="input-group">
                    <?php echo Form::text('dv', $business->dv, ['class' => 'form-control']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="merchant_registration">Registro Mercantil</label>
                <div class="input-group">
                    <?php echo Form::text('merchant_registration', $business->merchant_registration, ['class' => 'form-control']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php echo Form::label('type_organization_id', __('Tipo de organización') . ':'); ?>

                <div class="input-group">
                    
                    <?php echo Form::select('type_organization_id', $type_organizations, $business->type_organization_id, ['class' => 'form-control','placeholder' => 'Tipo de documento']); ?>

                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <?php echo Form::label('type_regime_id', __('Régimenes') . ':'); ?>

                <div class="input-group">
                    
                    <?php echo Form::select('type_regime_id', $type_regimes, $business->type_regime_id, ['class' => 'form-control']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php echo Form::label('type_liability_id', __('Tipo de responsabilidad') . ':'); ?>

                <div class="input-group">
                    
                    <?php echo Form::select('type_liability_id', $type_liabilities, $business->type_liability_id, ['class' => 'form-control']); ?>

                </div>
            </div>
        </div>
       
        <div class="col-sm-3">
            <div class="form-group">
                <?php echo Form::label('department_id', __('Departamentos') . ':'); ?>

                <div class="input-group">
                    
                    <?php echo Form::select('department_id', $departments, $business->department_id, ['class' => 'form-control','id'=>'department_id']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php echo Form::label('municipality_id', __('Municipio') . ':'); ?>

                <?php echo Form::select('municipality_id', $municipalities, $business->municipality_id, ['class' => 'form-control']); ?>

            </div>
        </div>
        
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('start_date', __('business.start_date') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    
                    <?php echo Form::text('start_date', \Carbon::createFromTimestamp(strtotime($business->start_date))->format(session('business.date_format')), ['class' => 'form-control start-date-picker','placeholder' => __('business.start_date'), 'readonly']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('default_profit_percent', __('business.default_profit_percent') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.default_profit_percent') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-plus-circle"></i>
                    </span>
                    <?php echo Form::text('default_profit_percent', number_format($business->default_profit_percent, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number']); ?>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('currency_id', __('business.currency') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fas fa-money-bill-alt"></i>
                    </span>
                    <?php echo Form::select('currency_id', $currencies, $business->currency_id, ['class' => 'form-control select2','placeholder' => __('business.currency'), 'required']); ?>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo Form::label('currency_symbol_placement', __('lang_v1.currency_symbol_placement') . ':'); ?>

                <?php echo Form::select('currency_symbol_placement', ['before' => __('lang_v1.before_amount'), 'after' => __('lang_v1.after_amount')], $business->currency_symbol_placement, ['class' => 'form-control select2', 'required']); ?>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo Form::label('time_zone', __('business.time_zone') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fas fa-clock"></i>
                    </span>
                    <?php echo Form::select('time_zone', $timezone_list, $business->time_zone, ['class' => 'form-control select2', 'required']); ?>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('business_logo', __('business.upload_logo') . ':'); ?>

                    <?php echo Form::file('business_logo', ['accept' => 'image/*']); ?>

                    <p class="help-block"><i> <?php echo app('translator')->get('business.logo_help'); ?></i></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo Form::label('fy_start_month', __('business.fy_start_month') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.fy_start_month') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    <?php echo Form::select('fy_start_month', $months, $business->fy_start_month, ['class' => 'form-control select2', 'required']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('accounting_method', __('business.accounting_method') . ':*'); ?>

                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.accounting_method') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calculator"></i>
                    </span>
                    <?php echo Form::select('accounting_method', $accounting_methods, $business->accounting_method, ['class' => 'form-control select2', 'required']); ?>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('transaction_edit_days', __('business.transaction_edit_days') . ':*'); ?>

                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.transaction_edit_days') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-edit"></i>
                    </span>
                    <?php echo Form::number('transaction_edit_days', $business->transaction_edit_days, ['class' => 'form-control','placeholder' => __('business.transaction_edit_days'), 'required']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('date_format', __('lang_v1.date_format') . ':*'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    <?php echo Form::select('date_format', $date_formats, $business->date_format, ['class' => 'form-control select2', 'required']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('time_format', __('lang_v1.time_format') . ':*'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fas fa-clock"></i>
                    </span>
                    <?php echo Form::select('time_format', [12 => __('lang_v1.12_hour'), 24 => __('lang_v1.24_hour')], $business->time_format, ['class' => 'form-control select2', 'required']); ?>

                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('currency_precision', __('lang_v1.currency_precision') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.currency_precision_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <?php echo Form::select('currency_precision', [0 =>0, 1=>1, 2=>2, 3=>3,4=>4], $business->currency_precision, ['class' => 'form-control select2', 'required']); ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('quantity_precision', __('lang_v1.quantity_precision') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.quantity_precision_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <?php echo Form::select('quantity_precision', [0 =>0, 1=>1, 2=>2, 3=>3,4=>4], $business->quantity_precision, ['class' => 'form-control select2', 'required']); ?>

            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="dian_token">Token Dian</label>
                <div class="input-group">
                    <?php echo Form::text('dian_token', $business->dian_token, ['class' => 'form-control']); ?>

                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    
     
    <div class="row hide">
        <div class="col-sm-6">
            <div class="form-group">
                <?php echo Form::label('code_label_1', __('lang_v1.code_1_name') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::text('code_label_1', $business->code_label_1, ['class' => 'form-control']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <?php echo Form::label('code_1', __('lang_v1.code_1') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::text('code_1', $business->code_1, ['class' => 'form-control']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <?php echo Form::label('code_label_2', __('lang_v1.code_2_name') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::text('code_label_2', $business->code_label_2, ['class' => 'form-control']); ?>

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <?php echo Form::label('code_2', __('lang_v1.code_2') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::text('code_2', $business->code_2, ['class' => 'form-control']); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="row hide">
        <div class="col-sm-8">
            <div class="form-group">
                <label>
                    <?php echo Form::checkbox('common_settings[is_enabled_export]', true, !empty($common_settings['is_enabled_export']) ? true : false , 
                    [ 'class' => 'input-icheck']); ?> <?php echo e(__( 'lang_v1.enable_export' ), false); ?>

                </label>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\POS\alizazip\resources\views/business/partials/settings_business.blade.php ENDPATH**/ ?>