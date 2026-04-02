<?php $__currentLoopData = $featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-1 col-xs-2 product_list no-print">
        <div class="product_box hover:tw-shadow-lg hover:tw-animate-pulse" 
             data-toggle="tooltip" 
             data-placement="bottom" 
             data-variation_id="<?php echo e($variation->id, false); ?>" 
             title="<?php echo e($variation->full_name, false); ?>">
            
            
             <div class="text_div">
                <small class="text text-muted">
                    <?php echo e($variation->product->name, false); ?> 
                    <?php if($variation->product->type == 'variable'): ?>
                        - <?php echo e($variation->name, false); ?>

                    <?php endif; ?>
                </small>

            <div class="image-container" 
                 style="background-image: url(
                     <?php if(count($variation->media) > 0): ?>
                         <?php echo e($variation->media->first()->display_url, false); ?>

                     <?php elseif(!empty($variation->product->image_url)): ?>
                         <?php echo e($variation->product->image_url, false); ?>

                     <?php else: ?>
                         <?php echo e(asset('/img/default.png'), false); ?>

                     <?php endif; ?>
                 ); 
                 background-repeat: no-repeat; 
                 background-position: center; 
                 background-size: contain;">
            </div>

           

               

                <!-- Stock y Precio -->
                <div class="mt-1">
                   <div class="mt-1 text-start">
                        <span class="badge bg-info d-block"><?php echo e(number_format($variation->variation_location_details->sum('qty_available'), 0), false); ?></span>
                        <span class="badge bg-success"> <?php echo e(number_format($variation->sell_price_inc_tax, 0), false); ?></span>
                    </div>


                    
                </div>
            </div>

        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\POS\alizazip\resources\views/sale_pos/partials/featured_products.blade.php ENDPATH**/ ?>