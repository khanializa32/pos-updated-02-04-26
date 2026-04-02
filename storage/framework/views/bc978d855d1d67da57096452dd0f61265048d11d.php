
<?php $__env->startSection('title', __('inventorymanagement::inventory.inventory')); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo app('translator')->get('inventorymanagement::inventory.stock_inventory'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header text-center" style="background-color:#004C6E;color:#EDAF11;font-size: 30px;">
                <?php echo app('translator')->get("inventorymanagement::inventory.show_stock_inventory"); ?>
            </div>
        </div>

        <table cellspacing="5" cellpadding="5" border="0">
                  <tbody>

               </tbody></table>
           <table id="example" class="display nowrap" style="width:100%;">
                  <thead>
                <tr>
                       <th  style="text-align: left"><?php echo app('translator')->get("inventorymanagement::inventory.operation_number"); ?></th>
                       <th  style="text-align: left"><?php echo app('translator')->get("inventorymanagement::inventory.inventory_start_date"); ?></th>
                       <th  style="text-align: left"><?php echo app('translator')->get("inventorymanagement::inventory.inventory_end_date"); ?></th>
                       <th  style="text-align: left"><?php echo app('translator')->get("inventorymanagement::inventory.status"); ?></th>
                       <th  style="text-align: left"><?php echo app('translator')->get("inventorymanagement::inventory.branch"); ?></th>
                       <th  style="text-align: left"><?php echo app('translator')->get("inventorymanagement::inventory.options"); ?></th>

                    </tr>
                  </thead>
                  <tbody>

                  <?php $__currentLoopData = $inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td><?php echo e($inventory->id, false); ?></td>
                        <td><?php echo e($inventory->created_at, false); ?></td>
                        <td><?php echo e($inventory->end_date, false); ?></td>
                        <td>
                            <?php if($inventory->status == 1): ?>
                                <span class="badge bg-green p-5-5"><span class="mx-2"><i class="fa fa-lock-open"></i></span>  <?php echo app('translator')->get("inventorymanagement::inventory.opened"); ?></span>
                            <?php else: ?>
                                <span class="badge bg-red p-5-5"><i class="fa fa-lock"></i>  <?php echo app('translator')->get("inventorymanagement::inventory.closed"); ?></span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($inventory->branch->name, false); ?> ( <?php echo e($inventory->branch->location_id, false); ?> )</td>
                        <td>
                            <?php if($inventory->status == 1): ?>
                                <a href="<?php echo e(url('inventorymanagement/makeInventory')."/".$inventory->id, false); ?>"><button class="btn btn-primary" ><?php echo app('translator')->get("inventorymanagement::inventory.inve"); ?></button></a>
                            <?php endif; ?>
                            <a href="<?php echo e(url("inventorymanagement/showInventoryReports")."/".$inventory->id."/".$inventory->branch_id, false); ?>" >
                                <button class="btn bg-info tw-text-white"><?php echo app('translator')->get('inventorymanagement::inventory.reports'); ?></button>
                            </a>
                            <a href="<?php echo e(url("inventorymanagement/inventoryIncreaseReports")."/".$inventory->id."/".$inventory->branch_id, false); ?>" >
                            <button class="btn btn-primary"><?php echo app('translator')->get("inventorymanagement::inventory.products_reports_increase"); ?></button>
                            </a>
                            <a href="<?php echo e(url("inventorymanagement/inventoryDisabilityReports")."/".$inventory->id."/".$inventory->branch_id, false); ?>" >
                            <button class="btn btn-danger tw-text-white"><?php echo app('translator')->get("inventorymanagement::inventory.products_reports_decrease"); ?></button>
                            </a>
                            <?php if($inventory->status == 1): ?>
                                <button class="btn btn-warning inventory_change_status_btn" data-status="0" data-inventory-id="<?php echo e($inventory->id, false); ?>"><?php echo app('translator')->get("inventorymanagement::inventory.inv_btn_close"); ?></button>
                            <?php else: ?>
                                    <button class="btn btn-success inventory_change_status_btn" data-status="1" data-inventory-id="<?php echo e($inventory->id, false); ?>"><?php echo app('translator')->get("inventorymanagement::inventory.inv_btn_open"); ?></button>
                            <?php endif; ?>
                         </td>
                     </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                  <tfoot>

                  </tfoot>
               </table>
    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({
                columnDefs: [
                    {
                        targets: [0],
                        orderData: [0, 1],
                    },
                    {
                        targets: [1],
                        orderData: [1, 0],
                    },
                    {
                        targets: [4],
                        orderData: [4, 0],
                    },
                ],
                order: [[0, 'desc']]
            });
            
            $('.inventory_change_status_btn').click(function (e){
    e.preventDefault();
    let status = $(this).data('status');
    let invenetory_id = $(this).data('inventory-id');
    console.log(status,invenetory_id);
    $.ajax({
        url:`<?php echo e(url('/inventorymanagement/update/status'), false); ?>/${invenetory_id}`,
        data:{'new_status':status},
        method:'PUT',
        success:function(res){
            if(res.status){
                location.reload()
            }
        },
        error:function (errs){
            console.error(errs);
        }
    });
})
        });
        
        
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/InventoryManagement/Providers/../Resources/views/showInventoryList.blade.php ENDPATH**/ ?>