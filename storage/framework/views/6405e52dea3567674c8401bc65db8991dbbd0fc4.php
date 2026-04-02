<div class="col-md-2 col-xs-4 product_list no-print create-product-button">
    <div class="add-product hover:tw-shadow-lg hover:tw-animate-pulse pos_add_quick_product" data-href="<?php echo e(action([\App\Http\Controllers\ProductController::class, 'quickAdd']), false); ?>" data-container=".quick_add_product_modal">
        <div class="image-container">
            <i class="fa fa-plus-circle" style='font-size:115px;color:LightSeaGreen'></i>
        </div>

        <div class="text_div">
            <br>
            <small class="text text-muted"style="font-size:16px ;color:LightSeaGreen">Crear Producto
            </small>
            <br>
          
          
        </div>
    </div>
</div>
<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col-md-2 col-xs-4 product_list no-print">
                    
            <!--<p>Total: <?php echo e(count($products), false); ?></p>-->
        <div class="product_box hover:tw-shadow-lg hover:tw-animate-pulse" style="position: relative;" data-variation_id="<?php echo e($product->id, false); ?>" data-enable-stock="<?php echo e($product->enable_stock, false); ?>" data-initial-qty="<?php echo e($product->qty_available, false); ?>"
            title="<?php if($product->type == 'variable'): ?> - <?php echo e($product->variation, false); ?> <?php endif; ?>  <?php if(!empty($show_prices)): ?>  <?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $product->purchase_price, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?> <?php $__currentLoopData = $product->group_prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group_price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(array_key_exists($group_price->price_group_id, $allowed_group_prices)): ?> <?php echo e($allowed_group_prices[$group_price->price_group_id], false); ?> - <?php 
            $formated_number = "";
            if (session("business.currency_symbol_placement") == "before") {
                $formated_number .= session("currency")["symbol"] . " ";
            } 
            $formated_number .= number_format((float) $group_price->price_inc_tax, session("business.currency_precision", 2) , session("currency")["decimal_separator"], session("currency")["thousand_separator"]);

            if (session("business.currency_symbol_placement") == "after") {
                $formated_number .= " " . session("currency")["symbol"];
            }
            echo $formated_number; ?> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>">

<div style="display: flex; align-items: center; gap: 10px; justify-content: flex-start;">
    
    <?php if(!empty($product->brand)): ?>
        <div style="font-size:11px; font-weight:normal;">
            <?php echo e($product->brand, false); ?>

        </div>
    <?php endif; ?>

    <?php if(!empty($product->weight)): ?>
        <div style="font-size:11px; font-weight:normal;">
            <?php echo e($product->weight, false); ?>

        </div>
    <?php endif; ?>
    
</div>

<?php
                $any_rack_enabled = session('business.enable_racks') && session('business.enable_row') && session('business.enable_position');
            ?>
            <?php if($any_rack_enabled && (!empty($product->rack) || !empty($product->row) || !empty($product->position))): ?>
                <div class="rack-info" style="position: absolute; top: 2px; right: 2px; z-index: 10;">
    
    <?php if(!empty($product->rack)): ?>
    <span class="label label-blue pos-rack-edit-btn" data-product-id="<?php echo e($product->product_id, false); ?>"
          style="margin: 2px; padding: 6px 10px; font-size: 14px; color: #000; cursor: pointer;">
        E: <?php echo e($product->rack, false); ?>

    </span>
    <?php endif; ?>

    <?php if(!empty($product->row)): ?>
    <span class="label label-blue pos-rack-edit-btn" data-product-id="<?php echo e($product->product_id, false); ?>"
          style="margin: 2px; padding: 6px 10px; font-size: 14px; color: #000; cursor: pointer;">
        F: <?php echo e($product->row, false); ?>

    </span>
    <?php endif; ?>

    <?php if(!empty($product->position)): ?>
    <span class="label label-blue pos-rack-edit-btn" data-product-id="<?php echo e($product->product_id, false); ?>"
          style="margin: 2px; padding: 6px 10px; font-size: 14px; color: #000; cursor: pointer;">
        P: <?php echo e($product->position, false); ?>

    </span>
    <?php endif; ?>

</div>
<?php endif; ?>


<br>
            
			<div style="display:flex">
				<small class="text text"style="font-size: 90%; float: right; font-weight: bold;"><?php echo e($product->name, false); ?> 
					<?php if($product->type == 'variable'): ?>
					- <?php echo e($product->variation, false); ?>

					<?php endif; ?>
				</small>
				
				<small class="selected-qty-badge" style="width:35px; height:25px; background-color: black; color: white; border-radius: 15%; display: none; align-items: center; justify-content: center; margin-left: 5px;">0</small>
			</div>
			
		

			
			<!--<script>-->
   <!--             console.log(<?php echo json_encode($product, 15, 512) ?>);-->
   <!--         </script>-->
			
			
            <div class="image-container"
                style="background-image: url(
					<?php if(count($product->media) > 0): ?> <?php echo e($product->media->first()->display_url, false); ?>

					<?php elseif(!empty($product->product_image)): ?>
						<?php echo e(asset('/uploads/img/' . rawurlencode($product->product_image)), false); ?>

					<?php else: ?>
						<?php echo e(asset('/img/default.png'), false); ?> <?php endif; ?>
				);
			background-repeat: no-repeat; background-position: center;
			background-size: contain;">
            </div>

            
            <small class="text-green qty-badge" style="font-size: 130%; float: right;font-weight: bold; ">
				<?php if($product->enable_stock): ?>
				<?php echo e(number_format($product->qty_available, session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?> 
				<?php else: ?>
					--
				<?php endif; ?>
			</small>
			
			<small class="text-muted" style="font-size: 110%; float: left;font-weight: bold; ">
				<?php echo e(number_format($product->selling_price,0), false); ?>

			</small><br>
			
		</div>
			
		</div>
	</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <input type="hidden" id="no_products_found">
    <div class="col-md-12">
        <h4 class="text-center">
            <?php echo app('translator')->get('lang_v1.no_products_to_display'); ?>
        </h4>
    </div>
<?php endif; ?>


<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/sale_pos/partials/product_list.blade.php ENDPATH**/ ?>