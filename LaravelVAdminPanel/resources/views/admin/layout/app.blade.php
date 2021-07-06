<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,600&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
          integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <title>@yield('page-title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<div class="grid_container">
    @include('admin.include.header')
    @include('admin.include.left_aside')
    @yield('main-content')
    @yield('right-aside')

    @yield('test')

    @include('admin.include.footer')
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    window.ajaxUploadUrl = '{{ route('upload-file') }}';
    {{--window.publicPath = '{{ public_path('images') }}';--}}
</script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
