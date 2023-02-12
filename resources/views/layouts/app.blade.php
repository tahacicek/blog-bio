<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('style')
</head>

<body>
    <div id="page-container"
        class="enable-page-overlay side-scroll page-header-dark page-header-glass main-content-boxed">
        <!-- Side Overlay-->
        <aside id="side-overlay">
       @include('layouts.app.aside')
        </aside>
        <!-- END Side Overlay -->
        <nav id="sidebar" aria-label="Main Navigation">
            @include('layouts.app.sidebar')
        </nav>

        @include('layouts.app.header')

        <!-- Main Container -->
        <main id="main-container">
            <!-- Hero -->
            <div class="bg-image" style="background-image: url('assets/media/photos/photo10@2x.jpg');">
                <div class="bg-black-75">
                    <div class="content content-full content-top text-center">
                        <div class="pt-4 pb-3">
                            <h1 class="fw-light text-white mb-2">Dashboard</h1>
                            <h2 class="h4 fw-light text-white-75">Welcome to your personal web application</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            {{ $slot  }}
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        @include('layouts.app.footer')
    </div>

    <!-- Page JS Helpers (jQuery Sparkline Plugin) -->
    <script>
        Dashmix.helpersOnLoad('jq-sparkline');
    </script>
    @stack('script')
</body>

</html>
