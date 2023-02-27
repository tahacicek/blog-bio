<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('style')
</head>

<body>

    <body class="  ">
        <!-- loader Start -->
        <div id="loading">
            <div id="loading-center">
            </div>
        </div>
        <!-- loader END -->
        <!-- Wrapper Start -->
        <div class="wrapper">
            <div class="iq-sidebar  sidebar-default ">
                <div id="sidebar-scrollbar">
                    <nav class="iq-sidebar-menu">
                        @include('layouts.app.sidebar')
                    </nav>
                    <div class="p-5"></div>

                </div>
            </div>
            <div class="iq-top-navbar">
                <div class="iq-navbar-custom">
                    <nav class="navbar navbar-expand-lg navbar-light p-0 show">
                        @include('layouts.app.header')
                    </nav>
                </div>
            </div>
            @include('layouts.app.aside')
            <div id="content-page" class="content-page">
                {{ $slot }}
            </div>
        </div>
        <!-- Wrapper End-->
        @include('layouts.app.footer')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
            integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            var loader = document.getElementById("loading");
            window.addEventListener('load', function() {
                loader.style.display = "none";
            });
        </script>

        <script>
            //if click with sidebar  open sidebar iq-sidebar-toggle with jquery
            $(document).ready(function() {
                $(".main-circle").click(function() {
                    //wrapper-menuya open ekle çıkar toogle
                    $(".wrapper-menu").toggleClass("open");
                    //bodye sidebar-main ekle
                    $("body").toggleClass("sidebar-main");
                });
            });
            //if click "right-sidebar-toggle" open right-sidebar
            $(document).ready(function() {
                $(".right-sidebar-toggle").click(function() {
                    //right-sidebar open ekle çıkar toogle
                    $(".right-sidebar-mini").toggleClass("right-sidebar");
                    //bodye sidebar-right ekle
                    $("body").toggleClass("right-sidebar-close");
                });
            });
        </script>
        @stack('script')

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
                        <img src="custom/assets/images/icon/08.png" class="img-fluid rounded mb-2" alt="">
                        <h6>Facebook</h6>
                    </div>
                    <div class="text-center me-3 mb-3">
                        <img src="custom/assets/images/icon/09.png" class="img-fluid rounded mb-2" alt="">
                        <h6>Twitter</h6>
                    </div>
                    <div class="text-center me-3 mb-3">
                        <img src="custom/assets/images/icon/10.png" class="img-fluid rounded mb-2" alt="">
                        <h6>Instagram</h6>
                    </div>
                    <div class="text-center me-3 mb-3">
                        <img src="custom/assets/images/icon/11.png" class="img-fluid rounded mb-2" alt="">
                        <h6>Google Plus</h6>
                    </div>
                    <div class="text-center me-3 mb-3">
                        <img src="custom/assets/images/icon/13.png" class="img-fluid rounded mb-2" alt="">
                        <h6>In</h6>
                    </div>
                    <div class="text-center me-3 mb-3">
                        <img src="custom/assets/images/icon/12.png" class="img-fluid rounded mb-2" alt="">
                        <h6>YouTube</h6>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
