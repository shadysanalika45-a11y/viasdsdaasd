<!DOCTYPE html>
<html class="loading" lang="@yield('html_lang', 'ar')" dir="@yield('html_dir', 'rtl')" data-textdirection="ltr"
    style="direction: rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <link rel="apple-touch-icon" href="{{ asset('users-asset/images/logo/favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('users-asset/images/logo/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('website/css/footer.css') }}">
    <title>{{ config('app.name', 'Vidoo') }} - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    @stack('head_scripts')
</head>
<body class="@yield('body_class', 'horizontal-layout horizontal-menu footer-static')">
    @unless (trim($__env->yieldContent('hide_header')))
        @include('partials.header')
    @endunless

    @if (trim($__env->yieldContent('show_sidebar')))
        @include('partials.sidebar')
    @endif

    <main class="app-content">
        @yield('content')
    </main>

    @unless (trim($__env->yieldContent('hide_footer')))
        @include('partials.footer')
    @endunless

    @stack('scripts')
</body>
</html>
