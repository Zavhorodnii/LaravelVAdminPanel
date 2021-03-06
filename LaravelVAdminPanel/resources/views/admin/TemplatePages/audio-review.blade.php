
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
                <a href="{{ route('all-audio-review') }}">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </div>
            <div class="control-tab">
                <div class="header_text">Поля записи</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
        </div>
        <div class="field_section_container">

            <div class="section_input field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Город
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" data-type-filed="inputField"
                       name="city"
                       @if(isset($fields['city']))
                       value="{{ $fields['city'] }}"
                    @endif
                >
            </div>
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
            <div class="image field  border_top padding_10 js_find_elem">
                <div class="title_section">
                    Файл
                </div>
                <button class="choice js-open-file-popup style_button @if(isset($fields) && $fields['file-id']['status'] == 'ok') none @endif"
                        type="file" data-popup="show-popup">Выбрать
                </button>
                <div class="image_section @if( isset($fields) && $fields['file-id']['status'] == 'error') none @endif @if(!isset($fields)) none @endif ">
                    <img class="selected_image js_paste_name js-paste-selected-file"
                         name="file-id" data-type-filed="imageField"
                         data-base_name="file-id"
                         @php
                            if(isset($fields)){
                             $file_path = $fields['file-id']['url'];
                             $path = str_replace('/storage', 'storage', $file_path);
                             if ( mime_content_type($path) == 'audio/mpeg' )
                                 $file_path = \Illuminate\Support\Facades\Storage::url('default_mp3.webp');
                             }
                         @endphp
                         src="@if( isset($fields) && $fields['file-id']['status'] == 'ok') {{ $file_path }} @endif"
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
