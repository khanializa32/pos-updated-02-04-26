
<?php $__env->startSection('title', __('home.home')); ?>

<?php $__env->startSection('content'); ?>

    <div class=" ">
        <div class="tw-px-5 tw-pt-3">
            
            
                    <div class="sm:tw-flex sm:tw-items-center sm:tw-justify-between sm:tw-gap-12">
                        
                        <img src="<?php echo e(asset('img/dashboard.gif'), false); ?>" alt="logo" style="width: 5%; height: 5%; margin: auto;padding-left: 20px;">
                        
                        <div class="tw-mt-2 sm:tw-w-1/2 md:tw-w-1/2">
                            
                            <h2
                                class="tw-text-2xl md:tw-text-4xl tw-tracking-tight tw-text-primary-800 tw-font-semibold text-black tw-mb-10 md:tw-mb-0"> 
                                
                                <?php echo e(__('home.welcome_message', ['name' => Session::get('user.first_name')]), false); ?>

                            </h2>
                            
                            
                           
                        </div>
    
                        <?php if(auth()->user()->can('dashboard.data')): ?>
                            <?php if($is_admin): ?>
                                <div class="tw-mt-2 sm:tw-w-1/3 md:tw-w-1/4 ">
                                    <?php if(count($all_locations) > 1): ?>
                                        <?php echo Form::select('dashboard_location', $all_locations, null, [
                                            'class' => 'form-control select2',
                                            'placeholder' => __('lang_v1.select_location'),
                                            'id' => 'dashboard_location',
                                        ]); ?>

                                    <?php endif; ?>
                                </div>
            
                                <div class="tw-mt-2 sm:tw-w-1/3 md:tw-w-1/4 tw-text-right">
                                    <?php if($is_admin): ?>
                                        <button type="button" id="dashboard_date_filter"
                                            class="tw-inline-flex tw-items-center tw-justify-center tw-w-full tw-gap-1 tw-px-3 tw-py-2 tw-text-sm tw-font-medium tw-text-gray-900 tw-transition-all tw-duration-200 tw-bg-white tw-rounded-lg sm:tw-w-auto hover:tw-bg-primary-50">
                                            <svg aria-hidden="true" class="tw-size-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                                <path d="M16 3v4" />
                                                <path d="M8 3v4" />
                                                <path d="M4 11h16" />
                                                <path d="M7 14h.013" />
                                                <path d="M10.01 14h.005" />
                                                <path d="M13.01 14h.005" />
                                                <path d="M16.015 14h.005" />
                                                <path d="M13.015 17h.005" />
                                                <path d="M7.01 17h.005" />
                                                <path d="M10.01 17h.005" />
                                            </svg>
                                            <span>
                                                <?php echo e(__('messages.filter_by_date'), false); ?>

                                            </span>
                                            <svg aria-hidden="true" class="tw-size-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M6 9l6 6l6 -6" />
                                            </svg>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    
                    
                    
                    
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">




<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #f2f3f5;
    }

    .module-card {
        background: #ffffff;
        border-radius: 22px;
        padding: 22px 12px;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        transition: .2s;
        text-decoration: none;
        color: #333;
        display: block;
    }
    .module-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 18px rgba(0,0,0,0.10);
        text-decoration: none;
        color: #000;
    }

    .icon-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
        font-size: 30px;
        color: #fff;
    }
    
   
    
</style>




</head>

<body>

<div class="container py-4">
    

    <div class="row row-cols-3 row-cols-md-4 g-4">

        <!-- Ventas -->
        <div class="col">
            <a href="sells" class="module-card">
                <div class="icon-circle" style="background:#2BB3B0;">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <p class="mt-2 mb-0">Ventas</p>
            </a>
        </div>
        
        
         <!-- Clientes -->
        <div class="col">
            <a href="reports/customer-supplier" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-business-time"></i>
                </div>
                <p class="mt-2 mb-0">Cartera</p>
            </a>
        </div>

       

        <!-- Inventario / Productos -->
        <div class="col">
            <a href="products" class="module-card">
                <div class="icon-circle" style="background:#FF9800;">
                    <i class="fas fa-box-open"></i>
                </div>
                <p class="mt-2 mb-0">Productos</p>
            </a>
        </div>


         <!-- POS -->
        <div class="col">
            <a href="reports/stock-report" class="module-card">
                <div class="icon-circle" style="background:#EE82EE;">
                    <i class="fas fa-luggage-cart"></i>
                </div>
                <p class="mt-2 mb-0">Inventario</p>
            </a>
        </div>
       

        <!-- Compras -->
        <div class="col">
            <a href="purchases" class="module-card">
                <div class="icon-circle" style="background:#FF6347;">
                    <i class="fab fa-amazon-pay"></i>
                </div>
                <p class="mt-2 mb-0">Compras</p>
            </a>
        </div>

        
        
        <!-- Gastos -->
        <div class="col">
            <a href="expenses" class="module-card">
                <div class="icon-circle" style="background:#4682B4;">
                    <i class="fas fa-database"></i>
                </div>
                <p class="mt-2 mb-0">Gastos</p>
            </a>
        </div>
        
        
 <hr style="border:1px solid #ccc; margin:20px 0;">
       
    </div>
