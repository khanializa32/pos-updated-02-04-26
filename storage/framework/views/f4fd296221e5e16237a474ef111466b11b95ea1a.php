
<?php $__env->startSection('title', $business->name); ?>


<?php $__env->startSection('content'); ?>
<style>

/* ===== Buscador Moderno ===== */
.search-modern {
    position: relative;
    display: flex;
    align-items: center;
    background: #fff;
    border-radius: 30px;
    padding: 8px 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    border: 1px solid #eee;
    transition: all 0.3s ease;
}

.search-modern:hover {
    box-shadow: 0 6px 18px rgba(0,0,0,0.12);
}

.search-modern i {
    color: #2BB3B0;
    font-size: 14px;
    margin-right: 8px;
}

.search-modern input {
    border: none;
    outline: none;
    width: 100%;
    font-size: 14px;
    background: transparent;
}

.search-modern input::placeholder {
    color: #aaa;
    font-size: 13px;
}
.search-modern:focus-within {
    border-color: #2BB3B0;
    box-shadow: 0 0 0 3px rgba(43,179,176,0.15);
}


/* Botón Scroll Top */
.scrolltop {
    position: fixed;
    right: 20px;
    bottom: 80px; /* 🔥 Aquí lo subes (antes puede estar muy abajo) */
    z-index: 1100;
    display: none;
}

.scrolltop .scroll {
    width: 45px;
    height: 45px;
    background: #2BB3B0;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    transition: 0.3s ease;
}

.scrolltop .scroll:hover {
    transform: translateY(-3px);
    background: #004C6E;
}


/* ===== Bottom App Navigation ===== */
.app-bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #ffffff;
    border-top: 1px solid #e5e5e5;
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: 65px;
    z-index: 1000;
    box-shadow: 0 -2px 10px rgba(0,0,0,0.08);
}

.app-bottom-nav a {
    flex: 1;
    text-align: center;
    text-decoration: none;
    color: #555;
    font-size: 12px;
    font-weight: 600;
    transition: 0.3s;
    position: relative;
}

.app-bottom-nav a i {
    display: block;
    font-size: 20px;
    margin-bottom: 3px;
}

.app-bottom-nav a:hover,
.app-bottom-nav a.active {
    color: #2BB3B0;
}

.app-bottom-badge {
    position: absolute;
    top: 2px;
    right: 30%;
    background: #e74c3c;
    color: #fff;
    font-size: 10px;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Espacio para que no tape contenido */
body {
    padding-bottom: 80px;
}

/* Ocultar botón lateral de carrito en móvil */
@media (max-width: 768px) {
    .cart-button-fixed {
        display: none;
    }
}

.modal-backdrop {
    display: none !important;
}


    /* Sidebar Modal Styles */
    
    #total {
    font-size: 2rem;   /* tamaño más grande */
    font-weight: 700;  /* negrita */
    color: #000;       /* opcional */
}

    .total-label {
    font-size: 1.4rem;   /* tamaño grande, ajusta al gusto */
    font-weight: 700;    /* negrita opcional */
    color: #2BB3B0;         /* opcional */
}



.text-red {
    
    color: red;       /* cambia el color del texto */
    font-weight: bold;
}

.text-green-bold {
    color: green;
    font-weight: bold;
}

.product-card .box-body {
    padding: 6px;   /* antes ~15px */
}

.catalogue-title {
    font-size: 14px;
    margin: 6px 0 4px;
    line-height: 1.2;
}

@media (max-width: 768px) {
    img.catalogue {
        height: 95px;
    }
}

$(document).on('click', '.add-to-cart-btn', function(e) {

    const stock = parseInt($(this).data('stock'));

    if (isNaN(stock) || stock <= 0) {
        e.preventDefault();
        alert('Producto sin stock disponible');
        return;
    }

    // continúa flujo normal
});



.product-image {
    display: block;
    width: 100%;
}

.ribbon {
    position: absolute;
    top: 10px;
    right: -35px;
    background: #dc3545;
    color: #fff;
    padding: 6px 40px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    transform: rotate(45deg);
    box-shadow: 0 2px 6px rgba(0,0,0,.3);
    z-index: 10;
}


.price-big {
    font-size: 1.1rem; /* ajusta según necesidad */
    font-weight: 700;
    color: #000;
}

