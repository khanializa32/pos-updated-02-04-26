<div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <?php echo Form::open(['url' => action([\App\Http\Controllers\ProductController::class, 'updateRackDetails'], [$product->id]), 'method' => 'post', 'id' => 'edit_rack_details_form']); ?>

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">
                <i class="fas fa-edit"></i> Editar Estante - <?php echo e($product->name, false); ?>

            </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('business.business_location'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.rack'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.row'); ?></th>
                                <th><?php echo app('translator')->get('lang_v1.position'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $business_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($location, false); ?></td>
                                    <td>
                                        <?php echo Form::text('product_racks[' . $id . '][rack]', 
                                            !empty($rack_details[$id]['rack']) ? $rack_details[$id]['rack'] : null, 
                                            ['class' => 'form-control', 'placeholder' => __('lang_v1.rack')]); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::text('product_racks[' . $id . '][row]', 
                                            !empty($rack_details[$id]['row']) ? $rack_details[$id]['row'] : null, 
                                            ['class' => 'form-control', 'placeholder' => __('lang_v1.row')]); ?>

                                    </td>
                                    <td>
                                        <?php echo Form::text('product_racks[' . $id . '][position]', 
                                            !empty($rack_details[$id]['position']) ? $rack_details[$id]['position'] : null, 
                                            ['class' => 'form-control', 'placeholder' => __('lang_v1.position')]); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn bg-info">
                <i class="fas fa-save"></i> <?php echo app('translator')->get('messages.save'); ?>
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">
                <?php echo app('translator')->get('messages.close'); ?>
            </button>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/product/partials/edit_rack_details_modal.blade.php ENDPATH**/ ?>