
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
    <div class="field_section hid_block"> <!--hid_block-->
        <div class="field_section_header padding_10">
{{--            <div class="back-icon">--}}
{{--                <a href="{{ route('all-return-page') }}">--}}
{{--                    <i class="fas fa-chevron-left"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
            <div class="control-tab">
                <div class="header_text">Регионы</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
        </div>
        <div class="field_section_container">
            <div class="repeater border_top padding_10" data-id="repeater-1" name="repeater1">
                <div class="title_section">
                    Регионы
                </div>
                <div class="content_repeater">

                    @if(isset($fields['repeater1']) && count($fields['repeater1']) > 0)
                        @foreach( $fields['repeater1'] as $repeater1_key => $repeater1_value )
                            <div class="content_section repeater_style">
                                <div class="count_item">
                                    {{ $repeater1_key }}
                                </div>
                                <div class="content_item">
                                    <div class="section_input required field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Регион<span>*</span>
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               data-type-filed="inputField"
                                               type="text" name="repeater1_{{ $repeater1_key }}_region" data-base_name="region"
                                               value="{{ $repeater1_value['region'] }}">
                                    </div>
                                    <div class="section_input field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Id для выбора
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               data-type-filed="inputField"
                                               type="text" name="repeater1_{{ $repeater1_key }}_id-for-select" data-base_name="id-for-select"
                                               value="{{ $repeater1_value['id-for-select'] }}">
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
                                    Регион<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text" name="region"
                                       data-type-filed="inputField" required>
                            </div>
                            <div class="section_input field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Id для выбора
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text" name="id-for-select"
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

    <div class="field_section "> <!--hid_block-->
        <div class="field_section_header padding_10">
{{--            <div class="back-icon">--}}
{{--                <a href="{{ route('all-return-page') }}">--}}
{{--                    <i class="fas fa-chevron-left"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
            <div class="control-tab">
                <div class="header_text">Дни доставки</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
        </div>
        <div class="field_section_container">
            <div class="repeater border_top padding_10" data-id="repeater-2" name="repeater2">
                <div class="title_section">
                    Дни доставки
                </div>
                <div class="content_repeater">

                    @if(isset($fields['repeater2']) && count($fields['repeater2']) > 0)
                        @foreach( $fields['repeater2'] as $repeater2_key => $repeater2_value )
                            <div class="content_section repeater_style">
                                <div class="count_item">
                                    {{ $repeater2_key }}
                                </div>
                                <div class="content_item">

                                    <div class="section_input required field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Регион<span>*</span>
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               data-type-filed="inputField"
                                               type="text" name="repeater2_{{ $repeater2_key }}_delivery-region-title" data-base_name="delivery-region-title"
                                               value="{{ $repeater2_value['delivery-region-title'] }}">
                                    </div>

                                    <div class="section_input field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Id для выбора
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               data-type-filed="inputField"
                                               type="text" name="repeater2_{{ $repeater2_key }}_id-select" data-base_name="id-select"
                                               value="{{ $repeater2_value['id-select'] }}">
                                    </div>

                                    <div class="switch_section border_top padding_10 js_find_elem">
                                        <div class="title_section">Понедельник</div>
                                        <input class="switch_status none js_paste_name" data-type-filed="switchField"
                                               name="repeater2_{{ $repeater2_key }}_monday"
                                               data-base_name="monday"
                                               value="@if(isset($repeater2_value['monday'])){{ $repeater2_value['monday'] }}@endif">
                                        <div class="custom_switch switch_off"><!-- switch_off --->
                                            <div class="custom_switch_on switch_style">ВКЛ</div>
                                            <div class="custom_switch_off switch_style">ВЫКЛ</div>
                                            <div class="switch_closed"></div>
                                        </div>
                                    </div>
                                    <div class="switch_section border_top padding_10 js_find_elem">
                                        <div class="title_section">Вторник</div>
                                        <input class="switch_status none js_paste_name" data-type-filed="switchField"
                                               name="repeater2_{{ $repeater2_key }}_tuesday"
                                               data-base_name="tuesday" value="@if(isset($repeater2_value['tuesday'])){{ $repeater2_value['tuesday'] }}@endif">
                                        <div class="custom_switch switch_off"><!-- switch_off --->
                                            <div class="custom_switch_on switch_style">ВКЛ</div>
                                            <div class="custom_switch_off switch_style">ВЫКЛ</div>
                                            <div class="switch_closed"></div>
                                        </div>
                                    </div>
                                    <div class="switch_section border_top padding_10 js_find_elem">
                                        <div class="title_section">Среда</div>
                                        <input class="switch_status none js_paste_name" data-type-filed="switchField"
                                               name="repeater2_{{ $repeater2_key }}_wednesday"
                                               data-base_name="wednesday" value="@if(isset($repeater2_value['wednesday'])){{ $repeater2_value['wednesday'] }}@endif">
                                        <div class="custom_switch switch_off"><!-- switch_off --->
                                            <div class="custom_switch_on switch_style">ВКЛ</div>
                                            <div class="custom_switch_off switch_style">ВЫКЛ</div>
                                            <div class="switch_closed"></div>
                                        </div>
                                    </div>
                                    <div class="switch_section border_top padding_10 js_find_elem">
                                        <div class="title_section">Четверг</div>
                                        <input class="switch_status none js_paste_name" data-type-filed="switchField"
                                               name="repeater2_{{ $repeater2_key }}_thursday"
                                               data-base_name="thursday" value="@if(isset($repeater2_value['thursday'])){{ $repeater2_value['thursday'] }}@endif">
                                        <div class="custom_switch switch_off"><!-- switch_off --->
                                            <div class="custom_switch_on switch_style">ВКЛ</div>
                                            <div class="custom_switch_off switch_style">ВЫКЛ</div>
                                            <div class="switch_closed"></div>
                                        </div>
                                    </div>
                                    <div class="switch_section border_top padding_10 js_find_elem">
                                        <div class="title_section">Пятница</div>
                                        <input class="switch_status none js_paste_name" data-type-filed="switchField"
                                               name="repeater2_{{ $repeater2_key }}_friday"
                                               data-base_name="friday" value="@if(isset($repeater2_value['friday'])){{ $repeater2_value['friday'] }}@endif">
                                        <div class="custom_switch switch_off"><!-- switch_off --->
                                            <div class="custom_switch_on switch_style">ВКЛ</div>
                                            <div class="custom_switch_off switch_style">ВЫКЛ</div>
                                            <div class="switch_closed"></div>
                                        </div>
                                    </div>
                                    <div class="switch_section border_top padding_10 js_find_elem">
                                        <div class="title_section">Субота</div>
                                        <input class="switch_status none js_paste_name" data-type-filed="switchField"
                                               name="repeater2_{{ $repeater2_key }}_saturday"
                                               data-base_name="saturday" value="@if(isset($repeater2_value['saturday'])){{ $repeater2_value['saturday'] }}@endif">
                                        <div class="custom_switch switch_off"><!-- switch_off --->
                                            <div class="custom_switch_on switch_style">ВКЛ</div>
                                            <div class="custom_switch_off switch_style">ВЫКЛ</div>
                                            <div class="switch_closed"></div>
                                        </div>
                                    </div>
                                    <div class="switch_section border_top padding_10 js_find_elem">
                                        <div class="title_section">Воскресенье</div>
                                        <input class="switch_status none js_paste_name" data-type-filed="switchField"
                                               name="repeater2_{{ $repeater2_key }}_sunday"
                                               data-base_name="sunday" value="@if(isset($repeater2_value['sunday'])){{ $repeater2_value['sunday'] }}@endif">
                                        <div class="custom_switch switch_off"><!-- switch_off --->
                                            <div class="custom_switch_on switch_style">ВКЛ</div>
                                            <div class="custom_switch_off switch_style">ВЫКЛ</div>
                                            <div class="switch_closed"></div>
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
                <div data-id="repeater-2-fields">
                    <div class="content_section repeater_style">
                        <div class="count_item">
                            1
                        </div>
                        <div class="content_item">
                            <div class="section_input required field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Регион <span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text" name="delivery-region-title"
                                       data-type-filed="inputField" required>
                            </div>
                            <div class="section_input field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Id для выбора
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text" name="id-select"
                                       data-type-filed="inputField" required>
                            </div>

                            <div class="switch_section border_top padding_10 js_find_elem">
                                <div class="title_section">Понедельник</div>
                                <input class="switch_status none js_paste_name" data-type-filed="switchField" name="monday" value="0">
                                <div class="custom_switch switch_off"><!-- switch_off --->
                                    <div class="custom_switch_on switch_style">ВКЛ</div>
                                    <div class="custom_switch_off switch_style">ВЫКЛ</div>
                                    <div class="switch_closed"></div>
                                </div>
                            </div>
                            <div class="switch_section border_top padding_10 js_find_elem">
                                <div class="title_section">Вторник</div>
                                <input class="switch_status none js_paste_name" data-type-filed="switchField" name="tuesday" value="0">
                                <div class="custom_switch switch_off"><!-- switch_off --->
                                    <div class="custom_switch_on switch_style">ВКЛ</div>
                                    <div class="custom_switch_off switch_style">ВЫКЛ</div>
                                    <div class="switch_closed"></div>
                                </div>
                            </div>
                            <div class="switch_section border_top padding_10 js_find_elem">
                                <div class="title_section">Среда</div>
                                <input class="switch_status none js_paste_name" data-type-filed="switchField" name="wednesday" value="0">
                                <div class="custom_switch switch_off"><!-- switch_off --->
                                    <div class="custom_switch_on switch_style">ВКЛ</div>
                                    <div class="custom_switch_off switch_style">ВЫКЛ</div>
                                    <div class="switch_closed"></div>
                                </div>
                            </div>
                            <div class="switch_section border_top padding_10 js_find_elem">
                                <div class="title_section">Четверг</div>
                                <input class="switch_status none js_paste_name" data-type-filed="switchField" name="thursday" value="0">
                                <div class="custom_switch switch_off"><!-- switch_off --->
                                    <div class="custom_switch_on switch_style">ВКЛ</div>
                                    <div class="custom_switch_off switch_style">ВЫКЛ</div>
                                    <div class="switch_closed"></div>
                                </div>
                            </div>
                            <div class="switch_section border_top padding_10 js_find_elem">
                                <div class="title_section">Пятница</div>
                                <input class="switch_status none js_paste_name" data-type-filed="switchField" name="friday" value="0">
                                <div class="custom_switch switch_off"><!-- switch_off --->
                                    <div class="custom_switch_on switch_style">ВКЛ</div>
                                    <div class="custom_switch_off switch_style">ВЫКЛ</div>
                                    <div class="switch_closed"></div>
                                </div>
                            </div>
                            <div class="switch_section border_top padding_10 js_find_elem">
                                <div class="title_section">Субота</div>
                                <input class="switch_status none js_paste_name" data-type-filed="switchField" name="saturday" value="0">
                                <div class="custom_switch switch_off"><!-- switch_off --->
                                    <div class="custom_switch_on switch_style">ВКЛ</div>
                                    <div class="custom_switch_off switch_style">ВЫКЛ</div>
                                    <div class="switch_closed"></div>
                                </div>
                            </div>
                            <div class="switch_section border_top padding_10 js_find_elem">
                                <div class="title_section">Воскресенье</div>
                                <input class="switch_status none js_paste_name" data-type-filed="switchField" name="sunday" value="0">
                                <div class="custom_switch switch_off"><!-- switch_off --->
                                    <div class="custom_switch_on switch_style">ВКЛ</div>
                                    <div class="custom_switch_off switch_style">ВЫКЛ</div>
                                    <div class="switch_closed"></div>
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
            </div>
        </div>
    </div>
</section>
