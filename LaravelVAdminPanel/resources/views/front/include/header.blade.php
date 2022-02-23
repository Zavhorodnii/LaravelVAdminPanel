
<header class="header active">
    <div class="header__top">
        <div class="container">
            <nav class="header__menu">
                <ul>
                    <li><a href="#">Отзывы </a></li>
                    <li><a href="#">Доставка и оплата</a></li>
                    <li><a href="#">Установка</a></li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="header__center header-center">
        <div class="container">
            <div class="header-center__wrapper">
                <div class="header-center__left">
                    <div class="header__logo logo">
                        <a href="{{ \Illuminate\Support\Facades\URL::to("/") }}" class="logo__link">
                            <picture>
                                <source srcset="{{ \Illuminate\Support\Facades\URL::asset( $siteSettings['siteSettings']['file-id']['url'] ) }}" type="image/webp">
                                <img src="{{ \Illuminate\Support\Facades\URL::asset( $siteSettings['siteSettings']['file-id']['url'] ) }}" alt="Logo">
                            </picture>
                        </a>
                    </div>
                    <div class="header-center__descr">
                        {!! $siteSettings['siteSettings']['header-text'] !!}
                    </div>
                </div>
                <div class="header-center__right">
                    <div class="header-center__info">
                        <span>{{$siteSettings['siteSettings']['work-time'] }}</span>
                        <a href="tel:+375291270216" class="header-center__phone">
                            <div class="header-center__phone-icon icon">
                                <svg>
                                    <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#phone">
                                    </use>
                                </svg>
                            </div>
                            <span>{{$siteSettings['siteSettings']['phone'] }}</span>
                        </a>
                    </div>
                    <div class="header-center__btn-wrap">
                        <a href="" class="header-center__btn btn">Заказать звонок</a>
                    </div>
                    <div class="header-center__basket basket">
                        <a href="{{ route('cart.page') }}" class="header-center__basket-link">
                            <div class="header-center__basket-icon icon">
                                <svg>
                                    <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#cart">
                                    </use>
                                </svg>

                                <span class="js-paste-cart-count">{{ $cart_info['cartCount'] ?? '0' }}</span>
                            </div>
                        </a>
                        <div class="basket__wrap">
                            <div class="basket__content basket__content--empty js-paste-all-basket">
                                @if(isset($cart_info['products']) && count($cart_info['products']) > 0 )
                                    <div class="basket__items">
                                        <div class="basket__item ">
                                        @foreach( $cart_info['products'] as $key => $item )
                                            @if( $key == 'gift')
                                                @continue
                                            @endif
                                                <div class="basket__top js-get-cart-item js-cart-elem " data-product-id="{{$item['id']}}">
                                                    <div class="basket__left">
                                                        <a href="{{ route('product-page', $item['attributes']['slug']) }}" class="basket__img ibg">
                                                            <picture>
                                                                <source srcset="{{ \Illuminate\Support\Facades\URL::asset( $item['attributes']['image'] ) }}" type="image/webp">
                                                                <img src="{{ \Illuminate\Support\Facades\URL::asset( $item['attributes']['image'] ) }}" alt="Gantelya">
                                                            </picture>
                                                        </a>
                                                        <a href="{{ route('product-page', $item['attributes']['slug']) }}" class="basket__name">{{ $item['name'] }}</a>
                                                    </div>
                                                    <div class="basket__right">
                                                        <div class="basket__count">
                                                            <span class="js-paste-quantity">{{ $item['quantity'] }}</span>*{{ $item['price'] }} руб
                                                        </div>
                                                        <div class="basket__delete">

                                                            <div class="basket__icon icon js-remove-product" >
                                                                <svg>
                                                                    <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#delete">
                                                                    </use>
                                                                </svg>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach
                                        @if(isset($cart_info['products']['gift']))
                                            @php
                                                $item = $cart_info['products']['gift'];
                                            @endphp
                                                <div class="basket__top js-remove-gift js-cart-elem js-get-cart-item" data-product-id="{{$item['id']}}">
                                                    <div class="basket__left">
                                                        <a href="{{ route('product-page', $item['attributes']['slug']) }}" class="basket__img ibg">
                                                            <picture>
                                                                <source srcset="{{ \Illuminate\Support\Facades\URL::asset( $item['attributes']['image'] ) }}" type="image/webp">
                                                                <img src="{{ \Illuminate\Support\Facades\URL::asset( $item['attributes']['image'] ) }}" alt="Gantelya">
                                                            </picture>
                                                        </a>
                                                        <a href="{{ route('product-page', $item['attributes']['slug']) }}" class="basket__name">{{ $item['name'] }}</a>
                                                    </div>
                                                    <div class="basket__right">
                                                        <div class="basket__count">
                                                            ПОДАРОК
                                                        </div>
                                                        <div class="basket__delete">

                                                            <div class="basket__icon icon js-remove-product">
                                                                <svg>
                                                                    <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#delete">
                                                                    </use>
                                                                </svg>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                        @endif

                                        <div class="basket__bottom js-paste-header-items">
                                            <div class="basket__all">
                                                Итого: <span class="js-paste-cart-subTotal">{{ $cart_info['subtotal'] }} руб</span>
                                            </div>
                                            <div class="basket__btn">
                                                <a href="{{ route('cart.page') }}" class="btn">Оформить заказ</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                @else
                                    <span>Корзина пуста</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="menu__icon">
                        <span></span>
                    </div>

                </div>
            </div>


        </div>
    </div>
    <div class="header__bottom">
        <div class="container">
            <div class="header__bottom-wrapper">
                <a class="catalog__head">
                    <div class="catalog__icon icon">
                        <svg>
                            <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#menu">
                            </use>
                        </svg>
                    </div>
                    <span>Каталог</span>
                </a>
                <div class="catalog @yield('header_menu_active')">
                    <div class="catalog__body ">
                        <div class="catalog__content">
                            <ul>

                                @php
                                $index = 1;
                                @endphp

                                @foreach( $siteMenu as $menu )
                                    <li>
                                        <a data-id="submenu{{ $index }}" href="{{ $menu['url'] }}">
                                            <div class="catalog__arrow icon">
                                                @php
                                                    if (is_array($menu['new'])){
                                                        @endphp
                                                        <svg>
                                                            <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#arrow-r">
                                                            </use>
                                                        </svg>
                                                        @php
                                                    }
                                                @endphp
                                            </div>
                                            <span>{{ $menu['title'] }}</span>
                                        </a>
                                    </li>
                                    @php
                                        $index++;
                                    @endphp
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    @php
                        $index = 1;
                        $index2= 1;
                    @endphp

                    @foreach( $siteMenu as $menu )
                        @php
                          $submenu = false;
                            if ( is_array($menu['new'] ) ){
                                $submenu = true;
                            }
                        @endphp
                        @if( !$submenu )
                            @php
                                $index++;
                            @endphp
                            @continue
                        @endif
                        <div id="submenu{{$index}}" class="catalog__submenu  submenu">
                            <div class="submenu__list">
                                <ul>

                                    @foreach($menu['new'] as $subitem)
                                        @php
                                            $new = false;
                                            if ( is_array($subitem['new'])){
                                                $new = true;
                                            }
                                        @endphp
                                        <li><a data-id="{{ $new == true ? 'submenu__two' . $index2 : ''  }}" href="{{ $subitem['url'] }}">{{ $subitem['title'] }}</a></li>
                                        @if( $new )
                                            @php
                                                $index2++;
                                            @endphp
                                        @endif
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        @php
                            $index++;
                        @endphp
                    @endforeach

                    @php
                        $index = 1;
                    @endphp
                    @foreach( $siteMenu as $level_1)
                        @if( is_array($level_1['new']))
                            @foreach( $level_1['new'] as $level_2)

                                @if( is_array($level_2['new']))
                                        <div id="submenu__two{{ $index }}" class="subbrend submenu__two submenu__brend">
                                            <div class="submenu__list-two">
                                                <ul>
                                                    @foreach( $level_2['new'] as $level_3)
                                                    <li><a href="{{ $level_3['url'] }}">{{ $level_3['title'] }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @php
                                        $index++;
                                    @endphp
                                @endif

                            @endforeach
                        @endif
                    @endforeach
                </div>
                <div class="header__bottom-menu bottom-menu">
                    <ul>
                        <li><a href="#"> Спорттовары </a></li>
                        <li><a href="#"> Рассрочка</a></li>
                        <li><a href="#">
                                <div class="bottom-menu__icon icon">
                                    <svg>
                                        <use href="img/sprite/sprite.svg#gift">
                                        </use>
                                    </svg>
                                </div>
                                <span>Акция</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu">
        <div class="mobile-menu__content">
            <div data-spollers="" data-one-spoller="" class="mobile-menu__spollers">
                <ul class="mobile-menu__first-list">
                    <li>
                        <a data-spoller="" href="#">Стойки под штангу</a>
                        <ul data-spollers="" data-one-spoller="" class="mobile-menu__two-list">
                            <li>
                                <a data-spoller="" href="#">Обрезиненные</a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a data-spoller="" href="#">Разборные </a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a data-spoller="" href="#">Обрезиненные</a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a data-spoller="" href="#">Композитные</a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>

                        </ul>
                    </li>
                    <li>
                        <a data-spoller="" href="#">Скамьи</a>
                        <ul data-spollers="" data-one-spoller="" class="mobile-menu__two-list">
                            <li>
                                <a data-spoller="" href="#">Обрезиненные</a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>

                        </ul>
                    </li>
                    <li>
                        <a data-spoller="" href="#">Штанги в сборе</a>
                        <ul data-spollers="" data-one-spoller="" class="mobile-menu__two-list">
                            <li>
                                <a data-spoller="" href="#">Обрезиненные</a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>

                        </ul>
                    </li>
                    <li>
                        <a data-spoller="" href="#">Грифы для штаги</a>
                        <ul data-spollers="" data-one-spoller="" class="mobile-menu__two-list">
                            <li>
                                <a data-spoller="" href="#">Обрезиненные</a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>

                        </ul>
                    </li>
                    <li>
                        <a data-spoller="" href="#">Гантели</a>
                        <ul data-spollers="" data-one-spoller="" class="mobile-menu__two-list">
                            <li>
                                <a data-spoller="" href="#">Обрезиненные</a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>

                        </ul>
                    </li>
                    <li>
                        <a data-spoller="" href="#">Скамьи</a>
                        <ul data-spollers="" data-one-spoller="" class="mobile-menu__two-list">
                            <li>
                                <a data-spoller="" href="#">Обрезиненные</a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>

                        </ul>
                    </li>
                    <li>
                        <a data-spoller="" href="#">Грифы для штаги</a>
                        <ul data-spollers="" data-one-spoller="" class="mobile-menu__two-list">
                            <li>
                                <a data-spoller="" href="#">Обрезиненные</a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>

                        </ul>
                    </li>
                    <li>
                        <a data-spoller="" href="#">Единоборства</a>
                        <ul data-spollers="" data-one-spoller="" class="mobile-menu__two-list">
                            <li>
                                <a data-spoller="" href="#">Обрезиненные</a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>

                        </ul>
                    </li>
                    <li>
                        <a data-spoller="" href="#">Грифы для штаги</a>
                        <ul data-spollers="" data-one-spoller="" class="mobile-menu__two-list">
                            <li>
                                <a data-spoller="" href="#">Обрезиненные</a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>

                        </ul>
                    </li>
                    <li>
                        <a data-spoller="" href="#">Тяжелая атлетика</a>
                        <ul data-spollers="" data-one-spoller="" class="mobile-menu__two-list">
                            <li>
                                <a data-spoller="" href="#">Обрезиненные</a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>

                        </ul>
                    </li>
                    <li>
                        <a data-spoller="" href="#">Товары для детей</a>
                        <ul data-spollers="" data-one-spoller="" class="mobile-menu__two-list">
                            <li>
                                <a data-spoller="" href="#">Обрезиненные</a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>

                        </ul>
                    </li>
                    <li>
                        <a data-spoller="" href="#">Стойки под штангу</a>
                        <ul data-spollers="" data-one-spoller="" class="mobile-menu__two-list">
                            <li>
                                <a data-spoller="" href="#">Обрезиненные</a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>

                        </ul>
                    </li>
                    <li>
                        <a data-spoller="" href="#">Стойки под штангу</a>
                        <ul data-spollers="" data-one-spoller="" class="mobile-menu__two-list">
                            <li>
                                <a data-spoller="" href="#">Обрезиненные</a>
                                <ul class="mobile-menu__third-list">
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Разборные </a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                    <li><a href="#">Композитные</a></li>
                                    <li><a href="#">Разборные в кейсе</a></li>
                                    <li><a href="#">Регулируемые</a></li>
                                    <li><a href="#">Чугунные</a></li>
                                    <li><a href="#">Металлические</a></li>
                                    <li><a href="#">Хромированные</a></li>
                                    <li><a href="#">Для фитнеса</a></li>
                                    <li><a href="#">Разборные обрезиненные</a></li>
                                    <li><a href="#">Обрезиненные</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Разборные </a></li>
                            <li><a href="#">Обрезиненные</a></li>
                            <li><a href="#">Композитные</a></li>
                            <li><a href="#">Разборные в кейсе</a></li>
                            <li><a href="#">Регулируемые</a></li>
                            <li><a href="#">Чугунные</a></li>
                            <li><a href="#">Металлические</a></li>
                            <li><a href="#">Хромированные</a></li>
                            <li><a href="#">Для фитнеса</a></li>
                            <li><a href="#">Разборные обрезиненные</a></li>

                        </ul>
                    </li>

                </ul>
            </div>
            <ul class="mobile-menu__links">
                <li><a href="#"> <span> Спорттовары</span></a></li>
                <li><a href="#"> <span> Рассрочка </span> </a></li>
                <li><a href="#">
                        <div class="mobile-menu__gift-icon icon">
                            <svg>
                                <use href="img/sprite/sprite.svg#gift">
                                </use>
                            </svg>
                        </div>
                        <span>Акция</span>
                    </a></li>
            </ul>
            <div class="mobile-menu__bottom">
                <p>С 9:00 до 20:00 ежедневно</p>
                <a href="tel:+375291270216" class="mobile-menu__phone">
                    <div class="mobile-menu__phone-icon icon">
                        <svg>
                            <use href="img/sprite/sprite.svg#phone">
                            </use>
                        </svg>
                    </div>
                    <span>+375 29 127 02 16</span>
                </a>
            </div>
        </div>
    </div>
</header>
