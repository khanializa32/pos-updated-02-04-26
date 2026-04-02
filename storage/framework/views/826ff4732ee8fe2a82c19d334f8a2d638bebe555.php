
<?php $__env->startSection('title', __( 'productcatalogue::lang.catalogue_qr' )); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="tw-text-xl md:tw-text-3xl tw-font-bold tw-text-black"><?php echo app('translator')->get( 'productcatalogue::lang.catalogue_qr' ); ?></h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-7">
    	<?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
            <div class="form-group">
                <?php echo Form::label('location_id', __('purchase.business_location').':'); ?>

                <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control', 'placeholder' => __('messages.please_select')]); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('color', __('productcatalogue::lang.qr_code_color').':'); ?>

                <?php echo Form::text('color', '#000000', ['class' => 'form-control']); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('title', __('productcatalogue::lang.title').':'); ?>

                <?php echo Form::text('title', $business->name, ['class' => 'form-control']); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('subtitle', __('productcatalogue::lang.subtitle').':'); ?>

                <?php echo Form::text('subtitle', __('productcatalogue::lang.product_catalogue'), ['class' => 'form-control']); ?>

            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <?php echo Form::checkbox('add_logo', 1, true, ['id' => 'show_logo', 'class' => 'input-icheck']); ?> <?php echo app('translator')->get('productcatalogue::lang.show_business_logo_on_qrcode'); ?>
                    </label>
                </div>
            </div>
            <button type="button" class="tw-dw-btn bg-info tw-text-white" id="generate_qr"><?php echo app('translator')->get('productcatalogue::lang.generate_qr'); ?></button>
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
            <div class="row">
                <div class="col-md-12">
                    <h4><?php echo app('translator')->get('productcatalogue::lang.setting'); ?>:</h4>
                    <?php echo Form::open(['url' => action([\Modules\ProductCatalogue\Http\Controllers\ProductCatalogueController::class, 'productCatalogueSetting']), 'method' => 'post']); ?>

                        <?php echo Form::label('is_show', __('productcatalogue::lang.outofstock_products').':'); ?>

                        <div class="form-inline">
                        <div class="form-group">
                        <?php
                            $settings = json_decode($business->productcatalogue_settings);
                            $is_show = $settings->is_show ?? '';
                        ?>
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::radio('is_show', 1, $is_show == 1 ? true : false, ['id' => 'show_logo', 'class' => 'input-icheck', 'required']); ?> <?php echo app('translator')->get('productcatalogue::lang.show'); ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <?php echo Form::radio('is_show', 0, $is_show == 0 ? true : false, ['id' => 'show_logo', 'class' => 'input-icheck', 'required']); ?> <?php echo app('translator')->get('productcatalogue::lang.hide'); ?>
                                </label>
                            </div>
                        </div>
                    </div> <br>
                    <button type="submit" class="tw-dw-btn bg-info tw-text-white tw-dw-btn-sm tw-text-white" id=""><?php echo app('translator')->get('productcatalogue::lang.save'); ?></button>
                <?php echo Form::close(); ?>

                </div>
            </div>
        <?php echo $__env->renderComponent(); ?>
        

        <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>
            <div class="row">
                <div class="col-md-12">
                    <strong><?php echo app('translator')->get('lang_v1.instruction'); ?>:</strong>
                    <table class="table table-striped">
                        <tr>
                            <td>1</td>
                            <td><?php echo app('translator')->get( 'productcatalogue::lang.catalogue_instruction_1' ); ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><?php echo app('translator')->get( 'productcatalogue::lang.catalogue_instruction_2' ); ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><?php echo app('translator')->get( 'productcatalogue::lang.catalogue_instruction_3' ); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-md-5">
            <?php $__env->startComponent('components.widget', ['class' => 'box-solid']); ?>

                <div class="text-center">
                    <div id="qrcode"></div>
                    <button type="button" class="btn btn-warning btn-lg w-100 text-white" id="catalogue_btn">
                        <span id="catalogue_link"></span>
                    </button>

                    <br>
                    <br>
                    <a href="#" class="tw-dw-btn bg-info tw-text-white hide" id="download_image"><?php echo app('translator')->get( 'productcatalogue::lang.download_image' ); ?></a>
                </div>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('modules/productcatalogue/plugins/easy.qrcode.min.js'), false); ?>"></script>
<script type="text/javascript">
    (function($) {
        "use strict";

    $(document).ready( function(){
        $('#color').colorpicker();
    });
    
    $(document).on('click', '#generate_qr', function(e){
        $('#qrcode').html('');
        if ($('#location_id').val()) {
            var link = "<?php echo e(url('catalogue/' . session('business.id')), false); ?>/" + $('#location_id').val();
            var color = '#000000';
            if ($('#color').val().trim() != '') {
                color = $('#color').val();
            }
            var opts = {
                text: link,
                margin: 4,
                width: 256,
                height: 256,
                quietZone: 20,
                colorDark: color,
                colorLight: "#ffffffff", 
            }

            if ($('#title').val().trim() !== '') {
                opts.title = $('#title').val();
                opts.titleFont = "bold 18px Arial";
                opts.titleColor = "#004284";
                opts.titleBackgroundColor = "#ffffff";
                opts.titleHeight = 60;
                opts.titleTop = 20;
            }

            if ($('#subtitle').val().trim() !== '') {
                opts.subTitle = $('#title').val();
                opts.subTitleFont = "14px Arial";
                opts.subTitleColor = "#4F4F4F";
                opts.subTitleTop = 40;
            }

            if ($('#show_logo').is(':checked')) {
                opts.logo = "<?php echo e(asset( 'uploads/business_logos/' . $business->logo), false); ?>";
            }

            new QRCode(document.getElementById("qrcode"), opts);
            $('#catalogue_link').html('<a target="_blank" href="'+ link +'">Link</a>');
            $('#download_image').removeClass('hide');
            $('#qrcode').find('canvas').attr('id', 'qr_canvas')

            
        } else {
            alert("<?php echo e(__('productcatalogue::lang.select_business_location'), false); ?>")
        }
    });
    })(jQuery);

    $('#download_image').click(function(e) {
        e.preventDefault();
        var link = document.createElement('a');
        link.download = 'qrcode.png';
        link.href = document.getElementById('qr_canvas').toDataURL()
        link.click();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/ProductCatalogue/Providers/../Resources/views/catalogue/generate_qr.blade.php ENDPATH**/ ?>