

<?php $__env->startSection('title', __('messages.settings')); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('accounting::layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get( 'messages.settings' ); ?></h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#account_setting" data-toggle="tab" aria-expanded="true">
						    <?php echo app('translator')->get('accounting::lang.map_transactions'); ?>
						</a>
					</li>

			
				</ul>
				<div class="tab-content">

					<div class="tab-pane active" id="account_setting">
						<?php echo Form::open(['action' => '\Modules\Accounting\Http\Controllers\SettingsController@saveSettings',
						'method' => 'post']); ?>

						<div class="row mb-12">
							<div class="col-md-4">
            <button type="button" 
                    class="tw-dw-btn tw-dw-btn-error tw-text-white tw-dw-btn-sm" 
                    data-toggle="modal" 
                    data-target="#confirm_reset_modal">
                <?php echo app('translator')->get('accounting::lang.reset_data'); ?>
            </button>
</div>
            <div class="modal fade" id="confirm_reset_modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Restablecer Contabilidad</h4>
                        </div>
                        <div class="modal-body">
                            <p class="text-danger"><strong>Atención:</strong> Esta acción eliminará todos los datos contables de forma permanente.</p>
                            <div class="form-group">
                                <label>Ingrese el PIN de seguridad:</label>
                                <input type="password" id="reset_pin_input" class="form-control" placeholder="1234">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" id="execute_reset_btn">Confirmar Eliminación</button>
                        </div>
                    </div>
                </div>
            </div>


						</div>
						<br>

						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<?php echo Form::label('journal_entry_prefix', __('accounting::lang.journal_entry_prefix') . ':'); ?>

									<?php echo Form::text('journal_entry_prefix',!empty($accounting_settings['journal_entry_prefix'])?
									$accounting_settings['journal_entry_prefix'] : '',
									['class' => 'form-control ', 'id' => 'journal_entry_prefix']); ?>

								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<?php echo Form::label('transfer_prefix', __('accounting::lang.transfer_prefix') . ':'); ?>

									<?php echo Form::text('transfer_prefix',!empty($accounting_settings['transfer_prefix'])?
									$accounting_settings['transfer_prefix'] : '',
									['class' => 'form-control ', 'id' => 'transfer_prefix']); ?>

								</div>
							</div>
							<div class="col-md-3" style="padding-top: 25px;">
								<?php echo e(Form::submit('Guardar Prefijos', ['class'=>"tw-dw-btn bg-black tw-text-white tw-dw-btn-sm pt-2"]), false); ?>

							</div>
						</div>
						<?php echo Form::close(); ?>


						<hr />

						
						<h3>Mapeo de Transacciones a Cuentas PUC</h3>
						<p class="text-muted">Seleccione un tipo de transacción y configure las cuentas contables que se afectan automáticamente.</p>

						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label>Tipo de Movimiento:</label>
									<select class="form-control" id="mapping_transaction_type">
										<?php if(isset($transaction_types)): ?>
											<?php $__currentLoopData = $transaction_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($key, false); ?>"><?php echo e($label, false); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
									</select>
								</div>
							</div>
							<div class="col-md-3" style="padding-top: 25px;">
								<button type="button" class="tw-dw-btn bg-black tw-text-white tw-dw-btn-sm pt-2" id="add_mapping_row">
									<i class="fas fa-plus"></i> Agregar Cuenta
								</button>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="mapping_table">
								<thead class="thead-dark">
									<tr>
										<th style="width:30%">Cuenta Contable (PUC)</th>
										<th style="width:10%">Código GL</th>
										<th style="width:12%">Naturaleza</th>
										<th style="width:30%">Descripción</th>
										<th style="width:10%">Acciones</th>
									</tr>
								</thead>
								<tbody id="mapping_rows">
									<tr id="mapping_empty_row">
										<td colspan="5" class="text-center text-muted">
											Seleccione un tipo de movimiento y agregue cuentas contables.
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="row">
							<div class="col-md-12 text-center">
								<button type="button" class="tw-dw-btn bg-black tw-text-white tw-dw-btn-sm pt-2" id="save_mappings">
									<i class="fas fa-save"></i> Guardar Mapeo
								</button>
							</div>
						</div>

						<hr/>

	<!-- Old static/default map section hidden -->
	<div style="display:none;"><table class="REMOVED_OLD_STATIC_TABLE">
        <thead class="thead-dark">
            <tr>
                <th>Description</th>
                <th>Code GL</th>
                <th>Account Name</th>
                <th>Nature</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
            <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="icon"><i class="fa fa-th"></i></span>
                        Link account settings                    </div>
                    <div class="tools">
                        <div class=""></div>
                    </div>
                </div>
                <div id="contTabla" class="portlet-body ">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="pull-left">
                                <label> <b> MOVEMENTS FOR AUTOMATIC MAPPING </b> </label>
                                <div class="btn-group">
                                    <select v-on:change="get_accounts()" id="module_id" v-model="module_id" class="form-control">
                                        <option v-for="item in modules" :value="item.module_id">
                                            <option value="1">WHEN CREATING INVOICES</option>
                                            <option value="2">WHEN PURCHASING FROM SUPPLIERS</option>
                                            <option value="3">EXPENSES ARE MADE</option>
                                            <option value="3">STOCK ENTRY ARE MADE</option>
                                            <option value="4">STOCK ADJUSTMENTS ARE MADE</option>
                                            <option value="5">INVENTORY TRANSFER</option>
                                            <option value="6">PAYMENT OF SUPPLIER CREDIT</option>
                                            <option value="7">PAYROLL</option>
                                            <option value="8">PAYROLL PAYABLE</option>
                                            <option value="9">CUSTOMER CREDIT/PAYMENT</option>
                                            <option value="10">EMPLOYEE LOANS</option>
                                            <option value="11">BANK TO CASH TRANSFER</option>
                                            <option value="12">CASH TRANSFER TO BANK</option>
                                            <option value="13">BANK TO BANK MONEY TRANSFER</option>
                                            <option value="14">BANK LOAN PAYMENTS</option>
                                            <option value="15">REDEEM POINTS</option>
                                            <option value="16">SUPPORTING DOCUMENT</option>
                                        </option>
                                    </select>

                                </div>
                            </div>
                        
                            
                        
            
                
                <tr>
                    <td colspan="5" class="text-center">There are no registered accounts.</td>
                </tr>
            
        </tbody>
    </table>	




            
                        
            












						<h3><?php echo app('translator')->get('accounting::lang.automatic_accounting_entries'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('accounting::lang.map_transactions_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h3>

						<?php $__currentLoopData = $business_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $business_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php $__env->startComponent('components.widget', ['title' => $business_location->name]); ?>

						<?php
						$default_map = json_decode($business_location->accounting_default_map, true);
						//print_r($default_map);exit;

						$sale_payment_account = isset($default_map['sale']['payment_account']) ? \Modules\Accounting\Entities\AccountingAccount::find($default_map['sale']['payment_account']) : null;

						$sale_deposit_to = isset($default_map['sale']['deposit_to']) ? \Modules\Accounting\Entities\AccountingAccount::find($default_map['sale']['deposit_to']) : null;

						$sales_payments_payment_account = isset($default_map['sell_payment']['payment_account']) ? \Modules\Accounting\Entities\AccountingAccount::find($default_map['sell_payment']['payment_account']) : null;

						$sales_payments_deposit_to = isset($default_map['sell_payment']['deposit_to']) ? \Modules\Accounting\Entities\AccountingAccount::find($default_map['sell_payment']['deposit_to']) : null;

						$purchases_payment_account = isset($default_map['purchases']['payment_account']) ? \Modules\Accounting\Entities\AccountingAccount::find($default_map['purchases']['payment_account']) : null;

						$purchases_deposit_to = isset($default_map['purchases']['deposit_to']) ? \Modules\Accounting\Entities\AccountingAccount::find($default_map['purchases']['deposit_to']) : null;

						$purchase_payments_payment_account = isset($default_map['purchase_payment']['payment_account']) ? \Modules\Accounting\Entities\AccountingAccount::find($default_map['purchase_payment']['payment_account']) : null;

						$purchase_payments_deposit_to = isset($default_map['purchase_payment']['deposit_to']) ? \Modules\Accounting\Entities\AccountingAccount::find($default_map['purchase_payment']['deposit_to']) : null;


						$expense_payment_account = isset($default_map['expense']['payment_account']) ? \Modules\Accounting\Entities\AccountingAccount::find($default_map['expense']['payment_account']) : null;

						$expense_deposit_to = isset($default_map['expense']['deposit_to']) ? \Modules\Accounting\Entities\AccountingAccount::find($default_map['expense']['deposit_to']) : null;

						?>

						<strong><?php echo app('translator')->get('sale.sale'); ?></strong>

						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<?php echo Form::label('payment_account', __('accounting::lang.payment_account') . ':' ); ?>

									<?php echo Form::select('payment_account', !is_null($sale_payment_account) ? [$sale_payment_account->id => $sale_payment_account->name] : [], $sale_payment_account->id ?? null, ['class' => 'form-control accounts-dropdown width-100','placeholder' => __('accounting::lang.payment_account'), 'name' => "accounting_default_map[$business_location->id][sale][payment_account]",
									'id' => $business_location->id . 'sale_payment_account']); ?>

								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<?php echo Form::label('deposit_to', __('accounting::lang.deposit_to') . ':' ); ?>

									<?php echo Form::select('deposit_to', !is_null($sale_deposit_to) ?
									[$sale_deposit_to->id => $sale_deposit_to->name] : [], $sale_deposit_to->id ?? null, ['class' => 'form-control accounts-dropdown width-100','placeholder' => __('accounting::lang.deposit_to'), 'name' => "accounting_default_map[$business_location->id][sale][deposit_to]",
									'id' => $business_location->id . '_sale_deposit_to']); ?>

								</div>
							</div>
						</div>

						<hr>
						
						
						
						
						
							<strong><?php echo app('translator')->get('sale.sale'); ?></strong>

						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<?php echo Form::label('payment_account', __('accounting::lang.payment_account') . ':' ); ?>

									<?php echo Form::select('payment_account', !is_null($sale_payment_account) ? [$sale_payment_account->id => $sale_payment_account->name] : [], $sale_payment_account->id ?? null, ['class' => 'form-control accounts-dropdown width-100','placeholder' => __('accounting::lang.payment_account'), 'name' => "accounting_default_map[$business_location->id][sale][payment_account]",
									'id' => $business_location->id . 'sale_payment_account']); ?>

								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<?php echo Form::label('deposit_to', __('accounting::lang.deposit_to') . ':' ); ?>

									<?php echo Form::select('deposit_to', !is_null($sale_deposit_to) ?
									[$sale_deposit_to->id => $sale_deposit_to->name] : [], $sale_deposit_to->id ?? null, ['class' => 'form-control accounts-dropdown width-100','placeholder' => __('accounting::lang.deposit_to'), 'name' => "accounting_default_map[$business_location->id][sale][deposit_to]",
									'id' => $business_location->id . '_sale_deposit_to']); ?>

								</div>
							</div>
						</div>

						<hr>
						
						
						
						

						<strong><?php echo app('translator')->get('accounting::lang.sales_payments'); ?></strong>

						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<?php echo Form::label('payment_account', __('accounting::lang.payment_account') . ':' ); ?>

									<?php echo Form::select('payment_account', !is_null($sales_payments_payment_account) ? [$sales_payments_payment_account->id => $sales_payments_payment_account->name] : [], $sales_payments_payment_account->id ?? null, ['class' => 'form-control accounts-dropdown width-100','placeholder' => __('accounting::lang.payment_account'), 'name' => "accounting_default_map[$business_location->id][sell_payment][payment_account]", 'id' => $business_location->id . 'sales_payments_payment_account']); ?>

								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<?php echo Form::label('deposit_to', __('accounting::lang.deposit_to') . ':' ); ?>

									<?php echo Form::select('deposit_to', !is_null($sales_payments_deposit_to) ?
									[$sales_payments_deposit_to->id => $sales_payments_deposit_to->name] : [], $sales_payments_deposit_to->id ?? null, ['class' => 'form-control accounts-dropdown width-100','placeholder' => __('accounting::lang.deposit_to'), 'name' => "accounting_default_map[$business_location->id][sell_payment][deposit_to]",
									'id' => $business_location->id . 'sales_payments_deposit_to'
									]); ?>

								</div>
							</div>
						</div>

						<hr>
						<strong><?php echo app('translator')->get('purchase.purchases'); ?></strong>

						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<?php echo Form::label('payment_account', __('accounting::lang.payment_account') . ':' ); ?>

									<?php echo Form::select('payment_account', !is_null($purchases_payment_account) ? [$purchases_payment_account->id => $purchases_payment_account->name] : [], $purchases_payment_account->id ?? null, ['class' => 'form-control accounts-dropdown width-100','placeholder' => __('accounting::lang.payment_account'), 'name' => "accounting_default_map[$business_location->id][purchases][payment_account]",
									'id' => $business_location->id . 'purchases_payment_account']); ?>

								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<?php echo Form::label('deposit_to', __('accounting::lang.deposit_to') . ':' ); ?>

									<?php echo Form::select('deposit_to', !is_null($purchases_deposit_to) ?
									[$purchases_deposit_to->id => $purchases_deposit_to->name] : [], $purchases_deposit_to->id ?? null, ['class' => 'form-control accounts-dropdown width-100','placeholder' => __('accounting::lang.deposit_to'), 'name' => "accounting_default_map[$business_location->id][purchases][deposit_to]",
									'id' => $business_location->id . '_purchases_deposit_to']); ?>

								</div>
							</div>
						</div>

						<hr>
						<strong><?php echo app('translator')->get('accounting::lang.purchase_payments'); ?></strong>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<?php echo Form::label('payment_account', __('accounting::lang.payment_account') . ':' ); ?>

									<?php echo Form::select('payment_account', !is_null($purchase_payments_payment_account) ? [$purchase_payments_payment_account->id => $purchase_payments_payment_account->name] : [], $purchase_payments_payment_account->id ?? null, ['class' => 'form-control accounts-dropdown width-100','placeholder' => __('accounting::lang.payment_account'), 'name' => "accounting_default_map[$business_location->id][purchase_payment][payment_account]",
									'id' => $business_location->id . 'purchase_payments_payment_account']); ?>

								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<?php echo Form::label('deposit_to', __('accounting::lang.deposit_to') . ':' ); ?>

									<?php echo Form::select('deposit_to', !is_null($purchase_payments_deposit_to) ?
									[$purchase_payments_deposit_to->id => $purchase_payments_deposit_to->name] : [], $purchase_payments_deposit_to->id ?? null, ['class' => 'form-control accounts-dropdown width-100','placeholder' => __('accounting::lang.deposit_to'), 'name' => "accounting_default_map[$business_location->id][purchase_payment][deposit_to]",
									'id' => $business_location->id . '_purchase_payments_deposit_to']); ?>

								</div>
							</div>
						</div>
						<hr>
						<div style="background-color: #2dce89 !important; padding:10px">
							<strong><?php echo app('translator')->get('accounting::lang.expenses'); ?></strong>
							<div class="row m-2">
								<div class="col-md-3">
									<div class="form-group">
										<?php echo Form::label('payment_account', __('accounting::lang.payment_account') . ':' ); ?>

										<?php echo Form::select('payment_account', !is_null($expense_payment_account) ? [$expense_payment_account->id => $expense_payment_account->name] : [], $expense_payment_account->id ?? null, ['class' => 'form-control accounts-dropdown width-100','placeholder' => __('accounting::lang.payment_account'), 'name' => "accounting_default_map[$business_location->id][expense][payment_account]",
										'id' => $business_location->id . 'expense_payment_account']); ?>

									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<?php echo Form::label('deposit_to', __('accounting::lang.deposit_to') . ':' ); ?>

										<?php echo Form::select('deposit_to', !is_null($expense_deposit_to) ?
										[$expense_deposit_to->id => $expense_deposit_to->name] : [], $expense_deposit_to->id ?? null, ['class' => 'form-control accounts-dropdown width-100','placeholder' => __('accounting::lang.deposit_to'), 'name' => "accounting_default_map[$business_location->id][expense][deposit_to]",
										'id' => $business_location->id . '_expense_deposit_to']); ?>

									</div>
								</div>
							</div>
	
							<?php $__currentLoopData = $expence_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expence_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
								$dynamic_variable_payment_account = isset($default_map['expense_'.$expence_category->id]['payment_account']) ? \Modules\Accounting\Entities\AccountingAccount::find($default_map['expense_'.$expence_category->id]['payment_account']) : null;
							?>
							<strong><?php echo app('translator')->get('accounting::lang.expenses'); ?> <?php echo e($expence_category->name, false); ?></strong>
							<div class="row m-2">
								<div class="col-md-3"> 
									<div class="form-group">
										<?php echo Form::label('payment_account', __('accounting::lang.payment_account') . ':' ); ?>

										<?php echo Form::select('payment_account', !is_null($dynamic_variable_payment_account) ? [$dynamic_variable_payment_account->id => $dynamic_variable_payment_account->name] : [], $dynamic_variable_payment_account->id ?? null, ['class' => 'form-control accounts-dropdown width-100','placeholder' => __('accounting::lang.payment_account'), 'name' => "accounting_default_map[$business_location->id][expense_$expence_category->id][payment_account]", 'id' => $business_location->id . 'expense_'.$expence_category->id .'_payment_account']); ?>

									</div>
								</div>
								<?php	
									$dynamic_variable_deposit_to = isset($default_map['expense_'.$expence_category->id]['deposit_to']) ? \Modules\Accounting\Entities\AccountingAccount::find($default_map['expense_'.$expence_category->id]['deposit_to']) : null;
								?>
								<div class="col-md-3">
									<div class="form-group">
										<?php echo Form::label('deposit_to', __('accounting::lang.deposit_to') . ':' ); ?>

										<?php echo Form::select('deposit_to', !is_null($dynamic_variable_deposit_to) ?
										[$dynamic_variable_deposit_to->id => $dynamic_variable_deposit_to->name] : [], $dynamic_variable_deposit_to->id ?? null, ['class' => 'form-control accounts-dropdown width-100','placeholder' => __('accounting::lang.deposit_to'), 'name' => "accounting_default_map[$business_location->id][expense_$expence_category->id][deposit_to]",
										'id' => $business_location->id . '_expense_deposit_to']); ?>

									</div>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						<?php echo $__env->renderComponent(); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<div class="row">
							<div class="col-md-12 text-center">
								<div class="form-group">
									<?php echo e(Form::submit(__('messages.update'), ['class'=>"tw-dw-btn tw-dw-btn-primary tw-text-white tw-dw-btn-lg"]), false); ?>

								</div>
							</div>
						</div>
						<?php echo Form::close(); ?>

						</div><!-- end hidden old section -->
					</div>



					<div class="tab-pane" id="sub_type_tab">
						<div class="row">
							<div class="col-md-12">
								<button class="tw-dw-btn tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-white tw-border-none tw-rounded-full pull-right"id="add_account_sub_type" >
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
										stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
										class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<path d="M12 5l0 14" />
										<path d="M5 12l14 0" />
									</svg> <?php echo app('translator')->get('messages.add'); ?>
								</button>
							</div>
							<div class="col-md-12">
								<br>
								<table class="table table-bordered table-striped" id="account_sub_type_table">
									<thead>
										<tr>
											<th>
												<?php echo app('translator')->get('accounting::lang.account_sub_type'); ?>
											</th>
											<th>
												<?php echo app('translator')->get('accounting::lang.account_type'); ?>
											</th>
											<th>
												<?php echo app('translator')->get('messages.action'); ?>
											</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="detail_type_tab">
						<div class="row">
							<div class="col-md-12">
								<button class="tw-dw-btn tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 tw-font-bold tw-text-white tw-border-none tw-rounded-full pull-right"id="add_detail_type" >
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
										stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
										class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<path d="M12 5l0 14" />
										<path d="M5 12l14 0" />
									</svg> <?php echo app('translator')->get('messages.add'); ?>
								</button>
							</div>
							<div class="col-md-12">
								<br>
								<table class="table table-striped" id="detail_type_table" style="width: 100%;">
									<thead>
										<tr>
											<th>
												<?php echo app('translator')->get('accounting::lang.detail_type'); ?>
											</th>
											<th>
												<?php echo app('translator')->get('accounting::lang.parent_type'); ?>
											</th>
											<th>
												<?php echo app('translator')->get('lang_v1.description'); ?>
											</th>
											<th>
												<?php echo app('translator')->get('messages.action'); ?>
											</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php echo $__env->make('accounting::account_type.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="modal fade" id="edit_account_type_modal" tabindex="-1" role="dialog">
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php echo $__env->make('accounting::accounting.common_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<script type="text/javascript">
	$(document).ready(function() {
		account_sub_type_table = $('#account_sub_type_table').DataTable({
			processing: true,
			serverSide: true,
			ajax: "<?php echo e(action([\Modules\Accounting\Http\Controllers\AccountTypeController::class, 'index']), false); ?>?account_type=sub_type",
			columnDefs: [{
				targets: [2],
				orderable: false,
				searchable: false,
			}, ],
			columns: [{
					data: 'name',
					name: 'name'
				},
				{
					data: 'account_primary_type',
					name: 'account_primary_type'
				},
				{
					data: 'action',
					name: 'action'
				},
			],
		});

		detail_type_table = $('#detail_type_table').DataTable({
			processing: true,
			serverSide: true,
			ajax: "<?php echo e(action([\Modules\Accounting\Http\Controllers\AccountTypeController::class, 'index']), false); ?>?account_type=detail_type",
			columnDefs: [{
				targets: 3,
				orderable: false,
				searchable: false,
			}, ],
			columns: [{
					data: 'name',
					name: 'name'
				},
				{
					data: 'parent_type',
					name: 'parent_type'
				},
				{
					data: 'description',
					name: 'description'
				},
				{
					data: 'action',
					name: 'action'
				},
			],
		});

		$('#add_account_sub_type').click(function() {
			$('#account_type').val('sub_type')
			$('#account_type_title').text("<?php echo e(__('accounting::lang.add_account_sub_type'), false); ?>");
			$('#description_div').addClass('hide');
			$('#parent_id_div').addClass('hide');
			$('#account_type_div').removeClass('hide');
			$('#create_account_type_modal').modal('show');
		});

		$('#add_detail_type').click(function() {
			$('#account_type').val('detail_type')
			$('#account_type_title').text("<?php echo e(__('accounting::lang.add_detail_type'), false); ?>");
			$('#description_div').removeClass('hide');
			$('#parent_id_div').removeClass('hide');
			$('#account_type_div').addClass('hide');
			$('#create_account_type_modal').modal('show');
		})
	});
	$(document).on('hidden.bs.modal', '#create_account_type_modal', function(e) {
		$('#create_account_type_form')[0].reset();
	})
	$(document).on('submit', 'form#create_account_type_form', function(e) {
		e.preventDefault();
		var form = $(this);
		var data = form.serialize();

		$.ajax({
			method: 'POST',
			url: $(this).attr('action'),
			dataType: 'json',
			data: data,
			success: function(result) {
				if (result.success == true) {
					$('#create_account_type_modal').modal('hide');
					toastr.success(result.msg);
					if (result.data.account_type == 'sub_type') {
						account_sub_type_table.ajax.reload();
					} else {
						detail_type_table.ajax.reload();
					}
					$('#create_account_type_form').find('button[type="submit"]').attr('disabled', false);
				} else {
					toastr.error(result.msg);
				}
			},
		});
	});

	$(document).on('submit', 'form#edit_account_type_form', function(e) {
		e.preventDefault();
		var form = $(this);
		var data = form.serialize();

		$.ajax({
			method: 'PUT',
			url: $(this).attr('action'),
			dataType: 'json',
			data: data,
			success: function(result) {
				if (result.success == true) {
					$('#edit_account_type_modal').modal('hide');
					toastr.success(result.msg);
					if (result.data.account_type == 'sub_type') {
						account_sub_type_table.ajax.reload();
					} else {
						detail_type_table.ajax.reload();
					}

				} else {
					toastr.error(result.msg);
				}
			},
		});
	});

	$(document).on('click', 'button.delete_account_type_button', function() {
		swal({
			title: LANG.sure,
			icon: 'warning',
			buttons: true,
			dangerMode: true,
		}).then(willDelete => {
			if (willDelete) {
				var href = $(this).data('href');
				var data = $(this).serialize();

				$.ajax({
					method: 'DELETE',
					url: href,
					dataType: 'json',
					data: data,
					success: function(result) {
						if (result.success == true) {
							toastr.success(result.msg);
							account_sub_type_table.ajax.reload();
							detail_type_table.ajax.reload();
						} else {
							toastr.error(result.msg);
						}
					},
				});
			}
		});
	});

	// PUC Colombia: Transaction Mapping Logic
	var currentMappingType = 'sale';

	function loadMappings(type) {
		currentMappingType = type;
		$('#mapping_rows').html('<tr><td colspan="5" class="text-center"><i class="fas fa-spinner fa-spin"></i> Cargando...</td></tr>');

		$.ajax({
			url: '/accounting/mappings',
			data: { type: type },
			headers: { 'X-Requested-With': 'XMLHttpRequest' },
			success: function(data) {
				$('#mapping_rows').empty();
				if (data.length === 0) {
					$('#mapping_rows').html('<tr id="mapping_empty_row"><td colspan="5" class="text-center text-muted">No hay cuentas mapeadas para este tipo de transacción. Haga clic en "Agregar Cuenta".</td></tr>');
					return;
				}
				data.forEach(function(row) {
					addMappingRow(row);
				});
			},
			error: function() {
				$('#mapping_rows').html('<tr><td colspan="5" class="text-center text-danger">Error al cargar mapeos.</td></tr>');
			}
		});
	}

	function addMappingRow(data) {
		$('#mapping_empty_row').remove();
		var idx = Date.now();
		var html = '<tr class="mapping-row" data-id="' + (data ? data.id || '' : '') + '">';
		html += '<td><select class="form-control accounts-dropdown mapping-account" name="rows[' + idx + '][accounting_account_id]" style="width:100%;">';
		if (data && data.accounting_account_id) {
			html += '<option value="' + data.accounting_account_id + '" selected>' + data.gl_code + ' - ' + data.account_name + '</option>';
		}
		html += '</select></td>';
		html += '<td class="mapping-gl-code text-center">' + (data ? data.gl_code || '' : '') + '</td>';
		html += '<td><select class="form-control" name="rows[' + idx + '][nature]">';
		html += '<option value="debit"' + (data && data.nature === 'debit' ? ' selected' : '') + '>Débito</option>';
		html += '<option value="credit"' + (data && data.nature === 'credit' ? ' selected' : '') + '>Crédito</option>';
		html += '</select></td>';
		html += '<td><input type="text" class="form-control" name="rows[' + idx + '][description]" value="' + (data ? data.description || '' : '') + '" placeholder="Descripción..."></td>';
		html += '<td class="text-center"><button type="button" class="btn btn-sm btn-danger remove-mapping-row"><i class="fas fa-trash"></i></button></td>';
		html += '</tr>';

		$('#mapping_rows').append(html);

		// Initialize Select2 on the new dropdown
		$('#mapping_rows tr:last .mapping-account').select2({
			ajax: {
				url: '/accounting/accounts-dropdown',
				dataType: 'json',
				headers: { 'X-Requested-With': 'XMLHttpRequest' },
				data: function(params) { return { q: params.term }; },
				processResults: function(data) { return { results: data }; }
			},
			minimumInputLength: 1,
			allowClear: true,
			placeholder: 'Buscar cuenta PUC...',
			escapeMarkup: function(m) { return m; },
			templateResult: function(d) { return d.html || d.text; },
			templateSelection: function(d) { return d.text; }
		});
	}

	// Load mappings on type change
	$('#mapping_transaction_type').on('change', function() {
		loadMappings($(this).val());
	});

	// Load initial type
	loadMappings($('#mapping_transaction_type').val());

	// Add row button
	$('#add_mapping_row').on('click', function() {
		addMappingRow(null);
	});

	// Remove row
	$(document).on('click', '.remove-mapping-row', function() {
		$(this).closest('tr').remove();
		if ($('#mapping_rows tr').length === 0) {
			$('#mapping_rows').html('<tr id="mapping_empty_row"><td colspan="5" class="text-center text-muted">No hay cuentas mapeadas.</td></tr>');
		}
	});

	// Save mappings
	$('#save_mappings').on('click', function() {
		var rows = [];
		$('#mapping_rows .mapping-row').each(function() {
			var $row = $(this);
			var accountId = $row.find('.mapping-account').val();
			if (accountId) {
				rows.push({
					accounting_account_id: accountId,
					nature: $row.find('select[name*="nature"]').val(),
					description: $row.find('input[name*="description"]').val()
				});
			}
		});

		$.ajax({
			url: '/accounting/mappings',
			method: 'POST',
			data: {
				_token: '<?php echo e(csrf_token(), false); ?>',
				transaction_type: currentMappingType,
				rows: rows
			},
			success: function(result) {
				if (result.success) {
					toastr.success(result.msg);
					loadMappings(currentMappingType);
				} else {
					toastr.error(result.msg);
				}
			},
			error: function() {
				toastr.error('Error al guardar mapeos.');
			}
		});
	});

	// Update GL code when account selected
	$(document).on('select2:select', '.mapping-account', function(e) {
		var data = e.params.data;
		var $td = $(this).closest('tr').find('.mapping-gl-code');
		var text = data.text || '';
		var gl = text.split(' - ')[0] || '';
		$td.text(gl.trim());
	});

	$(document).on('click', 'button.accounting_reset_data', function() {
		swal({
			title: LANG.sure,
			icon: 'warning',
			text: "<?php echo app('translator')->get('accounting::lang.reset_help_txt'); ?>",
			buttons: true,
			dangerMode: true,
		}).then(willDelete => {
			if (willDelete) {
				var href = $(this).data('href');
				window.location.href = href;
			}
		});
	});
	$(document).on('click', '#execute_reset_btn', function() {
    const pinDefinido = "2026"; // Cambia este PIN por el que desees
    const pinIngresado = $('#reset_pin_input').val();
    const url = "<?php echo e(action([\Modules\Accounting\Http\Controllers\SettingsController::class, 'resetData']), false); ?>";

    if (pinIngresado === pinDefinido) {
        window.location.href = url;
    } else {
        alert("PIN incorrecto. Acción cancelada por seguridad.");
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/Accounting/Providers/../Resources/views/settings/index.blade.php ENDPATH**/ ?>