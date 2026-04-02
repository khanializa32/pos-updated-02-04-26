@inject('request', 'Illuminate\Http\Request')

@if (
    $request->segment(1) == 'pos' &&
        ($request->segment(2) == 'create' || $request->segment(3) == 'edit' || $request->segment(2) == 'payment'))
    @php
        $pos_layout = true;
    @endphp
@else
    @php
        $pos_layout = false;
    @endphp
@endif

@php
    $whitelist = ['127.0.0.1', '::1'];
@endphp

<!DOCTYPE html>
<html class="tw-bg-white tw-scroll-smooth" lang="{{ app()->getLocale() }}"
    dir="{{ in_array(session()->get('user.language', config('app.locale')), config('constants.langs_rtl')) ? 'rtl' : 'ltr' }}">
<head>
    <!-- Tell the browser to be responsive to screen width -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
        name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ Session::get('business.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @include('layouts.partials.css')


    @include('layouts.partials.extracss')

    @yield('css')

</head>
<body
    class="tw-font-sans tw-antialiased tw-text-gray-900 tw-bg-gray-100 @if ($pos_layout) hold-transition lockscreen @else hold-transition skin-@if (!empty(session('business.theme_color'))){{ session('business.theme_color') }}@else{{ 'blue-light' }} @endif sidebar-mini @endif" >
    <div class="tw-flex thetop">
        <script type="text/javascript">
            if (localStorage.getItem("upos_sidebar_collapse") == 'true') {
                var body = document.getElementsByTagName("body")[0];
                body.className += " sidebar-collapse";
            }
        </script>
        @if (!$pos_layout && $request->segment(1) != 'customer-display')
            @include('layouts.partials.sidebar')
        @endif

        @if (in_array($_SERVER['REMOTE_ADDR'], $whitelist))
            <input type="hidden" id="__is_localhost" value="true">
        @endif

        <!-- Add currency related field-->
        <input type="hidden" id="__code" value="{{ session('currency')['code'] }}">
        <input type="hidden" id="__symbol" value="{{ session('currency')['symbol'] }}">
        <input type="hidden" id="__thousand" value="{{ session('currency')['thousand_separator'] }}">
        <input type="hidden" id="__decimal" value="{{ session('currency')['decimal_separator'] }}">
        <input type="hidden" id="__symbol_placement" value="{{ session('business.currency_symbol_placement') }}">
        <input type="hidden" id="__precision" value="{{ session('business.currency_precision', 2) }}">
        <input type="hidden" id="__quantity_precision" value="{{ session('business.quantity_precision', 2) }}">
        <!-- End of currency related field-->
        @can('view_export_buttons')
            <input type="hidden" id="view_export_buttons">
        @endcan
        @if (isMobile())
            <input type="hidden" id="__is_mobile">
        @endif
        @if (session('status'))
            <input type="hidden" id="status_span" data-status="{{ session('status.success') }}"
                data-msg="{{ session('status.msg') }}">
        @endif
        <main class="tw-flex tw-flex-col tw-flex-1 tw-h-full tw-min-w-0 tw-bg-gray-100">

             @if($request->segment(1) != 'customer-display' && !$pos_layout)
                @include('layouts.partials.header')
            @elseif($request->segment(1) != 'customer-display')
                @include('layouts.partials.header-pos')
            @endif
            <!-- empty div for vuejs -->
            <div id="app">
                @yield('vue')
            </div>
            <div class="tw-flex-1 tw-overflow-y-auto tw-h-screen" id="scrollable-container">
                @yield('content')
                @if (!$pos_layout)
                
                    @include('layouts.partials.footer')
                @else
                    @include('layouts.partials.footer_pos')
                @endif
            </div>
            <div class='scrolltop no-print'>
                <div class='scroll icon'><i class="fas fa-arrow-up"></i></div>
            </div>

            @if (config('constants.iraqi_selling_price_adjustment'))
                <input type="hidden" id="iraqi_selling_price_adjustment">
            @endif

            <!-- This will be printed -->
            <section class="invoice print_section" id="receipt_section">
            </section>
        </main>

        @include('home.todays_profit_modal')
        <!-- /.content-wrapper -->



        <audio id="success-audio">
            <source src="{{ asset('/audio/success.ogg?v=' . $asset_v) }}" type="audio/ogg">
            <source src="{{ asset('/audio/success.mp3?v=' . $asset_v) }}" type="audio/mpeg">
        </audio>
        <audio id="error-audio">
            <source src="{{ asset('/audio/error.ogg?v=' . $asset_v) }}" type="audio/ogg">
            <source src="{{ asset('/audio/error.mp3?v=' . $asset_v) }}" type="audio/mpeg">
        </audio>
        <audio id="warning-audio">
            <source src="{{ asset('/audio/warning.ogg?v=' . $asset_v) }}" type="audio/ogg">
            <source src="{{ asset('/audio/warning.mp3?v=' . $asset_v) }}" type="audio/mpeg">
        </audio>

        @if (!empty($__additional_html))
            {!! $__additional_html !!}
        @endif

        @include('layouts.partials.javascripts')

        <div class="modal fade view_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"></div>

        @if (!empty($__additional_views) && is_array($__additional_views))
            @foreach ($__additional_views as $additional_view)
                @includeIf($additional_view)
            @endforeach
        @endif
        @if (!$pos_layout)
            <!-- Modal, sound, and Pusher logic only for non-POS pages -->
            <div class="modal fade" id="commissionSaleModalUnique" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content text-center">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title">Ha llegado Un Nuevo Pedido del Vendedor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                onclick="stopAlertSoundUnique()"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <p id="saleInfoUnique">Ha llegado Un Nuevo Pedido del Vendedor</p>
                        </div>
                        <div class="modal-footer">
                            <button id="ackBtnUnique" class="btn btn-success" data-dismiss="modal"
                                onclick="stopAlertSoundUnique()">Atender</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sound file -->
            <audio id="alertSoundUnique" preload="auto">
                <source src="{{ asset('audio/success.ogg') }}" type="audio/ogg">
            </audio>
            <!-- Pusher -->
            <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
          <script>
                // --- All code below uses the Unique key ---
                (function setupAudioUnlockUnique() {
                    const sound = document.getElementById('alertSoundUnique');
                    if (!sound) return;
                    function unlock() {
                        sound.muted = true;
                        sound.play().then(() => {
                            sound.pause();
                            sound.currentTime = 0;
                            sound.muted = false;
                            console.log('Audio unlocked via user interaction');
                        }).catch(() => {
                            console.warn('Audio unlock attempt failed');
                            sound.muted = false;
                        });
                        window.removeEventListener('click', unlock);
                        window.removeEventListener('keydown', unlock);
                        window.removeEventListener('touchstart', unlock);
                    }
                    window.addEventListener('click', unlock, { once: true, passive: true });
                    window.addEventListener('keydown', unlock, { once: true, passive: true });
                    window.addEventListener('touchstart', unlock, { once: true, passive: true });
                })();
                Pusher.logToConsole = true;
                var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
                    cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
                    forceTLS: true
                });
                var channel = pusher.subscribe('admin-sales');
                channel.bind('pusher:subscription_succeeded', function () {
                    console.log('Successfully subscribed to admin-sales channel');
                });
                function showModalUnique(data) {
                    const modalEl = document.getElementById('commissionSaleModalUnique');
                    if (!modalEl) {
                        console.error('Modal element not found!');
                        fallbackNotifyUnique(data);
                        return;
                    }
                    console.log('Modal element found:', modalEl);
                    if (typeof bootstrap !== 'undefined') {
                        try {
                            const modal = new bootstrap.Modal(modalEl);
                            modal.show();
                            console.log('Bootstrap 5 modal shown successfully');
                            return;
                        } catch (err) {
                            console.error('Bootstrap 5 modal show failed:', err);
                        }
                    }
                    if (typeof $ !== 'undefined' && $.fn.modal) {
                        try {
                            $(modalEl).modal('show');
                            console.log('jQuery/Bootstrap 4 modal shown successfully');
                            return;
                        } catch (err) {
                            console.error('jQuery modal show failed:', err);
                        }
                    }
                    try {
                        modalEl.style.display = 'block';
                        modalEl.classList.add('show');
                        modalEl.setAttribute('aria-hidden', 'false');
                        const backdrop = document.createElement('div');
                        backdrop.className = 'modal-backdrop fade';
                        backdrop.id = 'modalBackdropUnique';
                        document.body.appendChild(backdrop);
                        console.log('Manual modal show successful');
                        return;
                    } catch (err) {
                        console.error('Manual modal show failed:', err);
                    }
                    fallbackNotifyUnique(data);
                }
                channel.bind('commission.sale', function (data) {
                    console.log('Commission sale event received:', data);
                    
                    const currentUserBusinessId = {{ auth()->user()->business_id ?? 'null' }};
                    const isAdmin = {{ auth()->user()->hasRole('Admin#1') ? 'true' : 'false' }};    
                    
                    // Admin ko dikhao — same business ka
                    if (data.businessId === currentUserBusinessId && isAdmin) {
                        console.log('Admin detected, showing popup');
                        const saleInfoEl = document.getElementById('saleInfoUnique');
                        
                        if (saleInfoEl) { 
                            saleInfoEl.innerText = `Venta #${data.invoice_no} Hecha Por ${data.agentName}`;
                        }
                        
                        showModalUnique(data);
                        playAlertSoundUnique(data);
                    } else {
                        console.log('Not admin or different business, skipping popup');
                    }
                });
                function playAlertSoundUnique(data) {
                    // Check if the current user belongs to the same business
                    const currentUserBusinessId = {{ auth()->user()->business_id ?? 'null' }};
                    const currentUserId = {{ auth()->user()->id ?? 'null' }};
                    
                    // Only play sound if same company user is logged in
                    if (data && data.businessId === currentUserBusinessId && data.currentUserId === currentUserId) {
                        const sound = document.getElementById('alertSoundUnique');
                        if (!sound) {
                            console.warn('Alert sound element not found');
                            return;
                        }
                        sound.loop = true;
                        sound.play().then(() => {
                            console.log('Alert sound playing successfully');
                        }).catch((err) => {
                            console.warn('Autoplay blocked, trying muted autoplay fallback:', err);
                            sound.muted = true;
                            sound.play().then(() => {
                                setTimeout(() => {
                                    sound.muted = false;
                                    console.log('Alert sound playing with muted fallback');
                                }, 200);
                            }).catch((err2) => {
                                console.warn('Muted autoplay also failed:', err2);
                            });
                        });
                    } else {
                        console.log('Different company user or not the same user, skipping sound');
                    }
                }
                function stopAlertSoundUnique() {
                    const sound = document.getElementById('alertSoundUnique');
                    if (!sound) return;
                    sound.pause();
                    sound.currentTime = 0;
                    sound.loop = false;
                    sound.muted = false;
                    console.log('Alert sound stopped');
                }
                function hideModalUnique() {
                    const modalEl = document.getElementById('commissionSaleModalUnique');
                    if (!modalEl) return;
                    if (typeof bootstrap !== 'undefined') {
                        try {
                            const modal = bootstrap.Modal.getInstance(modalEl);
                            if (modal) {
                                modal.hide();
                                return;
                            }
                        } catch (err) {
                            console.error('Bootstrap 5 modal hide failed:', err);
                        }
                    }
                    if (typeof $ !== 'undefined' && $.fn.modal) {
                        try {
                            $(modalEl).modal('hide');
                            return;
                        } catch (err) {
                            console.error('jQuery modal hide failed:', err);
                        }
                    }
                    try {
                        modalEl.style.display = 'none';
                        modalEl.classList.remove('show');
                        modalEl.setAttribute('aria-hidden', 'true');
                        const backdrop = document.getElementById('modalBackdropUnique');
                        if (backdrop) {
                            backdrop.remove();
                        }
                    } catch (err) {
                        console.error('Manual modal hide failed:', err);
                    }
                }
                document.addEventListener('DOMContentLoaded', function () {
                    console.log('DOM loaded, setting up modal event listeners');
                    const modalEl = document.getElementById('commissionSaleModalUnique');
                    if (modalEl) {
                        console.log('Modal element found in DOM ready');
                        if (typeof bootstrap !== 'undefined') {
                            modalEl.addEventListener('hidden.bs.modal', function () {
                                console.log('Modal hidden event triggered');
                                stopAlertSoundUnique();
                            });
                        }
                        if (typeof $ !== 'undefined') {
                            $(modalEl).on('hidden.bs.modal', function () {
                                console.log('jQuery modal hidden event triggered');
                                stopAlertSoundUnique();
                            });
                        }
                    } else {
                        console.error('Modal element not found in DOM ready');
                    }
                    const ackBtn = document.getElementById('ackBtnUnique');
                    if (ackBtn) {
                        ackBtn.addEventListener('click', function () {
                            console.log('Acknowledge button clicked');
                            stopAlertSoundUnique();
                            hideModalUnique();
                        });
                    } else {
                        console.error('Acknowledge button not found');
                    }
                    console.log('Testing modal functionality...');
                    if (modalEl) {
                        try {
                            if (typeof bootstrap !== 'undefined') {
                                const testModal = new bootstrap.Modal(modalEl);
                                console.log('Bootstrap 5 modal can be instantiated successfully');
                            } else if (typeof $ !== 'undefined' && $.fn.modal) {
                                console.log('jQuery modal system available');
                            } else {
                                console.log('No modal system available, will use manual fallback');
                            }
                        } catch (err) {
                            console.error('Modal instantiation failed:', err);
                        }
                    }
                });
                function fallbackNotifyUnique(data) {
                    try {
                        stopAlertSoundUnique();
                    } catch (_) { }
                    console.log('Using fallback notification');
                    
                    // Check if the current user belongs to the same business
                    const currentUserBusinessId = {{ auth()->user()->business_id ?? 'null' }};
                    const currentUserId = {{ auth()->user()->id ?? 'null' }};
                    
                    // Only show alert if same company user is logged in
                    if (data.businessId === currentUserBusinessId && data.currentUserId === currentUserId) {
                        alert(`Invoice Number #${data.invoice_no} made by ${data.agentName}`);
                    }
                }
                window.testModalUnique = function () {
                    const testData = {
                        invoice_no: 'TEST123',
                        agentName: 'Test Agent',
                        businessId: {{ auth()->user()->business_id ?? 'null' }},
                        currentUserId: {{ auth()->user()->id ?? 'null' }}
                    };
                    const saleInfoEl = document.getElementById('saleInfoUnique');
                    if (saleInfoEl) {
                        saleInfoEl.innerText = `Invoice Number #${testData.invoice_no} made by ${testData.agentName}`;
                    }
                    showModalUnique(testData);
                    playAlertSoundUnique(testData);
                    console.log('Modal opened via test function');
                };
            </script>
        @endif
        <div>

            <div class="overlay tw-hidden"></div>
</body>
<style>
    @media print {
        #scrollable-container {
            overflow: visible !important;
            height: auto !important;
        }
    }
</style>
<style>
    .small-view-side-active {
        display: grid !important;
        z-index: 1000;
        position: absolute;
    }
    .overlay {
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.8);
        position: fixed;
        top: 0;
        left: 0;
        display: none;
        z-index: 20;
    }

    .tw-dw-btn.tw-dw-btn-xs.tw-dw-btn-outline {
        width: max-content;
        margin: 2px;
    }

    #scrollable-container{
        position:relative;
    }
    



</style>

</html>