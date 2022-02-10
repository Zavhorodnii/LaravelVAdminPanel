
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
                <a href="{{ route('all-pages-page') }}">
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
                    Оглавление страницы<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text"
                       data-type-filed="inputField"
                       data-base_name="title"
                       name="title"
                       value="{{ $fields['title'] ?? '' }}">
            </div>
            <div class="section_input field border_top padding_10 js_find_elem">
                <div class="title_section">
                    Слаг страницы
                </div>
                <input class="style_input_field js_paste_name"
                       type="text"
                       data-type-filed="inputField"
                       data-base_name="slug"
                       name="slug"
                       value="{{ $fields['slug'] ?? '' }}">
            </div>


            <div class="multiple_section border_top padding_10 js_find_elem">
                <div class="title_section">
                    Блоки
                </div>
                <input class="style_input_field" type="text" placeholder="Поиск">
                <div class="multiple_control">
                    <div class="multiple_field multiple_section_1 style_custom_scroll">
                        <input type="custom_input_text" value="0">
                        <ul class="mult_field">
                            @if(isset( $categories ))
                                @php
                                    $index = 1;
                                @endphp
                                @foreach($categories as $item)
                                    <?php
                                    $check = function($related_products) use ($item){
                                        foreach ($related_products as $product){
                                            if( $product['id'] == $item['id'])
                                                return true;
                                        }
                                        return false;
                                    };
                                    $checked = false;
                                    if( isset($fields) ){
                                        if( array_key_exists('block', $fields) ){
                                            $checked = $check($fields['block']);
                                        }
                                    }
                                    ?>
                                    <li class="copy_item <?php echo $checked ? 'checked' : '' ?>" data-item_id="{{ $item['id'] }}">
                                        <div class="custom_selection_item" <?php echo $checked ? 'data-value="1"' : '' ?>>
                                            <label class="title_section"
                                                   data-type-filed="multiple_field"
                                                   name="block_{{ $item['id'] }}"
                                                   data-value="{{ $item['id'] }}"
                                                   for="">{{ $item['title'] }}</label>
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
                            @if(isset( $fields['block'] ))
                                @php
                                    $index = 1;
                                @endphp
                                @foreach($fields['block'] as $item)
                                    @php
                                        $title = '';
                                        $check = function($categories) use ($item, &$title){
                                            foreach ($categories as $category){
                                                if( $category['id'] == $item['id']){
                                                    $title = $category['title'];
                                                    return true;
                                                }
                                            }
                                            return false;
                                        };
                                        $checked = false;
                                        if( isset($fields) ){
                                            if( array_key_exists('block', $fields) ){
                                                $checked = $check($categories);
                                            }
                                        }
                                    @endphp
                                    @if( !$checked)
                                        @continue
                                    @endif
                                    <li class="copy_item remove" data-item_id="{{ $item['id'] }}">
                                        <div class="custom_selection_item" data-value="1">
                                            <label class="title_section"
                                                   data-type-filed="multiple_field"
                                                   name="block_{{ $item['id'] }}"
                                                   data-value="{{ $item['id'] }}"
                                                   for="">{{ $title }}</label>
                                        </div>
                                    </li>
                                    @php
                                        $index++;
                                    @endphp
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

        </div>


    </div>
</section>
