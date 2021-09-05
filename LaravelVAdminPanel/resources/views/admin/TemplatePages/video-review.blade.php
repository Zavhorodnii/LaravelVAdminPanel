
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
                <a href="{{ route('all-video-review') }}">
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
                    ФИО<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField"
                       name="person-name"
                       @if(isset($fields['person-name']))
                       value="{{ $fields['person-name'] }}"
                    @endif
                >
            </div>
            <div class="section_input required field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Ссылка на видео<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField"
                       name="video-url"
                       @if(isset($fields['video-url']))
                       value="{{ $fields['video-url'] }}"
                    @endif
                >
            </div>
            <div class="text-area field section_input border_top padding_10 js_find_elem">
                <div class="title_section">
                    Отзыв
                </div>
                <textarea rows="5"
                          class="style_input_field style_custom_scroll js_paste_name"
                          data-type-filed="textareaInput"
                          type="text" name="review" data-base_name="textareaInput"
                          required>@if(isset($fields['review'])){{ $fields['review'] }}@endif</textarea>
            </div>

        </div>

    </div>
</section>