.price-small {
    font-size: 1.1rem;
    font-weight: 500;
}


    .modal.right .modal-dialog {
        position: fixed;
        right: 0;
        margin: auto;
        width: 400px;
        height: 100%;
        -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
        -o-transform: translate3d(0%, 0, 0);
        transform: translate3d(0%, 0, 0);
    }

    .modal.right .modal-content {
        height: 100%;
        overflow-y: auto;
        border-radius: 0;
        border: none;
    }

    .modal.right .modal-body {
        padding: 15px 15px 80px;
    }

    .modal.right.fade .modal-dialog {
        right: -400px;
        -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
        -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
        -o-transition: opacity 0.3s linear, right 0.3s ease-out;
        transition: opacity 0.3s linear, right 0.3s ease-out;
    }

    .modal.right.fade.in .modal-dialog {
        right: 0;
    }

    .modal-content {
        border-radius: 0;
        border: none;
    }

    .modal-header {
        border-bottom-color: #eeeeee;
        background-color: #fafafa;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 0;
    }

    .cart-count-badge {
        background-color: #e74c3c;
        color: white;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: bold;
    }

    /* Cart Button Fixed */
    .cart-button-fixed {
        position: fixed;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 60px;
        height: 60px;
        background-color: #000;
        color: white;
        border: none;
        border-radius: 50% 0 0 50%;
        cursor: pointer;
        font-size: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 999;
        box-shadow: -4px 4px 12px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        padding-right: 5px;
    }

    .cart-button-fixed:hover {
        transform: translateY(-50%) scale(1.1);
        box-shadow: -6px 6px 16px rgba(0, 0, 0, 0.25);
        right: -5px;
    }

    .cart-count {
        position: absolute;
        top: -8px;
        right: -8px;
        background-color: #e74c3c;
        color: white;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: bold;
    }

    .empty-cart-message {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 200px;
        color: #999;
        text-align: center;
    }

    .empty-cart-message i {
        font-size: 48px;
        margin-bottom: 10px;
        opacity: 0.5;
    }

    .cart-item {
        display: flex;
        gap: 12px;
        margin-bottom: 16px;
        padding: 12px;
        background-color: #f9f9f9;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
    }

    .cart-item-image {
        width: 80px;
        height: 80px;
        background-color: #e0e0e0;
        border-radius: 4px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .cart-item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .cart-item-details {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .cart-item-name {
        font-weight: 600;
        margin: 0 0 4px 0;
        font-size: 14px;
        color: #333;
    }

    .cart-item-price {
        color: #666;
        font-size: 13px;
        margin-bottom: 8px;
    }

    .cart-item-qty-control {
        display: flex;
        gap: 4px;
        align-items: center;
    }

    .cart-item-qty-control button {
        background-color: #fff;
        border: 1px solid #ddd;
        width: 24px;
        height: 24px;
        border-radius: 3px;
        cursor: pointer;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }

    .cart-item-qty-control input {
        width: 35px;
        height: 24px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 3px;
        font-size: 12px;
        padding: 0;
    }

    .cart-item-remove {
        background: none;
        border: none;
        color: #e74c3c;
        cursor: pointer;
        font-size: 14px;
        padding: 0;
    }

    .cart-footer {
        position: relative;
        background-color: #f9f9f9;
        border-top: 1px solid #e0e0e0;
        padding: 15px;
        display: flex;
        flex-direction: column;
    }

    .order-summary {
        margin-bottom: 16px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 14px;
    }

    .total-row {
        font-weight: 600;
        font-size: 16px;
        color: #27ae60;
        border-top: 1px solid #ddd;
        padding-top: 10px;
    }

    .send-data-btn {
        width: 100%;
        padding: 12px;
        background-color: #000;
        border: none;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .send-data-btn:hover {
        background-color: #333;
    }

    /* Product Card Styling */
    .product-card {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .product-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }

    .product-image-wrapper {
        height: 200px;
        overflow: hidden;
        background-color: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-card:hover .product-image-wrapper img {
        transform: scale(1.05);
    }

    .product-actions {
        display: flex;
        gap: 8px;
        margin-top: 12px;
        padding-top: 12px;
        border-top: 1px solid #e0e0e0;
    }

    .quantity-selector {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: 4px;
        overflow: hidden;
    }

    .qty-btn {
        background-color: #f5f5f5;
        border: none;
        width: 28px;
        height: 28px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .qty-btn:hover {
        background-color: #e0e0e0;
    }

    .qty-input {
        width: 40px;
        height: 28px;
        border: none;
        text-align: center;
        font-size: 14px;
        padding: 0;
        -moz-appearance: textfield;
    }

    .qty-input::-webkit-outer-spin-button,
    .qty-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .qty-input:focus {
        outline: none;
    }

.header-red-bg {
    background-color: #004C6E; /* rojo Bevgo */
    color: #fff;
    padding: 16px 10px;
}

.header-red-bg h2,
.header-red-bg h4,
.header-red-bg p {
    color: #fff !important;
}

.bg-info.add-to-cart-btn {
    background-color: #2BB3B0 !important;
    border-color: #2BB3B0 !important;
}

    .add-to-cart-btn {
        flex: 1;
        height: 28px;
        padding: 0;
        font-size: 12px;
        background-color: #007bff;
        border: none;
        color: white;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .add-to-cart-btn:hover:not(:disabled) {
        background-color: #0056b3;
    }

    .add-to-cart-btn:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }

    @media (max-width: 768px) {
        .modal.right .modal-dialog {
            width: 100%;
            right: -100%;
        }

        .modal.right.fade.in .modal-dialog {
            right: 0;
        }

        .modal.right.fade .modal-dialog {
            right: -100%;
        }

        .product-card {
            margin-bottom: 20px;
        }

        .catalogue-title {
            font-size: 16px;
        }
    }

    @keyframes fadeInOut {
        0% { opacity: 0; transform: translateY(-20px); }
        10% { opacity: 1; transform: translateY(0); }
        90% { opacity: 1; transform: translateY(0); }
        100% { opacity: 0; transform: translateY(-20px); }
    }
</style>

<!-- Cart Button Fixed -->
<button class="cart-button-fixed" id="openCartBtn">
    <i class="fas fa-shopping-cart"></i>
    <span class="cart-count" id="cartCount">0</span>
</button>

<!-- Content Header (Page header) -->
        <section class="header-premium" id="top">

            <div class="header-left">
                <div class="logo-premium">
                    <?php if(!empty($business->logo)): ?>
                        <img src="<?php echo e(asset('uploads/business_logos/' . $business->logo), false); ?>" alt="Logo">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/55" alt="Logo">
                    <?php endif; ?>
                </div>
        
                <div class="business-info">
                    <h2><?php echo e($business->name, false); ?></h2>
                    <h4><?php echo e($business_location->name, false); ?></h4>
                    <p><?php echo $business_location->location_address; ?></p>
                </div>
            </div>
        
            <div class="badge-domicilio-premium">
                <i class="fas fa-motorcycle"></i>
                Domicilio Disponible
            </div>

        </section>




            <section class="no-print">
                <div class="container">
                    <!-- Static navbar -->
                    <nav class="navbar-default tw-transition-all tw-duration-5000 tw-shrink-0 tw-rounded-2xl tw-m-[16px] tw-border-2 !tw-bg-white">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="margin-top: 3px; margin-right: 3px;">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand menu" href="#top">
                                    <?php if(!empty($business->logo)): ?>
                                        <img src="<?php echo e(asset( 'uploads/business_logos/' . $business->logo), false); ?>" alt="Logo" width="30">
                                    <?php else: ?>
                                        <i class="fas fa-boxes"></i>
                                    <?php endif; ?>
                                </a>
                            </div>
                            
                        <style>
                                .header-premium {
                                    background: linear-gradient(135deg, #2BB3B0, #004C6E);
                                    color: #fff;
                                    margin: 14px;
                                    padding: 14px 18px;
                                    border-radius: 20px;
                                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.18);
                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                    gap: 15px;
                                    position: relative;
                                    overflow: hidden;
                                }
                            
                                .header-premium::after {
                                    content: "";
                                    position: absolute;
                                    top: -40%;
                                    right: -20%;
                                    width: 220px;
                                    height: 220px;
                                    background: rgba(255, 255, 255, 0.08);
                                    border-radius: 50%;
                                }
                            
                                .header-left {
                                    display: flex;
                                    align-items: center;
                                    gap: 14px;
                                    z-index: 2;
                                }
                            
                                .logo-premium img {
                                    width: 55px;
                                    height: 55px;
                                    border-radius: 14px;
                                    object-fit: cover;
                                    background: #fff;
                                    padding: 5px;
                                }
                            
                                .business-info h2 {
                                    margin: 0;
                                    font-size: 18px;
                                    font-weight: 700;
                                }
                            
                                .business-info h4 {
                                    margin: 2px 0;
                                    font-size: 14px;
                                    font-weight: 500;
                                    opacity: 0.9;
                                }
                            
                                .business-info p {
                                    margin: 0;
                                    font-size: 12px;
                                    opacity: 0.85;
                                }
                            
                                .badge-domicilio-premium {
                                    background: rgba(255, 255, 255, 0.18);
                                    backdrop-filter: blur(6px);
                                    padding: 7px 16px;
                                    border-radius: 30px;
                                    font-size: 13px;
                                    font-weight: 600;
                                    display: flex;
                                    align-items: center;
                                    gap: 6px;
                                    border: 1px solid rgba(255, 255, 255, 0.3);
                                    z-index: 2;
                                }
                            
                                .badge-domicilio-premium i {
                                    font-size: 14px;
                                }
                            
                                /* Responsive */
                                @media(max-width: 768px){
                                    .header-premium {
                                        flex-direction: column;
                                        align-items: flex-start;
                                    }
                            
                                    .badge-domicilio-premium {
                                        margin-top: 8px;
                                    }
                                }
                        </style>



                <!-- Categories Modal -->
<div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-th-large"></i> Categorías
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <ul class="list-group" id="categoriesList">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <a href="#category<?php echo e($key, false); ?>" 
                               class="category-link"
                               data-target="category<?php echo e($key, false); ?>">
                                <?php echo e($value, false); ?>

                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
    </div> <!-- /container -->
    

    
    
</section>
<!-- Main content -->

    <section class="no-print">
        <div class="container">
        <div class="row mb-3">
    <div class="col-md-6 col-md-offset-3">
        <div class="search-modern">
            <i class="fas fa-search"></i>
            <input type="text"
                   id="productSearch"
                   placeholder="Buscar productos...">
        </div>
    </div>
</div>

</div>

        </div>
    </section>

    <section class="content pt-0">
    
    <div class="container">
       <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="category-block"
         data-category-id="category<?php echo e($product_category->first()->category->id ?? 0, false); ?>">
         
        <div class="row">

                <div class="col-md-12">
                    <h2 class="page-header" id="category<?php echo e($product_category->first()->category->id ?? 0, false); ?>"><?php echo e($product_category->first()->category->name ?? '', false); ?></h2>
                </div>
            </div>
            <div class="row eq-height-row">
            <?php $__currentLoopData = $product_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 col-sm-6 col-xs-6 eq-height-col">
                    <div class="box box-solid product-box product-card">
                        <div class="box-body">
                            <a href="#" class="show-product-details" data-href="<?php echo e(action([\Modules\ProductCatalogue\Http\Controllers\ProductCatalogueController::class, 'show'],  [$business->id, $product->id]), false); ?>?location_id=<?php echo e($business_location->id, false); ?>">
                            
                                <img src="<?php echo e($product->image_url, false); ?>" class="img-responsive catalogue" alt="<?php echo e($product->name, false); ?>">
                            
                            </a>

                            <?php
                                $discount = $discounts->firstWhere('brand_id', $product->brand_id);
                                if(empty($discount)){
                                    $discount = $discounts->firstWhere('category_id', $product->category_id);
                                }
                            ?>

                            <?php if(!empty($discount)): ?>
                                <span class="label label-warning discount-badge">- <?php echo e(($discount->discount_amount), false); ?>%</span>
                            <?php endif; ?>

                            <?php
                                $max_price = $product->variations->max('sell_price_inc_tax');
                                $min_price = $product->variations->min('sell_price_inc_tax');
                            ?>
                            <h2 class="catalogue-title">
                                <a href="#" class="show-product-details" data-href="<?php echo e(action([\Modules\ProductCatalogue\Http\Controllers\ProductCatalogueController::class, 'show'],  [$business->id, $product->id]), false); ?>?location_id=<?php echo e($business_location->id, false); ?>">
                                    <?php echo e($product->name, false); ?>

                                </a>
                            </h2>
                            <table class="table no-border product-info-table">
                                <tr>
                                    
                                    <td class="pb-0">
    <span class="display_currency product-price price-big"
          data-currency_symbol="true"
          data-price="<?php echo e($max_price, false); ?>">
        <?php echo e($max_price, false); ?>

    </span>

    <?php if($max_price != $min_price): ?>
        - <span class="display_currency price-small"
                 data-currency_symbol="true">
            <?php echo e($min_price, false); ?>

        </span>
    <?php endif; ?>
</td>

                                </tr>
                                
                                <!--<tr>
                                    <th class="pb-0"> <?php echo app('translator')->get('product.sku'); ?>:</th>
                                    <td class="pb-0"><?php echo e($product->sku, false); ?></td>
                                </tr>-->
                                
                            <?php if($product->type == 'variable'): ?>
                                <?php
                                    $variations = $product->variations->groupBy('product_variation_id');
                                ?>
                                <?php $__currentLoopData = $variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th><?php echo e($product_variation->first()->product_variation->name, false); ?>:</th>
                                        <td>
                                            <select class="form-control input-sm product-variation-select">
                                            <?php $__currentLoopData = $product_variation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($variation->id, false); ?>" data-price="<?php echo e($variation->sell_price_inc_tax, false); ?>"><?php echo e($variation->name, false); ?> (<?php echo e($variation->sub_sku, false); ?>) - <?php echo e(($variation->sell_price_inc_tax), false); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                           
                                 <?php if($product->enable_stock && $product->stock <= 0): ?> Sin Stock

        <div class="ribbon ribbon-danger">
            <?php echo app('translator')->get('productcatalogue::lang.out_of_stock'); ?>
        </div>
    <?php endif; ?>
                            </table>

                            <div class="product-actions">
                                <div class="quantity-selector">
                                    <button class="qty-btn qty-minus text-red" type="button">-</button>
                                    <input type="number" class="qty-input" value="1" min="1">
                                    <button class="qty-btn qty-plus text-green-bold" type="button">+</button>
                                </div>
                                
                            </div>
    <div class="text-center mt-10">

        <button class="btn bg-info btn-sm add-to-cart-btn"
    data-product-id="<?php echo e($product->id, false); ?>"
    data-product-name="<?php echo e($product->name, false); ?>"
    data-product-price="<?php echo e($max_price, false); ?>"
    data-product-sku="<?php echo e($product->sku, false); ?>"
    data-stock="<?php echo e($product->stock, false); ?>">
    <i class="fas fa-cart-plus"></i> &nbsp;Agregar al Carrito&nbsp;&nbsp;
</button>

    </div>

                        </div>
                    </div>
                </div>
            <?php if($loop->iteration % 4 == 0): ?>
    <div class="clearfix hidden-xs hidden-sm"></div>
<?php endif; ?>

<?php if($loop->iteration % 2 == 0): ?>
    <div class="clearfix visible-xs visible-sm"></div>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class='scrolltop no-print'>
        <div class='scroll icon'><i class="fas fa-angle-up"></i></div>
    </div>
</section>

<!-- Cart Modal -->
<div class="modal right fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">
                    <i class="fas fa-shopping-cart"></i> Productos
                    <span class="cart-count-badge" id="cartCountBadge">0</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="cartItemsContainer">
                <div class="empty-cart-message">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Su Carrito está vacío</p>
                </div>
            </div>
            <div class="modal-footer cart-footer">
                <div class="order-summary">
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span id="subtotal" class="display_currency">0</span>
                    </div>
                    <div class="summary-row">
                        <span>Domicilio (POR CALCULAR)</span>
                        <span id="vat" class="display_currency">0</span>
                    </div>
                    <div class="total-row">
                        <span class="total-label" style="float: left;">TOTAL PEDIDO:</span>
                        <span id="total" class="display_currency">0</span>
                    </div>
                </div>
                <button class="btn btn-dark btn-block send-data-btn">Envie Sus Datos</button>
                <button type="button" class="btn btn-secondary btn-block mt-2" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Producto Agotado -->
<div class="modal fade" id="outOfStockModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content text-center">
            <div class="modal-body">
                <i class="fas fa-exclamation-triangle text-danger" style="font-size:40px;"></i>
                <h4 class="mt-3">Producto Agotado</h4>
                <p>Este producto no tiene stock disponible.</p>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Entendido
                </button>
            </div>
        </div>
    </div>
</div>

<!-- /.content -->
<!-- Add currency related field-->
<input type="hidden" id="__code" value="<?php echo e($business->currency->code, false); ?>">
<input type="hidden" id="__symbol" value="<?php echo e($business->currency->symbol, false); ?>">
<input type="hidden" id="__thousand" value="<?php echo e($business->currency->thousand_separator, false); ?>">
<input type="hidden" id="__decimal" value="<?php echo e($business->currency->decimal_separator, false); ?>">
<input type="hidden" id="__symbol_placement" value="<?php echo e($business->currency->currency_symbol_placement, false); ?>">
<input type="hidden" id="__precision" value="<?php echo e($business->currency_precision, false); ?>">
<input type="hidden" id="__quantity_precision" value="<?php echo e($business->quantity_precision, false); ?>">
<div class="modal fade product_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>


<footer class="tw-bg-white tw-border-t tw-mt-12">
    <div class="container tw-py-10">
        <div class="row">

         

         

                <div class="tw-flex tw-justify-center tw-gap-4 tw-mt-3">
                    <?php if(!empty($business->facebook)): ?>
                        <a href="<?php echo e($business->facebook, false); ?>" target="_blank" class="tw-text-red-600 tw-text-xl">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    <?php endif; ?>
                    <?php if(!empty($business->instagram)): ?>
                        <a href="<?php echo e($business->instagram, false); ?>" target="_blank" class="tw-text-red-600 tw-text-xl">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <!-- Línea inferior -->
        <hr class="tw-my-6">

        <div class="row tw-text-sm tw-text-gray-500">
            <div class="col-md-6 col-sm-12">
               
                <p class="tw-mt-2">
                    El exceso de alcohol es perjudicial para la salud.  
                    Ley 30 de 1986. Prohíbase el expendio de bebidas embriagantes
                    a menores de edad y mujeres embarazadas. Ley 124 de 1994.
                </p>
            </div>

            <div class="col-md-6 col-sm-12 tw-text-right tw-mt-4 md:tw-mt-0">
                <p>© <?php echo e(date('Y'), false); ?> <?php echo e($business->name, false); ?>. Todos los derechos reservados.</p>
                <p>
                    <a href="#" class="hover:tw-text-red-600">Preguntas frecuentes</a> |
                    <a href="#" class="hover:tw-text-red-600">Políticas de privacidad</a> |
                    <a href="#" class="hover:tw-text-red-600">Términos y condiciones</a>
                </p>
            </div>
        </div>
    </div>
</footer>


<!-- ===== Bottom App Navigation ===== -->
<div class="app-bottom-nav">

    <!-- Inicio -->
    <a href="#top" class="app-nav-link" id="navHome">
        <i class="fas fa-home"></i>
        Inicio
    </a>

    <!-- Categorías -->
    <a href="#" class="app-nav-link" id="navCategories">
        <i class="fas fa-th-large"></i>
        Categorías
    </a>

    <!-- Carrito -->
    <a href="#" class="app-nav-link" id="navCart">
        <i class="fas fa-shopping-cart"></i>
        <span class="app-bottom-badge" id="bottomCartCount">0</span>
        Carrito
    </a>

</div>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    
    // 🔍 Buscador de productos + ocultar categorías vacías
$('#productSearch').on('keyup', function () {

    let search = $(this).val().toLowerCase().trim();

    $('.category-block').each(function () {

        let categoryHasVisibleProducts = false;

        $(this).find('.product-card').each(function () {

            let productName = $(this)
                .find('.catalogue-title')
                .text()
                .toLowerCase();

            if (productName.includes(search)) {
                $(this).closest('.col-md-3').show();
                categoryHasVisibleProducts = true;
            } else {
                $(this).closest('.col-md-3').hide();
            }
        });

        // Mostrar / ocultar categoría completa
        if (categoryHasVisibleProducts) {
            $(this).show();
        } else {
            $(this).hide();
        }

        // 🔗 Mostrar / ocultar link del menú
        let categoryId = $(this).data('category-id');
        $('a[href="#' + categoryId + '"]').parent().toggle(categoryHasVisibleProducts);
    });
});


    
    
    $(document).ready(function() {
        // Initialize currency
        __currency_symbol = $('input#__symbol').val();
        __currency_thousand_separator = $('input#__thousand').val();
        __currency_decimal_separator = $('input#__decimal').val();
        __currency_symbol_placement = $('input#__symbol_placement').val();
        if ($('input#__precision').length > 0) {
            __currency_precision = $('input#__precision').val();
        } else {
            __currency_precision = 2;
        }

        if ($('input#__quantity_precision').length > 0) {
            __quantity_precision = $('input#__quantity_precision').val();
        } else {
            __quantity_precision = 2;
        }

        if ($('input#p_symbol').length > 0) {
            __p_currency_symbol = $('input#p_symbol').val();
            __p_currency_thousand_separator = $('input#p_thousand').val();
            __p_currency_decimal_separator = $('input#p_decimal').val();
        }

        __currency_convert_recursively($('.content'));

        // Cart functionality
        let cart = {};
        const businessCurrency = $('input#__code').val();

        // Load cart from localStorage
        function loadCart() {
            const savedCart = localStorage.getItem('productCatalogue_cart');
            if (savedCart) {
                cart = JSON.parse(savedCart);
            }
        }
    
    // FIX definitivo backdrop Bootstrap
$(document).on('hidden.bs.modal', function () {
    if ($('.modal.in').length === 0) {
        $('body').removeClass('modal-open');
        $('body').css('padding-right', '');
        $('.modal-backdrop').remove();
    }
});

// Por si queda bloqueado al abrir otro modal
$(document).on('show.bs.modal', '.modal', function () {
    $('.modal-backdrop').not(':last').remove();
});


        // Save cart to localStorage
        function saveCart() {
            localStorage.setItem('productCatalogue_cart', JSON.stringify(cart));
            updateCartDisplay();
        }

        // Update cart display
        function updateCartDisplay() {
            // Reload cart from localStorage in case it was updated elsewhere
            loadCart();
            
            const container = $('#cartItemsContainer');
            let cartCount = 0;
            let subtotal = 0;

            if (Object.keys(cart).length === 0) {
                container.html(`
                    <div class="empty-cart-message">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Su Carrito Está Vacío</p>
                    </div>
                `);
            } else {
                let html = '';
                Object.keys(cart).forEach(key => {
                    const item = cart[key];
                    const itemTotal = item.price * item.quantity;
                    subtotal += itemTotal;
                    cartCount += item.quantity;

                    html += `
                        <div class="cart-item" data-cart-key="${key}">
                            <div class="cart-item-image">
                                <img src="${item.image || 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg=='}" alt="${item.name}">
                            </div>
                            <div class="cart-item-details">
                                <p class="cart-item-name">${item.name}</p>
                                <p class="cart-item-price">
                                      ${item.price.toLocaleString('es-CO', {minimumFractionDigits: 0, maximumFractionDigits: 0})} </p>

                                <div class="cart-item-qty-control">
                                    <button class="cart-qty-minus" type="button">-</button>
                                    <input type="number" class="cart-qty-input" value="${item.quantity}" min="1">
                                    <button class="cart-qty-plus" type="button">+</button>
                                    <button class="cart-item-remove" type="button"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    `;
                });
                container.html(html);
            }
            

            $('#cartCount').text(cartCount);
            $('#cartCountBadge').text(cartCount);
            $('#bottomCartCount').text(cartCount);


            // Calculate totals
            const vat = subtotal * 0; // 0% VAT
            const total = subtotal + vat;

            $('#subtotal').text(formatCurrency(subtotal));
            $('#vat').text(formatCurrency(vat));
            $('#total').text(formatCurrency(total));

            // Trigger currency conversion
            __currency_convert_recursively($('#cartModal'));
        }
        
        // Make updateCartDisplay available globally for modal
        window.updateCartDisplay = updateCartDisplay;

        // Format currency
        function formatCurrency(amount) {
            return amount.toFixed(2);
        }

        // Show notification
        function showNotification(message) {
            const notification = $(`
                <div class="alert alert-success" style="position: fixed; top: 20px; right: 20px; z-index: 9999; animation: fadeInOut 3s;">
                    ${message}
                </div>
            `);
            $('body').append(notification);
            setTimeout(() => notification.remove(), 3000);
        }

        // Initialize cart
        loadCart();
        updateCartDisplay();
        
        // Listen for cart updates from modal or other sources
        $(document).on('cartUpdated', function() {
            loadCart();
            updateCartDisplay();
        });

        // Open cart modal - Fixed event handler
        $('#openCartBtn').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $('#cartModal').modal('show');
        });
// Bottom Nav - Open Cart
$('#navCart').on('click', function(e){
    e.preventDefault();
    $('#categoriesModal').modal('hide');
    $('#cartModal').modal('show');
});


// Bottom Nav - Scroll to top
$('#navHome').on('click', function(e){
    e.preventDefault();
    $('html, body').animate({
        scrollTop: $('#top').offset().top
    }, 600);
});

// Bottom Nav - Scroll to categories
// Bottom Nav - Open Categories Modal
$('#navCategories').on('click', function(e){
    e.preventDefault();
    $('#cartModal').modal('hide');
    $('#categoriesModal').modal('show');
});


// Click dentro del modal -> scroll y cerrar
$(document).on('click', '.category-link', function(e){
    e.preventDefault();

    let target = $(this).data('target');

    $('#categoriesModal').modal('hide');

    setTimeout(function(){
        if($('#' + target).length){
            $('html, body').animate({
                scrollTop: $('#' + target).offset().top
            }, 600);
        }
    }, 300);
});


        // Product quantity controls - Using event delegation
        $(document).on('click', '.qty-plus', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const input = $(this).siblings('.qty-input');
            let currentQty = parseInt(input.val()) || 1;
            input.val(currentQty + 1);
        });

        $(document).on('click', '.qty-minus', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const input = $(this).siblings('.qty-input');
            let currentQty = parseInt(input.val()) || 1;
            if (currentQty > 1) {
                input.val(currentQty - 1);
            }
        });

        // Prevent default behavior on qty-input
        $(document).on('change', '.qty-input', function(e) {
            let val = parseInt($(this).val());
            if (isNaN(val) || val < 1) {
                $(this).val(1);
            }
        });

        // Add to cart
        $(document).on('click', '.add-to-cart-btn', function(e) {
    e.preventDefault();
    e.stopPropagation();

    const btn = $(this);
    const stock = parseInt(btn.data('stock'));

    // 🔴 SI NO HAY STOCK → MOSTRAR MODAL
    if (!stock || stock <= 0) {
        $('#outOfStockModal').modal('show');
        return;
    }

    const productId = btn.data('product-id');
    const productName = btn.data('product-name');
    const productPrice = parseFloat(btn.data('product-price'));
    const productSku = btn.data('product-sku');
    const quantity = parseInt(btn.closest('.box-body').find('.qty-input').val()) || 1;
    const cartKey = productId;

    if (cart[cartKey]) {
        cart[cartKey].quantity += quantity;
    } else {
        cart[cartKey] = {
            id: productId,
            name: productName,
            price: productPrice,
            sku: productSku,
            quantity: quantity,
            image: btn.closest('.box-body').find('.catalogue').attr('src')
        };
    }

    saveCart();
    showNotification('Producto agregado!');
    btn.closest('.box-body').find('.qty-input').val(1);
});


        // Cart quantity controls
        $(document).on('click', '.cart-qty-minus', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const cartItem = $(this).closest('.cart-item');
            const cartKey = cartItem.data('cart-key');
            const input = cartItem.find('.cart-qty-input');
            let currentQty = parseInt(input.val()) || 1;

            if (currentQty > 1) {
                currentQty -= 1;
                input.val(currentQty);
                cart[cartKey].quantity = currentQty;
                saveCart();
            }
        });

        $(document).on('click', '.cart-qty-plus', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const cartItem = $(this).closest('.cart-item');
            const cartKey = cartItem.data('cart-key');
            const input = cartItem.find('.cart-qty-input');
            let currentQty = parseInt(input.val()) || 1;
            
            currentQty += 1;
            input.val(currentQty);
            cart[cartKey].quantity = currentQty;
            saveCart();
        });

        // Remove from cart
        $(document).on('click', '.cart-item-remove', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const cartKey = $(this).closest('.cart-item').data('cart-key');
            delete cart[cartKey];
            saveCart();
            showNotification('Producto Eliminado!');
        });

        // Send data - redirect to checkout
        $(document).on('click', '.send-data-btn', function(e) {
            e.preventDefault();
            if (Object.keys(cart).length === 0) {
                alert('agrega productos al carrito');
                return;
            }
            
            // Redirect to checkout page
            window.location.href = '<?php echo e(action([\Modules\ProductCatalogue\Http\Controllers\ProductCatalogueController::class, 'checkout'], [$business->id]), false); ?>?location_id=<?php echo e($business_location->id, false); ?>';
        });

        // Show product details modal
        $(document).on('click', '.show-product-details', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            $.ajax({
                url: $(this).data('href'),
                dataType: 'html',
                success: function(result) {
                    $('.product_modal')
                        .html(result)
                        .modal('show');
                    __currency_convert_recursively($('.product_modal'));
                },
                error: function(xhr, status, error) {
                    console.error('Error loading product details:', error);
                    alert('No se pueden cargar los detalles del producto. Por favor, inténtelo de nuevo');
                }
            });
        });

        // Menu navigation
        $(document).on('click', '.menu', function(e) {
            e.preventDefault();
            $('.navbar-toggle').addClass('collapsed');
            $('.navbar-collapse').removeClass('in');

            var cat_id = $(this).attr('href');
            if ($(cat_id).length) {
                $('html, body').animate({
                    scrollTop: $(cat_id).offset().top
                }, 1000);
            }
        });

        // Scroll to top
        $(document).on('click', '.scroll', function(e) {
            e.preventDefault();
            $("html, body").animate({
                scrollTop: $("#top").offset().top
            }, 1000);
        });

        // Sticky navbar
        $(window).scroll(function() {
            var height = $(window).scrollTop();

            if (height > 180) {
                $('nav').addClass('navbar-fixed-top');
                $('.scrolltop:hidden').stop(true, true).fadeIn();
            } else {
                $('nav').removeClass('navbar-fixed-top');
                $('.scrolltop').stop(true, true).fadeOut();
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/ProductCatalogue/Providers/../Resources/views/catalogue/index.blade.php ENDPATH**/ ?>