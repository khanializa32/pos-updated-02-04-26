<?php $request = app('Illuminate\Http\Request'); ?>
<!-- Main Header -->

<div
    class="  tw-transition-all tw-duration-5000 tw-border-b tw-bg-gradient-to-r tw-from-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-800 tw-to-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-900 tw-shrink-0 lg:tw-h-15 tw-border-primary-500/30 no-print">
    <div class="tw-px-5 tw-py-3">
        <div class="tw-flex tw-items-start tw-justify-between tw-gap-6 lg:tw-items-center">
            <div class="tw-flex tw-items-center tw-gap-3">
                <button type="button" 
                    class="small-view-button xl:tw-w-20 lg:tw-hidden tw-inline-flex tw-items-center tw-justify-center tw-text-sm tw-font-medium tw-text-white tw-transition-all tw-duration-200 tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-800 hover:tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-700 tw-p-1.5 tw-rounded-lg tw-ring-1 hover:tw-text-white tw-ring-white/10">
                    <span class="tw-sr-only">
                        Menu Lateral
                    </span>
                    <svg aria-hidden="true" class="tw-size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 6l16 0" />
                        <path d="M4 12l16 0" />
                        <path d="M4 18l16 0" />
                    </svg>
                </button>
                
                
                 <button type="button"
                    class="side-bar-collapse tw-hidden lg:tw-inline-flex tw-items-center tw-justify-center tw-text-sm tw-font-medium tw-text-white tw-transition-all tw-duration-200 tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-800 hover:tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-700 tw-p-1.5 tw-rounded-lg tw-ring-1 hover:tw-text-white tw-ring-white/10">
                    <span class="tw-sr-only">
                        Contraer
                    </span>
                    <i class='fas fa-angle-double-left' style='font-size:36px;color:LightSeaGreen'></i>
                </button>
                
                
                <details class="tw-dw-dropdown tw-relative tw-inline-block tw-text-left">
                    <summary
                        class="tw-inline-flex tw-transition-all tw-ring-1 tw-ring-white/10 hover:tw-text-white tw-cursor-pointer tw-duration-200 tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-800 hover:tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-700 tw-py-1.5 tw-px-3 tw-rounded-lg tw-items-center tw-justify-center tw-text-sm tw-font-medium tw-text-white tw-gap-1">
                        <i class='fas fa-plus' style='font-size:30px;color:white'> </i> Accesos Rápidos
                    </summary>
                    <ul class="tw-dw-menu tw-dw-dropdown-content tw-dw-z-[1] tw-dw-bg-base-100 tw-dw-rounded-box tw-w-48 tw-absolute tw-left-0 tw-z-10 tw-mt-2 tw-origin-top-right tw-bg-white tw-rounded-lg tw-shadow-lg tw-ring-1 tw-ring-gray-200 focus:tw-outline-none"
                        role="menu" tabindex="-1">
                        <div class="tw-p-2" role="none">
                            <a href="https://sistema.ziscoplus.com/sells/create" target=»_blank
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <i class='fa fa-print' style='font-size:20px;color:red'></i>
                                &nbsp;<?php echo app('translator')->get('Crear Venta'); ?>
                            </a>
                           
                                 <a href="https://sistema.ziscoplus.com/purchases/create" target=»_blank
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                    role="menuitem" tabindex="-1">
                                <i class='	fas fa-cart-plus' style='font-size:20px;color:mediumseagreen'></i>
                                <?php echo app('translator')->get('lang_v1.purchases_create'); ?>
                            </a>
                            
                            
                              
                             <a href="https://sistema.ziscoplus.com/expenses/create" target=»_blank
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <i class='fas fa-money-bill-wave' style='font-size:20px;color:dodgerblue'></i>
                                <?php echo app('translator')->get('lang_v1.expenses_create'); ?>
                            </a>
                            
                            
                            
                             <a href="https://sistema.ziscoplus.com/products" target=»_blank
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <i class='fas fa-cube' style='font-size:20px;color:orange'></i>
                                &nbsp;<?php echo app('translator')->get('lang_v1.list_products'); ?>
                            </a>
                            
                          
                            
                             <a href="https://sistema.ziscoplus.com/contacts?type=customer" target=»_blank
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <i class='fas fa-user-check' style='font-size:20px;color:green'></i>
                                <?php echo app('translator')->get('lang_v1.view_customers'); ?>
                            </a>
                            
                            
                             <a href="https://sistema.ziscoplus.com/contacts?type=supplier" target=»_blank
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <i class='fas fa-handshake' style='font-size:20px;color:brown'></i>
                                Ver Proveedor
                                </a>

                            <a href="https://sistema.ziscoplus.com/users" target=»_blank
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <i class='fas fa-chalkboard-teacher' style='font-size:20px;color:violet'></i>
                                &nbsp;Ver Usuarios
                            </a>
                            
                             <a href="https://sistema.ziscoplus.com/stock-adjustments/create" target=»_blank
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <i class='fa fa-qrcode' style='font-size:20px;color:teal'></i>
                                &nbsp;&nbsp;Crear Ajuste
                            </a>

                            <a href="https://sistema.ziscoplus.com/sells/create?sale_type=sales_order" target=»_blank
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <i class='fa fa-registered' style='font-size:20px;color:purple'></i>
                                &nbsp;&nbsp;Crear Remisión
                            </a>
                            
                            <a href="https://apizisco.com/login" target=»_blank
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <i class='fas fa-address-card' style='font-size:20px;color:green'></i>
                                &nbsp;&nbsp;Nómina
                            </a>
                            
                            <a href="https://catalogo-vpfe.dian.gov.co/User/Login" target=»_blank
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <i class='fas fa-rss' style='font-size:20px;color:green'></i>
                                &nbsp;&nbsp;DIAN
                            </a>
                         
                           
                            <!-- <?php if(auth()->user()->hasRole('Admin#' . auth()->user()->business_id)): ?>
                                <a href="#" id="start_tour"
                                    class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                    role="menuitem" tabindex="-1">
                                    <svg aria-hidden="true" class="tw-w-5 tw-h-5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M12 17l0 .01" />
                                        <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" />
                                    </svg>
                                    Tour Zisco
                                </a>
                            <?php endif; ?> -->
                        </div>
                    </ul>

                </details>
               </div>
               
    <!--  INICIO FECHA Y HORA   -->
        <div class="tw-hidden md:tw-flex tw-flex-col tw-items-center tw-justify-center tw-flex-1 tw-text-white">
                <div id="digital-clock" class="tw-text-xl tw-font-bold tw-font-mono tw-tracking-widest">
                    00:00:00
                </div>
                <div id="digital-date" class="tw-text-xs tw-uppercase tw-opacity-80 tw-font-medium">
                    Cargando fecha...
                </div>
            </div>
            <div class="tw-flex tw-flex-wrap tw-items-center tw-justify-end tw-gap-3">
        </div>
