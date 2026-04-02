<div class="row" id="featured_products_box" style="display: none;">
    <?php if(!empty($featured_products)): ?>
        <?php echo $__env->make('sale_pos.partials.featured_products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>
<div class="row tw-mb-1">
     <?php if(!empty($categories)): ?>
         
                            <div class="col-md-6 !tw-px-2 tw-block sm:tw-block md:tw-block lg:tw-hidden" id="product_category_div"> 
            <div class="tw-dw-drawer tw-dw-drawer-end">
                <input id="my-drawer-4" type="checkbox" class="tw-dw-drawer-toggle">
                <div class="tw-dw-drawer-content">
                    <!-- Page content here -->
                    <label for="my-drawer-4"
                        class="tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 hover:tw-from-indigo-600 hover:tw-to-blue-600 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-blue-500 focus:tw-ring-offset-2 active:tw-from-indigo-700 active:tw-to-blue-700 lg:tw-w-[98%] tw-w-full tw-flex tw-items-center tw-justify-center tw-gap-1 tw-text-base md:tw-text-lg tw-text-white tw-font-semibold tw-rounded-xl tw-h-12 tw-cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="tw-w-5 icon icon-tabler icon-tabler-category-plus" width="44" height="44"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 4h6v6h-6zm10 0h6v6h-6zm-10 10h6v6h-6zm10 3h6m-3 -3v6" />
                        </svg>
                        <?php echo app('translator')->get('category.category'); ?>
                    </label>
                </div>
                <div class="tw-dw-drawer-side" style="z-index: 4000">
                    <label for="my-drawer-4" aria-label="close sidebar"
                        class="tw-dw-drawer-overlay overlay-category"></label>
                    <div class="tw-dw-menu tw-w-2/4 tw-min-h-full tw-bg-white tw-p-6">
                        <div class="tw-flex tw-items-center tw-mb-16">
                            <button type="button"
                                class="tw-dw-btn tw-dw-btn-accent category-back tw-bg-transparent tw-border-2"
                                style="display: none">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="tw-w-5 icon icon-tabler icon-tabler-chevron-left" width="44"
                                    height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M15 6l-6 6l6 6" />
                                </svg>
                            </button>

                            <h3 class="tw-text-center tw-flex-grow mx-auto category_heading tw-bg-gradient-to-r tw-from-indigo-600 tw-to-blue-500 tw-inline-block tw-text-transparent tw-bg-clip-text tw-font-bold tw-text-base md:tw-text-2xl"
                                style="margin-bottom: 0px; margin-top:5px;"><?php echo app('translator')->get('category.category'); ?></h3>

                            <button type="button" class="tw-dw-btn tw-dw-btn-error close-side-bar-category">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </button>

                        </div>
                        <div class="row tw-mr-5">
                            <div class="col-md-3 col-xs-12 tw-mb-7 tw-w-auto  tw-h-auto tw-cursor-pointer  main-category-div main-category no-print"
                                data-value="all" data-parent="0">
                                <div class="tw-dw-card tw-w-25 tw-bg-base-100 tw-shadow-sm tw-h-auto tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer !tw-text-xs md:!tw-text-sm tw-font-semibold tw-text-center tw-border-2">
                                    <div class="tw-dw-card-body">
                                        <h4 class="tw-flex tw-items-center tw-justify-center" style="margin-bottom: 0px; margin-top:0px; font-size: inherit; font-weight: inherit;"><?php echo app('translator')->get('lang_v1.all_category'); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3 col-xs-12 tw-mb-7 tw-w-auto  tw-h-28  tw-cursor-pointer main-category-div  no-print"
                                        data-value="<?php echo e($category['id'], false); ?>" data-name="<?php echo e($category['name'], false); ?>" data-parent="1">
                                        <div
                                            class="tw-dw-card tw-w-25 tw-bg-base-100 tw-shadow-sm tw-h-auto tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-text-xs md:tw-text-sm tw-font-semibold !tw-text-center tw-border-2">
                                            <div class="tw-dw-card-body" style="margin-bottom: -20px">
                                                <h4 class="tw-flex tw-items-center tw-justify-center"
                                                    style="margin-bottom: 0px; margin-top:0px; font-size: inherit; font-weight: inherit;">
                                                    <?php echo e($category['name'], false); ?></h4>
                                            </div>
                                            <div class="tw-dw-card-actions tw-justify-center">
                                                <button type="button" class="tw-dw-btn tw-dw-btn-accent tw-dw-btn-outline tw-dw-btn-sm main-category tw-mb-2" data-value="<?php echo e($category['id'], false); ?>" data-parent="0"><?php echo e(__('lang_v1.all'), false); ?></button>
                                                <?php if(!empty($category['sub_categories'])): ?>
                                                <button type="button" class="tw-dw-btn tw-dw-btn-primary tw-dw-btn-outline tw-dw-btn-sm main-category tw-mb-2" data-parent="1" data-value="<?php echo e($category['id'], false); ?>" data-name="<?php echo e($category['name'], false); ?>"><?php echo app('translator')->get('pagination.next'); ?></button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($category['sub_categories'])): ?>
                                    <div class="<?php echo e($category['id'], false); ?> all-sub-category" style="display: none">
                                        <?php $__currentLoopData = $category['sub_categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($sc['parent_id'] != 0): ?>
                                                <div class="col-md-3 col-xs-12 tw-mb-5 tw-w-auto tw-h-auto tw-cursor-pointer product_category no-print"
                                                    data-value="<?php echo e($sc['id'], false); ?>">
                                                    <div
                                                        class="tw-dw-card tw-w-25 tw-bg-base-100 tw-shadow-sm tw-h-auto tw-shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] tw-bg-white hover:tw-bg-white/60 tw-cursor-pointer tw-text-xs md:tw-text-sm tw-font-semibold tw-text-center tw-border-2">
                                                        <div class="tw-dw-card-body">
                                                            <h4 class="tw-flex tw-items-center tw-justify-center"
                                                                style="margin-bottom: 0px; margin-top:0px; font-size: inherit; font-weight: inherit;">
                                                                <?php echo e($sc['name'], false); ?></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?> 

    <?php if(!empty($racks) && $rack_enabled): ?>
        <div class="col-md-2 !tw-px-2" id="product_rack_div">
            <div class="form-group">
                <select class="form-control" id="product_rack_filter" style="height: 48px; font-size: 16px; font-weight: 600;">
                    <option value="" selected>Estantes (Todos)</option>
                    <?php $__currentLoopData = $racks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($rack) && $rack !== null && trim($rack) !== ''): ?>
                            <option value="<?php echo e($rack, false); ?>"><?php echo e($rack, false); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    <?php endif; ?>

    

    <!-- used in repair : filter for service/product -->
    <div class="col-md-6 hide" id="product_service_div">
        <?php echo Form::select(
            'is_enabled_stock',
            ['' => __('messages.all'), 'product' => __('sale.product'), 'service' => __('lang_v1.service')],
            null,
            ['id' => 'is_enabled_stock', 'class' => 'select2', 'name' => null, 'style' => 'width:100% !important'],
        ); ?>

    </div>

    <div class="col-sm-4 <?php if(empty($featured_products)): ?> hide <?php endif; ?>" id="feature_product_div">
        <button type="button" class="btn btn-warning btn-flat"
            id="show_featured_products">MIS FAVORITOS</button>
    </div>
</div>
<style>#product_list_body{max-height: 750px;overflow-y: scroll;overflow-x: hidden;}</style>
<div class="row">   
    <input type="hidden" id="suggestion_page" value="1">
    <div class="col-md-12">
        <div class="eq-height-row" id="product_list_body"></div>
    </div>
    <div class="col-md-12 text-center" id="suggestion_page_loader" style="display: none;">
        <i class="fa fa-spinner fa-spin fa-2x"></i>
    </div>
</div>
<?php /**PATH C:\laragon\www\POS\alizazip\resources\views/sale_pos/partials/pos_sidebar.blade.php ENDPATH**/ ?>