
<?php $__env->startSection('title', __('inventorymanagement::inventory.inventory')); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <h1><?php echo app('translator')->get('inventorymanagement::inventory.stock_inventory'); ?></h1>
    </section>

    <section class="content">
        <div class="box box-primary">
            <div class="box-header text-center" style="background-color:#004C6E;color:#EDAF11;font-size: 30px;">
                <?php echo app('translator')->get("inventorymanagement::inventory.products_reports_decrease"); ?>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <input type="hidden" id="product_row_index" value="0">
                    <input type="hidden" id="total_amount" name="final_total" value="0">
                    <div class="table-responsive">

                    </div>
                <a href="javascript:void(0)" id="export_pdf" class="tw-dw-btn tw-dw-btn-sm tw-dw-btn-error tw-text-white"><i class="fas fa-file-pdf"></i> Export PDF</a>
                                    
                <a href="javascript:void(0)" id="export_excel" class="tw-dw-btn tw-dw-btn-sm tw-dw-btn-success tw-text-white"><i class="fas fa-file-excel"></i> Export Excel</a>
                
                <div style="margin-top: 10px;">
                    <strong><?php echo app('translator')->get("inventorymanagement::inventory.total_decrease"); ?>:</strong>
                    <span class="display_currency" data-currency_symbol="true" style="font-size:36px;color:red;">
                        <?php echo e($disabilityProductReport->sum(function($item){ return $item->pivot->total ?? 0; }), false); ?>

                    </span>
                </div>
                    
                </div>
                <div class="clearfix"></div>

            </div>
        </div>
    
        <table id="example1" class="display nowrap" style="width:100%">
            <thead>
            <tr>
                <th  style="text-align: left"><?php echo app('translator')->get("inventorymanagement::inventory.product_name"); ?></th>
                <!--<th  style="text-align: left"><?php echo app('translator')->get("inventorymanagement::inventory.product_barcode"); ?></th>-->
                <th  style="text-align: left"><?php echo app('translator')->get("inventorymanagement::inventory.current_amount"); ?></th>
                <th  style="text-align: left"><?php echo app('translator')->get("inventorymanagement::inventory.amount_after_inventory"); ?></th>
                <th  style="text-align: left"><?php echo app('translator')->get("inventorymanagement::inventory.amount_difference"); ?></th>
                <th  style="text-align: left"><?php echo app('translator')->get("inventorymanagement::inventory.purchase_price"); ?></th>
                <th  style="text-align: left"><?php echo app('translator')->get("inventorymanagement::inventory.total"); ?></th>
                <th  style="text-align: left"><?php echo app('translator')->get("inventorymanagement::inventory.options"); ?></th>

            </tr>
            </thead>
            <tbody>
            <?php echo $__env->make("inventorymanagement::partials.disabilityReports" , ['disabilityProductReport' => $disabilityProductReport, 'variations' => $variations], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </tbody>

        </table>



    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.2/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

    var table = $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                className: 'buttons-excel',
                title: 'Reporte_inventario',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'pdfHtml5',
                className: 'buttons-pdf',
                title: 'Reporte_inventario',
                orientation: 'landscape',
                pageSize: 'A4',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            }
        ]
    });

    table.buttons().container().hide();

    function getExportHeaderAndRows() {
        var header = [];
        var rows = [];

        $('#example1 thead th').each(function (index) {
            var totalHeaderCols = $('#example1 thead th').length;
            if (index < totalHeaderCols - 1) {
                header.push($(this).text().trim());
            }
        });

        $('#example1 tbody tr').each(function () {
            var row = [];
            $(this).find('td').each(function (index) {
                var totalBodyCols = $(this).closest('tr').find('td').length;
                if (index < totalBodyCols - 1) {
                    row.push($(this).text().trim());
                }
            });

            if (row.length) {
                rows.push(row);
            }
        });

        return { header: header, rows: rows };
    }

    function fallbackExcelExport() {
        if (typeof XLSX === 'undefined') {
            toastr.error('Excel export library not loaded.');
            return;
        }

        var exportData = getExportHeaderAndRows();
        var aoa = [exportData.header].concat(exportData.rows);
        var worksheet = XLSX.utils.aoa_to_sheet(aoa);
        var workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Decrease Report');
        XLSX.writeFile(workbook, 'Reporte_inventario.xlsx');
    }

    function fallbackPdfExport() {
        if (typeof window.jspdf === 'undefined' || typeof window.jspdf.jsPDF === 'undefined') {
            toastr.error('PDF export library not loaded.');
            return;
        }

        var exportData = getExportHeaderAndRows();
        var jsPDF = window.jspdf.jsPDF;
        var doc = new jsPDF({ orientation: 'landscape', unit: 'pt', format: 'a4' });

        doc.setFontSize(12);
        doc.text('Reporte inventario', 40, 30);
        doc.autoTable({
            startY: 45,
            head: [exportData.header],
            body: exportData.rows,
            styles: { fontSize: 9 },
            theme: 'grid'
        });

        doc.save('Reporte_inventario.pdf');
    }

    $('#export_excel').click(function (e) {
        e.preventDefault();
        try {
            var excelBtn = table.button('.buttons-excel');
            if (excelBtn && excelBtn.any && excelBtn.any()) {
                excelBtn.trigger();
            } else {
                fallbackExcelExport();
            }
        } catch (error) {
            fallbackExcelExport();
        }
    });

    $('#export_pdf').click(function (e) {
        e.preventDefault();
        try {
            var pdfBtn = table.button('.buttons-pdf');
            if (pdfBtn && pdfBtn.any && pdfBtn.any()) {
                pdfBtn.trigger();
            } else {
                fallbackPdfExport();
            }
        } catch (error) {
            fallbackPdfExport();
        }
    });

});
    </script>
    <script src="<?php echo e(asset('js/purchase.js?v=' . $asset_v), false); ?>"></script>

    <?php echo $__env->make('inventorymanagement::partials.mainscript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('js/vendor.js?v=' . $asset_v), false); ?>"></script>
    <script type="text/javascript">
        __page_leave_confirmation('#purchase_return_form');
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/InventoryManagement/Providers/../Resources/views/disabilityReports.blade.php ENDPATH**/ ?>