
<section class="content">
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
{{--                <a href="{{ route('all-delivery-price-page') }}">--}}
{{--                    <i class="fas fa-chevron-left"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
            <div class="control-tab">
                <div class="header_text">Поля записи</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
        </div>
        <div class="field_section_container">

            <div class="repeater border_top padding_10" data-id="repeater-menu-l1" name="repeater-menu-l1">
                <div class="title_section">
                    Первый уровень меню
                </div>
                <div class="content_repeater">

                    @if(isset($fields))
                        @foreach( $fields as $repeater_l1_key => $repeater_l1_value )
                            <div class="content_section repeater_style">
                                <div class="count_item">
                                    {{ $repeater_l1_key }}
                                </div>
                                <div class="content_item">

                                    <div class="section_input required field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Оглавление<span>*</span>
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               type="text"
                                               data-type-filed="inputField"
                                               data-base_name="title"
                                               name="repeater-menu-l1_{{$repeater_l1_key}}_title"
                                               value="{{ $repeater_l1_value['title'] ?? '' }}"
                                        >
                                    </div>
                                    <div class="section_input required field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Ссылка<span>*</span>
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               type="text"
                                               data-type-filed="inputField"
                                               data-base_name="url"
                                               name="repeater-menu-l1_{{$repeater_l1_key}}_url"
                                               value="{{ $repeater_l1_value['url'] ?? '' }}"
                                        >
                                    </div>
                                    <div class="repeater border_top padding_10" data-id="repeater-menu-l2"
                                         data-base_name="repeater-menu-l2"
                                         name="repeater-menu-l1_{{$repeater_l1_key}}_repeater-menu-l2">
                                        <div class="title_section">
                                            Второй уровень меню
                                        </div>
                                        <div class="content_repeater">
                                            @if(isset($repeater_l1_value['new']))
                                                @foreach( $repeater_l1_value['new'] as $repeater_l2_key => $repeater_l2_value )
                                                    <div class="content_section repeater_style">
                                                        <div class="count_item">
                                                            {{ $repeater_l2_key }}
                                                        </div>
                                                        <div class="content_item">

                                                            <div class="section_input required field border_top padding_10 js_find_elem">
                                                                <div class="title_section">
                                                                    Оглавление<span>*</span>
                                                                </div>
                                                                <input class="style_input_field js_paste_name"
                                                                       type="text"
                                                                       data-type-filed="inputField"
                                                                       data-base_name="title"
                                                                       name="repeater-menu-l1_{{$repeater_l1_key}}_repeater-menu-l2_{{$repeater_l2_key}}_title"
                                                                       value="{{ $repeater_l2_value['title'] ?? '' }}"
                                                                >
                                                            </div>
                                                            <div class="section_input required field border_top padding_10 js_find_elem">
                                                                <div class="title_section">
                                                                    Ссылка<span>*</span>
                                                                </div>
                                                                <input class="style_input_field js_paste_name"
                                                                       type="text"
                                                                       data-type-filed="inputField"
                                                                       data-base_name="url"
                                                                       name="repeater-menu-l1_{{$repeater_l1_key}}_repeater-menu-l2_{{$repeater_l2_key}}_url"
                                                                       value="{{ $repeater_l2_value['url'] ?? '' }}"
                                                                >
                                                            </div>
                                                            <div class="repeater border_top padding_10" data-id="repeater-menu-l3"
                                                                 data-base_name="repeater-menu-l3"
                                                                 name="repeater-menu-l1_{{$repeater_l1_key}}_repeater-menu-l2_{{$repeater_l2_key}}_repeater-menu-l3">
                                                                <div class="title_section">
                                                                    Третий уровень меню
                                                                </div>
                                                                <div class="content_repeater">
                                                                    @if(isset($repeater_l2_value['new']))
                                                                        @foreach( $repeater_l2_value['new'] as $repeater_l3_key => $repeater_l3_value )

                                                                            <div class="content_section repeater_style">
                                                                                <div class="count_item">
                                                                                    {{ $repeater_l3_key }}
                                                                                </div>
                                                                                <div class="content_item">

                                                                                    <div class="section_input required field border_top padding_10 js_find_elem">
                                                                                        <div class="title_section">
                                                                                            Оглавление<span>*</span>
                                                                                        </div>
                                                                                        <input class="style_input_field js_paste_name"
                                                                                               type="text"
                                                                                               data-type-filed="inputField"
                                                                                               data-base_name="title"
                                                                                               name="repeater-menu-l1_{{$repeater_l1_key}}_repeater-menu-l2_{{$repeater_l2_key}}_repeater-menu-l3_{{$repeater_l3_key}}_title"
                                                                                               value="{{ $repeater_l3_value['title'] ?? '' }}"
                                                                                        >
                                                                                    </div>
                                                                                    <div class="section_input required field border_top padding_10 js_find_elem">
                                                                                        <div class="title_section">
                                                                                            Ссылка<span>*</span>
                                                                                        </div>
                                                                                        <input class="style_input_field js_paste_name"
                                                                                               type="text"
                                                                                               data-type-filed="inputField"
                                                                                               data-base_name="url"
                                                                                               name="repeater-menu-l1_{{$repeater_l1_key}}_repeater-menu-l2_{{$repeater_l2_key}}_repeater-menu-l3_{{$repeater_l3_key}}_url"
                                                                                               value="{{ $repeater_l3_value['url'] ?? '' }}"
                                                                                        >
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

                                                                <div class="button_section @if(isset($repeater_l2_value['new'])) border_top @endif">
                                                                    <button class="add style_button repeater_button js_add_section" type="button">Добавить</button>
                                                                </div>
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

                                        <div class="button_section @if(isset($repeater_l1_value['new'])) border_top @endif">
                                            <button class="add style_button repeater_button js_add_section" type="button">Добавить</button>
                                        </div>
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

                <div class="button_section @if(isset($fields)) border_top @endif ">
                    <button class="add style_button repeater_button js_add_section" type="button">Добавить</button>
                </div>
            </div>

        </div>


        <div class="hide-content-repeater none">
            <div class="repeater-fields">
                <div data-id="repeater-menu-l1-fields">
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
                                       type="text"
                                       data-type-filed="inputField"
                                       name="title">
                            </div>
                            <div class="section_input required field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Ссылка<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text"
                                       data-type-filed="inputField"
                                       name="url">
                            </div>
                            <div class="repeater border_top padding_10" data-id="repeater-menu-l2" name="repeater-menu-l2">
                                <div class="title_section">
                                    Второй уровень меню
                                </div>
                                <div class="content_repeater">

                                </div>

                                <div class="button_section ">
                                    <button class="add style_button repeater_button js_add_section" type="button">Добавить</button>
                                </div>
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
                <div data-id="repeater-menu-l2-fields">
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
                                       type="text"
                                       data-type-filed="inputField"
                                       name="title">
                            </div>
                            <div class="section_input required field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Ссылка<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text"
                                       data-type-filed="inputField"
                                       name="url">
                            </div>
                            <div class="repeater border_top padding_10" data-id="repeater-menu-l3" name="repeater-menu-l3">
                                <div class="title_section">
                                    Третий уровень меню
                                </div>
                                <div class="content_repeater">

                                </div>

                                <div class="button_section ">
                                    <button class="add style_button repeater_button js_add_section" type="button">Добавить</button>
                                </div>
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
                <div data-id="repeater-menu-l3-fields">
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
                                       type="text"
                                       data-type-filed="inputField"
                                       name="title">
                            </div>
                            <div class="section_input required field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Ссылка<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text"
                                       data-type-filed="inputField"
                                       name="url">
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
