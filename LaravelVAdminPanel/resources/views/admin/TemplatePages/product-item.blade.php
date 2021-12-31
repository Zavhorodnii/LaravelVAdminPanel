
<section class="content">
    <div class="js-get-post-id none" data-post-id="@if(isset($fields)){{ $fields['post_id'] }}@endif"></div>
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
                <a href="{{ route('all-product') }}">
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
                    <div data-index-selected="7" class="tab_section_tab_title">Особенности</div>
                    <div data-index-selected="8" class="tab_section_tab_title">Описание товара</div>
                    <div data-index-selected="9" class="tab_section_tab_title">Сопутствущие товары</div>
                </div>
                <div class="fields style_custom_scroll">
                    <div data-index-selected="1" class="section_tab_field active">

{{--                        <div class="section_input required field border_top padding_10 js_find_elem">--}}
{{--                            <div class="title_section">--}}
{{--                                Оглавление<span>*</span>--}}
{{--                            </div>--}}
{{--                            <input class="style_input_field js_paste_name"--}}
{{--                                   type="text" --}}
{{--                                   data-type-filed="inputField" --}}
{{--                                   data-base_name="title"--}}
{{--                                   name="repeater1_{{ $repeater1_key }}_title"--}}
{{--                                   value="{{ $repeater1_value['title'] }}">--}}
{{--                        </div>--}}

                        <div class="section_input field required border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Название товара<span>*</span>
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text"
                                   data-type-filed="inputField"
                                   data-base_name="title"
                                   name="title"
                                   value="@if(isset($fields['title'])){{ $fields['title'] }}@endif">
                        </div>

                        <div class="section_input field required border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Слаг товара<span>*</span>
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text"
                                   data-type-filed="inputField"
                                   data-base_name="slug"
                                   name="slug"
                                   value="@if(isset($fields['slug'])){{ $fields['slug'] }}@endif">
                        </div>

                        <div class="section_input field required border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Артикул товара<span>*</span>
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text"
                                   data-type-filed="inputField"
                                   data-base_name="sku"
                                   name="sku"
                                   value="@if(isset($fields['sku'])){{ $fields['sku'] }}@endif">
                        </div>
                    </div>
                    <div data-index-selected="2" class="section_tab_field none">
                        <div class="section_input field required border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Цена товара<span>*</span>
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="number"
                                   min="0"
                                   data-type-filed="inputField"
                                   data-base_name="price"
                                   name="price"
                                   value="@if(isset($fields['price'])){{ $fields['price'] }}@endif">
                        </div>

                        <div class="section_input field border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Акционная цена товара
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="number"
                                   min="0"
                                   data-type-filed="inputField"
                                   data-base_name="regular-price"
                                   name="regular-price"
                                   value="@if(isset($fields['regular-price'])){{ $fields['regular-price'] }}@endif">
                        </div>
                    </div>
                    <div data-index-selected="3" class="section_tab_field none">
                        <div class="section_input field border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Вес товара
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="number"
                                   data-type-filed="inputField"
                                   data-base_name="weight"
                                   name="weight"
                                   value="@if(isset($fields['weight'])){{ $fields['weight'] }}@endif">
                        </div>

                        <div class="section_input field border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Длина товара
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="number"
                                   data-type-filed="inputField"
                                   data-base_name="length"
                                   name="length"
                                   value="@if(isset($fields['length'])){{ $fields['length'] }}@endif">
                        </div>

                        <div class="section_input field border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Ширина товара
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="number"
                                   data-type-filed="inputField"
                                   data-base_name="width"
                                   name="width"
                                   value="@if(isset($fields['width'])){{ $fields['width'] }}@endif">
                        </div>

                        <div class="section_input field border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Высота товара
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="number"
                                   data-type-filed="inputField"
                                   data-base_name="height"
                                   name="height"
                                   value="@if(isset($fields['height'])){{ $fields['height'] }}@endif">
                        </div>

                        <div class="section_input field  border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Габаритные параметры товара
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text"
                                   data-type-filed="inputField"
                                   data-base_name="dimensions"
                                   name="dimensions"
                                   value="@if(isset($fields['dimensions'])){{ $fields['dimensions'] }}@endif">
                        </div>
                    </div>
                    <div data-index-selected="4" class="section_tab_field none">
                        <div class="multiple_section border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Категории
                            </div>
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
                            <div class="title_section">
                                Набор
                            </div>
                            <input class="style_input_field" type="text" placeholder="Поиск">
                            <div class="multiple_control">
                                <div class="multiple_field multiple_section_1 style_custom_scroll">
                                    <input type="custom_input_text" value="0">
                                    <ul class="mult_field">
                                        @if(isset($all_products))
                                            @php
                                                $index = 1;
                                            @endphp
                                            @foreach($all_products as $item)
                                                <?php
                                                $check = function($related_products) use ($item){
                                                    foreach ($related_products as $product){
                                                        if( $product[0]->id == $item->id)
                                                            return true;
                                                    }
                                                    return false;
                                                };
                                                $checked = false;
                                                if( isset($fields) ){
                                                    if( array_key_exists('set-products', $fields) ){
                                                        $checked = $check($fields['set-products']);
                                                    }
                                                }
                                                ?>
                                                <li class="copy_item <?php echo $checked ? 'checked' : '' ?>" data-item_id="{{ $item->id }}">
                                                    <div class="custom_selection_item" <?php echo $checked ? 'data-value="1"' : '' ?>>
                                                        <label class="title_section"
                                                               data-type-filed="multiple_field"
                                                               name="set-products_{{ $item->id }}"
                                                               data-value="{{ $item->id }}"
                                                               for="">{{ $item->title }}</label>
                                                    </div>
                                                </li>
                                                @php
                                                    $index++;
                                                @endphp
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="multiple_field multiple_section_2 style_custom_scroll">
                                    <input type="custom_input_text" value="0">
                                    <ul class="paste_clone mult_field selected_field">
                                        @if( @isset( $fields['set-products'] ) )
                                            @foreach( $fields['set-products'] as $item )
                                                <li class="copy_item remove" data-item_id="{{ $item[0]->id }}">
                                                    <div class="custom_selection_item" data-value="1">
                                                        <label class="title_section"
                                                               data-type-filed="multiple_field"
                                                               name="set-products_{{ $item[0]->id }}"
                                                               data-value="{{ $item[0]->id }}"
                                                               for="">{{ $item[0]->title }}</label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-index-selected="6" class="section_tab_field none">
                        <div class="repeater border_top padding_10" data-id="repeater-video" name="repeater-video">
                            <div class="title_section">
                                Видео</div>
                            <div class="content_repeater">

                                @if(isset($fields['repeater-video']))
                                    @foreach( $fields['repeater-video'] as $repeater_video_key => $repeater_video_value )
                                        <div class="content_section repeater_style">
                                            <div class="count_item">
                                                {{ $repeater_video_key }}
                                            </div>
                                            <div class="content_item">
                                                <div class="section_input required field border_top padding_10 js_find_elem">
                                                    <div class="title_section">
                                                        Ссылка<span>*</span>
                                                    </div>
                                                    <input class="style_input_field js_paste_name"
                                                           type="url"
                                                           data-type-filed="inputField"
                                                           data-base_name="video-link"
                                                           name="repeater-video_{{ $repeater_video_key }}_video-link"
                                                           value="{{ $repeater_video_value['video-link'] }}"
                                                    >
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
                            <div class="button_section @if(isset($fields['repeater-video'])) border_top @endif ">
                                <button class="add style_button repeater_button js_add_section" type="button">Добавить</button>
                            </div>
                        </div>
                        <div class="repeater border_top padding_10" data-id="repeater-addition" name="repeater-addition">
                            <div class="title_section">
                                Параиетры</div>
                            <div class="content_repeater">

                                @if(isset($fields['repeater-addition']))
                                    @foreach( $fields['repeater-addition'] as $repeater_addition_key => $repeater_addition_value )
                                        <div class="content_section repeater_style">
                                            <div class="count_item">
                                                {{ $repeater_addition_key }}
                                            </div>
                                            <div class="content_item">
                                                <div class="section_input field border_top padding_10 js_find_elem">
                                                    <div class="title_section">
                                                        Оглавление
                                                    </div>
                                                    <input class="style_input_field js_paste_name"
                                                           type="text"
                                                           data-type-filed="inputField"
                                                           data-base_name="title-addition-info"
                                                           name="repeater-addition_{{ $repeater_addition_key }}_title-addition-info"
                                                           value="{{ $repeater_addition_value['title-addition-info'] }}"
                                                    >
                                                </div>
                                                <div class="repeater border_top padding_10"
                                                     data-id="repeater-addition-item"
                                                     name="repeater-addition_{{ $repeater_addition_key }}_repeater-addition-item"
                                                     data-base_name="repeater-addition-item">
                                                    <div class="title_section">
                                                        Повторитель<span>*</span></div>
                                                    <div class="content_repeater">
                                                        @if(isset($repeater_addition_value['repeater-addition-item']))
                                                            @foreach( $repeater_addition_value['repeater-addition-item'] as $repeater_addition_info_key => $repeater_addition_info_value )
                                                                <div class="content_section repeater_style">
                                                                    <div class="count_item">
                                                                        {{ $repeater_addition_info_key }}
                                                                    </div>
                                                                    <div class="content_item">
                                                                        <div class="section_input field required border_top padding_10 js_find_elem">
                                                                            <div class="title_section">
                                                                                Параметр<span>*</span>
                                                                            </div>
                                                                            <input class="style_input_field js_paste_name"
                                                                                   type="text"
                                                                                   data-type-filed="inputField"
                                                                                   data-base_name="title-addition-info-item"
                                                                                   name="repeater-addition_{{ $repeater_addition_key }}_repeater-addition-item_{{ $repeater_addition_info_key }}_title-addition-info-item"
                                                                                   value="{{ $repeater_addition_info_value['title-addition-info-item'] }}"
                                                                            >
                                                                        </div>
                                                                        <div class="section_input field required border_top padding_10 js_find_elem">
                                                                            <div class="title_section">
                                                                                Значение<span>*</span>
                                                                            </div>
                                                                            <input class="style_input_field js_paste_name"
                                                                                   type="text"
                                                                                   data-type-filed="inputField"
                                                                                   data-base_name="value-addition-info-item"
                                                                                   name="repeater-addition_{{ $repeater_addition_key }}_repeater-addition-item_{{ $repeater_addition_info_key }}_value-addition-info-item"
                                                                                   value="{{ $repeater_addition_info_value['value-addition-info-item'] }}"
                                                                            >
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
                                                    <div class="button_section @if(isset($fields['repeater-addition-info'])) border_top @endif">
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
                            <div class="button_section @if(isset($fields['repeater-addition'])) border_top @endif ">
                                <button class="add style_button repeater_button js_add_section" type="button">Добавить</button>
                            </div>
                        </div>
                    </div>
                    <div data-index-selected="7" class="section_tab_field none">

                        <div class="section_input field border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Оглавление особенностей
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text"
                                   data-type-filed="inputField"
                                   data-base_name="features-title"
                                   name="features-title"
                                   value="@if(isset($fields['features-title'])){{ $fields['features-title'] }}@endif">
                        </div>
                        <div class="repeater border_top padding_10" data-id="repeater-features" name="repeater-features">
                            <div class="title_section">
                                Особенности</div>
                            <div class="content_repeater">

                                @if(isset($fields['repeater-features']))
                                    @foreach( $fields['repeater-features'] as $repeater_features_key => $repeater_features_value )
                                        <div class="content_section repeater_style">
                                            <div class="count_item">
                                                {{ $repeater_features_key }}
                                            </div>
                                            <div class="content_item">
                                                <div class="section_input required field border_top padding_10 js_find_elem">
                                                    <div class="title_section">
                                                        Особенность<span>*</span>
                                                    </div>
                                                    <input class="style_input_field js_paste_name"
                                                           type="text"
                                                           data-type-filed="inputField"
                                                           data-base_name="product-feature-item"
                                                           name="repeater-features_{{ $repeater_features_key }}_product-feature-item"
                                                           value="{{ $repeater_features_value['product-feature-item'] }}"
                                                    >
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
                            <div class="button_section @if(isset($fields['repeater-features'])) border_top @endif ">
                                <button class="add style_button repeater_button js_add_section" type="button">Добавить</button>
                            </div>
                        </div>

                    </div>
                    <div data-index-selected="8" class="section_tab_field none">

                        <div class="section_input field border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Оглавление описания
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text"
                                   data-type-filed="inputField"
                                   data-base_name="product-description-title"
                                   name="product-description-title"
                                   value="@if(isset($fields['product-description-title'])){{ $fields['product-description-title'] }}@endif">
                        </div>
                        <div class="text-area field section_input border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Описание
                            </div>
                            <textarea rows="5"
                                      class="style_input_field style_custom_scroll js_paste_name"
                                      data-type-filed="textareaInput"
                                      data-base_name="product-description"
                                      name="product-description"
                            >@if(isset($fields['product-description'])){{ $fields['product-description'] }}@endif</textarea>
                        </div>
                    </div>
                    <div data-index-selected="9" class="section_tab_field none">

                        <div class="section_input field border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Оглавление сопутствующих товаров
                            </div>
                            <input class="style_input_field js_paste_name"
                                   type="text"
                                   data-type-filed="inputField"
                                   data-base_name="related-products-title"
                                   name="related-products-title"
                                   value="@if(isset($fields['related-products-title'])){{ $fields['related-products-title'] }}@endif">
                        </div>
                        <div class="text-area field section_input border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Описание сооутствующих товаров
                            </div>
                            <textarea rows="3"
                                      class="style_input_field style_custom_scroll js_paste_name"
                                      data-type-filed="textareaInput"
                                      data-base_name="related-products-description"
                                      name="related-products-description"
                            >@if(isset($fields['related-products-description'])){{ $fields['related-products-description'] }}@endif</textarea>
                        </div>
                        <div class="multiple_section field border_top padding_10 js_find_elem">
                            <div class="title_section">
                                Товары
                            </div>
                            <input class="style_input_field" type="text" placeholder="Поиск">
                            <div class="multiple_control">
                                <?php
