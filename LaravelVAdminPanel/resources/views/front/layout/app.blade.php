<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="Description" content="default">
    <title>@yield('title')</title>
    <script src="{{ \Illuminate\Support\Facades\URL::asset('front/js/libs/picturefill.min.js') }}" async="async"></script>
    <link rel="preload" href="{{ \Illuminate\Support\Facades\URL::asset('front/fonts/SegoeUI-Bold.woff') }}" as="font" crossorigin="anonymous">
    <link rel="preload" href="{{ \Illuminate\Support\Facades\URL::asset('front/fonts/SegoeUI-SemiBold.woff') }}" as="font" crossorigin="anonymous">
    <link rel="preload" href="{{ \Illuminate\Support\Facades\URL::asset('front/fonts/SegoeUI.woff') }}" as="font" crossorigin="anonymous">
    <link rel="preload" href="{{ \Illuminate\Support\Facades\URL::asset('front/fonts/SegoeUI-Medium.woff') }}" as="font" crossorigin="anonymous">
    <link rel="preload" href="{{ \Illuminate\Support\Facades\URL::asset('front/fonts/Roboto-Regular.woff') }}" as="font" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('front/css/style.min.css') }}">
</head>


<body>
<div class="wrapper">

    @include('front.include.header')

    <main class="page">
        @yield('page')
    </main>

    @include('front.include.footer')
    @include('front.include.popup')

</div>
<script src="{{ \Illuminate\Support\Facades\URL::asset('front/js/libs/jquery-3.5.1.js') }}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('front/js/libs/yt-lazyload.min.js') }}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('front/js/main.min.js') }}"></script>
</body>

</html>
