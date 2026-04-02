
<?php $__env->startSection('title', __('inventorymanagement::inventory.inventory')); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo app('translator')->get('inventorymanagement::inventory.inventory'); ?></h1>
        <h3><?php echo app('translator')->get('inventorymanagement::inventory.create_new_inventory'); ?></h3>
    </section>

    <!-- Main content -->
    <section class="content">
        <form method="post" action="<?php echo e(url("inventorymanagement/createNewInventory"), false); ?>">
            <?php echo csrf_field(); ?>
        <div class="row">
            <label style="margin:17px"><?php echo app('translator')->get("inventorymanagement::inventory.inventory_start_date"); ?></label></br>
            <div class="col-md-3">
                <div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
                    <input style="height: 45px" class="form-control"  required="" name="inventory_start_date" type="date" >
                </div>
            </div>
        </div>
        <div class="row">
            <label style="margin:17px"><?php echo app('translator')->get("inventorymanagement::inventory.inventory_end_date"); ?></label></br>
            <div class="col-md-3">
                <div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
                    <input style="height: 45px" class="form-control"  required="" name="inventory_end_date" type="date" >
                </div>
            </div>
        </div>
        <div class="row">
            <label style="margin:17px"><?php echo app('translator')->get("inventorymanagement::inventory.inventory_branch"); ?></label></br>
            <div class="col-md-3">
                <div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-code-branch"></i>
						</span>
                    <select class="form-control" name="branch">
                        <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option id="1" value="<?php echo e($branch->id, false); ?>"><?php echo e($branch->name, false); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <label style="margin:17px"><?php echo app('translator')->get("inventorymanagement::inventory.pricing_method_label"); ?></label></br>
            <div class="col-md-6">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="use_selling_price" id="use_selling_price" value="1">
                        <?php echo app('translator')->get("inventorymanagement::inventory.use_selling_price_help"); ?>
                    </label>
                    <p class="help-block">
                        <?php echo app('translator')->get("inventorymanagement::inventory.pricing_method_help_text"); ?>
                    </p>
                </div>
            </div>
        </div>
    </br>
    </br>
        <button type="submit" class="btn bg-info tw-text-white"><?php echo app('translator')->get('inventorymanagement::inventory.save'); ?></button>
        </form>
    </section>
    <!-- /.content -->
<?php echo $__env->make('inventorymanagement::partials.mainscript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/InventoryManagement/Providers/../Resources/views/index.blade.php ENDPATH**/ ?>