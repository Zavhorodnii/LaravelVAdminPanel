
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
                <a href="{{ route('all-bestseller') }}">
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
                    Название блока
                </div>
                <input class="style_input_field js_paste_name"
                       type="text"
                       data-type-filed="inputField"
                       data-base_name="title"
                       name="title"
                       value="@if(isset($fields['title'])){{ $fields['title'] }}@endif">
            </div>
            <div class="section_input field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Название ссылки всех хитов
                </div>
                <input class="style_input_field js_paste_name"
                       type="text"
                       data-type-filed="inputField"
                       data-base_name="title"
                       name="all-text-title"
                       value="@if(isset($fields['all-text-title'])){{ $fields['all-text-title'] }}@endif">
            </div>
            <div class="section_input field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Ссылка всех хитов
                </div>
                <input class="style_input_field js_paste_name"
                       type="text"
                       data-type-filed="inputField"
                       data-base_name="title"
                       name="all-text-link"
                       value="@if(isset($fields['all-text-link'])){{ $fields['all-text-link'] }}@endif">
            </div>

            <div class="switch_section border_top padding_10 js_find_elem">
                <div class="title_section">Показать слайдером</div>
                <input class="switch_status none js_paste_name" data-type-filed="switchField" name="slider-block" value="{{ $fields['slider-block'] ?? '1' }}">
                <div class="custom_switch @if(isset($fields['slider-block'])) <?php echo $fields['slider-block'] == 1 ? '' : 'switch_off' ?> @endif"><!-- switch_off --->
                    <div class="custom_switch_on switch_style">ВКЛ</div>
                    <div class="custom_switch_off switch_style">ВЫКЛ</div>
                    <div class="switch_closed"></div>
                </div>
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
</section>
