@extends('admin.layout.app')

@section('page-title')
    Section page
@endsection

@section('all-pages-menu')
    active
@endsection

@section('all-pages-submeny-all')
    active
@endsection

@section('main-content')
    <section class="content">
        <div class="field_section "> <!--hid_block-->
            <div class="field_section_header padding_10">
                <div class="header_text">Все страницы</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
            <div class="field_section_container">
                <div class="all_page">
                    <ul>

                        <li class="single-page border_top padding_10">
                            <div class="main_info">
                                <div class="">
                                    Оглавление страницы
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

                        <li class="single-page border_top padding_10">
                            <div class="main_info">
                                <div class="title">
                                    <a href="#" class="title_section">
                                        Главная страница
                                    </a>
                                </div>
                                <div class="control">
                                    <a href="#" class="edit-page">Редактировать</a>
                                    <a href="#" class="remove-page">удалить</a>
                                </div>
                            </div>
                            <div class="addition_info">
                                <div class="draft-info">
                                    <div class="custom_checkbox checked"> <!--checked-->
                                        <div class="custom_checkbox_square click"></div>
                                        <input class="custom_input_text" value="1">
                                    </div>
                                </div>
                                <div class="update-info">
                                    <div class="update">Обновлено</div>
                                    <div class="update-date">5.07.2021 в 12.17</div>
                                </div>
                            </div>
                        </li>
                        <li class="single-page border_top padding_10">
                            <div class="main_info">
                                <div class="title">
                                    <a href="#" class="title_section">
                                        Отзывы
                                    </a>
                                </div>
                                <div class="control">
                                    <a href="#" class="edit-page">Редактировать</a>
                                    <a href="#" class="remove-page">удалить</a>
                                </div>
                            </div>
                            <div class="addition_info">
                                <div class="draft-info">
                                    <div class="custom_checkbox checked"> <!--checked-->
                                        <div class="custom_checkbox_square click"></div>
                                        <input class="custom_input_text" value="1">
                                    </div>
                                </div>
                                <div class="update-info">
                                    <div class="update">Обновлено</div>
                                    <div class="update-date">5.07.2021 в 12.17</div>
                                </div>
                            </div>
                        </li>
                        <li class="single-page border_top padding_10">
                            <div class="main_info">
                                <div class="title">
                                    <a href="#" class="title_section">
                                        Доставка и оплата
                                    </a>
                                </div>
                                <div class="control">
                                    <a href="#" class="edit-page">Редактировать</a>
                                    <a href="#" class="remove-page">удалить</a>
                                </div>
                            </div>
                            <div class="addition_info">
                                <div class="draft-info">
                                    <div class="custom_checkbox checked"> <!--checked-->
                                        <div class="custom_checkbox_square click"></div>
                                        <input class="custom_input_text" value="1">
                                    </div>
                                </div>
                                <div class="update-info">
                                    <div class="update">Обновлено</div>
                                    <div class="update-date">5.07.2021 в 12.17</div>
                                </div>
                            </div>
                        </li>
                        <li class="single-page border_top padding_10">
                            <div class="main_info">
                                <div class="title">
                                    <a href="#" class="title_section">
                                        Установка
                                    </a>
                                </div>
                                <div class="control">
                                    <a href="#" class="edit-page">Редактировать</a>
                                    <a href="#" class="remove-page">удалить</a>
                                </div>
                            </div>
                            <div class="addition_info">
                                <div class="draft-info">
                                    <div class="custom_checkbox checked"> <!--checked-->
                                        <div class="custom_checkbox_square click"></div>
                                        <input class="custom_input_text" value="1">
                                    </div>
                                </div>
                                <div class="update-info">
                                    <div class="update">Обновлено</div>
                                    <div class="update-date">5.07.2021 в 12.17</div>
                                </div>
                            </div>
                        </li>
                        <li class="single-page border_top padding_10">
                            <div class="main_info">
                                <div class="title">
                                    <a href="#" class="title_section">
                                        Контакты
                                    </a>
                                </div>
                                <div class="control">
                                    <a href="#" class="edit-page">Редактировать</a>
                                    <a href="#" class="remove-page">удалить</a>
                                </div>
                            </div>
                            <div class="addition_info">
                                <div class="draft-info">
                                    <div class="custom_checkbox checked"> <!--checked-->
                                        <div class="custom_checkbox_square click"></div>
                                        <input class="custom_input_text" value="1">
                                    </div>
                                </div>
                                <div class="update-info">
                                    <div class="update">Обновлено</div>
                                    <div class="update-date">5.07.2021 в 12.17</div>
                                </div>
                            </div>
                        </li>
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
                <div class="header_text">Управление</div>
                <div class="header_icon"><i class="fas fa-chevron-up"></i></div>
            </div>
            <div class="field_section_container">
                <div class="field_section_container_button border_top padding_10">
                    <button class="save style_button add-new-page" type="button">Добавить страницу</button>
                </div>
            </div>
        </div>

    </aside>
@endsection
