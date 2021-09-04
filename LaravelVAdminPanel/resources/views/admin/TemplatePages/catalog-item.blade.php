
<section class="content">
    <div class="js-get-post-id none" data-post-id="@if(isset($fields)){{ $fields['post_id'] }}@endif"></div>
    <div class="field_section js-control-notification-section none">
        <div class="field_section_container">
            <div class="notification-save-message">
                <ul class=" js-paste-notifications">
                    {{--                        <li class="style-notification padding_t_10 padding_lrb_10 error">--}}
                    {{--                            <p>--}}
                    {{--                                Не заполнено оглавление записи--}}
                    {{--                            </p>--}}
                    {{--                            <div class="notification_message_control js-remove-page-notif ">--}}
                    {{--                                <i class="fas fa-times delete_notif"></i>--}}
                    {{--                            </div>--}}
                    {{--                        </li>--}}
                    {{--                        <li class="padding_t_10 padding_lrb_10 ok">--}}
                    {{--                            <p>--}}
                    {{--                                Очень длинное уведомление в виде обычного серого текста--}}
                    {{--                                Скорее всего это обычное уведомление--}}
                    {{--                            </p>--}}
                    {{--                        </li>--}}
                </ul>
            </div>
        </div>
    </div>
    <div class="field_section "> <!--hid_block-->
        <div class="field_section_header padding_10">
            {{--            <div class="back-icon">--}}
            {{--                <a href="{{ route('all-return-page') }}">--}}
            {{--                    <i class="fas fa-chevron-left"></i>--}}
            {{--                </a>--}}
            {{--            </div>--}}
            <div class="control-tab">
                <div class="header_text">Поля записи</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
        </div>
        <div class="field_section_container">

            <div class="section_input required field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Оглавление<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField"
                       name="title"
                       @if(isset($fields['title']))
                           value="{{ $fields['title'] }}"
                       @endif
                >
            </div>
            <div class="section_input required field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Описание<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField" name="description"
                       @if(isset($fields['description']))
                           value="{{ $fields['description'] }}"
                       @endif
                >
            </div>
            <div class="switch_section border_top padding_10 js_find_elem">
                <div class="title_section">Показать топ</div>
                <input class="switch_status none js_paste_name" data-type-filed="switchField" name="show-top" value="@if(isset($fields['show_top'])){{ $fields['show_top'] }}@endif">
                <div class="custom_switch switch_off"><!-- switch_off --->
                    <div class="custom_switch_on switch_style">ВКЛ</div>
                    <div class="custom_switch_off switch_style">ВЫКЛ</div>
                    <div class="switch_closed"></div>
                </div>
            </div>
            <div class="section_input field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Важное оглавление
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField" name="important_title"
                       @if(isset($fields['important_title']))
                           value="{{ $fields['important_title'] }}"
                        @endif
                >
            </div>
            <div class="section_input field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Ссылка важного оглавления
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField" name="important_link"
                       @if(isset($fields['important_link']))
                           value="{{ $fields['important_link'] }}"
                        @endif
                >
            </div>


            <div class="repeater border_top padding_10" data-id="repeater-1" name="repeater1">
                <div class="title_section">
                    Повторитель<span>*</span></div>
                <div class="content_repeater">

                    @if(isset($fields['repeater']))
                        @foreach( $fields['repeater'] as $repeater1_key => $repeater1_value )
                            <div class="content_section repeater_style">
                                <div class="count_item">
                                    {{ $repeater1_key }}
                                </div>
                                <div class="content_item">
                                    <div class="section_input required field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Оглавление<span>*</span>
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               type="text" data-type-filed="inputField" name="repeater1_{{ $repeater1_key }}_title"
                                               data-base_name="title"
                                               value="{{ $repeater1_value['title'] }}">
                                    </div>
                                    <div class="image field required border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Изображение<span>*</span></div>
                                        <button class="choice js-open-file-popup style_button @if($repeater1_value['file-id']['status'] == 'ok') none @endif"
                                                type="file" data-popup="show-popup">Выбрать
                                        </button>
                                        <div class="image_section @if($repeater1_value['file-id']['status'] == 'error') none @endif">
                                            <img class="selected_image js_paste_name js-paste-selected-file"
                                                 name="repeater1_{{ $repeater1_key }}_file-id" data-type-filed="imageField"
                                                 data-base_name="file-id"
                                                 src="@if($repeater1_value['file-id']['status'] == 'ok') {{ $repeater1_value['file-id']['url'] }} @endif"
                                                 alt="" data-id="@if($repeater1_value['file-id']['status'] == 'ok') {{ $repeater1_value['file-id']['id'] }} @endif">
                                            <div class="control_buttons">
                                                <button
                                                    class="change style_button js-change-selected-image js-open-file-popup"
                                                    data-popup="show-popup"
                                                    type="button">
                                                    Изменить
                                                </button>
                                                <button class="delete style_button js-remove-selected-image"
                                                        type="button">
                                                    Удалить
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section_input required field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Ссылка на страницу<span>*</span>
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               type="text" data-type-filed="inputField" name="repeater1_{{ $repeater1_key }}_page-link"
                                               data-base_name="page-link"
                                               value="{{ $repeater1_value['page-link'] }}">
                                    </div>
                                    <div class="section_input field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Оглавление скрола
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               type="text" data-type-filed="inputField" name="repeater1_{{ $repeater1_key }}_top_title"
                                               data-base_name="top_title"
                                               value="{{ $repeater1_value['top_title'] }}">
                                    </div>
                                    <div class="section_input field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Скрол к элементу
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               type="text" data-type-filed="inputField" name="repeater1_{{ $repeater1_key }}_top_link"
                                               data-base_name="top_link"
                                               value="{{ $repeater1_value['top_link'] }}">
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
                        @endforeach
                    @endif
                </div>

                <div class="button_section @if(isset($fields['repeater1'])) border_top @endif ">
                    <button class="add style_button repeater_button js_add_section" type="button">Добавить</button>
                </div>
            </div>

        </div>


        <div class="hide-content-repeater none">
            <div class="repeater-fields">
                <div data-id="repeater-1-fields">
                    <div class="content_section repeater_style">
                        <div class="count_item">
                            1
                        </div>
                        <div class="content_item">
                            <div class="section_input required field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Оглавление<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text" data-type-filed="inputField" name="title">
                            </div>
                            <div class="image field required border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Изображение<span>*</span></div>
                                <button class="choice js-open-file-popup style_button"
                                        type="file" data-popup="show-popup">Выбрать
                                </button>
                                <div class="image_section none">
                                    <img class="selected_image js_paste_name js-paste-selected-file"
                                         name="file-id" data-type-filed="imageField"
                                         src=""
                                         alt="" data-id="">
                                    <div class="control_buttons">
                                        <button
                                            class="change style_button js-change-selected-image js-open-file-popup"
                                            data-popup="show-popup"
                                            type="button">
                                            Изменить
                                        </button>
                                        <button class="delete style_button js-remove-selected-image"
                                                type="button">
                                            Удалить
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="section_input required field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Ссылка на страницу<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text" data-type-filed="inputField"  name="page-link">
                            </div>
                            <div class="section_input field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Оглавление скрола
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text" data-type-filed="inputField" name="top_title">
                            </div>
                            <div class="section_input field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Скрол к элементу
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text" data-type-filed="inputField" name="top_link">
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
            </div>
        </div>

    </div>
</section>
