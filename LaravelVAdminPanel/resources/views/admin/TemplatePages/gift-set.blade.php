
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
                <div class="header_text">Подарки</div>
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
            <div class="section_input field border_top padding_10 js_find_elem">
                <div class="title_section">
                     Подзаголовок
                </div>
                <input class="style_input_field js_paste_name"
                       data-type-filed="inputField"
                       type="text"
                       name="subtitle"
                       data-base_name="subtitle"
                       value="{{ $fields['subtitle'] ?? '' }}">
            </div>
            <div class="repeater border_top padding_10" data-id="repeater-set" name="repeater-set">
                <div class="title_section">
                    Блок товара
                </div>
                <div class="content_repeater">
                    @if(isset($fields['repeater-set']) && count($fields['repeater-set']) > 0)
                        @foreach( $fields['repeater-set'] as $repeater_set_key => $repeater_set_value )
                            <div class="content_section repeater_style">
                                <div class="count_item">
                                    {{ $repeater_set_key }}
                                </div>
                                <div class="content_item">
                                    <div class="section_input field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Оглавление списка
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               data-type-filed="inputField"
                                               type="text"
                                               name="repeater-set_{{ $repeater_set_key }}_title"
                                               data-base_name="title"
                                               value="{{ $repeater_set_value['list-title'] ?? '' }}">
                                    </div>


                                    <div class="select_list required field border_top padding_10 js_find_elem">
                                        <div class="title_section">Товар<span>*</span></div>
                                        <div class="single_selected_field">
                                            <div class="single_selected_item style_input_field">
                                                <div class="item_text js_paste_name"
                                                     type="text"
                                                     name="repeater-set_{{ $repeater_set_key }}_product-id"
                                                     data-type-filed="multiSelectField"
                                                     data-product-id="{{ $repeater_set_value['product-id'] ?? '' }}"
                                                     data-base_name="product-id">{{ $repeater_set_value['product-title'] ?? '' }}
                                                </div>
                                                <div class="item_icon ">
                                                    <i class="fas fa-chevron-down"></i>
                                                </div>
                                            </div>
                                            <div class="single_items_container style_custom_scroll container_hidden">
                                                <!-- container_hidden -->
                                                <ul>
                                                    @if( @isset( $all_products ))
                                                        @foreach( $all_products as $product )
                                                            @php
                                                                $selected = $product->id == $repeater_set_value['product-id'];;
                                                            @endphp
                                                            <li>
                                                                <div class="custom_selection_item {{ $selected ? 'checked' : '' }} "
                                                                     data-product-id="{{ $product->id }}" data-value="{{ $selected ? '1' : '0' }}">
                                                                    <label class="title_section" for="">{{ $product->title }}</label>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="repeater border_top padding_10"
                                         data-id="repeater-list"
                                         name="repeater-set_{{ $repeater_set_key }}_repeater-list"
                                         data-base_name="repeater-list">
                                        <div class="title_section">
                                            Список
                                        </div>
                                        <div class="content_repeater">

                                            @if(isset($repeater_set_value['repeater-list']) && count($repeater_set_value['repeater-list']) > 0)
                                                @foreach( $repeater_set_value['repeater-list'] as $repeater_list_key => $repeater_list_value )
                                                    <div class="content_section repeater_style">
                                                        <div class="count_item">
                                                            {{ $repeater_list_key }}
                                                        </div>
                                                        <div class="content_item">
                                                            <div class="section_input required field border_top padding_10 js_find_elem">
                                                                <div class="title_section">
                                                                    Пункт<span>*</span>
                                                                </div>
                                                                <input class="style_input_field js_paste_name"
                                                                       data-type-filed="inputField"
                                                                       type="text"
                                                                       name="repeater-set_{{ $repeater_set_key }}_repeater-list_{{ $repeater_list_key }}_item"
                                                                       data-base_name="item"
                                                                       value="{{ $repeater_list_value['item'] ?? '' }}">
                                                            </div>
                                                            <div class="section_input required field border_top padding_10 js_find_elem">
                                                                <div class="title_section">
                                                                    Значение<span>*</span>
                                                                </div>
                                                                <input class="style_input_field js_paste_name"
                                                                       data-type-filed="inputField"
                                                                       type="text"
                                                                       name="repeater-set_{{ $repeater_set_key }}_repeater-list_{{ $repeater_list_key }}_value"
                                                                       data-base_name="value"
                                                                       value="{{ $repeater_list_value['value'] ?? '' }}">
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
                                        <div class="button_section @if(isset($repeater_set_value['repeater-list'])) border_top @endif ">
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
                <div class="button_section @if(isset($fields['repeater-set'])) border_top @endif ">
                    <button class="add style_button repeater_button js_add_section" type="button">Добавить</button>
                </div>
            </div>


        </div>


        <div class="hide-content-repeater none">
            <div class="repeater-fields">
                <div data-id="repeater-set-fields">
                    <div class="content_section repeater_style">
                        <div class="count_item">
                            1
                        </div>
                        <div class="content_item">
                            <div class="section_input field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Оглавление списка
                                </div>
                                <input class="style_input_field js_paste_name"
                                       data-type-filed="inputField"
                                       type="text"
                                       name="title"
                                       data-base_name="title"
                                       value="">
                            </div>


                            <div class="select_list required field border_top padding_10 js_find_elem">
                                <div class="title_section">Товар<span>*</span></div>
                                <div class="single_selected_field">
                                    <div class="single_selected_item style_input_field">
                                        <div class="item_text js_paste_name"
                                             type="text"
                                             name="product-id"
                                             data-type-filed="multiSelectField"
                                             data-product-id="{{ $repeater_set_value['id'] ?? '' }}"
                                             data-base_name="product-id">{{ $repeater_set_value['title'] ?? '' }}
                                        </div>
                                        <div class="item_icon ">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                    <div class="single_items_container style_custom_scroll container_hidden">
                                        <!-- container_hidden -->

{{--                                        $selected = $product->id == $repeater_product_value['id'];--}}
                                        <ul>
                                            @if( @isset( $all_products ))
                                                @foreach( $all_products as $product )
                                                    @php
                                                        $selected = false;
                                                    @endphp
                                                    <li>
                                                        <div class="custom_selection_item {{ $selected ? 'checked' : '' }} "
                                                             data-product-id="{{ $product->id }}" data-value="{{ $selected ? '1' : '0' }}">
                                                            <label class="title_section" for="">{{ $product->title }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="repeater border_top padding_10" data-id="repeater-list" name="repeater-list">
                                <div class="title_section">
                                    Список
                                </div>
                                <div class="content_repeater">

                                </div>
                                <div class="button_section  ">
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
                <div data-id="repeater-list-fields">
                    <div class="content_section repeater_style">
                        <div class="count_item">
                            1
                        </div>
                        <div class="content_item">

                            <div class="section_input required field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Пункт<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       data-type-filed="inputField"
                                       type="text"
                                       name="item"
                                       data-base_name="item"
                                       value="">
                            </div>
                            <div class="section_input required field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Значение<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       data-type-filed="inputField"
                                       type="text"
                                       name="value"
                                       data-base_name="value"
                                       value="">
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
