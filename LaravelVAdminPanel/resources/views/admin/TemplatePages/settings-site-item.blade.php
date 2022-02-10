
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
            <div class="image field  border_top padding_10 js_find_elem">
                <div class="title_section">
                    Лого
                </div>
                <button class="choice js-open-file-popup style_button @if(isset($fields) && $fields['file-id']['status'] == 'ok') none @endif"
                        type="file" data-popup="show-popup">Выбрать
                </button>
                <div class="image_section @if( isset($fields) && $fields['file-id']['status'] == 'error') none @endif @if(!isset($fields)) none @endif ">
                    <img class="selected_image js_paste_name js-paste-selected-file"
                         name="file-id" data-type-filed="imageField"
                         data-base_name="file-id"
                         src="@if( isset($fields) && $fields['file-id']['status'] == 'ok') {{ $fields['file-id']['url'] }} @endif"
                         alt="" data-id="@if( isset($fields) && $fields['file-id']['status'] == 'ok') {{ $fields['file-id']['id'] }} @endif">
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

            <div class="text-area field section_input border_top padding_10 js_find_elem">
                <div class="title_section">
                    Текст шапки
                </div>
                <textarea rows="5"
                          class="style_input_field style_custom_scroll js_paste_name"
                          data-type-filed="textareaInput"
                          data-base_name="header-text"
                          name="header-text"
                >{{ $fields['header-text'] ?? '' }}</textarea>
            </div>

            <div class="section_input field required border_top padding_10 js_find_elem">
                <div class="title_section">
                    Рабочее время<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text"
                       data-type-filed="inputField"
                       data-base_name="work-time"
                       name="work-time"
                       value="{{ $fields['work-time'] ?? '' }}">
            </div>
            <div class="section_input field required border_top padding_10 js_find_elem">
                <div class="title_section">
                    Телефон<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text"
                       data-type-filed="inputField"
                       data-base_name="phone"
                       name="phone"
                       value="{{ $fields['phone'] ?? '' }}">
            </div>
            <div class="section_input field required border_top padding_10 js_find_elem">
                <div class="title_section">
                    Email<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="email"
                       data-type-filed="inputField"
                       data-base_name="email"
                       name="email"
                       value="{{ $fields['email'] ?? '' }}">
            </div>
            <div class="section_input field required border_top padding_10 js_find_elem">
                <div class="title_section">
                    Текст под почтой<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text"
                       data-type-filed="inputField"
                       data-base_name="text-under-email"
                       name="text-under-email"
                       value="{{ $fields['text-under-email'] ?? '' }}">
            </div>
            <div class="section_input field required border_top padding_10 js_find_elem">
                <div class="title_section">
                    Оглавление над телефонной формой<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text"
                       data-type-filed="inputField"
                       data-base_name="title-above-number"
                       name="title-above-number"
                       value="{{ $fields['title-above-number'] ?? '' }}">
            </div>
            <div class="section_input field required border_top padding_10 js_find_elem">
                <div class="title_section">
                    Подзаголовок над телефонной формой<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text"
                       data-type-filed="inputField"
                       data-base_name="subtitle-above-number"
                       name="subtitle-above-number"
                       value="{{ $fields['subtitle-above-number'] ?? '' }}">
            </div>

            <div class="text-area field section_input border_top padding_10 js_find_elem">
                <div class="title_section">
                    Левый блок текста в футере
                </div>
                <textarea rows="5"
                          class="style_input_field style_custom_scroll js_paste_name"
                          data-type-filed="textareaInput"
                          data-base_name="left-text-block"
                          name="left-text-block"
                >{{ $fields['left-text-block'] ?? '' }}</textarea>
            </div>
            <div class="text-area field section_input border_top padding_10 js_find_elem">
                <div class="title_section">
                    Правый блок текста в футере
                </div>
                <textarea rows="5"
                          class="style_input_field style_custom_scroll js_paste_name"
                          data-type-filed="textareaInput"
                          data-base_name="right-text-block"
                          name="right-text-block"
                >{{ $fields['right-text-block'] ?? '' }}</textarea>
            </div>

            <div class="section_input field required border_top padding_10 js_find_elem">
                <div class="title_section">
                    Копирайт<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text"
                       data-type-filed="inputField"
                       data-base_name="copyright"
                       name="copyright"
                       value="{{ $fields['copyright'] ?? '' }}">
            </div>


        </div>

    </div>
</section>
