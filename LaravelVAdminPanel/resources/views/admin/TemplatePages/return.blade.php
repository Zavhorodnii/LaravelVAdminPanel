
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
            <div class="back-icon">
                <a href="{{ route('all-return-page') }}">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </div>
            <div class="control-tab">
                <div class="header_text">Поля записи</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
        </div>
        <div class="field_section_container">
            <div class="section_input field required border_top padding_10 js_find_elem">
                <div class="title_section">
                    Оглавление записи<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text" name="post_title"
                       type="text" value="@if(isset($fields['post_title'])){{ $fields['post_title'] }} @endif">
            </div>
            <div class="repeater border_top padding_10" data-id="repeater-1" name="repeater1">
                <div class="title_section">
                    Повторитель<span>*</span></div>
                <div class="content_repeater">

                    @if(isset($fields['repeater1']))
                        @foreach( $fields['repeater1'] as $repeater1_key => $repeater1_value )
                            <div class="content_section repeater_style">
                                <div class="count_item">
                                    {{ $repeater1_key }}
                                </div>
                                <div class="content_item">
                                    <div class="image field required border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Иконка<span>*</span></div>
                                        <button class="choice js-open-file-popup style_button @if($repeater1_value['imageField']['status'] == 'ok') none @endif"
                                                type="file" data-popup="show-popup">Выбрать
                                        </button>
                                        <div class="image_section @if($repeater1_value['imageField']['status'] == 'error') none @endif">
                                            <img class="selected_image js_paste_name js-paste-selected-file"
                                                 name="repeater1_{{ $repeater1_key }}_imageField" data-base_name="imageField"
                                                 src="@if($repeater1_value['imageField']['status'] == 'ok') {{ $repeater1_value['imageField']['url'] }} @endif"
                                                 alt="" data-id="@if($repeater1_value['imageField']['status'] == 'ok') {{ $repeater1_value['imageField']['id'] }} @endif">
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
                                    <div class="section_input field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Оглавление<span>*</span>
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               type="text" name="repeater1_{{ $repeater1_key }}_inputField" data-base_name="inputField"
                                               value="{{ $repeater1_value['inputField'] }}">
                                    </div>
                                    <div class="text-area field required section_input border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Описание<span>*</span>
                                        </div>
                                        <textarea rows="5"
                                                  class="style_input_field style_custom_scroll js_paste_name"
                                                  type="text" name="repeater1_{{ $repeater1_key }}_textareaInput" data-base_name="textareaInput"
                                                  required>{{ $repeater1_value['textareaInput'] }}</textarea>
                                    </div>


                                    <div class="repeater border_top padding_10" data-id="repeater-2"
                                         name="repeater1_{{ $repeater1_key }}_repeater2" data-base_name="repeater2">
                                        <div class="title_section">
                                            Повторитель<span>*</span></div>
                                        <div class="content_repeater">
                                            @if(isset($repeater1_value['repeater2']))
                                                @foreach( $repeater1_value['repeater2'] as $repeater2_key => $repeater2_value )
                                                    <div class="content_section repeater_style">
                                                        <div class="count_item">
                                                            {{ $repeater2_key }}
                                                        </div>
                                                        <div class="content_item">
                                                            <div class="image field required border_top padding_10 js_find_elem">
                                                                <div class="title_section">
                                                                    Иконка<span>*</span></div>
                                                                <button class="choice js-open-file-popup style_button @if($repeater2_value['imageField']['status'] == 'ok') none @endif"
                                                                        type="file" data-popup="show-popup">Выбрать
                                                                </button>
                                                                <div class="image_section @if($repeater2_value['imageField']['status'] == 'error') none @endif">
                                                                    <img class="selected_image js_paste_name js-paste-selected-file"
                                                                         type="text" name="repeater1_{{ $repeater1_key }}_repeater2_{{ $repeater2_key }}_imageField" data-base_name="imageField"
                                                                         src="@if($repeater2_value['imageField']['status'] == 'ok') {{ $repeater2_value['imageField']['url'] }} @endif"
                                                                         alt="" data-id="@if($repeater2_value['imageField']['status'] == 'ok') {{ $repeater2_value['imageField']['id'] }} @endif">
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
                                                            <div class="section_input field required border_top padding_10 js_find_elem">
                                                                <div class="title_section">
                                                                    Оглавление<span>*</span>
                                                                </div>
                                                                <input class="style_input_field js_paste_name"
                                                                       type="text" name="repeater1_{{ $repeater1_key }}_repeater2_{{ $repeater2_key }}_inputField" data-base_name="inputField"
                                                                       value="{{ $repeater2_value['inputField'] }}">
                                                            </div>
                                                            <div class="text-area field required section_input border_top padding_10 js_find_elem">
                                                                <div class="title_section">
                                                                    Описание<span>*</span>
                                                                </div>
                                                                <textarea rows="5"
                                                                          class="style_input_field style_custom_scroll js_paste_name"
                                                                          type="text" name="repeater1_{{ $repeater1_key }}_repeater2_{{ $repeater2_key }}_textareaInput" data-base_name="textareaInput"
                                                                          required>{{ $repeater2_value['textareaInput'] }}</textarea>
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
                                        <div class="button_section @if(isset($repeater1_value['repeater2'])) border_top @endif ">
                                            <button class="add style_button repeater_button js_add_section"
                                                    type="button">Добавить
                                            </button>
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
                <div class="hide-content-repeater none">
                    <div class="repeater-fields">
                        <div data-id="repeater-1-fields">
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
                                                 type="text" name="imageField"
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
                                    <div class="section_input field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Оглавление<span>*</span>
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               type="text" name="inputField"
                                               type="text" required>
                                    </div>
                                    <div class="text-area field required section_input border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Описание<span>*</span>
                                        </div>
                                        <textarea rows="5"
                                                  class="style_input_field style_custom_scroll js_paste_name"
                                                  type="text" name="textareaInput"
                                                  required></textarea>
                                    </div>
                                    <div class="repeater border_top padding_10" data-id="repeater-2"
                                         name="repeater2">
                                        <div class="title_section">
                                            Повторитель<span>*</span></div>
                                        <div class="content_repeater"></div>
                                        <div class="button_section">
                                            <button class="add style_button repeater_button js_add_section"
                                                    type="button">Добавить
                                            </button>
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
                                    <div class="image border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Иконка<span>*</span></div>
                                        <button class="choice js-open-file-popup style_button"
                                                type="file" data-popup="show-popup">Выбрать
                                        </button>
                                        <div class="image_section none">
                                            <img class="selected_image js_paste_name js-paste-selected-file"
                                                 type="text" name="imageField"
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
                                    <div class="section_input field required border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Оглавление<span>*</span>
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               type="text" name="inputField"
                                               type="text" required>
                                    </div>
                                    <div class="text-area field required section_input border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Описание<span>*</span>
                                        </div>
                                        <textarea rows="5"
                                                  class="style_input_field style_custom_scroll js_paste_name"
                                                  type="text" name="textareaInput"
                                                  required></textarea>
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
                <div class="button_section @if(isset($fields['repeater1'])) border_top @endif ">
                    <button class="add style_button repeater_button js_add_section" type="button">Добавить</button>
                </div>
            </div>

        </div>
    </div>
</section>