<!--  FIN FECHA Y HORA   -->
            

        <!--<?php if(Module::has('Essentials')): ?>
                    <?php if ($__env->exists('essentials::layouts.partials.header_part')) echo $__env->make('essentials::layouts.partials.header_part', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>  -->
                
                
               



           <!-- 
            <?php if(Module::has('Superadmin')): ?>
                <?php if ($__env->exists('superadmin::layouts.partials.active_subscription')) echo $__env->make('superadmin::layouts.partials.active_subscription', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            
            <?php if(!empty(session('previous_user_id')) && !empty(session('previous_username'))): ?>
                <a href="<?php echo e(route('sign-in-as-user', session('previous_user_id')), false); ?>" class="btn btn-flat btn-danger m-8 btn-sm mt-10"><i class="fas fa-undo"></i> <?php echo app('translator')->get('lang_v1.back_to_username', ['username' => session('previous_username')] ); ?></a>
            <?php endif; ?> -->


            <div class="tw-flex tw-flex-wrap tw-items-center tw-justify-end tw-gap-3">
                


                

               <!-- <button id="btnCalculator" title="<?php echo app('translator')->get('lang_v1.calculator'); ?>" data-content='<?php echo $__env->make('layouts.partials.calculator', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>'
                    type="button" data-trigger="click" data-html="true" data-placement="bottom" 
                    class="tw-hidden md:tw-inline-flex tw-items-center tw-justify-center tw-text-sm tw-font-medium tw-text-white tw-transition-all tw-duration-200 tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-800 hover:tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-700 tw-p-1.5 tw-rounded-lg tw-ring-1 hover:tw-text-white tw-ring-white/10">
                    <span class="tw-sr-only" aria-hidden="true">
                        Calculator
                    </span>
                    <i class='fas fa-calculator' style='font-size:20px;color:yellow'></i>
                </button> -->

                <?php if(in_array('pos_sale', $enabled_modules)): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.view')): ?>
                        <a href="#"
                           onclick="window.open('<?php echo e(route('product.lookup'), false); ?>', '_blank', 'noopener,noreferrer'); return false;"
                           class="sm:tw-inline-flex tw-transition-all tw-duration-200 tw-gap-2
                                  tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-800
                                  hover:tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-700
                                  tw-py-1.5 tw-px-3 tw-rounded-lg tw-items-center tw-justify-center
                                  tw-text-sm tw-font-medium tw-ring-1 tw-ring-white/10
                                  hover:tw-text-white tw-text-white">
                            <i class='glyphicon glyphicon-qrcode' style='font-size:30px;color:LightSeaGreen'></i>
                            Visor
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
                <!--<?php if(Module::has('Repair')): ?>
                    <?php if ($__env->exists('repair::layouts.partials.header')) echo $__env->make('repair::layouts.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?> -->
                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.create')): ?>
                        <a href="<?php echo e(action([\App\Http\Controllers\SellPosController::class, 'create']), false); ?>"
                            class="sm:tw-inline-flex tw-transition-all tw-duration-200 tw-gap-2 tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-800 hover:tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-700 tw-py-1.5 tw-px-3 tw-rounded-lg tw-items-center tw-justify-center tw-text-sm tw-font-medium tw-ring-1 tw-ring-white/10 hover:tw-text-white tw-text-white">
                            <i class='fas fa-cash-register' style='font-size:30px;color:LightSeaGreen'></i>
                            <?php echo app('translator')->get('sale.pos_sale'); ?>
                        </a>
                    <?php endif; ?>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('register-report.view')): ?>
                        <a href="<?php echo e(action([\App\Http\Controllers\ReportController::class, 'getRegisterReport']), false); ?>"
                            class="sm:tw-inline-flex tw-transition-all tw-duration-200 tw-gap-2 tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-800 hover:tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-700 tw-py-1.5 tw-px-3 tw-rounded-lg tw-items-center tw-justify-center tw-text-sm tw-font-medium tw-ring-1 tw-ring-white/10 hover:tw-text-white tw-text-white">
                            <i class='fas fa-tv' style='font-size:20px;color:LightSeaGreen'></i>
                            <?php echo app('translator')->get('CAJAS'); ?>
                        </a>
                    <?php endif; ?>
                
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('profit_loss_report.view')): ?>
                    <button type="button" type="button" id="view_todays_profit" title="<?php echo e(__('home.todays_profit'), false); ?>"
                        data-toggle="tooltip" data-placement="bottom"
                        class="tw-hidden sm:tw-inline-flex tw-items-center tw-ring-1 tw-ring-white/10 tw-justify-center tw-text-sm tw-font-medium tw-text-white hover:tw-text-white tw-transition-all tw-duration-200 tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-800 hover:tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-700 tw-p-1.5 tw-rounded-lg">
                        <span class="tw-sr-only">
                            Utilidades de Hoy
                        </span>
                        <i class='fas fa-dollar-sign' style='font-size:20px;color:LightSeaGreen'></i>
                    </button>
                <?php endif; ?>

               <!--<button type="button"
                    class="tw-hidden lg:tw-inline-flex tw-transition-all tw-ring-1 tw-ring-white/10 tw-duration-200 tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-800 hover:tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-700 tw-py-1.5 tw-px-3 tw-rounded-lg tw-items-center tw-justify-center tw-text-sm tw-font-medium tw-text-white hover:tw-text-white tw-font-mono">
                    <?php echo e(\Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format')), false); ?>

                </button>   -->

                



                <details class="tw-dw-dropdown tw-relative tw-inline-block tw-text-left">
                    <summary data-toggle="popover"
                        class="tw-dw-m-1 tw-inline-flex tw-transition-all tw-ring-1 tw-ring-white/10 tw-cursor-pointer tw-duration-200 tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-800 hover:tw-bg-<?php if(!empty(session('business.theme_color'))): ?><?php echo e(session('business.theme_color'), false); ?><?php else: ?><?php echo e('primary', false); ?><?php endif; ?>-700 tw-py-1.5 tw-px-3 tw-rounded-lg tw-items-center tw-justify-center tw-text-sm tw-font-medium tw-text-white hover:tw-text-white tw-gap-1">
                        <span class="tw-hidden md:tw-block"><?php echo e(Auth::User()->first_name, false); ?> <?php echo e(Auth::User()->last_name, false); ?></span>

                       <!-- <svg  xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="tw-size-5"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" /></svg>   --

                         <!--BOTON SVG NAVIDAD --> 

                    
                    <!--<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
                    
                            <!-- Fondo verde -->
                            
                        
                            <!-- Círculo avatar -->
                            <circle cx="30" cy="32" r="16" fill="#FFFFFF"/>
                        
                            <!-- Cabeza -->
                            <circle cx="30" cy="26" r="6" fill="#1E1E1E"/>
                        
                            <!-- Cuerpo -->
                            <path d="M22 40 C22 34, 38 34, 38 40 Z" fill="#1E1E1E"/>
                        
                            <!-- 🎅 Gorro -->
                            <!-- Parte roja -->
                            <path d="M18 20 C18 8, 42 8, 40 20 Z" fill="#C62828"/>
                        
                            <!-- Borde blanco -->
                            <rect x="18" y="20" width="24" height="5" rx="3" fill="#FFFFFF"/>
                        
                            <!-- Pompon -->
                            <circle cx="42" cy="10" r="4" fill="#FFFFFF"/>
                        </svg> 
                 

                        
                    </summary>

                    <ul class="tw-p-2 tw-w-48 tw-absolute tw-right-0 tw-z-10 tw-mt-2 tw-origin-top-right tw-bg-white tw-rounded-lg tw-shadow-lg tw-ring-1 tw-ring-gray-200 focus:tw-outline-none"
                        role="menu" tabindex="-1">
                        <div class="tw-px-4 tw-pt-3 tw-pb-1" role="none">
                            <p class="tw-text-sm" role="none">
                                <?php echo app('translator')->get('lang_v1.signed_in_as'); ?>
                            </p>
                            <p class="tw-text-sm tw-font-medium tw-text-gray-900 tw-truncate" role="none">
                                <?php echo e(Auth::User()->first_name, false); ?> <?php echo e(Auth::User()->last_name, false); ?>

                            </p>
                        </div>

                        <li>
                            <a href="<?php echo e(action([\App\Http\Controllers\UserController::class, 'getProfile']), false); ?>"
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                               <i class='fas fa-user-tie' style='font-size:20px;color:green'></i>
                                <?php echo app('translator')->get('lang_v1.profile'); ?>
                            </a>
                        </li>
                        <li>
                            

                        <li>
                           <a href="https://sistema.ziscoplus.com/business-location/" 
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <i class='fas fa-key' style='font-size:20px;color:purple'></i>
                                Mis Llaves
                            </a>
                        </li>   
                            
                            <li>
                           <a href="https://sistema.ziscoplus.com/product-catalogue/catalogue-qr" target=_blank
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <i class='fas fa-store' style='font-size:20px;color:dodgerblue'></i>
                                Tienda Online
                            </a>
                        </li>

                        <li>
                           <a href="https://wa.link/qcd1e2" target=_blank
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <i class='fas fa-comment-dots' style='font-size:20px;color:LightSeaGreen'></i>
                                Chat
                            </a>
                        </li>
                        
                        <li>
                           <a href="https://sistema.ziscoplus.com/docs/manual.pdf" target=_blank
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <i class='fas fa-book' style='font-size:20px;color:orange'></i>
                                Manual
                            </a>
                        </li>
                            
                            
                            <a href="<?php echo e(action([\App\Http\Controllers\Auth\LoginController::class, 'logout']), false); ?>"
                                class="tw-flex tw-items-center tw-gap-2 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-600 tw-transition-all tw-duration-200 tw-rounded-lg hover:tw-text-gray-900 hover:tw-bg-gray-100"
                                role="menuitem" tabindex="-1">
                                <i class='fas fa-sign-out-alt' style='font-size:20px;color:red'></i>
                                <?php echo app('translator')->get('lang_v1.sign_out'); ?>
                            </a>
                        </li>
                    </ul>
                </details>
            </div>
        </div>
    </div>
</div>


<!--  INICIO SCRIPT FECHA Y HORA   -->
<script>
    function updateClock() {
        const now = new Date();
        
        // Formatear Hora
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        const timeString = `${hours}:${minutes}:${seconds}`;
        
        // Formatear Fecha (Ejemplo: Martes, 17 Feb 2026)
        const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };
        const dateString = now.toLocaleDateString('es-ES', options);

        document.getElementById('digital-clock').textContent = timeString;
        document.getElementById('digital-date').textContent = dateString;
    }

    // Ejecutar cada segundo
    setInterval(updateClock, 1000);
    updateClock(); // Llamada inicial
</script>
<!--  FIN SCRIPT FECHA Y HORA   -->
<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/layouts/partials/header.blade.php ENDPATH**/ ?>