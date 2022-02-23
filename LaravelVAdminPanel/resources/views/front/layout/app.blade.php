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
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('front/css/v_style.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
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

<script>
    window.addReview = '{{ route('front-add-review') }}';
    window.sendMail = '{{ route('front-send-mail') }}';
    window.cartControl = '{{ route('cart.control') }}';
    window.changeQuantity = '{{ route('cart.change.quantity') }}';
    window.removeProduct = '{{ route('cart.remove') }}';
    window.addGift = '{{ route('cart.gift') }}';
    window.cartOrder = '{{ route('cart.order') }}';
</script>

<script src="{{ \Illuminate\Support\Facades\URL::asset('front/js/libs/jquery-3.5.1.js') }}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('front/js/libs/yt-lazyload.min.js') }}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('front/js/main.min.js') }}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('front/js/v_script.js') }}"></script>
</body>

</html>