//                                var_export($fields['related-products']);
                                ?>
                                <div class="multiple_field multiple_section_1 style_custom_scroll">
                                    <input type="custom_input_text" value="0">
                                    <ul class="mult_field">
                                        @if(isset($all_products))
                                            @php
                                                $index = 1;
                                            @endphp
                                            @foreach($all_products as $item)
                                                <?php
                                                $check = function($related_products) use ($item){
                                                    foreach ($related_products as $product){
                                                        if( $product[0]->id == $item->id)
                                                            return true;
                                                    }
                                                    return false;
                                                };
                                                $checked = false;
                                                if( isset($fields) ){
                                                    if( array_key_exists('related-products', $fields) ){
                                                        $checked = $check($fields['related-products']);
                                                    }
                                                }
                                                ?>
                                                <li class="copy_item <?php echo $checked ? 'checked' : '' ?>" data-item_id="{{ $item->id }}">
                                                    <div class="custom_selection_item" <?php echo $checked ? 'data-value="1"' : '' ?>>
                                                        <label class="title_section"
                                                               data-type-filed="multiple_field"
                                                               name="related-products_{{ $item->id }}"
                                                               data-value="{{ $item->id }}"
                                                               for="">{{ $item->title }}</label>
                                                    </div>
                                                </li>
                                                @php
                                                    $index++;
                                                @endphp
                                            @endforeach
                                        @endif

                                    </ul>
                                </div>
                                <div class="multiple_field multiple_section_2 style_custom_scroll">
                                    <input type="custom_input_text" value="0">
                                    <ul class="paste_clone mult_field selected_field">
                                        @if( @isset( $fields['related-products'] ) )
                                            @foreach( $fields['related-products'] as $item )
                                                <li class="copy_item remove" data-item_id="{{ $item[0]->id }}">
                                                    <div class="custom_selection_item" data-value="1">
                                                        <label class="title_section"
                                                               data-type-filed="multiple_field"
                                                               name="related-products_{{ $item[0]->id }}"
                                                               data-value="{{ $item[0]->id }}"
                                                               for="">{{ $item[0]->title }}</label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="hide-content-repeater none">
            <div class="repeater-fields">
                <div data-id="repeater-video-fields">
                    <div class="content_section repeater_style">
                        <div class="count_item">
                            1
                        </div>
                        <div class="content_item">
                            <div class="section_input required field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Ссылка<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="url"
                                       data-type-filed="inputField"
                                       name="video-link">
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
                <div data-id="repeater-addition-fields">
                    <div class="content_section repeater_style">
                        <div class="count_item">
                            1
                        </div>
                        <div class="content_item">
                            <div class="section_input field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Оглавление
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text"
                                       data-type-filed="inputField"
                                       data-base_name="title-addition-info"
                                       name="title-addition-info">
                            </div>
                            <div class="repeater border_top padding_10" data-id="repeater-addition-item"
                                 name="repeater-addition-item">
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
                <div data-id="repeater-addition-item-fields">
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
                                       type="text"
                                       data-type-filed="inputField"
                                       data-base_name="title-addition-info-item"
                                       name="title-addition-info-item">
                            </div>
                            <div class="section_input field required border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Значение<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text"
                                       data-type-filed="inputField"
                                       data-base_name="value-addition-info-item"
                                       name="value-addition-info-item">
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
                <div data-id="repeater-features-fields">
                    <div class="content_section repeater_style">
                        <div class="count_item">
                            1
                        </div>
                        <div class="content_item">
                            <div class="section_input required field border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Особенность<span>*</span>
                                </div>
                                <input class="style_input_field js_paste_name"
                                       type="text"
                                       data-type-filed="inputField"
                                       data-base_name="product-feature-item"
                                       name="product-feature-item">
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
