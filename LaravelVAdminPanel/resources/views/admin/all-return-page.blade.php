@extends('admin.layout.app')

@section('page-title')
    Возврат
@endsection

@section('all-block-menu')
    active
@endsection

@section('all-return-submeny-all')
    active
@endsection

@section('main-content')
    <section class="content">
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
                                        <a href="{{ route('edit-return-clock', $block->id) }}" class="title_section">
                                            {{ $block->post_title }}
                                        </a>
                                    </div>
                                    <div class="control">
                                        <a href="{{ route('edit-return-clock', $block->id) }}" class="edit-page">Редактировать</a>
                                        <a href="#" class="remove-page">удалить</a>
                                    </div>
                                </div>
                                <div class="addition_info">
                                    <div class="draft-info">
                                        <div class="custom_checkbox @if($block->draft === 1)
                                            checked
                                            @endif
                                            "> <!--checked-->
                                            <div class="custom_checkbox_square click"></div>
                                            <input class="custom_input_text" value="{{ $block->draft }}">
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
    <aside class="sidebar_right">

        <div class="field_section">
            <div class="field_section_header padding_10">

                <div class="control-tab">
                    <div class="header_text">Управление3</div>
                    <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
                </div>
            </div>
            <div class="field_section_container">
                <div class="field_section_container_button border_top padding_10">
                    <a href="{{ route('create-return-block') }}" class="create style_button add-new-page">
                        Добавить запись
                    </a>
                </div>
            </div>
        </div>

    </aside>
@endsection
