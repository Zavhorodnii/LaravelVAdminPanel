
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
    <div class="field_section"> <!--hid_block-->
        <div class="field_section_header padding_10">
{{--            <div class="back-icon">--}}
{{--                <a href="{{ route('all-return-page') }}">--}}
{{--                    <i class="fas fa-chevron-left"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
            <div class="control-tab">
                <div class="header_text">Успей купить</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
        </div>
        <div class="field_section_container">

            <div class="section_input required border_top padding_10 js_find_elem">
                <div class="title_section">
                    Оглавление
                </div>
                <input class="style_input_field js_paste_name"
                       data-type-filed="inputField"
                       type="text"
                       name="title"
                       data-base_name="title"
                       value="{{ $fields['title'] ?? '' }}">
            </div>
            <div class="section_input required border_top padding_10 js_find_elem">
                <div class="title_section">
                    Осталось подарков
                </div>
                <input class="style_input_field js_paste_name"
                       data-type-filed="inputField"
                       type="number"
                       min="0"
                       name="gift-count"
                       data-base_name="gift-count"
                       value="{{ $fields['gift-count'] ?? '' }}">
            </div>
            <div class="section_input required border_top padding_10 js_find_elem">
                <div class="title_section">
                    Текст кнопки
                </div>
                <input class="style_input_field js_paste_name"
                       data-type-filed="inputField"
                       type="text"
                       name="button-title"
                       data-base_name="button-title"
                       value="{{ $fields['button-title'] ?? '' }}">
            </div>


        </div>
    </div>
</section>
