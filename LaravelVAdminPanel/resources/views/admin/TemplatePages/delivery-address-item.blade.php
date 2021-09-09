
<section class="content">
    <div class="js-get-post-id none" data-post-id="@if(isset($fields['post_id'])){{ $fields['post_id'] }}@endif"></div>
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
{{--                <a href="{{ route('all-delivery-address') }}">--}}
{{--                    <i class="fas fa-chevron-left"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
            <div class="control-tab">
                <div class="header_text">Поля записи</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
        </div>
        <div class="field_section_container">

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
                                    <div class="section_input required field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Город<span>*</span>
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               type="text" data-type-filed="inputField" name="repeater1_{{ $repeater1_key }}_region"
                                               data-base_name="region"
                                               value="{{ $repeater1_value['region'] }}">
                                    </div>
                                    <div class="text-area required field section_input border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Стиль маркера на карте<span>*</span>
                                        </div>
                                        <textarea rows="5"
                                                  class="style_input_field style_custom_scroll js_paste_name"
                                                  data-type-filed="textareaInput"
                                                  type="text" name="repeater1_{{ $repeater1_key }}_point-style" data-base_name="point-style"
                                        >{{ $repeater1_value['point-style'] }}</textarea>
                                    </div>

                                    <div class="repeater border_top padding_10" data-id="repeater-2"
                                         name="repeater1_{{ $repeater1_key }}_repeater2"
                                         data-base_name="repeater2"
                                    >
                                        <div class="title_section">
                                            Адрес
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
                                                                    Адрес<span>*</span>
                                                                </div>
                                                                <input class="style_input_field js_paste_name"
                                                                       type="text" data-type-filed="inputField" name="repeater1_{{ $repeater1_key }}_repeater2_{{ $repeater2_key }}_address"
                                                                       data-base_name="address"
                                                                       value="{{ $repeater2_value['address'] }}">
                                                            </div>
                                                            <div class="section_input required field border_top padding_10 js_find_elem">
                                                                <div class="title_section">
                                                                    Номер телефона<span>*</span>
                                                                </div>
                                                                <input class="style_input_field js_paste_name"
                                                                       type="text" data-type-filed="inputField" name="repeater1_{{ $repeater1_key }}_repeater2_{{ $repeater2_key }}_phone"
                                                                       data-base_name="phone"
                                                                       value="{{ $repeater2_value['phone'] }}">
                                                            </div>
                                                            <div class="text-area required field section_input border_top padding_10 js_find_elem">
                                                                <div class="title_section">
                                                                    Время роботы<span>*</span>
                                                                </div>
                                                                <textarea rows="5"
                                                                          class="style_input_field style_custom_scroll js_paste_name"
                                                                          data-type-filed="textareaInput"
                                                                          type="text" name="repeater1_{{ $repeater1_key }}_repeater2_{{ $repeater2_key }}_work-time"
                                                                          data-base_name="work-time"
                                                                >{{ $repeater2_value['work-time'] }}</textarea>
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

                            <div class="section_input required field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Город<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text" data-type-filed="inputField" name="region"
                                       value="">
                            </div>
                            <div class="text-area required field section_input border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Стиль маркера на карте<span>*</span>
                                </div>
                                <textarea rows="5"
                                          class="style_input_field style_custom_scroll js_paste_name"
                                          data-type-filed="textareaInput"
                                          type="text" name="point-style"
                                ></textarea>
                            </div>

                            <div class="repeater border_top padding_10" data-id="repeater-2" name="repeater2">
                                <div class="title_section">
                                    Адрес
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
                                    Адрес<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text" data-type-filed="inputField" name="address"
                                       value="">
                            </div>
                            <div class="section_input required field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Номер телефона<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text" data-type-filed="inputField" name="phone"
                                       value="">
                            </div>
                            <div class="text-area required field section_input border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Время роботы<span>*</span>
                                </div>
                                <textarea rows="5"
                                          class="style_input_field style_custom_scroll js_paste_name"
                                          data-type-filed="textareaInput"
                                          type="text" name="work-time"
                                ></textarea>
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
