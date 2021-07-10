@extends('admin.layout.app')

@section('page-title')
    Возврат
@endsection

@section('all-block-menu')
    active
@endsection

@section('all-return-submeny-all')
    active
@endsection

@section('main-content')
    <section class="content">
        <div class="field_section "> <!--hid_block-->
            <div class="field_section_header padding_10">
                <div class="header_text">Создание блока возврата</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
            <div class="field_section_container">

                <div class="repeater border_top padding_10" name="repeater2">
                    <div class="title_section">
                        Повторитель<span>*</span></div>
                    <div class="content_repeater"></div>
                    <div class="repeater_field none">
                        <div class="content_section repeater_style">
                            <div class="count_item">
                                1
                            </div>
                            <div class="content_item">
                                <div class="image border_top padding_10 js_find_elem">
                                    <div class="title_section">
                                        Иконка<span>*</span></div>
                                    <button class="choice js-open-file-popup style_button"
                                            type="file" data-popup="show-popup">Выбрать
                                    </button>
                                    <div class="image_section none">
                                        <img class="selected_image js_paste_name js-paste-selected-file"
                                             type="text" name="name6"
                                             src="assets/img/1.jpg"
                                             alt="">
                                        <div class="control_buttons">
                                            <button class="change style_button js-change-selected-image js-open-file-popup" data-popup="show-popup"
                                                    type="button">
                                                Изменить
                                            </button>
                                            <button class="delete style_button"
                                                    type="button">
                                                Удалить
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="section_input border_top padding_10 js_find_elem">
                                    <div class="title_section">
                                        Оглавление<span>*</span>
                                    </div>
                                    <input class="style_input_field js_paste_name"
                                           type="text" name="name3"
                                           type="text" required>
                                </div>
                                <div class="text-area section_input border_top padding_10 js_find_elem">
                                    <div class="title_section">
                                        Описание<span>*</span>
                                    </div>
                                    <textarea rows="5"
                                              class="style_input_field style_custom_scroll js_paste_name"
                                              type="text" name="name5"
                                              required></textarea>
                                </div>
                            </div>
                            <div class="control_item border_solid">
                                <div class="add_item">
                                    <i class="fas fa-plus position"></i>
                                </div>
                                <div class="delete_item">
                                    <i class="fas fa-minus position"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button_section">
                        <button class="add style_button repeater_button js_add_section" type="button">Добавить</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('right-aside')
    <aside class="sidebar_right">

        <div class="field_section">
            <div class="field_section_header padding_10">
                <div class="header_text">Управление</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
            <div class="field_section_container">
                <div class="checkbox_field section_input border_top padding_10 js_find_elem">
{{--                    <div class="title_section">--}}
{{--                        Название поля<span>*</span>--}}
{{--                    </div>--}}
                    <input type="text"
                           class="none js_paste_name"
                           name="name7" value="">
                    <ul>
                        <li>
                            <div class="custom_checkbox ">
                                <!--checked-->
                                <div class="custom_checkbox_square click"></div>
                                <input class="custom_input_text"
                                       value="0">
                                <label class="title_section click"
                                       for="">
                                    Черновик
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="field_section_container_button border_top padding_10">
                    <a href="#" class="create style_button add-new-page">
                        Создать запись
                    </a>
                </div>
            </div>
        </div>

    </aside>
@endsection

@section('popup-upload')
    @include('admin.include.popup-files')
@endsection