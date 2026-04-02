<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
  <?php
    $form_id = 'contact_add_form';
    if(isset($quick_add)){
      $form_id = 'quick_add_contact';
    }

    if(isset($store_action)) {
      $url = $store_action;
      $type = 'lead';
      $customer_groups = [];
    } else {
      $url = action([\App\Http\Controllers\ContactController::class, 'store']);
      $type = isset($selected_type) ? $selected_type : '';
      $sources = [];
      $life_stages = [];
    }
  ?>
    <?php echo Form::open(['url' => $url, 'method' => 'post', 'id' => $form_id ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->get('contact.add_contact'); ?></h4>
    </div>

    <div class="modal-body">
        <div class="row">            
            <div class="col-md-2 contact_type_div">
                <div class="form-group">
                    <?php echo Form::label('type', __('contact.contact_type') . ':*' ); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <?php echo Form::select('type', $types, $type , ['class' => 'form-control', 'id' => 'contact_type','placeholder' => __('messages.please_select'), 'required']); ?>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <label class="checkbox">
                    <input type="radio" name="contact_type_radio" id="inlineRadio1" value="individual">
                    <?php echo app('translator')->get('lang_v1.individual'); ?>
                </label>
                <label class="checkbox">
                    <input type="radio" name="contact_type_radio" id="inlineRadio2" value="business">
                    <?php echo app('translator')->get('business.business'); ?>
                </label>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <?php echo Form::label('type_document_identification_id', __('Tipo de Documento') . ':'); ?>

                    <?php echo Form::select('type_document_identification_id', $type_document_identifications,3, ['class' => 'form-control','id' => 'type_document_identification_id' ,'required']); ?>

                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('contact_id', __('NIT') . ':*'); ?>

                    <i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="Digite el Numero de Identificacion, Persona natural o Juridica" data-html="true" data-trigger="hover"></i> 
                    <div class="input-group">
                        
                        <?php echo Form::text('contact_id', null, ['class' => 'form-control','placeholder' => __('lang_v1.contact_id')]); ?>

                        <span class="input-group-addon" >
                            <b id="dv">0</b>
                        </span>
                        <span class="input-group-addon" style="cursor: pointer; background-color: #2BB3B0; color: white;" id="search_contact_id">
                            <button class="" type="button">Consultar</button>
                        </span>
                    </div>
                </div>
            </div>
            


            
            <div class="col-md-4 customer_fields">
                
               <!-- MOSTRAR / OCULTAR GRUPO DE CLIENTES PARA LISTA DE PRECIOS -->
               
            <div class="form-group">
                  <?php echo Form::label('customer_group_id', __('lang_v1.customer_group') . ':'); ?>

                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="fa fa-users"></i>
                      </span>
                      <?php echo Form::select('customer_group_id', $customer_groups, '', ['class' => 'form-control']); ?>

                  </div>
                </div> 
                
                
            </div>
            
            <div class="col-md-8 business" style="display: none;">
                <div class="form-group">
                    <?php echo Form::label('supplier_business_name', __('business.business_name') . ':'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-briefcase"></i>
                        </span>
                        <?php echo Form::text('supplier_business_name', null, ['class' => 'form-control', 'id' => 'supplier_business_name', 'placeholder' => __('business.business_name')]); ?>

                    </div>
                </div>
            </div>

            <div class="clearfix"></div>


            <div class="col-md-3 individual" style="display: none;">
                <div class="form-group">
                    <?php echo Form::label('first_name', __( 'business.first_name' ) . ':*'); ?>

                    <?php echo Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name', 'required', 'placeholder' => __( 'business.first_name' ) ]); ?>

                </div>
            </div>
            
            <div class="col-md-3 individual" style="display: none;">
                <div class="form-group">
                    <?php echo Form::label('last_name', __( 'business.last_name' ) . ':'); ?>

                    <?php echo Form::text('last_name', null, ['class' => 'form-control','id' => 'last_name', 'placeholder' => __( 'business.last_name' ) ]); ?>

                </div>
            </div>

            
            

            
            
        
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('mobile', __('contact.mobile') . ':'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-mobile-alt"style='font-size:20px;color:green'></i>
                        </span>
                        <?php echo Form::text('mobile', 00000, ['class' => 'form-control', 'placeholder' => __('contact.mobile')]); ?> 
                        
                    </div>
                </div>
            </div>
            
            
             <div class="col-md-5">
                <div class="form-group">
                <label for="address_line_1">Dirección:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fas fa-home" style='font-size:20px;color:brown'></i>
                    </span>
                    <input class="form-control" placeholder="Direccion"  name="address_line_1" type="text" id="address_line_1">
                </div>
                </div>
            </div>

            
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('email', __('business.email') . ':'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope" style='font-size:20px;color:orange'></i>
                        </span>
                        <?php echo Form::email('email', null, ['class' => 'form-control', 'id' => 'email','placeholder' => __('business.email'),]); ?>

                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="identification_number">Registro Mercatil:</label>
                                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-id-card" style='font-size:20px;color:red'></i>
                        </span>
                        <input class="form-control" placeholder="Matricula"   type="text" id="registration_number" value="00000">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('type_regime_id', __('Tipo de Régimen') . ':'); ?>

                    <?php echo Form::select('type_regime_id', $type_regimes,2, ['class' => 'form-control','id'=>'type_regime_id']); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('type_liability_id', __('Responsabilidad Tributaria') . ':'); ?>

                    <?php echo Form::select('type_liability_id', $type_liabilities,117, ['class' => 'form-control', 'id' => 'type_liability_id']); ?>

                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('department_id', __('Departamento') . ':*'); ?>

                    <?php echo Form::select('department_id', $departments,5, ['class' => 'form-control department_id','id'=>'department_id','placeholder' => __('Seleccione un departamento')]); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <?php echo Form::label('municipality_id', __('Municipio') . ':*'); ?>

                    <?php echo Form::select('municipality_id', [],null, ['class' => 'form-control']); ?>

                </div>
            </div>
    

            
    
           
            
            <div class="clearfix"></div>
            

            <!-- lead additional field -->
            <div class="col-md-4 lead_additional_div">
              <div class="form-group">
                  <?php echo Form::label('crm_source', __('lang_v1.source') . ':' ); ?>

                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="fas fa fa-search"></i>
                      </span>
                      <?php echo Form::select('crm_source', $sources, null , ['class' => 'form-control', 'id' => 'crm_source','placeholder' => __('messages.please_select')]); ?>

                  </div>
              </div>
            </div>
            
            <div class="col-md-4 lead_additional_div">
              <div class="form-group">
                  <?php echo Form::label('crm_life_stage', __('lang_v1.life_stage') . ':' ); ?>

                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="fas fa fa-life-ring"></i>
                      </span>
                      <?php echo Form::select('crm_life_stage', $life_stages, null , ['class' => 'form-control', 'id' => 'crm_life_stage','placeholder' => __('messages.please_select')]); ?>

                  </div>
              </div>
            </div>

            <!-- User in create leads -->
            <div class="col-md-6 lead_additional_div">
                  <div class="form-group">
                      <?php echo Form::label('user_id', __('lang_v1.assigned_to') . ':*' ); ?>

                      <div class="input-group">
                          <span class="input-group-addon">
                              <i class="fa fa-user"></i>
                          </span>
                          <?php echo Form::select('user_id[]', $users ?? [], null , ['class' => 'form-control select2', 'id' => 'user_id', 'multiple', 'required', 'style' => 'width: 100%;']); ?>

                      </div>
                  </div>
            </div>

            

            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-light tw-text-black tw-dw-btn-sm center-block more_btn" data-target="#more_div">Más Datos <i class="fa fa-chevron-down"></i></button>
            </div>

            <div id="more_div" class="hide">
                <?php echo Form::hidden('position', null, ['id' => 'position']); ?>

                <div class="col-md-12"><hr/></div>

                <!-- User in create customer & supplier -->
            <?php if(config('constants.enable_contact_assign') && $type !== 'lead'): ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('assigned_to_users', __('lang_v1.assigned_to') . ':' ); ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php echo Form::select('assigned_to_users[]', $users ?? [], null , ['class' => 'form-control select2', 'id' => 'assigned_to_users', 'multiple', 'style' => 'width: 100%;']); ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

                <div class="col-md-4">
                    <div class="form-group">
                      <?php echo Form::label('tax_number', __('contact.tax_no') . ':'); ?>

                        <div class="input-group">
                          <span class="input-group-addon">
                              <i class="fa fa-info"></i>
                          </span>
                          <?php echo Form::text('tax_number', null, ['class' => 'form-control', 'placeholder' => __('contact.tax_no')]); ?>

                        </div>
                    </div>
                </div>

                <div class="col-md-4 opening_balance">
                  <div class="form-group">
                      <?php echo Form::label('opening_balance', __('lang_v1.opening_balance') . ':'); ?>

                      <div class="input-group">
                          <span class="input-group-addon">
                              <i class="fas fa-money-bill-alt"></i>
                          </span>
                          <?php echo Form::text('opening_balance', 0, ['class' => 'form-control input_number']); ?>

                      </div>
                  </div>
                </div>

                <div class="col-md-4 pay_term">
                  <div class="form-group">
                    <div class="multi-input">
                      <?php echo Form::label('pay_term_number', __('contact.pay_term') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.pay_term') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                      <br/>
                      <?php echo Form::number('pay_term_number', null, ['class' => 'form-control width-40 pull-left', 'placeholder' => __('contact.pay_term')]); ?>


                      <?php echo Form::select('pay_term_type', ['months' => __('lang_v1.months'), 'days' => __('lang_v1.days')], '', ['class' => 'form-control width-60 pull-left','placeholder' => __('messages.please_select')]); ?>

                    </div>
                  </div>
                </div>
                
                <?php
                  $common_settings = session()->get('business.common_settings');
                  $default_credit_limit = !empty($common_settings['default_credit_limit']) ? $common_settings['default_credit_limit'] : null;
                ?>
                <div class="col-md-4 customer_fields">
                  <div class="form-group">
                      <?php echo Form::label('credit_limit', __('lang_v1.credit_limit') . ':'); ?>

                      <div class="input-group">
                          <span class="input-group-addon">
                              <i class="fas fa-money-bill-alt"></i>
                          </span>
                          <?php echo Form::text('credit_limit', $default_credit_limit ?? null, ['class' => 'form-control input_number']); ?>

                      </div>
                      <p class="help-block"><?php echo app('translator')->get('lang_v1.credit_limit_help'); ?></p>
                  </div>
                </div>
                <div class="col-sm-4 individual">
                <div class="form-group">
                    <?php echo Form::label('dob', __('lang_v1.dob') . ':'); ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        
                        <?php echo Form::text('dob', null, ['class' => 'form-control dob-date-picker','placeholder' => __('lang_v1.dob'), 'readonly']); ?>

                    </div>
                </div>
            </div>

                
                
                

          
          <?php
            // $custom_labels = json_decode(session('business.custom_labels'), true);
            // $contact_custom_field1 = !empty($custom_labels['contact']['custom_field_1']) ? $custom_labels['contact']['custom_field_1'] : __('lang_v1.contact_custom_field1');
            // $contact_custom_field2 = !empty($custom_labels['contact']['custom_field_2']) ? $custom_labels['contact']['custom_field_2'] : __('lang_v1.contact_custom_field2');
            // $contact_custom_field3 = !empty($custom_labels['contact']['custom_field_3']) ? $custom_labels['contact']['custom_field_3'] : __('lang_v1.contact_custom_field3');
            // $contact_custom_field4 = !empty($custom_labels['contact']['custom_field_4']) ? $custom_labels['contact']['custom_field_4'] : __('lang_v1.contact_custom_field4');
            // $contact_custom_field5 = !empty($custom_labels['contact']['custom_field_5']) ? $custom_labels['contact']['custom_field_5'] : __('lang_v1.custom_field', ['number' => 5]);
            // $contact_custom_field6 = !empty($custom_labels['contact']['custom_field_6']) ? $custom_labels['contact']['custom_field_6'] : __('lang_v1.custom_field', ['number' => 6]);
            // $contact_custom_field7 = !empty($custom_labels['contact']['custom_field_7']) ? $custom_labels['contact']['custom_field_7'] : __('lang_v1.custom_field', ['number' => 7]);
            // $contact_custom_field8 = !empty($custom_labels['contact']['custom_field_8']) ? $custom_labels['contact']['custom_field_8'] : __('lang_v1.custom_field', ['number' => 8]);
            // $contact_custom_field9 = !empty($custom_labels['contact']['custom_field_9']) ? $custom_labels['contact']['custom_field_9'] : __('lang_v1.custom_field', ['number' => 9]);
            // $contact_custom_field10 = !empty($custom_labels['contact']['custom_field_10']) ? $custom_labels['contact']['custom_field_10'] : __('lang_v1.custom_field', ['number' => 10]);
          ?>
          
          <div class="col-md-12 shipping_addr_div"><hr></div>
          <div class="col-md-8 col-md-offset-2 shipping_addr_div mb-10" >
              <strong><?php echo e(__('lang_v1.shipping_address'), false); ?></strong><br>
              <?php echo Form::text('shipping_address', null, ['class' => 'form-control', 
                    'placeholder' => __('lang_v1.search_address'), 'id' => 'shipping_address']); ?>

            <div class="mb-10" id="map"></div>
          </div>
          <?php
                $shipping_custom_label_1 = !empty($custom_labels['shipping']['custom_field_1']) ? $custom_labels['shipping']['custom_field_1'] : '';

                $shipping_custom_label_2 = !empty($custom_labels['shipping']['custom_field_2']) ? $custom_labels['shipping']['custom_field_2'] : '';

                $shipping_custom_label_3 = !empty($custom_labels['shipping']['custom_field_3']) ? $custom_labels['shipping']['custom_field_3'] : '';

                $shipping_custom_label_4 = !empty($custom_labels['shipping']['custom_field_4']) ? $custom_labels['shipping']['custom_field_4'] : '';

                $shipping_custom_label_5 = !empty($custom_labels['shipping']['custom_field_5']) ? $custom_labels['shipping']['custom_field_5'] : '';
            ?>

            <?php if(!empty($custom_labels['shipping']['is_custom_field_1_contact_default']) && !empty($shipping_custom_label_1)): ?>
                <?php
                    $label_1 = $shipping_custom_label_1 . ':';
                ?>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('shipping_custom_field_1', $label_1 ); ?>

                        <?php echo Form::text('shipping_custom_field_details[shipping_custom_field_1]', null, ['class' => 'form-control','placeholder' => $shipping_custom_label_1]); ?>

                    </div>
                </div>
            <?php endif; ?>
            <?php if(!empty($custom_labels['shipping']['is_custom_field_2_contact_default']) && !empty($shipping_custom_label_2)): ?>
                <?php
                    $label_2 = $shipping_custom_label_2 . ':';
                ?>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('shipping_custom_field_2', $label_2 ); ?>

                        <?php echo Form::text('shipping_custom_field_details[shipping_custom_field_2]', null, ['class' => 'form-control','placeholder' => $shipping_custom_label_2]); ?>

                    </div>
                </div>
            <?php endif; ?>
            <?php if(!empty($custom_labels['shipping']['is_custom_field_3_contact_default']) && !empty($shipping_custom_label_3)): ?>
                <?php
                    $label_3 = $shipping_custom_label_3 . ':';
                ?>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('shipping_custom_field_3', $label_3 ); ?>

                        <?php echo Form::text('shipping_custom_field_details[shipping_custom_field_3]', null, ['class' => 'form-control','placeholder' => $shipping_custom_label_3]); ?>

                    </div>
                </div>
            <?php endif; ?>
            <?php if(!empty($custom_labels['shipping']['is_custom_field_4_contact_default']) && !empty($shipping_custom_label_4)): ?>
                <?php
                    $label_4 = $shipping_custom_label_4 . ':';
                ?>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('shipping_custom_field_4', $label_4 ); ?>

                        <?php echo Form::text('shipping_custom_field_details[shipping_custom_field_4]', null, ['class' => 'form-control','placeholder' => $shipping_custom_label_4]); ?>

                    </div>
                </div>
            <?php endif; ?>
            <?php if(!empty($custom_labels['shipping']['is_custom_field_5_contact_default']) && !empty($shipping_custom_label_5)): ?>
                <?php
                    $label_5 = $shipping_custom_label_5 . ':';
                ?>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('shipping_custom_field_5', $label_5 ); ?>

                        <?php echo Form::text('shipping_custom_field_details[shipping_custom_field_5]', null, ['class' => 'form-control','placeholder' => $shipping_custom_label_5]); ?>

                    </div>
                </div>
            <?php endif; ?>
            <?php if(!empty($common_settings['is_enabled_export'])): ?>
                <div class="col-md-12 mb-12">
                    <div class="form-check">
                        <input type="checkbox" name="is_export" class="form-check-input" id="is_customer_export">
                        <label class="form-check-label" for="is_customer_export"><?php echo app('translator')->get('lang_v1.is_export'); ?></label>
                    </div>
                </div>
                <?php
                    $i = 1;
                ?>
                <?php for($i; $i <= 6 ; $i++): ?>
                    <div class="col-md-4 export_div" style="display: none;">
                        <div class="form-group">
                            <?php echo Form::label('export_custom_field_'.$i, __('lang_v1.export_custom_field'.$i).':' ); ?>

                            <?php echo Form::text('export_custom_field_'.$i, null, ['class' => 'form-control','placeholder' => __('lang_v1.export_custom_field'.$i)]); ?>

                        </div>
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
            </div>
        </div>
        <?php echo $__env->make('layouts.partials.module_form_part', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    
    <div class="modal-footer">
      <button type="submit" class="tw-dw-btn bg-info tw-text-white"><?php echo app('translator')->get( 'Crear Tercero' ); ?></button>
      <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal"><?php echo app('translator')->get( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>

  
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<?php /**PATH C:\laragon\www\POS\alizazip\resources\views/contact/create.blade.php ENDPATH**/ ?>