

<?php $__env->startSection('title', 'Verificador de Precios'); ?>

<?php $__env->startSection('content'); ?>
    <button id="fullscreenBtn"
        style="
            position: fixed;
            top: 15px;
            right: 20px;
            z-index: 9999;
            background: #2BB3B0;
            color: #fff;
            border: none;
            padding: 10px 14px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            opacity: 0.85;
        ">
        ⛶ Pantalla Completa
    </button>



    <div class="container" style="margin-top: 30px;">
        <div class="row">
    <div class="col-12 text-center" style="margin-bottom:12px;">
                
    <div style="margin-bottom:8px;"> <img src="<?php echo e(asset('img/logo_abastos.png'), false); ?>" alt="Logo Empresa"style="max-height:190px; width:auto;"></div>
                
                <h1 style="margin:10px 0 0; font-weight:700; font-size:70px;">Verificador de Precios</h1>


                <!-- <p class="text-muted" style="margin:6px 0 12px;">Escanee un código de barras para ver los detalles del producto.</p> -->
                <div style="display:flex; justify-content:center;">
                    <input id="product_search_input" class="form-control"
                        style="width:480px; height:48px; font-size:18px; text-align:center;"
                        placeholder="Scanee Aquí">
                    <input type="hidden" id="pl_location_id" value="<?php echo e($location_id ?? '', false); ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div id="product_details" style="display:none; width:100%;"></div>
                <div id="search_results" style="display:none;"></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        $(function() {
            var $input = $('#product_search_input');
            var $results = $('#search_results');
            var $details = $('#product_details');
            var hideTimer = null;
            var base_path = '<?php echo e(url('/'), false); ?>';
            var defaultImg = '<?php echo e(asset('img/default.png'), false); ?>';

            // Make the input minimal so it doesn't distract; details hidden until a scan
            $input.attr('style',
                'width:480px; height:44px; font-size:18px; text-align:center; display:block; margin:0 auto;');
            $results.hide();
            $details.hide();

            function doSearch(term) {
                var location_id = $('#pl_location_id').val();
                var params = {
                    term: term,
                    location_id: location_id,
                    price_group: 0,
                    not_for_selling: 0,
                    'search_fields[]': ['name', 'sku']
                };

                $.ajax({
                    url: '/products/list',
                    data: params,
                    dataType: 'json',
                    success: function(res) {
                        if (res && res.length > 0) {
                            // Use the first match (barcode scanners usually return exact match)
                            showProduct(res[0]);
                            
                        } else {
                            showNotFound();
                        }
                        $input.val('').focus();
                    },
                    error: function(xhr) {
                        console.error('Error fetching product list', xhr);
                        showNotFound();
                    }
                });
            }

            function showNotFound() {
                clearTimeout(hideTimer);
                $details.html('<div style="text-align:center;padding:2rem;"><h3>Producto No Encontrado</h3></div>');
                $details.fadeIn(150);
                hideTimer = setTimeout(clearDetails, 3000);
            }

            function showProduct(p) {
                clearTimeout(hideTimer);

                var imgUrl = defaultImg;
                if (p.product_image) {
                    imgUrl = base_path + '/uploads/img/' + encodeURIComponent(p.product_image);
                }

               var price = (p.selling_price !== undefined && p.selling_price !== null)
    ? Number(p.selling_price).toLocaleString('en-US', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 2
      })
    : '--';
                
               var stock = (p.qty_available !== undefined && p.qty_available !== null)? parseInt(p.qty_available, 10) : '--';

                var html = '';
                html += '<div style="width:100%; display:flex; justify-content:center; padding:30px 16px;">';
                html +=
                    '  <div style="width:95%; max-width:1200px; background:#fff; box-shadow:0 14px 40px rgba(0,0,0,0.15); border-radius:12px; display:flex; overflow:hidden;">';

                /* LEFT: PRODUCT IMAGE */
                html +=
                    '    <div style="width:60%; background:#f8f8f8; display:flex; align-items:center; justify-content:center; padding:20px;">';
                html += '      <img src="' + imgUrl +
                    '" alt="product" style="width:100%; max-height:700px; object-fit:contain;">';
                html += '    </div>';

                /* RIGHT: PRODUCT DETAILS */
                html +=
                    '    <div style="width:40%; padding:40px 30px; display:flex; flex-direction:column; justify-content:center;">';
                html += '      <h1 style="font-size:3.2rem; font-weight:800; margin:0 0 20px; color:#111;">' + (p
                    .name || '') + '</h1>';

                html += '      <div style="font-size:2.2rem; color:#999; margin-bottom:8px;">Precio</div>';
                html += '      <div style="font-size:3rem; font-weight:700; color:#d9534f; margin-bottom:25px;">' +
                    price + '</div>';

                html += '      <div style="font-size:1.6rem; color:#333;">Stock</div>';
                html += '      <div style="font-size:2rem; font-weight:600;">' + stock + '</div>';
                html += '    </div>';

                html += '  </div>';
                html += '</div>';

                $details.html(html);
                $details.fadeIn(200);

                // Auto hide after 10 seconds
                hideTimer = setTimeout(function() {
                    clearDetails();
                }, 10000);
            }


            function clearDetails() {
                $details.html('<p class="text-muted text-center">Listo para escanear. Enfoque el escáner</p>');
                $results.empty();
                $input.val('').focus();
            }

            // Trigger search on Enter (scanner typically sends Enter)
            $input.on('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    var term = $(this).val().trim();
                    if (!term) return;
                    doSearch(term);
                }
            });

            // Ensure input is focused on load
            setTimeout(function() {
                $input.focus();
            }, 200);
        });
        
        const fullscreenBtn = document.getElementById('fullscreenBtn');

        fullscreenBtn.addEventListener('click', function () {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
                fullscreenBtn.innerHTML = '🡼 Salir Pantalla Completa';
            } else {
                document.exitFullscreen();
                fullscreenBtn.innerHTML = '⛶ Pantalla Completa';
            }
        });

        
    </script>
    
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/product_lookup.blade.php ENDPATH**/ ?>