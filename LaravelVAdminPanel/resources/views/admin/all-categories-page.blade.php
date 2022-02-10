@extends('admin.layout.app')

@section('page-title')
    Все категории
@endsection

@section('all-block-categories-menu')
    active
@endsection

@section('main-block-title')
    Категории
@endsection

@section('all-categories-block-submeny-all')
    active
@endsection

@section('main-content')
    <section class="content ">
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
                                    Категории
                                </div>
                            </div>
                        </li>

                        @foreach( $blocks as $block)
                            <li class="single-page js-delete-item border_top padding_10">
                                <div class="main_info">
                                    <div class="title">
                                        <a href="{{ route('update-category', $block['id']) }}" class="title_section">
                                            {{ $block['title'] }}
                                        </a>
                                    </div>
                                    <div class="control">
                                        <a href="{{ route('update-category', $block['id']) }}" class="edit-page">Редактировать</a>
                                        <button type="button" data-block-id="{{ $block['id'] }}" class="remove-page reload_page js-delete-post-item ">удалить</button>
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
                    <a href="{{ route('create-category') }}" class="create aside-style-button style_button add-new-page">
                        Добавить запись
                    </a>
                </div>
            </div>
        </div>

    </aside>
@endsection


@section('ajaxUrl')
    <script>
        window.ajax_delete_post = '{{ route('delete-category') }}';
        {{--window.ajax_change_draft_status = '{{ route('product-draft') }}';--}}
    </script>
@endsection

@section('js-files')
    <script src="{{ mix('js/control_posts.js') }}"></script>
@endsection