</div>

<div class="container py-4">
    <p style="font-size:20px;">Ventas</p>

    <div class="row row-cols-3 row-cols-md-4 g-4">

        <!-- Ventas -->
        <div class="col">
            <a href="sells" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-money-bill-alt"></i>
                </div>
                <p class="mt-2 mb-0">Ventas</p>
            </a>
        </div>
        
        
         <!-- Remisiones -->
        <div class="col">
            <a href="sales-order" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <p class="mt-2 mb-0">Remisiones</p>
            </a>
        </div>

       

        <!-- Cotizacions  -->
        <div class="col">
            <a href="sells/quotations" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-file-excel"></i>
                </div>
                <p class="mt-2 mb-0">Cotizacions</p>
            </a>
        </div>


         <!-- NC -->
        <div class="col">
            <a href="sell-return" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-undo"></i>
                </div>
                <p class="mt-2 mb-0">Notas C</p>
            </a>
        </div>
       

        <!-- Informes -->
        <div class="col">
            <a href="reports/product-sell-report" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-chart-line"></i>
                </div>
                <p class="mt-2 mb-0">Informes</p>
            </a>
        </div>
 
        </div>
        
        
        
        
        
        
        
        
        <div class="container py-4">
    <p style="font-size:20px;">Compras</p>

    <div class="row row-cols-3 row-cols-md-4 g-4">

       <!-- Crear Compras -->
        <div class="col">
            <a href="purchases/create" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <p class="mt-2 mb-0">Crear</p>
            </a>
        </div>

        <!-- Ver Compras -->
        <div class="col">
            <a href="purchases" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-eye"></i>
                </div>
                <p class="mt-2 mb-0">Ver</p>
            </a>
        </div>

        <!-- Informes -->
        <div class="col">
            <a href="product-purchase-report" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-chart-line"></i>
                </div>
                <p class="mt-2 mb-0">Informes</p>
            </a>
        </div>
        
        
        
        
        <hr style="border:1px solid #ccc; margin:20px 0;">
       
    </div>
</div>
    
        <div class="container py-4">
    
        <p style="font-size:20px;">Gastos</p>
    <div class="row row-cols-3 row-cols-md-4 g-4">

        <!-- Crear -->
        <div class="col">
            <a href="expenses/create" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <p class="mt-2 mb-0">Crear</p>
            </a>
        </div>
        
        
         <!-- Ver -->
        <div class="col">
            <a href="expenses" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-eye"></i>
                </div>
                <p class="mt-2 mb-0">Ver</p>
            </a>
        </div>

      
    
          
        <hr style="border:1px solid #ccc; margin:20px 0;">
       
    </div>
</div>
    
        <div class="container py-4">
    <p style="font-size:20px;">Informes</p>

    <div class="row row-cols-3 row-cols-md-4 g-4">
        
        
        
          <!-- Ventas -->
        <div class="col">
            <a href="reports/product-sell-report" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <p class="mt-2 mb-0">Ventas</p>
            </a>
        </div>

        <!-- Utilidades -->
        <div class="col">
            <a href="reports/profit-loss" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-coins"></i>
                </div>
                <p class="mt-2 mb-0">Utilidades</p>
            </a>
        </div>
        
        
         <!-- Cierres -->
        <div class="col">
            <a href="reports/register-report" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-cash-register"></i>
                </div>
                <p class="mt-2 mb-0">Cierres</p>
            </a>
        </div>

       

        <!-- Inventario -->
        <div class="col">
            <a href="reports/stock-report" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-box-open"></i>
                </div>
                <p class="mt-2 mb-0">Inventario</p>
            </a>
        </div>


         <!-- Impuestos -->
        <div class="col">
            <a href="reports/tax-report" class="module-card">
                <div class="icon-circle" style="background:#004C6E;">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <p class="mt-2 mb-0">Impuestos</p>
            </a>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
 <hr style="border:1px solid #ccc; margin:20px 0;">
       
    </div>
</div>





       
 


      <style>
