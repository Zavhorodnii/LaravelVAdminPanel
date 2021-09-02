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
                    <div class="control_menu @yield('all-pages-menu')"><!-- active -->
                        <div class="main_menu sidebar_menu_item ">
                            <a href="{{ route('all_pages') }}">
                                <span class="sidebar_menu_icon">
                                    <i class="fas fa-file"></i>
                                </span>
                            </a>
                            <a href="{{ route('all_pages') }}">
                                <span class="sidebar_menu_text">Страницы</span>
                            </a>
                            <span class="sidebar_control_menu_item js-open-close-menu"><!-- none -->
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </div>
                        <ul class="sidebar_menu_items">
                            <li>
                                <a href="{{ route('all_pages') }}" class="sidebar_menu_item @yield('all-pages-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Все страницы
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <div class="control_menu @yield('all-block-menu')"><!-- active -->
                        <div class="main_menu sidebar_menu_item ">
                            <a href="{{ route('all-gifts-page') }}">
                                        <span class="sidebar_menu_icon">
                                            <i class="fas fa-file"></i>
                                        </span>
                            </a>
                            <a href="{{ route('all-gifts-page') }}">
                                <span class="sidebar_menu_text">Блоки</span>
                            </a>
                            <span class="sidebar_control_menu_item js-open-close-menu"><!-- none -->
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                        </div>
                        <ul class="sidebar_menu_items">
                            <li>
                                <a href="{{ route('all-gifts-page') }}" class="sidebar_menu_item @yield('all-gifts-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Подарки
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-ads-page') }}" class="sidebar_menu_item @yield('all-ads-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Объявления
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
                                <a href="{{ route('guarantees-page') }}" class="sidebar_menu_item @yield('all-return-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Гарантии
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-bestsellers-page') }}" class="sidebar_menu_item @yield('all-bestsellers-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Хиты продаж
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-stock-kits-page') }}" class="sidebar_menu_item @yield('all-stock-kits-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Комплекты на акции
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-review-page') }}" class="sidebar_menu_item @yield('all-reviews-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Отзывы
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-feedback-page') }}" class="sidebar_menu_item @yield('all-feedback-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Обратная связь
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
                            <li>
                                <a href="{{ route('all-delivery-page') }}" class="sidebar_menu_item @yield('all-delivery-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Доставка
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-gallery-page') }}" class="sidebar_menu_item @yield('all-gallery-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Галерея
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="control_menu"><!-- active -->
                        <div class="main_menu sidebar_menu_item ">
                            <a href="{{ route('all-products') }}">
                                        <span class="sidebar_menu_icon">
                                            <i class="fas fa-file"></i>
                                        </span>
                            </a>
                            <a href="{{ route('all-products') }}">
                                <span class="sidebar_menu_text">Товары</span>
                            </a>
                            <span class="sidebar_control_menu_item js-open-close-menu"><!-- none -->
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                        </div>
                        <ul class="sidebar_menu_items">
                            <li>
                                <a href="{{ route('all-products') }}" class="sidebar_menu_item active">
                                    <span class="sidebar_menu_text">Все товары</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="sidebar_menu_item">
                                    <span class="sidebar_menu_text">Открытое меню</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="sidebar_menu_item">
                                    <span class="sidebar_menu_text">Открытое меню</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="control_menu "><!-- active -->
                        <div class="main_menu sidebar_menu_item ">
                            <a href="#">
                                <span class="sidebar_menu_icon">
                                    <i class="fas fa-file"></i>
                                </span>
                            </a>
                            <a href="#">
                                <span class="sidebar_menu_text">Открытое меню2</span>
                            </a>
                            <span class="sidebar_control_menu_item js-open-close-menu none"><!-- none -->
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </div>
                        <ul class="sidebar_menu_items">
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="control_menu "><!-- active -->
                        <div class="main_menu sidebar_menu_item ">
                            <a href="#">
                                        <span class="sidebar_menu_icon">
                                            <i class="fas fa-file"></i>
                                        </span>
                            </a>
                            <a href="#">
                                <span class="sidebar_menu_text">Открытое меню</span>
                            </a>
                            <span class="sidebar_control_menu_item js-open-close-menu"><!-- none -->
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                        </div>
                        <ul class="sidebar_menu_items">
                            <li>
                                <a href="#" class="sidebar_menu_item active">
                                    <span class="sidebar_menu_text">Открытое меню Открытое меню Открытое меню Открытое меню Открытое меню Открытое меню Открытое меню Открытое меню Открытое меню</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="sidebar_menu_item">
                                    <span class="sidebar_menu_text">Открытое меню</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="sidebar_menu_item">
                                    <span class="sidebar_menu_text">Открытое меню</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</aside>
