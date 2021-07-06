@extends('admin.layout.app')

@section('page-title')
    Admin panel
@endsection

@section('main-content')
    <section class="content">
        <div class="field_section "> <!--hid_block-->
            <div class="field_section_header padding_10">
                <div class="header_text">Шапка блока</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
            <div class="field_section_container  ">
                <div class="section_input border_top padding_10 js_find_elem">
                    <div class="title_section">Название поля<span>*</span></div>
                    <input class="style_input_field js_paste_name" type="text" name="" data-base_name="name1" required>
                </div>
                <div class="select_list border_top padding_10 js_find_elem">
                    <div class="title_section">Название поля<span>*</span></div>
                    <div class="single_selected_field">
                        <div class="single_selected_item style_input_field">
                            <div class="item_text js_paste_name" type="text" name="" data-base_name="name4">Выбор 2
                            </div>
                            <div class="item_icon ">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="single_items_container style_custom_scroll container_hidden">
                            <!-- container_hidden -->
                            <ul>
                                <li>
                                    <div class="custom_selection_item checked" data-value="0">
                                        <label class="title_section" for="">Выбор 1</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom_selection_item checked" data-value="1">
                                        <label class="title_section" for="">Выбор 2</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom_selection_item checked" data-value="0">
                                        <label class="title_section" for="">Выбор 3</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom_selection_item checked" data-value="0">
                                        <label class="title_section" for="">Выбор 4</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom_selection_item checked" data-value="0">
                                        <label class="title_section" for="">Выбор 5</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom_selection_item checked" data-value="0">
                                        <label class="title_section" for="">Выбор 6</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom_selection_item checked" data-value="0">
                                        <label class="title_section" for="">Выбор 7</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="section_input border_top padding_10 js_find_elem">
                    <div class="title_section">Название поля<span>*</span></div>
                    <div class="help_text">Какое-то пояснение к полю на всякий случай</div>
                    <input class="style_input_field js_paste_name" type="text" name="" data-base_name="name3"
                           type="text" required>
                </div>
                <div class="section_input border_top padding_10 js_find_elem">
                    <div class="title_section">Название поля<span>*</span></div>
                    <textarea rows="5" class="style_input_field style_custom_scroll js_paste_name" type="text" name=""
                              data-base_name="name5" required></textarea>
                </div>
                <div class="image border_top padding_10 js_find_elem">
                    <div class="title_section">Картинка<span>*</span></div>
                    <button class="choice style_button js-open-file-popup" data-popup="show-popup">Выбрать</button>
                    <div class="image_section">
                        <img class="selected_image js_paste_name" type="text" name="" data-base_name="name6"
                             src="assets/img/1.jpg" alt="">
                        <div class="control_buttons">
                            <button class="change style_button js-open-file-popup" data-popup="show-popup" type="button">Изменить</button>
                            <button class="delete style_button" type="button">Удалить</button>
                        </div>
                    </div>
                </div>
                <div class="checkbox_field section_input border_top padding_10 js_find_elem">
                    <div class="title_section">Название поля<span>*</span></div>
                    <input type="text" class="none js_paste_name" type="text" name="" data-base_name="name7">
                    <ul>
                        <li>
                            <div class="custom_checkbox checked"> <!--checked-->
                                <div class="custom_checkbox_square click"></div>
                                <input class="custom_input_text" value="1">
                                <label class="title_section click" for="">Галочка активна<span>*</span></label>
                            </div>
                        </li>
                        <li>
                            <div class="custom_checkbox "> <!--checked-->
                                <div class="custom_checkbox_square click"></div>
                                <input class="custom_input_text" value="0">
                                <label class="title_section click" for="">Галочка активна<span>*</span></label>
                            </div>
                        </li>
                        <li>
                            <div class="custom_checkbox "> <!--checked-->
                                <div class="custom_checkbox_square click"></div>
                                <input class="custom_input_text" value="0">
                                <label class="title_section click" for="">Галочка активна<span>*</span></label>
                            </div>
                        </li>
                        <li>
                            <div class="custom_checkbox "> <!--checked-->
                                <div class="custom_checkbox_square click"></div>
                                <input class="custom_input_text" value="0">
                                <label class="title_section click" for="">Галочка активна<span>*</span></label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="repeater border_top padding_10" name="repeater1">
                    <div class="title_section">Повторитель<span>*</span></div>
                    <div class="content_repeater"></div>
                    <div class="repeater_field none">
                        <div class="content_section repeater_style">
                            <div class="count_item">
                                1
                            </div>
                            <div class="content_item">
                                <div class="section_input border_top padding_10 js_find_elem">
                                    <div class="title_section">Название поля<span>*</span></div>
                                    <input class="style_input_field js_paste_name" type="text" name="name1" required>
                                </div>
                                <div class="switch_section border_top padding_10 js_find_elem">
                                    <div class="title_section">Переключатель<span>*</span></div>
                                    <input class="switch_status none js_paste_name" name="switch" value="0">
                                    <div class="custom_switch switch_off"><!-- switch_off --->
                                        <div class="custom_switch_on switch_style">ВКЛ</div>
                                        <div class="custom_switch_off switch_style">ВЫКЛ</div>
                                        <div class="switch_closed"></div>
                                    </div>
                                </div>
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
                                                <div class="section_input border_top padding_10 js_find_elem">
                                                    <div class="title_section">
                                                        Название поля<span>*</span>
                                                    </div>
                                                    <input class="style_input_field js_paste_name"
                                                           type="text" name="name1"
                                                           required>
                                                </div>
                                                <div class="select_list border_top padding_10 js_find_elem">
                                                    <div class="title_section">
                                                        Название поля<span>*</span>
                                                    </div>
                                                    <div class="single_selected_field">
                                                        <div class="single_selected_item style_input_field">
                                                            <div class="item_text js_paste_name"
                                                                 type="text" name="name4">
                                                                Выбор 2
                                                            </div>
                                                            <div class="item_icon ">
                                                                <i class="fas fa-chevron-down"></i>
                                                            </div>
                                                        </div>
                                                        <div class="single_items_container style_custom_scroll container_hidden">
                                                            <!-- container_hidden -->
                                                            <ul>
                                                                <li>
                                                                    <div class="custom_selection_item checked"
                                                                         data-value="0">
                                                                        <label class="title_section">Выбор
                                                                            1</label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="custom_selection_item checked"
                                                                         data-value="1">
                                                                        <label class="title_section"
                                                                               for="">Выбор
                                                                            2</label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="custom_selection_item checked"
                                                                         data-value="0">
                                                                        <label class="title_section"
                                                                               for="">Выбор
                                                                            3</label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="custom_selection_item checked"
                                                                         data-value="0">
                                                                        <label class="title_section"
                                                                               for="">Выбор
                                                                            4</label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="custom_selection_item checked"
                                                                         data-value="0">
                                                                        <label class="title_section"
                                                                               for="">Выбор
                                                                            5</label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="custom_selection_item checked"
                                                                         data-value="0">
                                                                        <label class="title_section"
                                                                               for="">Выбор
                                                                            6</label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="custom_selection_item checked"
                                                                         data-value="0">
                                                                        <label class="title_section"
                                                                               for="">Выбор
                                                                            7</label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section_input border_top padding_10 js_find_elem">
                                                    <div class="title_section">
                                                        Название поля<span>*</span>
                                                    </div>
                                                    <div class="help_text">Какое-то
                                                        пояснение к полю на всякий
                                                        случай
                                                    </div>
                                                    <input class="style_input_field js_paste_name"
                                                           type="text" name="name3"
                                                           type="text" required>
                                                </div>
                                                <div class="section_input border_top padding_10 js_find_elem">
                                                    <div class="title_section">
                                                        Название поля<span>*</span>
                                                    </div>
                                                    <textarea rows="5"
                                                              class="style_input_field style_custom_scroll js_paste_name"
                                                              type="text" name="name5"
                                                              required></textarea>
                                                </div>
                                                <div class="image border_top padding_10 js_find_elem">
                                                    <div class="title_section">
                                                        Картинка<span>*</span></div>
                                                    <button class="choice js-open-file-popup style_button none"
                                                            type="file" data-popup="show-popup">Выбрать
                                                    </button>
                                                    <div class="image_section">
                                                        <img class="selected_image js_paste_name"
                                                             type="text" name="name6"
                                                             src="assets/img/1.jpg"
                                                             alt="">
                                                        <div class="control_buttons">
                                                            <button class="change style_button js-open-file-popup" data-popup="show-popup"
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
                                                <div class="checkbox_field section_input border_top padding_10 js_find_elem">
                                                    <div class="title_section">
                                                        Название поля<span>*</span>
                                                    </div>
                                                    <input type="text"
                                                           class="none js_paste_name"
                                                           name="name7" value="">
                                                    <ul>
                                                        <li>
                                                            <div class="custom_checkbox checked">
                                                                <!--checked-->
                                                                <div class="custom_checkbox_square click"></div>
                                                                <input class="custom_input_text"
                                                                       value="1">
                                                                <label class="title_section click"
                                                                       for="">Галочка
                                                                    активна<span>*</span></label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom_checkbox ">
                                                                <!--checked-->
                                                                <div class="custom_checkbox_square click"></div>
                                                                <input class="custom_input_text"
                                                                       value="0">
                                                                <label class="title_section click"
                                                                       for="">Галочка
                                                                    активна<span>*</span></label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom_checkbox ">
                                                                <!--checked-->
                                                                <div class="custom_checkbox_square click"></div>
                                                                <input class="custom_input_text"
                                                                       value="0">
                                                                <label class="title_section click"
                                                                       for="">Галочка
                                                                    активна<span>*</span></label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom_checkbox ">
                                                                <!--checked-->
                                                                <div class="custom_checkbox_square click"></div>
                                                                <input class="custom_input_text"
                                                                       value="0">
                                                                <label class="title_section click"
                                                                       for="">Галочка
                                                                    активна<span>*</span></label>
                                                            </div>
                                                        </li>
                                                    </ul>
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
                                        <button class="add style_button repeater_button"
                                                type="button">Добавить
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="control_item border_solid">
                                <div class="add_item js_add_section">
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

                <div class="multiple_section border_top padding_10 js_find_elem">
                    <div class="title_section">Двойной список<span>*</span></div>
                    <input class="style_input_field" type="text" placeholder="Поиск">
                    <div class="multiple_control">
                        <div class="multiple_field multiple_section_1 style_custom_scroll">
                            <input type="custom_input_text" value="0">
                            <ul>
                                <li class="copy_item" data-item_id="1">
                                    <div class="custom_selection_item " data-value="0">
                                        <label class="title_section" for="">Выбор 1</label>
                                    </div>
                                </li>
                                <li class="copy_item" data-item_id="2">
                                    <div class="custom_selection_item " data-value="0">
                                        <label class="title_section" for="">Выбор 2</label>
                                    </div>
                                </li>
                                <li class="copy_item" data-item_id="3">
                                    <div class="custom_selection_item " data-value="0">
                                        <label class="title_section" for="">Выбор 3</label>
                                    </div>
                                </li>
                                <li class="copy_item" data-item_id="4">
                                    <div class="custom_selection_item " data-value="0">
                                        <label class="title_section" for="">Выбор 4</label>
                                    </div>
                                </li>
                                <li class="copy_item" data-item_id="5">
                                    <div class="custom_selection_item " data-value="0">
                                        <label class="title_section" for="">Выбор 5</label>
                                    </div>
                                </li>
                                <li class="copy_item" data-item_id="6">
                                    <div class="custom_selection_item " data-value="0">
                                        <label class="title_section" for="">Выбор 6</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="multiple_field multiple_section_2 style_custom_scroll">
                            <input type="custom_input_text" value="0">
                            <ul class="paste_clone">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="switch_section border_top padding_10 js_find_elem">
                    <div class="title_section">Переключатель<span>*</span></div>
                    <input class="switch_status none" name="" value="0">
                    <div class="custom_switch switch_off"><!-- switch_off --->
                        <div class="custom_switch_on switch_style">ВКЛ</div>
                        <div class="custom_switch_off switch_style">ВЫКЛ</div>
                        <div class="switch_closed"></div>
                    </div>
                </div>


                <div class="tab_section border_top padding_10">
                    <div class="tab_section_tab">
                        <div data-index-selected="1" class="tab_section_tab_title active">Вкладка</div>
                        <div data-index-selected="2" class="tab_section_tab_title">Вкладка 2</div>
                        <div data-index-selected="3" class="tab_section_tab_title ">Вкл</div>
                        <div data-index-selected="4" class="tab_section_tab_title">Вкладка</div>
                        <div data-index-selected="5" class="tab_section_tab_title">Вкладка 2</div>
                        <div data-index-selected="6" class="tab_section_tab_title">Вкл</div>
                        <div data-index-selected="7" class="tab_section_tab_title">Вкладка</div>
                        <div data-index-selected="8" class="tab_section_tab_title">Вкладка 2</div>
                        <div data-index-selected="9" class="tab_section_tab_title">Вкл</div>
                        <div data-index-selected="10" class="tab_section_tab_title">Вкладка</div>
                        <div data-index-selected="11" class="tab_section_tab_title">Вкладка 2</div>
                        <div data-index-selected="12" class="tab_section_tab_title">Вкл</div>
                    </div>
                    <div class="fields style_custom_scroll">
                        <div data-index-selected="1" class="section_tab_field active">
                            <div class="section_input border_top padding_10">
                                <div class="title_section">Название поля<span>*</span></div>
                                <input class="style_input_field" type="text" required>
                            </div>
                        </div>
                        <div data-index-selected="2" class="section_tab_field none">
                            <div class="select_list border_top padding_10">
                                <div class="title_section">Название поля<span>*</span></div>
                                <div class="single_selected_field">
                                    <div class="single_selected_item style_input_field">
                                        <div class="item_text">Выбор 2</div>
                                        <div class="item_icon ">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                    <div class="single_items_container style_custom_scroll container_hidden">
                                        <!-- container_hidden -->
                                        <ul>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 1</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="1">
                                                    <label class="title_section" for="">Выбор 2</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 3</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 4</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 5</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 6</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 7</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-index-selected="3" class="section_tab_field none">
                            <div class="select_list border_top padding_10">
                                <div class="title_section">Название поля<span>*</span></div>
                                <div class="single_selected_field">
                                    <div class="single_selected_item style_input_field">
                                        <div class="item_text">Выбор 2</div>
                                        <div class="item_icon ">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                    <div class="single_items_container style_custom_scroll container_hidden">
                                        <!-- container_hidden -->
                                        <ul>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 1</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="1">
                                                    <label class="title_section" for="">Выбор 2</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 3</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 4</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 5</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 6</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 7</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="section_input border_top padding_10">
                                <div class="title_section">Название поля<span>*</span></div>
                                <input class="style_input_field" type="text" required>
                            </div>
                            <div class="select_list border_top padding_10">
                                <div class="title_section">Название поля<span>*</span></div>
                                <div class="single_selected_field">
                                    <div class="single_selected_item style_input_field">
                                        <div class="item_text">Выбор 2</div>
                                        <div class="item_icon ">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                    <div class="single_items_container style_custom_scroll container_hidden">
                                        <!-- container_hidden -->
                                        <ul>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 1</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="1">
                                                    <label class="title_section" for="">Выбор 2</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 3</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 4</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 5</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 6</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom_selection_item checked" data-value="0">
                                                    <label class="title_section" for="">Выбор 7</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-index-selected="4" class="section_tab_field none">
                            <div class="section_input border_top padding_10">
                                <div class="title_section">Название поля<span>*</span></div>
                                <input class="style_input_field" type="text" required>
                            </div>
                        </div>
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
                <div class="header_text">Шапка блока</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
            <div class="field_section_container">
                <div class="title_fields border_top ">
                    <div class="title_field padding_10">
                        <div class="">Оглавление поля: <span>so long information so long information so long information so long information </span>
                        </div>
                    </div>
                    <div class="title_field padding_10">
                        <div class="">Оглавление поля: <span>so long information so long information so long information so long information </span>
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

    </aside>
@endsection
