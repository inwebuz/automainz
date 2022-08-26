<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('seo_title')</title>
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keywords')" />

    <link rel="canonical" href="{{ url()->current() }}">

    @php
        $htmlClass = [];
        $badEye = json_decode(request()->cookie('bad_eye'), true);
        if (is_array($badEye)) {
            foreach ($badEye as $key => $value) {
                if ($value != 'normal' && !in_array('bad-eye', $htmlClass)) {
                    $htmlClass[] = 'bad-eye';
                }
                $htmlClass[] = 'bad-eye-' . $key . '-' . $value;
            }
        }
        $assetsVersion = env('ASSETS_VERSION', 1);
    @endphp

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancyapps-ui/4.0.31/fancybox.min.css"
        integrity="sha512-u+sKK399eoGQLcJN/LNW9xSi01hDa/yNXcrjPGinWRp2CNxQqFjDgbcqEg3VL4aqAKBMb9x0+slTnLdrZ8geJA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css"
        integrity="sha512-pVCM5+SN2qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css?v=' . $assetsVersion) }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css?v=' . $assetsVersion) }}">

    @yield('styles')

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    {!! setting('site.google_analytics_code') !!}
    {!! setting('site.yandex_metrika_code') !!}
    {!! setting('site.facebook_pixel_code') !!}
    {!! setting('site.jivochat_code') !!}

</head>

<body class="@yield('body_class')">

    <div class="page">
        @include('partials.svg')

        <x-header />

        @yield('content')

        <x-footer />

        @yield('after_footer_blocks')

        @include('partials.preloader')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancyapps-ui/4.0.31/fancybox.umd.js" integrity="sha512-KbN1/HGDfgCQ9jeSs8O4t3Jeq2Gxv24KTWveN9QKrk/84cm5fpU8ankouT5Nsa1Pmx4SNXHZhIavwYMmnb9yHg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/inputmask.min.js" integrity="sha512-czERuOifK1fy7MssE4JJ7d0Av55NPiU2Ymv4R6F0mOGpyPUb9HkP9DcEeE+Qj9In7hWQHGg0CqH1ELgNBJXqGA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/app.js?v=' . $assetsVersion) }}"></script>
    <script src="{{ asset('js/custom.js?v=' . $assetsVersion) }}"></script>

    @yield('scripts')

    {!! setting('site.inweb_widget_code') !!}

    @yield('microdata')

</body>

</html>
