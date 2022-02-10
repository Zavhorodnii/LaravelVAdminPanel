
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

            <div class="repeater border_top padding_10" data-id="repeater-payment" name="repeater-payment">
                <div class="title_section">
                    Соц сети
                </div>
                <div class="content_repeater">

                    @if(isset($fields['repeater-payment']))
                        @foreach( $fields['repeater-payment'] as $repeater_payment_key => $repeater_payment_value )
                            <div class="content_section repeater_style">
                                <div class="count_item">
                                    {{ $repeater_payment_key }}
                                </div>
                                <div class="content_item">

                                    <div class="image field required border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Иконка<span>*</span></div>
                                        <button class="choice js-open-file-popup style_button @if($repeater_payment_value['file-id']['status'] == 'ok') none @endif"
                                                type="file" data-popup="show-popup">Выбрать
                                        </button>
                                        <div class="image_section @if($repeater_payment_value['file-id']['status'] == 'error') none @endif">
                                            <img class="selected_image js_paste_name js-paste-selected-file"
                                                 name="repeater-payment_{{ $repeater_payment_key }}_file-id" data-type-filed="imageField"
                                                 data-base_name="file-id"
                                                 src="@if($repeater_payment_value['file-id']['status'] == 'ok') {{ $repeater_payment_value['file-id']['url'] }} @endif"
                                                 alt="" data-id="@if($repeater_payment_value['file-id']['status'] == 'ok') {{ $repeater_payment_value['file-id']['id'] }} @endif">
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

                <div class="button_section @if(isset($fields) && count($fields) > 0) border_top @endif ">
                    <button class="add style_button repeater_button js_add_section" type="button">Добавить</button>
                </div>
            </div>

        </div>


        <div class="hide-content-repeater none">
            <div class="repeater-fields">
                <div data-id="repeater-payment-fields">
                    <div class="content_section repeater_style">
                        <div class="count_item">
                            1
                        </div>
                        <div class="content_item">


                            <div class="image field required border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Иконка<span>*</span></div>
                                <button class="choice js-open-file-popup style_button"
                                        type="file" data-popup="show-popup">Выбрать
                                </button>
                                <div class="image_section none">
                                    <img class="selected_image js_paste_name js-paste-selected-file"
                                         type="text" data-type-filed="imageField"  name="file-id"
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
