<aside class="sidebar ">
    <div class="sidebar_position block_open_sub_menu style_custom_scroll"> <!-- active -->

        <div class="sidebar_content">

            <ul class="sidebar_menu_items_list">
                <li>
                    <div class="sidebar_menu_item ladmin">
                        <div class="sidebar_menu_icon">
                            <div class="menu_area">
                                <div class="menu"></div>
                            </div>
                        </div>
                        <div class="sidebar_menu_text">
                            LAdmin
                        </div>
                    </div>
                </li>

                <li>
                    <div class="control_menu @yield('all-block-menu')"><!-- active -->
                        <div class="main_menu sidebar_menu_item ">
                            <a href="{{ route('all-catalog-page') }}">
                                        <span class="sidebar_menu_icon">
                                            <i class="fas fa-file"></i>
                                        </span>
                            </a>
                            <a href="{{ route('all-catalog-page') }}">
                                <span class="sidebar_menu_text">Блоки</span>
                            </a>
                            <span class="sidebar_control_menu_item js-open-close-menu"><!-- none -->
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                        </div>
                        <ul class="sidebar_menu_items">
                            <li>
                                <a href="{{ route('all-benefits') }}" class="sidebar_menu_item @yield('all-benefits-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Выгоды
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-text-block') }}" class="sidebar_menu_item @yield('all-text-block-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Текстовые блоки
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-catalog-page') }}" class="sidebar_menu_item @yield('all-catalog-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Каталог
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('guarantees-page') }}" class="sidebar_menu_item @yield('all-guarantees-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Гарантии
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-how-we-work-page') }}" class="sidebar_menu_item @yield('all-how-we-work-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Как мы работаем
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="control_menu @yield('all-block-review-menu')"><!-- active -->
                        <div class="main_menu sidebar_menu_item ">
                            <a href="{{ route('all-review-title') }}">
                                        <span class="sidebar_menu_icon">
                                            <i class="fas fa-file"></i>
                                        </span>
                            </a>
                            <a href="{{ route('all-review-title') }}">
                                <span class="sidebar_menu_text">Отзывы</span>
                            </a>
                            <span class="sidebar_control_menu_item js-open-close-menu"><!-- none -->
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                        </div>
                        <ul class="sidebar_menu_items">
                            <li>
                                <a href="{{ route('all-review-title') }}" class="sidebar_menu_item @yield('all-review-title-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Оглавление блока
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-text-review') }}" class="sidebar_menu_item @yield('all-text-review-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Текствовые отзывы
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-video-review') }}" class="sidebar_menu_item @yield('all-video-review-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Видео отзывы
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-audio-review') }}" class="sidebar_menu_item @yield('all-audio-review-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Аудио отзывы
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</aside>