/* Fix for BS3 Javascript trying to show a modal under BS5 CSS on the home page */
.modal.fade.in {
    opacity: 1 !important;
}
</style>              
                    
                    
                    
                     <p class="tw-text-sm tw-font-medium tw-text-black tw-mb-10 md:tw-mb-0"> Esto es lo que pasa en su tienda hoy</p>
                    
                    
                    <?php if(auth()->user()->can('dashboard.data')): ?>
                        <?php if($is_admin): ?>
                            <div class="tw-grid tw-grid-cols-1 tw-gap-4 tw-mt-6 sm:tw-grid-cols-2 xl:tw-grid-cols-4 sm:tw-gap-5">
                            
                                <div
                                    class="tw-transition-all tw-duration-200 tw-bg-white tw-shadow-sm hover:tw-shadow-md tw-rounded-xl  tw-ring-1 tw-ring-gray-200">
                                    <div class="tw-p-4 sm:tw-p-5">
                                        <div class="tw-flex tw-items-center tw-gap-4">
                                            <div
                                                class="tw-inline-flex tw-items-center tw-justify-center tw-w-10 tw-h-10 tw-rounded-full sm:tw-w-12 sm:tw-h-12 tw-shrink-0 tw-bg-sky-100 tw-text-sky-500">
                                                <i class='fas fa-dollar-sign' style='font-size:24px;color:blue'></i>
                                            </div>

                                            <div class="tw-flex-1 tw-min-w-0">
                                                <p
                                                    class="tw-text-sm tw-font-medium tw-text-gray-500 tw-truncate tw-whitespace-nowrap">
                                                    <?php echo e(__('Mis Ingresos'), false); ?>

                                                </p>
                                                <p
                                                    class="total_sell tw-mt-0.5 tw-text-gray-900 tw-text-xl tw-truncate tw-font-semibold tw-tracking-tight tw-font-mono">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="tw-transition-all tw-duration-200 tw-bg-white tw-shadow-sm hover:tw-shadow-md tw-rounded-xl hover:tw--translate-y-0.5 tw-ring-1 tw-ring-gray-200">
                                    <div class="tw-p-4 sm:tw-p-5">
                                        <div class="tw-flex tw-items-center tw-gap-4">
                                            <div
                                                class="tw-inline-flex tw-items-center tw-justify-center tw-w-10 tw-h-10 tw-text-yellow-500 tw-bg-yellow-100 tw-rounded-full sm:tw-w-12 sm:tw-h-12 shrink-0">
                                                <i class='fas fa-money-bill-alt' style='font-size:24px;color:orange'></i>
                                            </div>

                                            <div class="tw-flex-1 tw-min-w-0">
                                                <p
                                                    class="tw-text-sm tw-font-medium tw-text-gray-500 tw-truncate tw-whitespace-nowrap">
                                                    <?php echo e(__('home.invoice_due'), false); ?>

                                                </p>
                                                <p
                                                    class="invoice_due tw-mt-0.5 tw-text-gray-900 tw-text-xl tw-truncate tw-font-semibold tw-tracking-tight tw-font-mono">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                
                                <div
                                class="tw-transition-all tw-duration-200 tw-bg-white tw-shadow-sm tw-rounded-xl hover:tw-shadow-md hover:tw--translate-y-0.5 tw-ring-1 tw-ring-gray-200">
                                <div class="tw-p-4 sm:tw-p-5">
                                    <div class="tw-flex tw-items-center tw-gap-4">
                                        <div
                                            class="tw-inline-flex tw-items-center tw-justify-center tw-w-10 tw-h-10 tw-rounded-full sm:tw-w-12 sm:tw-h-12 shrink-0 bg-sky-100 tw-text-sky-500">
                                            <i class='fas fa-shopping-cart' style='font-size:24px;color:lightseagreen'></i>
                                        </div>

                                        <div class="tw-flex-1 tw-min-w-0">
                                            <p
                                                class="tw-text-sm tw-font-medium tw-text-gray-500 tw-truncate tw-whitespace-nowrap">
                                                <?php echo e(__('Mis Compras'), false); ?>

                                            </p>
                                            <p
                                                class="total_purchase tw-mt-0.5 tw-text-gray-900 tw-text-xl tw-truncate tw-font-semibold tw-tracking-tight tw-font-mono">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div
                                class="tw-transition-all tw-duration-200 tw-bg-white tw-shadow-sm tw-rounded-xl hover:tw-shadow-md hover:tw--translate-y-0.5 tw-ring-1 tw-ring-gray-200">
                                <div class="tw-p-4 sm:tw-p-5">
                                    <div class="tw-flex tw-items-center tw-gap-4">
                                        <div
                                            class="tw-inline-flex tw-items-center tw-justify-center tw-w-10 tw-h-10 tw-text-red-500 tw-bg-red-100 tw-rounded-full sm:tw-w-12 sm:tw-h-12 shrink-0">
                                            <i class='fas fa-coins' style='font-size:24px;color:DeepPink'></i>
                                        </div>

                                        <div class="tw-flex-1 tw-min-w-0">
                                            <p
                                                class="tw-text-sm tw-font-medium tw-text-gray-500 tw-truncate tw-whitespace-nowrap">
                                                <?php echo e(__('Mis Gastos'), false); ?>

                                            </p>
                                            <p
                                                class="total_expense tw-mt-0.5 tw-text-gray-900 tw-text-xl tw-truncate tw-font-semibold tw-tracking-tight tw-font-mono">

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                           
                        <?php endif; ?>
                    <?php endif; ?>
              </div>
        </div>
         <?php if(auth()->user()->can('dashboard.data')): ?>
            <?php if($is_admin): ?>
                <div class="tw-relative">
                   
                    <div class="tw-px-5 tw-isolate">
                        <div
                            class="tw-grid tw-grid-cols-1 tw-gap-4 tw-mt-4 sm:tw-mt-6 sm:tw-grid-cols-2 xl:tw-grid-cols-4 sm:tw-gap-5">
                            
                            
                            
                            
                         <!--    <?php if(auth()->user()->can('sell.view') || auth()->user()->can('direct_sell.view')): ?>
                    <div
                        class="tw-transition-all lg:tw-col-span-1 tw-duration-200 tw-bg-white tw-shadow-sm tw-rounded-xl tw-ring-1 hover:tw-shadow-md hover:tw--translate-y-0.5 tw-ring-gray-200">
                        <div class="tw-p-4 sm:tw-p-5">
                            <div class="tw-flex tw-items-center tw-gap-2.5">
                                <div
                                    class="tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-full tw-w-10 tw-h-10">
                                    <svg aria-hidden="true" class="tw-text-yellow-500 tw-size-5 tw-shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 9v4"></path>
                                        <path
                                            d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z">
                                        </path>
                                        <path d="M12 16h.01"></path>
                                    </svg>
                                </div>
                                <div class="tw-flex tw-items-center tw-flex-1 tw-min-w-0 tw-gap-1">
                                    <div class="tw-w-full sm:tw-w-1/2 md:tw-w-1/2">
                                        <h3 class="tw-font-bold tw-text-base lg:tw-text-xl">
                                            <?php echo e(__('Cuentas Por Cobrar'), false); ?>

                                            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('lang_v1.tooltip_sales_payment_dues') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                        </h3>
                                    </div>
                                    <div class="tw-w-full sm:tw-w-1/2 md:tw-w-1/2">
                                        <?php echo Form::select('sales_payment_dues_location', $all_locations, null, [
                                            'class' => 'form-control select2',
                                            'placeholder' => __('lang_v1.select_location'),
                                            'id' => 'sales_payment_dues_location',
                                        ]); ?>

                                    </div>
                                </div>
                            </div>


                            <div class="tw-flow-root tw-mt-5  tw-border-gray-200">
                                <div class="tw--mx-4 tw--my-2 tw-overflow-x-auto sm:tw--mx-5">
                                    <div class="tw-inline-block tw-min-w-full tw-py-2 tw-align-middle sm:tw-px-5">
                                        <table class="table table-bordered table-striped" id="sales_payment_dues_table"
                                            style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('contact.customer'); ?></th>
                                                    <th><?php echo app('translator')->get('sale.invoice_no'); ?></th>
                                                    <th><?php echo app('translator')->get('home.due_amount'); ?></th>
                                                    <th><?php echo app('translator')->get('messages.action'); ?></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.view')): ?>
                    <div
                        class="tw-transition-all lg:tw-col-span-1 tw-duration-200 tw-bg-white tw-shadow-sm tw-rounded-xl tw-ring-1 hover:tw-shadow-md hover:tw--translate-y-0.5 tw-ring-gray-200">
                        <div class="tw-p-4 sm:tw-p-5">
                            <div class="tw-flex tw-items-center tw-gap-2.5">
                                <div
                                    class="tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-full tw-w-10 tw-h-10">
                                    <svg aria-hidden="true" class="tw-text-yellow-500 tw-size-5 tw-shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 9v4"></path>
                                        <path
                                            d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z">
                                        </path>
                                        <path d="M12 16h.01"></path>
                                    </svg>
                                </div>
                                <div class="tw-flex tw-items-center tw-flex-1 tw-min-w-0 tw-gap-1">
                                    <div class="tw-w-full sm:tw-w-1/2 md:tw-w-1/2">
                                        <h3 class="tw-font-bold tw-text-base lg:tw-text-xl">
                                            <?php echo e(__('Cuentas Por Pagar'), false); ?>

                                            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.payment_dues') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                        </h3>
                                    </div>
                                    <div class="tw-w-full sm:tw-w-1/2 md:tw-w-1/2">
                                        <?php if(count($all_locations) > 1): ?>
                                            <?php echo Form::select('purchase_payment_dues_location', $all_locations, null, [
                                                'class' => 'form-control select2 ',
                                                'placeholder' => __('lang_v1.select_location'),
                                                'id' => 'purchase_payment_dues_location',
                                            ]); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                            <div class="tw-flow-root tw-mt-5  tw-border-gray-200">
                                <div class="tw--mx-4 tw--my-2 tw-overflow-x-auto sm:tw--mx-5">
                                    <div class="tw-inline-block tw-min-w-full tw-py-2 tw-align-middle sm:tw-px-5">
                                        <table class="table table-bordered table-striped" id="purchase_payment_dues_table"
                                            style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('purchase.supplier'); ?></th>
                                                    <th><?php echo app('translator')->get('purchase.ref_no'); ?></th>
                                                    <th><?php echo app('translator')->get('home.due_amount'); ?></th>
                                                    <th><?php echo app('translator')->get('messages.action'); ?></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?> -->
                            
                        
                    </div>
                </div>
                
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php if(auth()->user()->can('dashboard.data')): ?>
        <div class="tw-px-5 tw-py-6">
            <div class="tw-grid tw-grid-cols-1 tw-gap-4 sm:tw-gap-5 lg:tw-grid-cols-2">
                <?php if(auth()->user()->can('sell.view') || auth()->user()->can('direct_sell.view')): ?>
                    <?php if(!empty($all_locations)): ?>
                        <div
                            class="tw-transition-all lg:tw-col-span-2 xl:tw-col-span-2 tw-duration-200 tw-bg-white tw-shadow-sm tw-rounded-xl tw-ring-1 hover:tw-shadow-md hover:tw--translate-y-0.5 tw-ring-gray-200">
                            <div class="tw-p-4 sm:tw-p-5">
                                <div class="tw-flex tw-items-center tw-gap-2.5">
                                    <div
                                        class="tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-full tw-w-10 tw-h-10">
                                        <svg aria-hidden="true" class="tw-size-5 tw-text-sky-500 tw-shrink-0"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M17 17h-11v-14h-2"></path>
                                            <path d="M6 5l14 1l-1 7h-13"></path>
                                        </svg>
                                    </div>

                                    <h3 class="tw-font-bold tw-text-base lg:tw-text-xl">
                                        <?php echo e(__('home.sells_last_30_days'), false); ?>

                                    </h3>
                                </div>
                                <div class="tw-mt-5">
                                    <div
                                        class="tw-grid tw-w-full tw-h-100 tw-border tw-border-gray-200 tw-border-dashed tw-rounded-xl tw-bg-gray-50 ">
                                        <p class="tw-text-sm tw-italic tw-font-normal tw-text-gray-400">
                                            <?php echo $sells_chart_1->container(); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>  

                    
                    <?php if(!empty($all_locations)): ?>
                        <div
                            class="tw-transition-all lg:tw-col-span-2 xl:tw-col-span-2 tw-duration-200 tw-bg-white tw-shadow-sm tw-rounded-xl tw-ring-1 hover:tw-shadow-md hover:tw--translate-y-0.5 tw-ring-gray-200">
                            <div class="tw-p-4 sm:tw-p-5">
                                <div class="tw-flex tw-items-center tw-gap-2.5">
                                    <div
                                        class="tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-full tw-w-10 tw-h-10">
                                        <svg aria-hidden="true" class="tw-size-5 tw-text-sky-500 tw-shrink-0"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M17 17h-11v-14h-2"></path>
                                            <path d="M6 5l14 1l-1 7h-13"></path>
                                        </svg>
                                    </div>
                                    <h3 class="tw-font-bold tw-text-base lg:tw-text-xl">
                                        <?php echo e(__('home.sells_current_fy'), false); ?>

                                    </h3>
                                </div>
                                <div class="tw-mt-5">
                                    <div
                                        class="tw-grid tw-w-full tw-h-100 tw-border tw-border-gray-200 tw-border-dashed tw-rounded-xl tw-bg-gray-50 ">
                                        <p class="tw-text-sm tw-italic tw-font-normal tw-text-gray-400">
                                            <?php echo $sells_chart_2->container(); ?>

                                      </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?> 
                <?php endif; ?> 
                
               
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stock_report.view')): ?>
                    <div
                        class="tw-transition-all lg:tw-col-span-2 tw-duration-200 tw-bg-white tw-shadow-sm tw-rounded-xl tw-ring-1 hover:tw-shadow-md hover:tw--translate-y-0.5 tw-ring-gray-200">
                        <div class="tw-p-4 sm:tw-p-5">
                            <div class="tw-flex tw-items-center tw-gap-2.5">
                                <div
                                    class="tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-full tw-w-10 tw-h-10">
                                    <svg aria-hidden="true" class="tw-text-yellow-500 tw-size-5 tw-shrink-0"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                        <path d="M12 8v4"></path>
                                        <path d="M12 16h.01"></path>
                                    </svg>
                                </div>
                                <div class="tw-flex tw-items-center tw-flex-1 tw-min-w-0 tw-gap-1">
                                    <div class="tw-w-full sm:tw-w-1/2 md:tw-w-1/2">
                                        <h3 class="tw-font-bold tw-text-base lg:tw-text-xl">
                                            <?php echo e(__('home.product_stock_alert'), false); ?>

                                            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.product_stock_alert') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                        </h3>
                                    </div>
                                    <div class="tw-w-full sm:tw-w-1/2 md:tw-w-1/2">
                                        <?php if(count($all_locations) > 1): ?>
                                            <?php echo Form::select('stock_alert_location', $all_locations, null, [
                                                'class' => 'form-control select2',
                                                'placeholder' => __('lang_v1.select_location'),
                                                'id' => 'stock_alert_location',
                                            ]); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tw-flow-root tw-mt-5  tw-border-gray-200">
                                <div class="tw--mx-4 tw--my-2 tw-overflow-x-auto sm:tw--mx-5">
                                    <div class="tw-inline-block tw-min-w-full tw-py-2 tw-align-middle sm:tw-px-5">
                                        <table class="table table-bordered table-striped" id="stock_alert_table"
                                            style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('sale.product'); ?></th>
                                                    <th><?php echo app('translator')->get('product.brand'); ?></th>
                                                    <th>Precio Compra</th> 
                                                    <th><?php echo app('translator')->get('business.location'); ?></th>
                                                    <th><?php echo app('translator')->get('report.current_stock'); ?></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(session('business.enable_product_expiry') == 1): ?>
                        <div
                            class="tw-transition-all lg:tw-col-span-2 tw-duration-200 tw-bg-white tw-shadow-sm tw-rounded-xl tw-ring-1 hover:tw-shadow-md hover:tw--translate-y-0.5 tw-ring-gray-200">
                            <div class="tw-p-4 sm:tw-p-5">
                                <div class="tw-flex tw-items-center tw-gap-2.5">
                                    <div
                                        class="tw-border-2 tw-flex tw-items-center tw-justify-center tw-rounded-full tw-w-10 tw-h-10">
                                        <svg aria-hidden="true" class="tw-text-yellow-500 tw-size-5 tw-shrink-0"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 9v4"></path>
                                            <path
                                                d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z">
                                            </path>
                                            <path d="M12 16h.01"></path>
                                        </svg>
                                    </div>
                                    <div class="tw-flex tw-items-center tw-flex-1 tw-min-w-0 tw-gap-1">
                                        <div class="tw-w-full sm:tw-w-1/2 md:tw-w-1/2">
                                            <h3 class="tw-font-bold tw-text-base lg:tw-text-xl">
                                                <?php echo e(__('home.stock_expiry_alert'), false); ?>

                                                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('tooltip.stock_expiry_alert', [
                                                'days'
                                                =>session('business.stock_expiry_alert_days', 30) ]) . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="tw-flow-root tw-mt-5  tw-border-gray-200">
                                    <div class="tw--mx-4 tw--my-2 tw-overflow-x-auto sm:tw--mx-5">
                                        <div class="tw-inline-block tw-min-w-full tw-py-2 tw-align-middle sm:tw-px-5">
                                            <input type="hidden" id="stock_expiry_alert_days"
                                                value="<?php echo e(\Carbon::now()->addDays(session('business.stock_expiry_alert_days', 30))->format('Y-m-d'), false); ?>">
                                            <table class="table table-bordered table-striped tw-w-full" id="stock_expiry_alert_table" style="width: 100%;">

                                                <thead>
                                                    <tr>
                                                        <th><?php echo app('translator')->get('business.product'); ?></th>
                                                 
                                                        <th><?php echo app('translator')->get('business.location'); ?></th>
                                                        <th><?php echo app('translator')->get('report.stock_left'); ?></th>
                                                        <th><?php echo app('translator')->get('lang_v1.lot_number'); ?></th> 
                                                        <th><?php echo app('translator')->get('product.expires_in'); ?></th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                
                
            </div>
        </div>
    <?php endif; ?> 
    
    
    
   <!-- INICIO DE LA VENTANA MODAL PUBLICIDAD -->
    
    
    
