<div class="popup js-media-popup " data-id="show-popup"> <!--animate-bg-popup-->
    <div class="popup-container animate-show-popup">

        <div class="field_section_header padding_10">
            <div class="header_text">Медиафайлы</div>
            <div class="header_icon remove js-close-popup"><i class="fas fa-times"></i></div>
        </div>

        <div class="select_file border_top padding_10 js_find_elem">

            <div class="upload-input none">
            </div>

            <button type="submit" class="button style_button js-add-input-field">Загрузить файл</button>

            {{--            @csrf--}}
            <div class="load-file none js-upload-file">
                <div class="file_name">Название файла</div>
                <div class="upload-field">
                    <div class="upload-status">
                        <div class="upload-progress"></div>
                    </div>
                    <span class="stop-upload-file js-remove-upload">
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


{{--                    @foreach($files as $file)--}}
{{--                        <div class="single_item selected-file">--}}
{{--                            <img class="single-upload-file js_paste_name"--}}
{{--                                 type="text" name="name6"--}}
{{--                                 src="{{ $file->file_path }}"--}}
{{--                                 alt="{{ $file->alt_name }}" data-id="{{ $file->id }}">--}}
{{--                        </div>--}}
{{--                    @endforeach--}}


                    {{--                        <div class="single_item">--}}
                    {{--                            <img class="single-upload-file js_paste_name"--}}
                    {{--                                 type="text" name="name6"--}}
                    {{--                                 src="assets/img/1.jpg"--}}
                    {{--                                 alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <div class="show_more">--}}
                    {{--                            <button class="style_button">Загрузить еще</button>--}}
                    {{--                        </div>--}}
                </div>
            </div>
            <div class="file-info">
                <div class="selected-file-info">

                </div>
                <div class="field_section_container">
                    <div class="title_fields  ">

                        <div class="section_input padding_10 js_find_elem">
                            <div class="title_section">
                                Имя файла::
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text" name="name3"
                                   type="text">
                        </div>
                        <div class="section_input padding_10 js_find_elem">
                            <div class="title_section">
                                Alt-имя:
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text" name="name3"
                                   type="text" data-id="">
                        </div>

                        <div class="title_field padding_10">
                            <div class="">Размер файла: <span>50.5 мб</span>
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
