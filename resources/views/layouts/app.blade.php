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

    @if (Route::currentRouteName() != 'user.homepage')
        <div id="page-container"
            class="enable-page-overlay side-scroll page-header-dark page-header-glass main-content-boxed">

            <aside id="side-overlay">
                @include('layouts.app.aside')
            </aside>
            <nav id="sidebar" aria-label="Main Navigation">
                @include('layouts.app.sidebar')
            </nav>
            @include('layouts.app.header')
            <main id="main-container">
                @if (Route::currentRouteName() != 'post.show')
                    @include('layouts.app.main')
                @endif
                {{ $slot }}
            </main>
            @include('layouts.app.footer')
        </div>
    @endif
    @if (Route::currentRouteName() == 'user.homepage')
        {{ $slot }}
    @endif
    <script>
        Dashmix.helpersOnLoad('jq-sparkline');
    </script>
    @stack('script')
</body>

</html>
