@extends('admin.layout.app')

@section('page-title')
    Каталог
@endsection

@section('all-block-menu')
    active
@endsection

@section('main-block-title')
    Каталог
@endsection

@section('all-catalog-submeny-all')
    active
@endsection

@section('main-content')
    <section class="content ">
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
                            <div class="addition_info addition_title">
                                <div class="draft-info">
                                    <div class="update">Черновик</div>
                                </div>
                                <div class="update-info">
                                    <div class="update">Дата</div>
                                </div>
                            </div>
                        </li>

                        @foreach( $blocks as $block)
                            <li class="single-page border_top padding_10">
                                <div class="main_info">
                                    <div class="title">
                                        <a href="{{ route('edit-return-block', $block->id) }}" class="title_section">
                                            {{ $block->post_title }}
                                        </a>
                                    </div>
                                    <div class="control">
                                        <a href="{{ route('edit-return-block', $block->id) }}" class="edit-page">Редактировать</a>
                                        <button type="button" data-block-id="{{ $block->id }}" class="remove-page js-delete-return-item ">удалить</button>
                                    </div>
                                </div>
                                <div class="addition_info">
                                    <div class="draft-info">
                                        <div class="custom_checkbox js-ajax-check-control @if($block->draft === 1) checked @endif "> <!--checked-->
                                            <div class="custom_checkbox_square click"></div>
                                            <input class="custom_input_text" data-block-id="{{ $block->id }}" value="{{ $block->draft }}">
                                        </div>
                                    </div>
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
                    <a href="{{ route('create-catalog-item') }}" class="create aside-style-button style_button add-new-page">
                        Добавить запись
                    </a>
                </div>
            </div>
        </div>

    </aside>
@endsection


@section('ajaxUrl')
    <script>
        window.ajaxDeleteReturnItem = '{{ route('delete-return-item') }}';
        window.ajaxChangeDraftStatus = '{{ route('change-draft-status') }}';
    </script>
@endsection

@section('js-files')
    <script src="{{ mix('js/main_all_block.js') }}"></script>
@endsection
