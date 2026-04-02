

<?php $__env->startSection('title', __('sale.pos_sale')); ?>

<?php $__env->startSection('content'); ?>
    <section class="content no-print">
        <input type="hidden" id="amount_rounding_method" value="<?php echo e($pos_settings['amount_rounding_method'] ?? '', false); ?>">
        <?php if(!empty($pos_settings['allow_overselling'])): ?>
            <input type="hidden" id="is_overselling_allowed">
        <?php endif; ?>
        <?php if(!empty($pos_settings['enable_msp']) && $pos_settings['enable_msp'] == 1): ?>
            <input type="hidden" id="enable_msp_enabled">
        <?php endif; ?>
        <?php if(session('business.enable_rp') == 1): ?>
            <input type="hidden" id="reward_point_enabled">
        <?php endif; ?>
        <?php
            $is_discount_enabled = $pos_settings['disable_discount'] != 1 ? true : false;
            $is_rp_enabled = session('business.enable_rp') == 1 ? true : false;
        ?>
        <?php echo Form::open([
            'url' => action([\App\Http\Controllers\SellPosController::class, 'store']),
            'method' => 'post',
            'id' => 'add_pos_sell_form',
        ]); ?>

        <div class="row mb-12">
            <div class="col-md-12 tw-pt-0">
                <div class="row tw-flex lg:tw-flex-row md:tw-flex-col sm:tw-flex-col tw-flex-col tw-items-start md:tw-gap-4">
                    
                    <div class="tw-px-3 tw-w-full  lg:tw-px-0 lg:tw-pr-0 col-lg-3 col-sm-3" style="overflow: hidden">
                        
                        <div class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-rounded-2xl tw-bg-white tw-p-2">
                            
                                <div class="box-body pb-0">
                                    <!-- Productos-->
                                    <?php echo Form::hidden('location_id', $default_location->id ?? null, [
                                        'id' => 'location_id',
                                        'data-receipt_printer_type' => !empty($default_location->receipt_printer_type)
                                            ? $default_location->receipt_printer_type
                                            : 'browser',
                                        'data-default_payment_accounts' => $default_location->default_payment_accounts ?? '',
                                    ]); ?>

                                    <!-- sub_type -->
                                    <?php echo Form::hidden('sub_type', isset($sub_type) ? $sub_type : null); ?>

                                    <input type="hidden" id="item_addition_method"
                                        value="<?php echo e($business_details->item_addition_method, false); ?>">
                                    <!-- Fin Productos-->
                                    
                                    <?php echo $__env->make('sale_pos.partials.pos_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- titulos de prodcuto, cantidad y total -->

                                    <?php echo $__env->make('sale_pos.partials.pos_form_totals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('sale_pos.partials.payment_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php if(empty($pos_settings['disable_suspend'])): ?>
                                        <?php echo $__env->make('sale_pos.partials.suspend_note_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>

                                    <?php if(empty($pos_settings['disable_recurring_invoice'])): ?>
                                        <?php echo $__env->make('sale_pos.partials.recurring_invoice_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                </div>
                            
                            <!-- BOTONES  a VERDE Y AMARILLO COBRAR y A CREDITO-->
                            <div style="display: flex; " id="buttons-container">
                                <?php if(!Gate::check('disable_pay_checkout') || auth()->user()->can('superadmin') || auth()->user()->can('admin')): ?>
                                <button type="button" style="flex: 1; margin-left: 12px;  font-size: 15px" 
                                    class="tw-hidden md:tw-flex md:tw-flex-row md:tw-items-center md:tw-justify-center md:tw-gap-1 tw-font-bold tw-text-white tw-cursor-pointer tw-text-xs md:tw-text-sm tw-bg-[#001F3E] btn btn-success tw-rounded-md tw-p-2 tw-w-[8.5rem] <?php if(!isMobile()): ?>  <?php endif; ?> no-print <?php if($pos_settings['disable_pay_checkout'] != 0): ?> hide <?php endif; ?>"
                                    id="pos-finalize" title="<?php echo app('translator')->get('lang_v1.tooltip_checkout_multi_pay'); ?>"><i class=""
                                        aria-hidden="true"></i> COBRAR </button>
                                <?php endif; ?>
                                <div style="width: 10px"></div>
                                <?php if(!Gate::check('disable_express_checkout') || auth()->user()->can('superadmin') || auth()->user()->can('admin')): ?>
                                    <button type="button" style="flex: 1; margin-right: 12px"
                                        class="tw-font-bold tw-text-white tw-cursor-pointer tw-text-xs md:tw-text-sm tw-bg-[rgb(40,183,123)] tw-p-2 tw-rounded-md tw-w-[8.5rem] tw-hidden md:tw-flex lg:tw-flex lg:tw-flex-row btn btn-warning lg:tw-items-center lg:tw-justify-center lg:tw-gap-1 <?php if(!isMobile()): ?>  <?php endif; ?> no-print <?php if($pos_settings['disable_express_checkout'] != 0 || !array_key_exists('cash', $payment_types)): ?> hide <?php endif; ?> pos-express-finalize"
                                        data-pay_method="cash" title="<?php echo app('translator')->get('tooltip.express_checkout'); ?>"> <i class=""
                                            aria-hidden="true"></i> <?php echo app('translator')->get('lang_v1.express_checkout_cash'); ?></button>
                                <?php endif; ?> 

                                <?php if(!Gate::check('disable_credit_sale') || auth()->user()->can('superadmin') || auth()->user()->can('admin')): ?>
                                    <?php if(empty($pos_settings['disable_credit_sale_button'])): ?>
                                        <input type="hidden" name="is_credit_sale" value="0" id="is_credit_sale">
                                        <button type="button" style="flex: 1; margin-right: 12px; font-size: 15px"
                                            class="  tw-text-gray-700 tw-cursor-pointer tw-text-xs md:tw-text-sm tw-flex tw-flex-col tw-items-center tw-justify-center tw-gap-1 no-print pos-express-finalize btn-danger col-xs-6"
                                            data-pay_method="credit_sale" title="<?php echo app('translator')->get('lang_v1.tooltip_credit_sale'); ?>"
                                            <?php if(!empty($only_payment)): ?> disabled <?php endif; ?>>
                                            Crédito
                                        </button>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            
                            <div  style="display: none;" class="tw-flex tw-flex-row tw-items-center tw-justify-center tw-gap-1" id="loading-gif">
                                <img src="<?php echo e(asset('img/login.gif'), false); ?>" alt="Loading" class="tw-w-10 tw-h-10">
                            </div>
                        </div>

                         

                    
                    </div>
                    
                    <?php if(empty($pos_settings['hide_product_suggestion']) && !isMobile()): ?>
                        <div class="col-lg-9" style="height: calc(100vh - 200px); min-height: 60vh;">
                            <?php echo $__env->make('sale_pos.partials.pos_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
        <?php echo $__env->make('sale_pos.partials.pos_form_actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo Form::close(); ?>

    </section>

    <!-- This will be printed -->
    <section class="invoice print_section" id="receipt_section">
    </section>
    <div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <?php echo $__env->make('contact.create', ['quick_add' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php if(empty($pos_settings['hide_product_suggestion']) && isMobile()): ?>
        <?php echo $__env->make('sale_pos.partials.mobile_product_suggestions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- /.content -->
    <div class="modal fade register_details_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade close_register_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <!-- quick product modal -->
    <div class="modal fade quick_add_product_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"></div>

    <div class="modal fade" id="expense_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    
    <div class="modal fade" id="cash-withdrawal-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>

    <?php echo $__env->make('sale_pos.partials.configure_search_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('sale_pos.partials.recent_transactions_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('sale_pos.partials.weighing_scale_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Edit Rack Details Modal for POS -->
    <div class="modal fade" id="edit_rack_details_modal_pos" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!-- include module css -->
    <?php if(!empty($pos_module_data)): ?>
        <?php $__currentLoopData = $pos_module_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($value['module_css_path'])): ?>
                <?php if ($__env->exists($value['module_css_path'])) echo $__env->make($value['module_css_path'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/pos.js?v=' . time() . $asset_v), false); ?>"></script>
    <script src="<?php echo e(asset('js/printer.js?v=' . time() . $asset_v), false); ?>"></script>
    <script src="<?php echo e(asset('js/product.js?v=' . time() . $asset_v), false); ?>"></script>
    <script src="<?php echo e(asset('js/opening_stock.js?v=' . time() . $asset_v), false); ?>"></script>

    <?php echo $__env->make('sale_pos.partials.keyboard_shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Call restaurant module if defined -->
    <?php if(in_array('tables', $enabled_modules) ||
            in_array('modifiers', $enabled_modules) ||
            in_array('service_staff', $enabled_modules)): ?>
        <script src="<?php echo e(asset('js/restaurant.js?v=' . $asset_v), false); ?>"></script>
    <?php endif; ?>
    <!-- include module js -->
    <?php if(!empty($pos_module_data)): ?>
        <?php $__currentLoopData = $pos_module_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($value['module_js_path'])): ?>
                <?php if ($__env->exists($value['module_js_path'], ['view_data' => $value['view_data']])) echo $__env->make($value['module_js_path'], ['view_data' => $value['view_data']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    
    
    <script type="text/javascript">
        $(document).ready(function() {
            
            // Initialize rack filter to default (Todos) on page load
            if (!sessionStorage.getItem('pos_rack_filter')) {
                sessionStorage.setItem('pos_rack_filter', '');
            }
            
            // Rack filter functionality - Combobox change event
            var global_rack_filter = null;
            
            $('#product_rack_filter').on('change', function(e) {
                global_rack_filter = $(this).val();
                if (global_rack_filter === '' || global_rack_filter === 'all') {
                    global_rack_filter = null;
                }
                
                // Store rack filter in session storage
                sessionStorage.setItem('pos_rack_filter', global_rack_filter || '');
                
                // Reset page to 1 and reload product list
                $('input#suggestion_page').val(1);
                
                var location_id = $('input#location_id').val();
                var category_id = $('input#product_category').val();
                var brand_id = $('input#product_brand').val();
                
                // Call the function with proper parameters like in product list page
                if (typeof get_product_suggestion_list === 'function') {
                    get_product_suggestion_list(
                        category_id,
                        brand_id,
                        location_id
                    );
                }
            });
            

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\POS\alizazip\resources\views/sale_pos/create.blade.php ENDPATH**/ ?>