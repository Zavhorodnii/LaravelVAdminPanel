
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
                    Дата окончания акции
                </div>
                <input class="style_input_field js_paste_name"
                       data-type-filed="inputField"
                       type="date"
                       name="date-finish"
                       data-base_name="date-finish"
                       value="{{ isset($fields['date-finish']) ? date("Y-m-d", strtotime($fields['date-finish'])) : '' }}">
            </div>
            <div class="repeater border_top padding_10" data-id="repeater-price" name="repeater-price">
                <div class="title_section">
                    Цена
                </div>
                <div class="content_repeater">
                    @if(isset($fields['repeater-price']) && count($fields['repeater-price']) > 0)
                        @foreach( $fields['repeater-price'] as $repeater_price_key => $repeater_price_value )
                            <div class="content_section repeater_style">
                                <div class="count_item">
                                    {{ $repeater_price_key }}
                                </div>
                                <div class="content_item">
                                    <div class="section_input field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Цена
                                        </div>
                                        <input class="style_input_field js_paste_name"
                                               data-type-filed="inputField"
                                               type="number"
                                               name="repeater-price_{{ $repeater_price_key }}_price"
                                               data-base_name="price"
                                               value="{{ $repeater_price_value['price'] ?? '' }}">
                                    </div>

                                    <div class="repeater border_top padding_10"
                                         data-id="repeater-product"
                                         name="repeater-price_{{ $repeater_price_key }}_repeater-product"
                                         name="repeater-product">
                                        <div class="title_section">
                                            Подарки
                                        </div>
                                        <div class="content_repeater">

                                            @if(isset($repeater_price_value['repeater-product']) && count($repeater_price_value['repeater-product']) > 0)
                                                @foreach( $repeater_price_value['repeater-product'] as $repeater_product_key => $repeater_product_value )
                                                    <div class="content_section repeater_style">
                                                        <div class="count_item">
                                                            {{ $repeater_product_key }}
                                                        </div>
                                                        <div class="content_item">

                                                            <div class="select_list field border_top padding_10 js_find_elem">
                                                                <div class="title_section">Товар</div>
                                                                <div class="single_selected_field">
                                                                    <div class="single_selected_item style_input_field">
                                                                        <div class="item_text js_paste_name"
                                                                             type="text"
                                                                             name="repeater-price_{{ $repeater_price_key }}_repeater-product_{{ $repeater_product_key }}_product-id"
                                                                             data-type-filed="multiSelectField"
                                                                             data-product-id="{{ $repeater_product_value['id'] ?? '' }}"
                                                                             data-base_name="product-id">{{ $repeater_product_value['title'] ?? '' }}
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
                                                                                        $selected = $product->id == $repeater_product_value['id'];
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
                                        <div class="button_section @if(isset($repeater_price_value['repeater-product'])) border_top @endif ">
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
                <div class="button_section @if(isset($fields['repeater-price'])) border_top @endif ">
                    <button class="add style_button repeater_button js_add_section" type="button">Добавить</button>
                </div>
            </div>


        </div>


        <div class="hide-content-repeater none">
            <div class="repeater-fields">
                <div data-id="repeater-price-fields">
                    <div class="content_section repeater_style">
                        <div class="count_item">
                            1
                        </div>
                        <div class="content_item">

                            <div class="section_input field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Цена
                                </div>
                                <input class="style_input_field js_paste_name"
                                       data-type-filed="inputField"
                                       type="number"
                                       name="price"
                                       data-base_name="price"
                                       value="{{ $fields['date-finish'] ?? '' }}">
                            </div>

                            <div class="repeater border_top padding_10" data-id="repeater-product" name="repeater-product">
                                <div class="title_section">
                                    Подарки
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
                <div data-id="repeater-product-fields">
                    <div class="content_section repeater_style">
                        <div class="count_item">
                            1
                        </div>
                        <div class="content_item">

                            <div class="select_list field border_top padding_10 js_find_elem">
                                <div class="title_section">Товар</div>
                                <div class="single_selected_field">
                                    <div class="single_selected_item style_input_field">
                                        <div class="item_text js_paste_name"
                                             type="text"
                                             name=""
                                             data-type-filed="multiSelectField"
                                             data-product-id="{{ $all_products[0]->id ?? '' }}"
                                             data-base_name="product-id">{{ $all_products[0]->title ?? '' }}
                                        </div>
                                        <div class="item_icon ">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                    <div class="single_items_container style_custom_scroll container_hidden">
                                        <!-- container_hidden -->
                                        <ul>
                                            @if( @isset( $all_products ))
                                                @php
                                                $first = true;
                                                @endphp
                                                @foreach( $all_products as $product )
                                                    <li>
                                                        <div class="custom_selection_item <?php echo $first ? 'checked' : '' ?> "
                                                             data-product-id="{{ $product->id }}" data-value="<?php echo $first ? '1' : '0' ?>">
                                                            <label class="title_section" for="">{{ $product->title }}</label>
                                                        </div>
                                                    </li>
                                                    @php
                                                        $first = false;
                                                    @endphp
                                                @endforeach
                                            @endif
                                        </ul>
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
