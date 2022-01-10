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
                            <a href="{{ route('all-benefits') }}">
                                        <span class="sidebar_menu_icon">
                                            <i class="fas fa-file"></i>
                                        </span>
                            </a>
                            <a href="{{ route('all-benefits') }}">
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
                            <li>
                                <a href="{{ route('all-gallery-page') }}" class="sidebar_menu_item @yield('all-gallery-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Галерея
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-bestseller') }}" class="sidebar_menu_item @yield('all-bestseller-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Хиты продаж
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('gift-page') }}" class="sidebar_menu_item @yield('all-gift-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Подарки
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
                <li>
                    <div class="control_menu @yield('all-block-delivery-menu')"><!-- active -->
                        <div class="main_menu sidebar_menu_item ">
                            <a href="{{ route('all-delivery-block-page') }}">
                                        <span class="sidebar_menu_icon">
                                            <i class="fas fa-file"></i>
                                        </span>
                            </a>
                            <a href="{{ route('all-delivery-block-page') }}">
                                <span class="sidebar_menu_text">Доставка</span>
                            </a>
                            <span class="sidebar_control_menu_item js-open-close-menu"><!-- none -->
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                        </div>
                        <ul class="sidebar_menu_items">
                            <li>
                                <a href="{{ route('all-delivery-block-page') }}" class="sidebar_menu_item @yield('all-delivery-block-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Оглавление блока
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-delivery-price-page') }}" class="sidebar_menu_item @yield('all-delivery-price-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Цена
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-delivery-day-page') }}" class="sidebar_menu_item @yield('all-delivery-day-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Дни доставки
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('all-delivery-address') }}" class="sidebar_menu_item @yield('all-delivery-address-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Адреса доставки
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="control_menu @yield('all-block-product-menu')"><!-- active -->
                        <div class="main_menu sidebar_menu_item ">
                            <a href="{{ route('all-product') }}">
                                        <span class="sidebar_menu_icon">
                                            <i class="fas fa-file"></i>
                                        </span>
                            </a>
                            <a href="{{ route('all-product') }}">
                                <span class="sidebar_menu_text">Товары</span>
                            </a>
                            <span class="sidebar_control_menu_item js-open-close-menu"><!-- none -->
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                        </div>
                        <ul class="sidebar_menu_items">
                            <li>
                                <a href="{{ route('all-product') }}" class="sidebar_menu_item @yield('all-product-block-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Товавы
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="control_menu @yield('all-block-categories-menu')"><!-- active -->
                        <div class="main_menu sidebar_menu_item ">
                            <a href="{{ route('all-categories') }}">
                                        <span class="sidebar_menu_icon">
                                            <i class="fas fa-file"></i>
                                        </span>
                            </a>
                            <a href="{{ route('all-categories') }}">
                                <span class="sidebar_menu_text">Категории</span>
                            </a>
                            <span class="sidebar_control_menu_item js-open-close-menu"><!-- none -->
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                        </div>
                        <ul class="sidebar_menu_items">
                            <li>
                                <a href="{{ route('all-categories') }}" class="sidebar_menu_item @yield('all-categories-block-submeny-all')">
                                    <span class="sidebar_menu_text">
                                        Все категории
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="control_menu @yield('all-block-site_menu-menu')"><!-- active -->
                        <div class="main_menu sidebar_menu_item ">
                            <a href="{{ route('site-menu-page') }}">
                                        <span class="sidebar_menu_icon">
                                            <i class="fas fa-file"></i>
                                        </span>
                            </a>
                            <a href="{{ route('site-menu-page') }}">
                                <span class="sidebar_menu_text">Настройки сайта</span>
                            </a>
                            <span class="sidebar_control_menu_item js-open-close-menu"><!-- none -->
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                        </div>
                        <ul class="sidebar_menu_items">
                            <li>
                                <a href="{{ route('site-menu-page') }}" class="sidebar_menu_item @yield('all-site_menu-block-submenu-all')">
                                    <span class="sidebar_menu_text">
                                        Меню сайта
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('social-link-page') }}" class="sidebar_menu_item @yield('all-social_link-block-submenu-all')">
                                    <span class="sidebar_menu_text">
                                        Соц сети
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('payment-page') }}" class="sidebar_menu_item @yield('all-payment-block-submenu-all')">
                                    <span class="sidebar_menu_text">
                                        Оплата
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('settings-site-page') }}" class="sidebar_menu_item @yield('all-settings-site-block-submenu-all')">
                                    <span class="sidebar_menu_text">
                                        Общие настройки
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
