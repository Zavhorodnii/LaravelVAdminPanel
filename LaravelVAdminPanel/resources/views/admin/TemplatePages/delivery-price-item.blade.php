
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
            <div class="back-icon">
                <a href="{{ route('all-delivery-price-page') }}">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </div>
            <div class="control-tab">
                <div class="header_text">Поля записи</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
        </div>
        <div class="field_section_container">

            <div class="section_input required field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Оглавление повторителя<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField"
                       name="repeater-title"
                       @if(isset($fields['repeater-title']))
                           value="{{ $fields['repeater-title'] }}"
                       @endif
                >
            </div>
            <div class="section_input required field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Описание<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField" name="title"
                       @if(isset($fields['title']))
                           value="{{ $fields['title'] }}"
                       @endif
                >
            </div>
            <div class="section_input field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Подзаголовок
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField" name="subtitle"
                       @if(isset($fields['subtitle']))
                           value="{{ $fields['subtitle'] }}"
                        @endif
                >
            </div>
            <div class="section_input field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Важное оглавления
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField" name="important-info"
                       @if(isset($fields['important-info']))
                           value="{{ $fields['important-info'] }}"
                        @endif
                >
            </div>


            <div class="repeater border_top padding_10" data-id="repeater-1" name="repeater1">
                <div class="title_section">
                    Города
                </div>
                <div class="content_repeater">

                    @if(isset($fields['repeater1']))
                        @foreach( $fields['repeater1'] as $repeater1_key => $repeater1_value )
                            <div class="content_section repeater_style">
                                <div class="count_item">
                                    {{ $repeater1_key }}
                                </div>
                                <div class="content_item">
                                    <div class="text-area required field section_input border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Города<span>*</span>
                                        </div>
                                        <textarea rows="5"
                                                  class="style_input_field style_custom_scroll js_paste_name"
                                                  data-type-filed="textareaInput"
                                                  type="text" name="repeater1_{{ $repeater1_key }}_cities" data-base_name="cities"
                                        >{{ $repeater1_value['cities'] }}</textarea>
                                    </div>

                                    <div class="repeater border_top padding_10" data-id="repeater-2"
                                         name="repeater1_{{ $repeater1_key }}_repeater2"
                                         data-base_name="repeater2"
                                    >
                                        <div class="title_section">
                                            Цена
                                        </div>
                                        <div class="content_repeater">

                                            @if(isset($repeater1_value['repeater2']))
                                                @foreach( $repeater1_value['repeater2'] as $repeater2_key => $repeater2_value )
                                                    <div class="content_section repeater_style">
                                                        <div class="count_item">
                                                            {{ $repeater2_key }}
                                                        </div>
                                                        <div class="content_item">
                                                            <div class="section_input required field border_top padding_10 js_find_elem">
                                                                <div class="title_section">
                                                                    Вес от<span>*</span>
                                                                </div>
                                                                <input class="style_input_field js_paste_name"
                                                                       type="text" data-type-filed="inputField" name="repeater1_{{ $repeater1_key }}_repeater2_{{ $repeater2_key }}_weight-from"
                                                                       data-base_name="weight-from"
                                                                       value="{{ $repeater2_value['weight-from'] }}">
                                                            </div>
                                                            <div class="section_input required field border_top padding_10 js_find_elem">
                                                                <div class="title_section">
                                                                    Вес до<span>*</span>
                                                                </div>
                                                                <input class="style_input_field js_paste_name"
                                                                       type="text" data-type-filed="inputField" name="repeater1_{{ $repeater1_key }}_repeater2_{{ $repeater2_key }}_weight-to"
                                                                       data-base_name="weight-to"
                                                                       value="{{ $repeater2_value['weight-to'] }}">
                                                            </div>
                                                            <div class="section_input required field border_top padding_10 js_find_elem">
                                                                <div class="title_section">
                                                                    Цена<span>*</span>
                                                                </div>
                                                                <input class="style_input_field js_paste_name"
                                                                       type="text" data-type-filed="inputField" name="repeater1_{{ $repeater1_key }}_repeater2_{{ $repeater2_key }}_price"
                                                                       data-base_name="price"
                                                                       value="{{ $repeater2_value['price'] }}">
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

                                        <div class="button_section @if(isset($fields['repeater2'])) border_top @endif ">
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
                            <div class="text-area required field section_input border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Города<span>*</span>
                                </div>
                                <textarea rows="5"
                                          class="style_input_field style_custom_scroll js_paste_name"
                                          data-type-filed="textareaInput"
                                          type="text" name="cities" data-base_name="cities"
                                          ></textarea>
                            </div>

                            <div class="repeater border_top padding_10" data-id="repeater-2" name="repeater2">
                                <div class="title_section">
                                    Цена
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
                <div data-id="repeater-2-fields">
                    <div class="content_section repeater_style">
                        <div class="count_item">
                            1
                        </div>
                        <div class="content_item">

                            <div class="section_input required field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Вес от<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text" data-type-filed="inputField" name="weight-from">
                            </div>
                            <div class="section_input required field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Вес до<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text" data-type-filed="inputField" name="weight-to">
                            </div>
                            <div class="section_input required field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Цена<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text" data-type-filed="inputField" name="price">
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
