<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
{{--    <link rel="stylesheet" href="css/login.css">--}}
    <link rel="stylesheet" href="{{ mix('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,600&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
          integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body>

<div class="container">

    <form action="{{ route('admin-auth') }}" method="post">
        @csrf
        <div class="field_section_header padding_10">
            <div class="header_text">Авторизация</div>
        </div>

        <div class="section_input border_top padding_10 js_find_elem">
            <div class="title_section">Логин<span>*</span></div>
            <input class="style_input_field js_paste_name" type="text" name="email" data-base_name="name1" required>
        </div>
        <div class="section_input border_top padding_10 js_find_elem">
            <div class="title_section">Пароль<span>*</span></div>
            <input class="style_input_field js_paste_name" type="password" name="password" data-base_name="name1" required>
        </div>

        <div class="field_section_container_button border_top padding_10">
            <button class="save style_button" type="submit">Войти</button>
        </div>
    </form>
</div>

</body>
</html>
