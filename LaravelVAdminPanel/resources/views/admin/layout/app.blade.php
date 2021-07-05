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
</head>
<body>
<div class="grid_container">
    @include('admin.include.header')
    @include('admin.include.left_aside')
    @yield('main-content')
    @yield('right-aside')
    @include('admin.include.footer')
</div>

<div class="popup js-media-popup " data-id="show-popup"> <!--animate-bg-popup-->
    <div class="popup-container animate-show-popup">

        <div class="field_section_header padding_10">
            <div class="header_text">Медиафайлы</div>
            <div class="header_icon remove js-close-popup"><i class="fas fa-times"></i></div>
        </div>

        <div class="select_file border_top padding_10 js_find_elem">
            <input class="button_add_file custom-file-input" type="file">
            <div class="load-file">
                <div class="file_name">Название файла</div>
                <div class="upload-field">
                    <div class="upload-status">
                        <div class="upload-progress"></div>
                    </div>
                    <span class="stop-upload-file">
                        <i class="fas fa-times"></i>
                    </span>
                </div>

            </div>
        </div>

        <div class=" border_top padding_10 js_find_elem">
            <div class="title_section">Поиск</div>
            <input class="style_input_field" type="text" placeholder="Поиск">
        </div>

        <div class="file-manager border_top padding_10">
            <div class="all-files">
                <div class="uploaded_files style_custom_scroll">
                    <div class="single_item selected-file">
                        <img class="single-upload-file js_paste_name"
                             type="text" name="name6"
                             src="assets/img/1.jpg"
                             alt="">
                    </div>
                    <div class="single_item">
                        <img class="single-upload-file js_paste_name"
                             type="text" name="name6"
                             src="assets/img/1.jpg"
                             alt="">
                    </div>
                    <div class="single_item">
                        <img class="single-upload-file js_paste_name"
                             type="text" name="name6"
                             src="assets/img/1.jpg"
                             alt="">
                    </div>
                    <div class="single_item">
                        <img class="single-upload-file js_paste_name"
                             type="text" name="name6"
                             src="assets/img/1.jpg"
                             alt="">
                    </div>
                    <div class="single_item">

                        <img class="single-upload-file js_paste_name"
                             type="text" name="name6"
                             src="assets/img/1.jpg"
                             alt="">
                    </div>
                    <div class="single_item">

                        <img class="single-upload-file js_paste_name"
                             type="text" name="name6"
                             src="assets/img/1.jpg"
                             alt="">
                    </div>
                    <div class="single_item">

                        <img class="single-upload-file js_paste_name"
                             type="text" name="name6"
                             src="assets/img/1.jpg"
                             alt="">
                    </div>
                    <div class="single_item">

                        <img class="single-upload-file js_paste_name"
                             type="text" name="name6"
                             src="assets/img/1.jpg"
                             alt="">
                    </div>
                    <div class="single_item">

                        <img class="single-upload-file js_paste_name"
                             type="text" name="name6"
                             src="assets/img/1.jpg"
                             alt="">
                    </div>
                    <div class="single_item">

                        <img class="single-upload-file js_paste_name"
                             type="text" name="name6"
                             src="assets/img/1.jpg"
                             alt="">
                    </div>
                    <div class="single_item">

                        <img class="single-upload-file js_paste_name"
                             type="text" name="name6"
                             src="assets/img/1.jpg"
                             alt="">
                    </div>
                    <div class="single_item">

                        <img class="single-upload-file js_paste_name"
                             type="text" name="name6"
                             src="assets/img/1.jpg"
                             alt="">
                    </div>
                    <div class="single_item">

                        <img class="single-upload-file js_paste_name"
                             type="text" name="name6"
                             src="assets/img/1.jpg"
                             alt="">
                    </div>
                    <div class="single_item">

                        <img class="single-upload-file js_paste_name"
                             type="text" name="name6"
                             src="assets/img/1.jpg"
                             alt="">
                    </div>
                    <div class="show_more">
                        <button class="style_button">Загрузить еще</button>
                    </div>
                </div>
            </div>
            <div class="file-info">
                <div class="selected-file-info">

                </div>
                <div class="field_section_container">
                    <div class="title_fields  ">
                        <div class="title_field padding_10">
                            <div class="">Имя файла: <span>filename.jpg</span>
                            </div>
                        </div>
                        <div class="title_field padding_10">
                            <div class="">Размер файла: <span>50.5 мб</span>
                            </div>
                        </div>
                        <div class="title_field padding_10">
                            <div class="">Alt-имя: <span>Альтернативное название</span>
                            </div>
                        </div>
                        <div class="title_field padding_10">
                            <div class="">Ссылка на файл: <span><a href="#">открыть</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="field_section_container_button border_top padding_10">
                        <button class="delete style_button" type="button">Удалить</button>
                    </div>
                    <div class="field_section_container_button border_top padding_10">
                        <button class="save style_button" type="button">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
