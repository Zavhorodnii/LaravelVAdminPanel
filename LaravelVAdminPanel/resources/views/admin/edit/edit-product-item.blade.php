@extends('admin.layout.app')

@section('page-title')
    Товар
@endsection

@section('all-block-product-menu')
    active
@endsection

@section('all-product-block-submeny-all')
    active
@endsection

@section('main-content')
    @include('admin.TemplatePages.product-item')
@endsection

@section('right-aside')
    <aside class="sidebar_right">

        <div class="field_section">
            <div class="field_section_header padding_10">
                <div class="control-tab">
                    <div class="header_text">Управление</div>
                    <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
                </div>
            </div>

            <div class="field_section_container">
                <div class="checkbox_field section_input border_top padding_10 js_find_elem">
                    <input type="text"
                           class="none js_paste_name"
                           name="name7" value="">
                    <ul>
                        <li>
                            <div class="custom_checkbox @if(isset($fields['draft']))@if($fields['draft'] == 1) checked @endif @endif">
                                <!--checked-->
                                <div class="custom_checkbox_square click"></div>
                                <input class="custom_input_text"
                                       value="@if(isset($fields['draft'])){{ $fields['draft'] }}@endif">
                                <label class="title_section click"
                                       for="">
                                    Черновик
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="field_section_container_button border_top padding_10">
                    <button class="button aside-style-button style_button add-new-page js-update-post-item" type="button">
                        Обновить запись
                    </button>
                </div>
                <div class="field_section_container_button border_top padding_10">
                    <button class="delete aside-style-button style_button add-new-page js-delete-post-item" type="button">
                        Удалить запись
                    </button>
                </div>
            </div>
        </div>

        <div class="field_section field_section_container">

            <div class="image field required border_top padding_10 js_find_elem">
                <div class="title_section">
                    Изображение товара<span>*</span></div>
                <button class="choice js-open-file-popup style_button @if($fields['product-image']['status'] == 'ok') none @endif"
                        type="file" data-popup="show-popup">Выбрать
                </button>
                <div class="image_section @if($fields['product-image']['status'] == 'error') none @endif">
                    <img class="selected_image js_paste_name js-paste-selected-file"
                         data-type-filed="imageField"
                         name="product-image" data-base_name="product-image"
                         src="@if($fields['product-image']['status'] == 'ok') {{ $fields['product-image']['url'] }} @endif"
                         alt="" data-id="@if($fields['product-image']['status'] == 'ok') {{ $fields['product-image']['id'] }} @endif">
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

        </div>
        <div class="field_section ">

            <div class="field_section_header padding_10">
                <div class="control-tab">
                    <div class="header_text">Галерея</div>
                    <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
                </div>
            </div>

            <div class="repeater field_section_container  border_top padding_10" data-id="repeater-gallery" name="repeater-gallery">
                <div class="title_section">
                    Галерея
                </div>
                <div class="content_repeater">

                    @if(isset($fields['repeater-gallery']))
                        @foreach( $fields['repeater-gallery'] as $repeater_gallery_key => $repeater_gallery_value )
                            <div class="content_section repeater_style">
                                <div class="count_item">
                                    {{ $repeater_gallery_key }}
                                </div>
                                <div class="content_item">
                                    <div class="image field border_top padding_10 js_find_elem">
                                        <div class="title_section">
                                            Галерея
                                        </div>
                                        <button class="choice js-open-file-popup style_button @if($repeater_gallery_value['file-id']['status'] == 'ok') none @endif"
                                                type="file" data-popup="show-popup">Выбрать
                                        </button>
                                        <div class="image_section @if($repeater_gallery_value['file-id']['status'] == 'error') none @endif">
                                            <img class="selected_image gallery js_paste_name js-paste-selected-file"
                                                 data-type-filed="imageField"
                                                 name="repeater-gallery_{{ $repeater_gallery_key }}_gallery" data-base_name="gallery"
                                                 src="@if($repeater_gallery_value['file-id']['status'] == 'ok') {{ $repeater_gallery_value['file-id']['url'] }} @endif"
                                                 alt="" data-id="@if($repeater_gallery_value['file-id']['status'] == 'ok') {{ $repeater_gallery_value['file-id']['id'] }} @endif">
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

        <div class="hide-content-repeater none">
            <div class="repeater-fields">
                <div data-id="repeater-gallery-fields">
                    <div class="content_section repeater_style">
                        <div class="count_item">
                            1
                        </div>
                        <div class="content_item">
                            <div class="image field required border_top padding_10 js_find_elem">
                                <div class="title_section">
                                    Изображение<span>*</span></div>
                                <button class="choice js-open-file-popup style_button"
                                        type="file" data-popup="show-popup">Выбрать
                                </button>
                                <div class="image_section none">
                                    <img class="selected_image gallery js_paste_name js-paste-selected-file"
                                         type="text" data-type-filed="imageField"  name="gallery"
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

    </aside>
@endsection

@section('popup-upload')
    @include('admin.include.popup-files')
@endsection

@section('main-block-title')
    Редактирование записи
@endsection


@section('ajaxUrl')
{{--    <script>--}}
{{--        tinymce.init({--}}
{{--            selector: 'textarea'--}}
{{--        });--}}
{{--    </script>--}}
    <script>
        window.ajax_update_post = '{{ route('create-product-item') }}';
        window.ajax_delete_post = '{{ route('delete-product') }}';
    </script>
@endsection

@section('js-files')
    <script src="{{ mix('js/control_posts.js') }}"></script>
@endsection
