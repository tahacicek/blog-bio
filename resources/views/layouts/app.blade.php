<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('custom') }}/../assets/images/favicon.ico" />
    <link rel="stylesheet" href="{{ asset('custom') }}/../assets/css/libs.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('custom') }}/../assets/css/socialv.css"> --}}
    <link rel="stylesheet" href="{{ asset('custom') }}/../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('custom') }}/../assets/vendor/remixicon/fonts/remixicon.css">
    <link rel="stylesheet"
        href="{{ asset('custom') }}/../assets/vendor/vanillajs-datepicker/dist/css/datepicker.min.css">
    <link rel="stylesheet" href="{{ asset('custom') }}/../assets/vendor/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet"
        href="{{ asset('custom') }}/../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('style')
</head>

<body>

    <body class="  ">
        <!-- loader Start -->

        <!-- loader END -->
        <!-- Wrapper Start -->
        <div class="wrapper">
            <div class="iq-sidebar  sidebar-default ">
                <div id="sidebar-scrollbar">
                    @include('layouts.app.sidebar')
                    <div class="p-5"></div>
                </div>
            </div>

          @include('layouts.app.header')
          @include('layouts.app.aside')
           {{ $slot }}
        </div>
        <!-- Wrapper End-->
        @include('layouts.app.footer')
       <!-- Backend Bundle JavaScript -->
        <script src="{{ asset('custom') }}/../assets/js/libs.min.js"></script>
        <!-- slider JavaScript -->
        <script src="{{ asset('custom') }}/../assets/js/slider.js"></script>
        <!-- masonry JavaScript -->
        <script src="{{ asset('custom') }}/../assets/js/masonry.pkgd.min.js"></script>
        <!-- SweetAlert JavaScript -->
        <script src="{{ asset('custom') }}/../assets/js/enchanter.js"></script>
        <!-- SweetAlert JavaScript -->
        <script src="{{ asset('custom') }}/../assets/js/sweetalert.js"></script>
        <!-- app JavaScript -->
        <script src="{{ asset('custom') }}/../assets/js/charts/weather-chart.js"></script>
        <script src="{{ asset('custom') }}/../assets/js/app.js"></script>
        <script src="{{ asset('custom') }}/../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
        <script src="{{ asset('custom') }}/../assets/js/lottie.js"></script>
        @method('script')

        <!-- offcanvas start -->

        <div class="offcanvas offcanvas-bottom share-offcanvas" tabindex="-1" id="share-btn"
            aria-labelledby="shareBottomLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="shareBottomLabel">Share</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body small">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="text-center me-3 mb-3">
                        <img src="../assets/images/icon/08.png" class="img-fluid rounded mb-2" alt="">
                        <h6>Facebook</h6>
                    </div>
                    <div class="text-center me-3 mb-3">
                        <img src="../assets/images/icon/09.png" class="img-fluid rounded mb-2" alt="">
                        <h6>Twitter</h6>
                    </div>
                    <div class="text-center me-3 mb-3">
                        <img src="../assets/images/icon/10.png" class="img-fluid rounded mb-2" alt="">
                        <h6>Instagram</h6>
                    </div>
                    <div class="text-center me-3 mb-3">
                        <img src="../assets/images/icon/11.png" class="img-fluid rounded mb-2" alt="">
                        <h6>Google Plus</h6>
                    </div>
                    <div class="text-center me-3 mb-3">
                        <img src="../assets/images/icon/13.png" class="img-fluid rounded mb-2" alt="">
                        <h6>In</h6>
                    </div>
                    <div class="text-center me-3 mb-3">
                        <img src="../assets/images/icon/12.png" class="img-fluid rounded mb-2" alt="">
                        <h6>YouTube</h6>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
