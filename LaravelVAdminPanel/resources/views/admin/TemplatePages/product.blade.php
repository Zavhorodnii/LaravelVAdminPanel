
<section class="content">
    <div class="field_section js-control-notification-section none">
        <div class="field_section_container">
            <div class="notification-save-message">
                <ul class=" js-paste-notifications">
                </ul>
            </div>
        </div>
    </div>
    <div class="field_section "> <!--hid_block-->
        <div class="field_section_header padding_10">
            <div class="back-icon">
                <a href="{{ route('all-products') }}">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </div>
            <div class="control-tab">
                <div class="header_text">Поля записи</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
        </div>
        <div class="field_section_container">


            <div class="tab_section border_top padding_10">
                <div class="tab_section_tab">
                    <div data-index-selected="1" class="tab_section_tab_title active">Основное</div>
                    <div data-index-selected="2" class="tab_section_tab_title">Цена</div>
                    <div data-index-selected="3" class="tab_section_tab_title">Габариты</div>
                    <div data-index-selected="4" class="tab_section_tab_title">Категории</div>
                    <div data-index-selected="5" class="tab_section_tab_title">Набор</div>
                    <div data-index-selected="6" class="tab_section_tab_title">Видео и параметры</div>
                    <div data-index-selected="7" class="tab_section_tab_title">Внимание</div>
                </div>
                <div class="fields style_custom_scroll">
                    <div data-index-selected="1" class="section_tab_field active">
                        <div class="section_input field required border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Название товара<span>*</span>
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text" name="name"
                                   value="@if(isset($fields['name'])){{ $fields['name'] }} @endif">
                        </div>

                        <div class="section_input field required border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Слаг товара<span>*</span>
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text" name="slug"
                                   value="@if(isset($fields['slug'])){{ $fields['slug'] }} @endif">
                        </div>

                        <div class="section_input field required border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Артикул товара<span>*</span>
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text" name="sku"
                                   value="@if(isset($fields['sku'])){{ $fields['sku'] }} @endif">
                        </div>
                    </div>
                    <div data-index-selected="2" class="section_tab_field none">
                        <div class="section_input field required border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Цена товара<span>*</span>
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="number" min="0" name="price"
                                   value="@if(isset($fields['price'])){{ $fields['price'] }} @endif">
                        </div>

                        <div class="section_input field border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Акционная цена товара
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="number" min="0" name="regular_price"
                                   value="@if(isset($fields['regular_price'])){{ $fields['regular_price'] }} @endif">
                        </div>
                    </div>
                    <div data-index-selected="3" class="section_tab_field none">
                        <div class="section_input field required border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Вес товара<span>*</span>
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text" name="weight"
                                   value="@if(isset($fields['weight'])){{ $fields['weight'] }} @endif">
                        </div>

                        <div class="section_input field required border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Длина товара<span>*</span>
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text" name="length"
                                   value="@if(isset($fields['length'])){{ $fields['length'] }} @endif">
                        </div>

                        <div class="section_input field required border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Ширина товара<span>*</span>
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text" name="width"
                                   value="@if(isset($fields['width'])){{ $fields['width'] }} @endif">
                        </div>

                        <div class="section_input field required border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Высота товара<span>*</span>
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text" name="height"
                                   value="@if(isset($fields['height'])){{ $fields['height'] }} @endif">
                        </div>

                        <div class="section_input field required border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Габаритные параметры товара<span>*</span>
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text" name="dimensions"
                                   value="@if(isset($fields['dimensions'])){{ $fields['dimensions'] }} @endif">
                        </div>
                    </div>
                    <div data-index-selected="4" class="section_tab_field none">
                        <div class="multiple_section border_top padding_10 js_find_elem">
                            <div class="title_section">Категории<span>*</span></div>
                            <input class="style_input_field" type="text" placeholder="Поиск">
                            <div class="multiple_control">
                                <div class="multiple_field multiple_section_1 style_custom_scroll">
                                    <input type="custom_input_text" value="0">
                                    <ul>
                                        <li class="copy_item" data-item_id="1">
                                            <div class="custom_selection_item " data-value="0">
                                                <label class="title_section" for="">Выбор 1</label>
                                            </div>
                                        </li>
                                        <li class="copy_item" data-item_id="2">
                                            <div class="custom_selection_item " data-value="0">
                                                <label class="title_section" for="">Выбор 2</label>
                                            </div>
                                        </li>
                                        <li class="copy_item" data-item_id="3">
                                            <div class="custom_selection_item " data-value="0">
                                                <label class="title_section" for="">Выбор 3</label>
                                            </div>
                                        </li>
                                        <li class="copy_item" data-item_id="4">
                                            <div class="custom_selection_item " data-value="0">
                                                <label class="title_section" for="">Выбор 4</label>
                                            </div>
                                        </li>
                                        <li class="copy_item" data-item_id="5">
                                            <div class="custom_selection_item " data-value="0">
                                                <label class="title_section" for="">Выбор 5</label>
                                            </div>
                                        </li>
                                        <li class="copy_item" data-item_id="6">
                                            <div class="custom_selection_item " data-value="0">
                                                <label class="title_section" for="">Выбор 6</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="multiple_field multiple_section_2 style_custom_scroll">
                                    <input type="custom_input_text" value="0">
                                    <ul class="paste_clone">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-index-selected="5" class="section_tab_field none">
                        <div class="multiple_section border_top padding_10 js_find_elem">
                            <div class="title_section">Набор<span>*</span></div>
                            <input class="style_input_field" type="text" placeholder="Поиск">
                            <div class="multiple_control">
                                <div class="multiple_field multiple_section_1 style_custom_scroll">
                                    <input type="custom_input_text" value="0">
                                    <ul>
                                        <li class="copy_item" data-item_id="1">
                                            <div class="custom_selection_item " data-value="0">
                                                <label class="title_section" for="">Выбор 1</label>
                                            </div>
                                        </li>
                                        <li class="copy_item" data-item_id="2">
                                            <div class="custom_selection_item " data-value="0">
                                                <label class="title_section" for="">Выбор 2</label>
                                            </div>
                                        </li>
                                        <li class="copy_item" data-item_id="3">
                                            <div class="custom_selection_item " data-value="0">
                                                <label class="title_section" for="">Выбор 3</label>
                                            </div>
                                        </li>
                                        <li class="copy_item" data-item_id="4">
                                            <div class="custom_selection_item " data-value="0">
                                                <label class="title_section" for="">Выбор 4</label>
                                            </div>
                                        </li>
                                        <li class="copy_item" data-item_id="5">
                                            <div class="custom_selection_item " data-value="0">
                                                <label class="title_section" for="">Выбор 5</label>
                                            </div>
                                        </li>
                                        <li class="copy_item" data-item_id="6">
                                            <div class="custom_selection_item " data-value="0">
                                                <label class="title_section" for="">Выбор 6</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="multiple_field multiple_section_2 style_custom_scroll">
                                    <input type="custom_input_text" value="0">
                                    <ul class="paste_clone">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-index-selected="6" class="section_tab_field none">
                        <div class="repeater border_top padding_10" data-id="repeater-video" name="repeater1">
                            <div class="title_section">
                                Видео</div>
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
                                    <div data-id="repeater-video-fields">
                                        <div class="content_section repeater_style">
                                            <div class="count_item">
                                                1
                                            </div>
                                            <div class="content_item">
                                                <div class="section_input field border_top padding_10 js_find_elem">
                                                    <div class="title_block">
                                                        Ссылка<span>*</span>
                                                    </div>
                                                    <input class="style_input_field js_paste_name"
                                                           type="url" name="inputField"
                                                           required>
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
                        <div class="repeater border_top padding_10" data-id="repeater-1" name="repeater1">
                            <div class="title_section">
                                Параиетры</div>
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
                                                <div class="section_input field border_top padding_10 js_find_elem">
                                                    <div class="title_block">
                                                        Оглавление<span>*</span>
                                                    </div>
                                                    <input class="style_input_field js_paste_name"
                                                           type="text" name="inputField"
                                                           required>
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
                                                <div class="section_input field required border_top padding_10 js_find_elem">
                                                    <div class="title_section">
                                                        Параметр<span>*</span>
                                                    </div>
                                                    <input class="style_input_field js_paste_name"
                                                           type="text" name="params" required>
                                                </div>
                                                <div class="section_input field required border_top padding_10 js_find_elem">
                                                    <div class="title_section">
                                                        Значение<span>*</span>
                                                    </div>
                                                    <input class="style_input_field js_paste_name"
                                                           type="text" name="value" required>
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
                    <div data-index-selected="7" class="section_tab_field none">
                        <div class="text-area field required section_input border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Описание<span>*</span>
                            </div>
                            <textarea rows="5"
                                      class="style_input_field style_custom_scroll js_paste_name"
                                      type="text" name="textareaInput"
                            ></textarea>
                        </div>
                    </div>
                </div>
            </div>








        </div>
    </div>
</section>