<!--   <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Fondo oscuro */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* Contenedor del popup */
        .popup {
            width: 800px;
            max-width: 140%;
            background: #fff;
            border-radius: 10px;
            overflow: hidden; /* importante para la imagen */
            position: relative;
        }

        /* Imagen ocupa todo el ancho */
        .popup img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Botón cerrar */
        .close-btn {
            position: absolute;
            top: 8px;
            right: 10px;
            background: rgba(0,0,0,0.6);
            color: #fff;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body> -->



<!-- POPUP -->

<!--<div class="popup-overlay" id="popup">
    <div class="popup">
        <span class="close-btn" onclick="cerrarPopup()">X</span>
        
    <h1><p style="text-align: center;"> ZISCO PLUS TE DESEA</h1>
</p>
        <p </p>
        <img src="<?php echo e(asset('images/publicidad2.jpg'), false); ?>" width="200">
    </div>
</div>

<script>
    // Mostrar popup después de 2 segundos
    window.onload = function () {
        setTimeout(function () {
            document.getElementById('popup').style.display = 'flex';
        }, 1000);
    };

    function cerrarPopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>  -->



<!-- FIN DE LA VENTANA MODAL PUBLICIDAD -->








<?php $__env->stopSection(); ?>


<div class="modal fade payment_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade edit_pso_status_modal" tabindex="-1" role="dialog"></div>
<div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
</div>

<?php $__env->startSection('css'); ?>
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
<?php $__env->stopSection(); ?>




<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/home.js?v=' . $asset_v), false); ?>"></script>
    <script src="<?php echo e(asset('js/payment.js?v=' . $asset_v), false); ?>"></script>
    <?php if ($__env->exists('sales_order.common_js')) echo $__env->make('sales_order.common_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if ($__env->exists('purchase_order.common_js')) echo $__env->make('purchase_order.common_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(!empty($all_locations)): ?>
        <?php echo $sells_chart_1->script(); ?>

        <?php echo $sells_chart_2->script(); ?>

    <?php endif; ?>
    <script type="text/javascript">
        $(document).ready(function() {
            sales_order_table = $('#sales_order_table').DataTable({
                processing: true,
                serverSide: true,
                fixedHeader:false,
                scrollY: "75vh",
                scrollX: true,
                scrollCollapse: true,
                aaSorting: [
                    [1, 'desc']
                ],
                "ajax": {
                    "url": '<?php echo e(action([\App\Http\Controllers\SellController::class, 'index']), false); ?>?sale_type=sales_order',
                    "data": function(d) {
                        d.for_dashboard_sales_order = true;

                        if ($('#so_location').length > 0) {
                            d.location_id = $('#so_location').val();
                        }
                    }
                },
                columnDefs: [{
                    "targets": 7,
                    "orderable": false,
                    "searchable": false
                }],
                columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: 'transaction_date',
                        name: 'transaction_date'
                    },
                    {
                        data: 'invoice_no',
                        name: 'invoice_no'
                    },
                    {
                        data: 'conatct_name',
                        name: 'conatct_name'
                    },
                    {
                        data: 'mobile',
                        name: 'contacts.mobile'
                    },
                    {
                        data: 'business_location',
                        name: 'bl.name'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'shipping_status',
                        name: 'shipping_status'
                    },
                    {
                        data: 'so_qty_remaining',
                        name: 'so_qty_remaining',
                        "searchable": false
                    },
                    {
                        data: 'added_by',
                        name: 'u.first_name'
                    },
                ]
            });

            <?php if(auth()->user()->can('account.access') && config('constants.show_payments_recovered_today') == true): ?>

                // Cash Flow Table
                cash_flow_table = $('#cash_flow_table').DataTable({
                    processing: true,
                    serverSide: true,
                    fixedHeader:false,
                    "ajax": {
                        "url": "<?php echo e(action([\App\Http\Controllers\AccountController::class, 'cashFlow']), false); ?>",
                        "data": function(d) {
                            d.type = 'credit';
                            d.only_payment_recovered = true;
                        }
                    },
                    "ordering": false,
                    "searching": false,
                    columns: [{
                            data: 'operation_date',
                            name: 'operation_date'
                        },
                        {
                            data: 'account_name',
                            name: 'account_name'
                        },
                        {
                            data: 'sub_type',
                            name: 'sub_type'
                        },
                        {
                            data: 'method',
                            name: 'TP.method'
                        },
                        {
                            data: 'payment_details',
                            name: 'payment_details',
                            searchable: false
                        },
                        {
                            data: 'credit',
                            name: 'amount'
                        },
                        {
                            data: 'balance',
                            name: 'balance'
                        },
                        {
                            data: 'total_balance',
                            name: 'total_balance'
                        },
                    ],
                    "fnDrawCallback": function(oSettings) {
                        __currency_convert_recursively($('#cash_flow_table'));
                    },
                    "footerCallback": function(row, data, start, end, display) {
                        var footer_total_credit = 0;

                        for (var r in data) {
                            footer_total_credit += $(data[r].credit).data('orig-value') ? parseFloat($(
                                data[r].credit).data('orig-value')) : 0;
                        }
                        $('.footer_total_credit').html(__currency_trans_from_en(footer_total_credit));
                    }
                });
            <?php endif; ?>

            $('#so_location').change(function() {
                sales_order_table.ajax.reload();
            });
            <?php if(!empty($common_settings['enable_purchase_order'])): ?>
                //Purchase table
                purchase_order_table = $('#purchase_order_table').DataTable({
                    processing: true,
                    serverSide: true,
                    fixedHeader:false,
                    aaSorting: [
                        [1, 'desc']
                    ],
                    scrollY: "75vh",
                    scrollX: true,
                    scrollCollapse: true,
                    ajax: {
                        url: '<?php echo e(action([\App\Http\Controllers\PurchaseOrderController::class, 'index']), false); ?>',
                        data: function(d) {
                            d.from_dashboard = true;

                            if ($('#po_location').length > 0) {
                                d.location_id = $('#po_location').val();
                            }
                        },
                    },
                    columns: [{
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'transaction_date',
                            name: 'transaction_date'
                        },
                        {
                            data: 'ref_no',
                            name: 'ref_no'
                        },
                        {
                            data: 'location_name',
                            name: 'BS.name'
                        },
                        {
                            data: 'name',
                            name: 'contacts.name'
                        },
                        {
                            data: 'status',
                            name: 'transactions.status'
                        },
                        {
                            data: 'po_qty_remaining',
                            name: 'po_qty_remaining',
                            "searchable": false
                        },
                        {
                            data: 'added_by',
                            name: 'u.first_name'
                        }
                    ]
                })

                $('#po_location').change(function() {
                    purchase_order_table.ajax.reload();
                });
            <?php endif; ?>

            <?php if(!empty($common_settings['enable_purchase_requisition'])): ?>
                //Purchase table
                purchase_requisition_table = $('#purchase_requisition_table').DataTable({
                    processing: true,
                    serverSide: true,
                    fixedHeader:false,
                    aaSorting: [
                        [1, 'desc']
                    ],
                    scrollY: "75vh",
                    scrollX: true,
                    scrollCollapse: true,
                    ajax: {
                        url: '<?php echo e(action([\App\Http\Controllers\PurchaseRequisitionController::class, 'index']), false); ?>',
                        data: function(d) {
                            d.from_dashboard = true;

                            if ($('#pr_location').length > 0) {
                                d.location_id = $('#pr_location').val();
                            }
                        },
                    },
                    columns: [{
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'transaction_date',
                            name: 'transaction_date'
                        },
                        {
                            data: 'ref_no',
                            name: 'ref_no'
                        },
                        {
                            data: 'location_name',
                            name: 'BS.name'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'delivery_date',
                            name: 'delivery_date'
                        },
                        {
                            data: 'added_by',
                            name: 'u.first_name'
                        },
                    ]
                })

                $('#pr_location').change(function() {
                    purchase_requisition_table.ajax.reload();
                });

                $(document).on('click', 'a.delete-purchase-requisition', function(e) {
                    e.preventDefault();
                    swal({
                        title: LANG.sure,
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    }).then(willDelete => {
                        if (willDelete) {
                            var href = $(this).attr('href');
                            $.ajax({
                                method: 'DELETE',
                                url: href,
                                dataType: 'json',
                                success: function(result) {
                                    if (result.success == true) {
                                        toastr.success(result.msg);
                                        purchase_requisition_table.ajax.reload();
                                    } else {
                                        toastr.error(result.msg);
                                    }
                                },
                            });
                        }
                    });
                });
            <?php endif; ?>

            sell_table = $('#shipments_table').DataTable({
                processing: true,
                serverSide: true,
                fixedHeader:false,
                aaSorting: [
                    [1, 'desc']
                ],
                scrollY: "75vh",
                scrollX: true,
                scrollCollapse: true,
                "ajax": {
                    "url": '<?php echo e(action([\App\Http\Controllers\SellController::class, 'index']), false); ?>',
                    "data": function(d) {
                        d.only_pending_shipments = true;
                        if ($('#pending_shipments_location').length > 0) {
                            d.location_id = $('#pending_shipments_location').val();
                        }
                    }
                },
                columns: [{
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'transaction_date',
                        name: 'transaction_date'
                    },
                    {
                        data: 'invoice_no',
                        name: 'invoice_no'
                    },
                    {
                        data: 'conatct_name',
                        name: 'conatct_name'
                    },
                    {
                        data: 'mobile',
                        name: 'contacts.mobile'
                    },
                    {
                        data: 'business_location',
                        name: 'bl.name'
                    },
                    {
                        data: 'shipping_status',
                        name: 'shipping_status'
                    },
                    <?php if(!empty($custom_labels['shipping']['custom_field_1'])): ?>
                        {
                            data: 'shipping_custom_field_1',
                            name: 'shipping_custom_field_1'
                        },
                    <?php endif; ?>
                    <?php if(!empty($custom_labels['shipping']['custom_field_2'])): ?>
                        {
                            data: 'shipping_custom_field_2',
                            name: 'shipping_custom_field_2'
                        },
                    <?php endif; ?>
                    <?php if(!empty($custom_labels['shipping']['custom_field_3'])): ?>
                        {
                            data: 'shipping_custom_field_3',
                            name: 'shipping_custom_field_3'
                        },
                    <?php endif; ?>
                    <?php if(!empty($custom_labels['shipping']['custom_field_4'])): ?>
                        {
                            data: 'shipping_custom_field_4',
                            name: 'shipping_custom_field_4'
                        },
                    <?php endif; ?>
                    <?php if(!empty($custom_labels['shipping']['custom_field_5'])): ?>
                        {
                            data: 'shipping_custom_field_5',
                            name: 'shipping_custom_field_5'
                        },
                    <?php endif; ?> {
                        data: 'payment_status',
                        name: 'payment_status'
                    },
                    {
                        data: 'waiter',
                        name: 'ss.first_name',
                        <?php if(empty($is_service_staff_enabled)): ?>
                            visible: false
                        <?php endif; ?>
                    }
                ],
                "fnDrawCallback": function(oSettings) {
                    __currency_convert_recursively($('#sell_table'));
                },
                createdRow: function(row, data, dataIndex) {
                    $(row).find('td:eq(4)').attr('class', 'clickable_td');
                }
            });

            $('#pending_shipments_location').change(function() {
                sell_table.ajax.reload();
            });
        });
    </script>
    
    
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/home/index.blade.php ENDPATH**/ ?>