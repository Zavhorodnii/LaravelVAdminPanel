
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
                <a href="{{ route('all-categories') }}">
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
                    Название<span>*</span>
                </div>
                <input class="style_input_field js_paste_name"
                       type="text"
                       data-type-filed="inputField"
                       data-base_name="title"
                       name="title"
                       value="{{ $fields['title'] ?? '' }}">
            </div>
            <div class="section_input field required border_top padding_10 js_find_elem">
                <div class="title_section">
                    Слаг<span>*</span>
                </div>
                <div class="help_text">Уникальное поле! <br>Убедитеcь, что такого слага больше не существует</div>
                <input class="style_input_field js_paste_name"
                       type="text"
                       data-type-filed="inputField"
                       data-base_name="slug"
                       name="slug"
                       value="{{ $fields['slug'] ?? '' }}">
            </div>


            <div class="select_list field border_top padding_10 js_find_elem">
                <div class="title_section">Родительская категория</div>
                <div class="single_selected_field">
                    <div class="single_selected_item style_input_field">

                        <div class="item_text js_paste_name"
                             type="text"
                             name="сategory-id"
                             data-type-filed="multiSelectField"
                             data-product-id="{{ $fields['сategories-id']->id ?? '' }}"
                             data-base_name="сategory-id">{{ $fields['сategories-id']->title ?? 'Нету' }}
                        </div>

                        <div class="item_icon ">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="single_items_container style_custom_scroll container_hidden">
                        <!-- container_hidden -->
                        <ul>
                            <li>
                                <div class="custom_selection_item {{ isset($fields['сategories-id']) ? '' : 'checked' }} "
                                     data-product-id="" data-value="{{ isset($fields['сategories-id']) ? '0' : '1' }}">
                                    <label class="title_section" for="">Нету</label>
                                </div>
                            </li>

                            @if( @isset( $all_categories ))
                                @foreach( $all_categories as $product )
                                    @php
                                        $selected = false;
                                        if ( isset($fields['сategories-id']->id))
                                            $selected = $product['id'] == $fields['сategories-id']->id;
                                    @endphp
                                    <li>
                                        <div class="custom_selection_item {{ $selected ? 'checked' : '' }} "
                                             data-product-id="{{ $product['id'] }}" data-value="{{ $selected ? '1' : '0' }}">
                                            <label class="title_section" for="">{{ $product['title'] }}</label>
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
