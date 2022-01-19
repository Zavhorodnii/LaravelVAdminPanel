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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <title>@yield('page-title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body>
<div class="grid_container">
    @include('admin.include.header')
    @include('admin.include.left_aside')
    @yield('main-content')
    @yield('right-aside')


    @include('admin.include.footer')
</div>


@yield('popup-upload')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


{{--    <script>--}}
{{--        tinymce.init({--}}
{{--            selector: 'textarea'--}}
{{--        });--}}
{{--    </script>--}}

<script>
    window.ajaxUploadUrl = '{{ route('upload-file') }}';
    window.ajaxGetSelectedInfo = '{{ route('get-selected-info') }}';
    window.ajaxUpdateFileInfo = '{{ route('update-file-info') }}';
    window.ajaxDeleteSelectedFile = '{{ route('delete-selected-file') }}';
</script>
@yield('ajaxUrl')

<script src="{{ mix('js/app.js') }}"></script>
@yield('js-files')
</body>
</html>
