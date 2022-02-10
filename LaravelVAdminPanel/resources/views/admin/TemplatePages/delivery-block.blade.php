
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
            <div class="section_input field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Оглавление блока
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField" name="title"
                       data-base_name="title"
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
                       data-base_name="subtitle"
                       @if(isset($fields['subtitle']))
                       value="{{ $fields['subtitle'] }}"
                    @endif
                >
            </div>
            <div class="section_input field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Оглавление типа оплаты
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField" name="title-type-pay"
                       data-base_name="title-type-pay"
                       @if(isset($fields['title-type-pay']))
                       value="{{ $fields['title-type-pay'] }}"
                    @endif
                >
            </div>

            <div class="repeater border_top padding_10" data-id="repeater-1" name="repeater1">
                <div class="title_section">
                    Типы оплаты
                </div>
                <div class="content_repeater">

                    @if(isset($fields) && count($fields) > 0)
                        @foreach( $fields as $repeater1_key => $repeater1_value )
                            @if( is_array( $repeater1_value ) )
                                <div class="content_section repeater_style">
                                    <div class="count_item">
                                        {{ $repeater1_key }}
                                    </div>
                                    <div class="content_item">

                                        <div class="section_input field border_top padding_10 js_find_elem">
                                            <div class="title_section">
                                                Оглавление<span>*</span>
                                            </div>
                                            <input class="style_input_field js_paste_name"
                                                   data-type-filed="inputField"
                                                   type="text" name="repeater1_{{ $repeater1_key }}_title" data-base_name="title"
                                                   value="{{ $repeater1_value['title'] }}">
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
                            @endif
                        @endforeach
                    @endif
                </div>
                <div class="button_section @if(isset($fields['repeater1'])) border_top @endif ">
                    <button class="add style_button repeater_button js_add_section" type="button">Добавить</button>
                </div>
            </div>

            <div class="section_input field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Оглавление типа доставки
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField" name="title-type-delivery"
                       data-base_name="title-type-delivery"
                       @if(isset($fields['title-type-delivery']))
                       value="{{ $fields['title-type-delivery'] }}"
                    @endif
                >
            </div>
            <div class="section_input field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Оглавление места доставки
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField" name="title-place-delivery"
                       data-base_name="title-place-delivery"
                       @if(isset($fields['title-place-delivery']))
                       value="{{ $fields['title-place-delivery'] }}"
                    @endif
                >
            </div>
            <div class="section_input field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Оглавление дня доставки
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField" name="title-day-delivery"
                       data-base_name="title-day-delivery"
                       @if(isset($fields['title-day-delivery']))
                       value="{{ $fields['title-day-delivery'] }}"
                    @endif
                >
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

                            <div class="section_input field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Оглавление<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text" name="title"
                                       data-type-filed="inputField" required>
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
