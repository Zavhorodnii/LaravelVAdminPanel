@extends('admin.layout.app')

@section('page-title')
    Страницы
@endsection

@section('all-block-pages-menu')
    active
@endsection

@section('main-block-title')
    Страницы
@endsection

@section('all-pages-block-submenu-all')
    active
@endsection

@section('main-content')
    <section class="content ">
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

                <div class="control-tab">
                    <div class="header_text">Все блоки</div>
                    <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
                </div>
            </div>
            <div class="field_section_container">
                <div class="all_page">
                    <ul>

                        <li class="single-page border_top padding_10">
                            <div class="main_info">
                                <div class="">
                                    Оглавление блока
                                </div>
                            </div>
                            <div class="addition_info margin-0 addition_title">
{{--                                <div class="draft-info">--}}
{{--                                    <div class="update">Черновик</div>--}}
{{--                                </div>--}}
                                <div class="update-info">
                                    <div class="update">Дата</div>
                                </div>
                            </div>
                        </li>

                        @foreach( $blocks as $block)
                            <li class="single-page js-delete-item border_top padding_10">
                                <div class="main_info">
                                    <div class="title">
                                        <a href="{{ route('update-page', $block->id) }}" class="title_section">
                                            {{ $block->title }}
                                        </a>
                                    </div>
                                    <div class="control">
                                        <a href="{{ route('update-page', $block->id) }}" class="edit-page">Редактировать</a>
                                        <button type="button" data-block-id="{{ $block->id }}" class="remove-page js-delete-post-item ">удалить</button>
                                    </div>
                                </div>
                                <div class="addition_info">
{{--                                    <div class="draft-info">--}}
{{--                                        <div class="custom_checkbox js-ajax-check-control @if($block->draft === 1) checked @endif "> <!--checked-->--}}
{{--                                            <div class="custom_checkbox_square click js-change-draft-post "></div>--}}
{{--                                            <input class="custom_input_text" data-block-id="{{ $block->id }}" value="{{ $block->draft }}">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="update-info">
                                        <div class="update">Обновлено</div>
                                        <div class="update-date">{{ $block->updated_at }}</div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('right-aside')
    <aside class="sidebar_right ">

        <div class="field_section">
            <div class="field_section_header padding_10">

                <div class="control-tab">
                    <div class="header_text">Управление</div>
                    <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
                </div>
            </div>
            <div class="field_section_container">
                <div class="field_section_container_button border_top padding_10">
                    <a href="{{ route('create-page') }}" class="create aside-style-button style_button add-new-page">
                        Добавить запись
                    </a>
                </div>
            </div>
        </div>

    </aside>
@endsection


@section('ajaxUrl')
    <script>
        window.ajax_delete_post = '{{ route('delete-page') }}';
{{--        window.ajax_change_draft_status = '{{ route('product-draft') }}';--}}
    </script>
@endsection

@section('js-files')
    <script src="{{ mix('js/control_posts.js') }}"></script>
@endsection
