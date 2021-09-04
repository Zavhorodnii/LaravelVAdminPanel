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
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</aside>
