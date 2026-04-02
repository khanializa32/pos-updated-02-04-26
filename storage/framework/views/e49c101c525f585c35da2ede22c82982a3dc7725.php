<!-- default value -->
<?php
    $go_back_url = action([\App\Http\Controllers\SellController::class, 'index']);
    $transaction_sub_type = '';
    $view_suspended_sell_url = action([\App\Http\Controllers\SellController::class, 'index']) . '?suspended=1';
    $pos_redirect_url = action([\App\Http\Controllers\SellPosController::class, 'create']);
?>

<?php if(!empty($pos_module_data)): ?>
    <?php $__currentLoopData = $pos_module_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            if (!empty($value['go_back_url'])) {
                $go_back_url = $value['go_back_url'];
            }

            if (!empty($value['transaction_sub_type'])) {
                $transaction_sub_type = $value['transaction_sub_type'];
                $view_suspended_sell_url .= '&transaction_sub_type=' . $transaction_sub_type;
                $pos_redirect_url .= '?sub_type=' . $transaction_sub_type;
            }
        ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<input type="hidden" name="transaction_sub_type" id="transaction_sub_type" value="<?php echo e($transaction_sub_type, false); ?>">
<?php $request = app('Illuminate\Http\Request'); ?>
<div class="row" style="display:flex; margin-top: 20px">
    <div class="col-md-3 no-print pos-header" style="margin-left: 20px">
        <input type="hidden" id="pos_redirect_url" value="<?php echo e($pos_redirect_url, false); ?>">
        <div class="tw-flex tw-flex-col md:tw-flex-row tw-items-center tw-justify-between tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white tw-rounded-xl tw-mx-0 tw-mt-1 tw-mb-0 md:tw-mb-0 tw-p-4" 
                 style="overflow: hidden; flex-shrink: 1;min-width: 0; margin-left: 6px;">
            <div class="tw-w-full" >
                
                
                
                
                <div class="tw-flex tw-items-center tw-gap-1">
                    <p style="height: 20px; width: auto; font-size:10px"><strong><?php echo app('translator')->get('sale.location'); ?>: &nbsp;</strong></p>

                    <div>
                        <?php if(count($business_locations) > 1): ?>
                            <?php
                                $locOptions = [];
                                foreach($business_locations as $id => $name){
                                    $location = optional(\App\BusinessLocation::find($id));
                                    $locOptions[$id] = ['value' => $id, 'label' => $name, 'code' => $location->location_id, 'pgId' => $location->selling_price_group_id];
                               }
                            ?>
                            <select name="select_location_id" id="select_location_id" class="control input-sm" required autofocus style="background:white;  width: 120px;">
                                <?php $__currentLoopData = $locOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($opt['value'], false); ?>" data-location-code="<?php echo e($opt['code'], false); ?>" data-default_price_group="<?php echo e($opt['pgId'], false); ?>" <?php if(($default_location->id ?? null) == $opt['value']): ?> selected <?php endif; ?>><?php echo e($opt['label'], false); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        <?php else: ?>
                            <input type="hidden" value="<?php echo e($business_locations->keys()->first(), false); ?>" name="select_location_id" id="select_location_id">
                            <?php echo e(isset($business_locations)? $business_locations->first() : '', false); ?>

                        
                        <?php endif; ?>
                    </div>  
                    
                    <div class="tw-flex tw-w-full tw-gap-1 tw-items-end">
                        <div style="width: 10px; max-width: 20px"></div>
                        <!-- Botón rojo -->
                        
                        <!-- Botón rojo Nuevo -->
                        <?php if(!Gate::check('disable_suspend_sale') || auth()->user()->can('superadmin') || auth()->user()->can('admin')): ?>
                            <?php if(empty($pos_settings['disable_suspend'])): ?>
                                <button type="button"
                                    class="btn btn-danger no-print pos-express-finalize" style="align-content: flex-end"
                                    data-pay_method="suspend"
                                    <?php if(!empty($only_payment)): ?> disabled <?php endif; ?>>
                                    <i class="bi bi-pause"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pause" viewBox="0 0 16 16">
                                        <path d="M6 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5m4 0a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </button>
                            <?php endif; ?>
                        <?php endif; ?>
                        <!-- Botón verde -->
                        
                        
                        <?php if(!Gate::check('disable_suspend_sale') || auth()->user()->can('superadmin') || auth()->user()->can('admin')): ?>
                            
                            <button type="button" id="view_suspended_sales" title="<?php echo e(__('lang_v1.  view_suspended_sales'), false); ?>"
                                    class="btn btn-success btn-modal pull-right"
                                    data-container=".view_modal" data-href="<?php echo e($view_suspended_sell_url, false); ?>">
                          
                                <i class="bi bi-play-fill"></i> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"/>
                                </svg>
                           
                            </button>
                         <?php endif; ?>

                        
                    </div>
                
                    
                    
                    
                    <div
                        class="">
                         
                        
                    </div>&nbsp;&nbsp;
                    <?php if(empty($pos_settings['hide_product_suggestion'])): ?>
                        <button type="button" title="<?php echo e(__('lang_v1.view_products'), false); ?>" data-placement="bottom"
                            class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-md tw-w-8 tw-h-8 tw-text-gray-600 btn-modal pull-right tw-block md:tw-hidden"
                            data-toggle="modal" data-target="#mobile_product_suggestion_modal">
                            <strong><i class="fa fa-cubes fa-lg tw-text-!tw-text-sm" style="font-size:24px ;color:purple"></i></strong>
                        </button>
                    <?php endif; ?>
                    <span class="tw-block md:tw-hidden">
                        <i class="fas hamburger fa-bars tw-mx-5"
                            onclick="document.getElementById('pos_header_more_options').classList.toggle('tw-hidden')"></i>
                    </span>
                   
                </div>
            </div>
             
            <div class="tw-w-full md:tw-w-2/3 !tw-p-0 tw-flex tw-items-center tw-justify-between tw-gap-4 tw-flex-col md:tw-flex-row tw-hidden md:tw-flex"
                id="pos_header_more_options">
                <a href="<?php echo e($go_back_url, false); ?>" title="<?php echo e(__('lang_v1.go_back'), false); ?>"
                    class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-md md:tw-w-8 tw-w-auto tw-h-8 tw-text-gray-600 pull-right">
                    <strong class="!tw-m-3">
                        <i class="fa fa-backward fa-lg fa fa-backward" style=" font-size:25px ;color:black"></i>
                        <span class="tw-inline md:tw-hidden"><?php echo e(__('lang_v1.go_back'), false); ?></span>
                    </strong>
                </a>

                <?php if(!empty($pos_settings['customer_display_screen'])): ?>
                    <a href="<?php echo e(route('pos_display'), false); ?>" id="customer_display_screen"  onclick="window.open(this.href, 'customer_display', 'width='+screen.width+',height='+screen.height+',top=0,left=0'); return false;"   title="<?php echo e(__('lang_v1.customer_display_screen'), false); ?>"
                        class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-md md:tw-w-8 tw-w-auto tw-h-8 tw-text-gray-600 pull-right">
                        <strong class="!tw-m-3">
                            <i class="fa fa-tv fa-lg tw-text-[#646EE4] !tw-text-sm"></i>
                            <span class="tw-inline md:tw-hidden"><?php echo e(__('lang_v1.customer_display_screen'), false); ?></span>
                        </strong>
                    </a>
                <?php endif; ?>
                
            </div>
                

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('close_cash_register')): ?>
                    <button type="button" id="close_register" title="<?php echo e(__('messages.close'), false); ?>"
                        class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-md md:tw-w-8 tw-w-auto tw-h-8 tw-text-gray-600 btn-modal pull-right"
                        data-container=".close_register_modal"
                        data-href="<?php echo e(action([\App\Http\Controllers\CashRegisterController::class, 'getCloseRegister'], [$cashRegister->id]), false); ?>">
                        <strong class="!tw-m-3">
                            <i class="fa fa-window-close fa-lg tw-text-[#EF4B53] !tw-text-sm"></i>
                            <span class="tw-inline md:tw-hidden"><?php echo e(__('cash_register.close_register'), false); ?></span>
                        </strong>
                    </button>
                <?php endif; ?>

               
            
        </div>
    </div>
    
                            <div class="col-md-1/3  tw-w-auto tw-cursor-pointer  main-category-div main-category no-print"
                                data-value="all" data-parent="0">
                                <div class="tw-dw-card tw-w-25 tw-bg-base-100 tw-shadow-sm tw-h-auto tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer !tw-text-xs md:!tw-text-sm tw-font-semibold tw-text-center tw-border-2">
                                    <div class="tw-dw-card-body">
                                        <h4 class="tw-flex tw-items-center tw-justify-center" style="align-text: center; font-size: inherit; font-weight: inherit; margin-bottom: -20px; margin-top: 0px"><?php echo app('translator')->get('lang_v1.all_categories'); ?></h4>
                                    </div>
                                </div>
                            </div>


    <div class="col-md-7" >
        <div class="d-flex justify-content-center mt-3 tw-h-auto" style="margin:0px 20px 0px 19px">
            <div  id="categories-container" style="display:flex;gap:10px; overflow-y: auto; padding-bottom: 10px;wid">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <button type="button" class="col-md-1/3 tw-dw-btn btn-secondary tw-dw-btn-sm main-category" style="margin-top: 10px; ; height:5vh; font-size: 15px; background-color: white; border: none" data-value="<?php echo e($category['id'], false); ?>" data-parent="0">
                    <div class=" col-xs-12 tw-mb-7 tw-w-auto tw-cursor-pointer main-category-div  no-print" style="margin-bottom: 0px"
                        data-value="<?php echo e($category['id'], false); ?>" data-name="<?php echo e($category['name'], false); ?>" data-parent="1">
                        <h4 style="align-text: center; font-size: inherit; font-weight: inherit; margin-bottom: 0px; margin-top: 0px">
                            <?php echo e($category['name'], false); ?></h4>
                        <div class="tw-dw-card-actions tw-justify-center">
                        </div>
                    </div>
                </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if(in_array('pos_sale', $enabled_modules) && !empty($transaction_sub_type)): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.create')): ?>
                        <a href="<?php echo e(action([\App\Http\Controllers\SellPosController::class, 'create']), false); ?>"
                            title="<?php echo app('translator')->get('sale.pos_sale'); ?>"
                            class="tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-border-2 tw-w-auto tw-h-auto tw-py-1 tw-px-4 tw-rounded-md  ">
                            <strong><i class="fa fa-th-large tw-text-[#00935F] !tw-text-sm"></i> &nbsp;
                                <?php echo app('translator')->get('sale.pos_sale'); ?></strong>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div> 
        </div>


            
    

            
        </div>
       
    
    
    <div class="col-md-2">
        <div class="d-flex justify-content-center mt-3 tw-h-auto m-0 no-print">
            <div  id="categories-container" style="display:flex;gap:10px; overflow-y: auto; padding-bottom: 10px;wid">
                 
                    <button type="button" title="<?php echo e(__('cash_register.withdraw_cash'), false); ?>" data-placement="bottom"
                        class="tw-bg-white tw-dw-btn tw-cursor-pointer btn-modal"
                        style="margin-top: 10px; height: 5vh; font-size: 15px" id="withdraw-cash">
                        <strong><i class="fas fa-dollar-sign" style=" font-size:18px ;color:red"></i> <?php echo app('translator')->get('cash_register.withdraw_cash'); ?></strong>
                    </button>
                
               
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense.add')): ?>
                    <button type="button" title="<?php echo e(__('expense.add_expense'), false); ?>" data-placement="bottom"
                        class="tw-bg-white tw-dw-btn tw-cursor-pointer btn-modal"
                        style="margin-top: 10px; height: 5vh; font-size: 15px" id="add_expense">
                        <strong><i class="fa fas fa-minus-circle" style=" font-size:18px ;color:purple"></i> <?php echo app('translator')->get('expense.add_expense'); ?></strong>
                    </button>
                <?php endif; ?>
            </div>
            
        
            <div class="tw-hidden md:tw-flex tw-flex-row tw-items-baseline tw-justify-center tw-flex-1 tw-text-black tw-gap-2">
                
                <div id="digital-clock" class="tw-text-red-600 tw-text-[10px] tw-uppercase tw-opacity-80 ">00:00:00</div>
                
            </div>
             
            
            
            
            
        </div>
    </div>
</div>

<div class="modal fade" id="service_staff_modal" tabindex="-1" role="dialog"
    aria-labelledby="gridSystemModalLabel">
</div>
<script>
    $(document).ready(function () {
        const itemsPerPage = 6;
        let currentPage = 1;

        const $items = $('.category-item');
        const totalItems = $items.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage);

        function showPage(page) {
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;

            $items.hide();
            $items.slice(start, end).show();

            $('#prev-page').prop('disabled', page === 1);
            $('#next-page').prop('disabled', page === totalPages);
        }

        $('#prev-page').click(function () {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        });

        $('#next-page').click(function () {
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
            }
        });

        showPage(currentPage); // Inicializar
    });
</script>




<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/layouts/partials/header-pos.blade.php ENDPATH**/ ?>