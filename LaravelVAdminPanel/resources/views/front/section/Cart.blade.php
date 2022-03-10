
<section class="shop">
    <div class="container">
        <div class="shop__wrapper">
            <h1 class="shop__title title">
                Корзина
            </h1>
            <div class="shop__items js-paste-items">

                @if( count($cart_info['products']) > 0)
                @foreach( $cart_info['products'] as $key => $item )
                    @if( $key == 'gift')
                        @continue
                    @endif
                    <div class="shop__item js-get-cart-item js-cart-elem" data-product-id="{{$item['id']}}">
                        <div class="shop__product">
                            <a href="{{ route('product-page', $item['attributes']['slug']) }}" class="shop__img ibg">
                                <picture>
                                    <source srcset="{{ \Illuminate\Support\Facades\URL::asset( $item['attributes']['image'] ) }}" type="image/webp">
                                    <img src="{{ \Illuminate\Support\Facades\URL::asset( $item['attributes']['image'] ) }}" alt="Gantelya">
                                </picture>
                            </a>
                            <a href="{{ route('product-page', $item['attributes']['slug']) }}" class="shop__name">{{ $item['name'] }}</a>
                        </div>
                        <div class="shop__prices">
                            <div class="quantity js-get-info">
                                <button class="minus-btn js-change-quantity" type="button" name="button">-</button>
                                <input type="number" value="{{ $item['quantity'] }}" class="input-btn js-get-quantity">
                                <button class="plus-btn js-change-quantity" type="button" name="button">+</button>

                            </div>
                            <div class="shop__price">
                                <div class="shop__price-one">{{ $item['price'] }} руб</div>
                                <div class="shop__price-all js-paste-product-subTotal">{{ $item['priceSum'] }} руб</div>
                            </div>
                            <div class="shop__delete">
                                <div class="shop__delete-icon icon js-remove-product"> <svg>
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
                <div class="shop__item js-remove-gift js-cart-elem js-get-cart-item" data-product-id="{{$item['id']}}">
                    <div class="shop__product">
                        <a href="{{ route('product-page', $item['attributes']['slug']) }}" class="shop__img ibg">
                            <picture>
                                <source srcset="{{ \Illuminate\Support\Facades\URL::asset( $item['attributes']['image'] ) }}" type="image/webp">
                                <img src="{{ \Illuminate\Support\Facades\URL::asset( $item['attributes']['image'] ) }}" alt="Gantelya">
                            </picture>
                        </a>
                        <a href="{{ route('product-page', $item['attributes']['slug']) }}" class="shop__name">{{ $item['name'] }}</a>
                    </div>
                    <div class="shop__prices">
                        <div class="shop__price">
                            <div class="shop__price-all">Подарок</div>
                        </div>
                        <div class="shop__delete">
                            <div class="shop__delete-icon icon js-remove-product"> <svg>
                                    <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#delete">
                                    </use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @else
                    <span>Корзина пуста</span>
                @endif

            </div>
            <div class="shop__bottom shop-bottom">
                <div class="shop-bottom__left">
                    <div class="shop-bottom__icon icon">
                        <svg>
                            <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#gift2">
                            </use>
                        </svg>
                    </div>
                    <div class="shop-bottom__info">
                        <span>Ваш подарок: на выбор</span>
                        <div class="shop-bottom__link">
                            <a class="btn-link" href="#">Подробнее</a>
                        </div>
                    </div>
                </div>
                <div class="shop-bottom__right">
                    <span>Итого:</span>
                    <div class="shop-bottom__price js-paste-cart-subTotal">
                        {{ $cart_info['subtotal'] }} руб
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="consult">
    <div class="container">
        <div class="consult__wrapper">
            <h3 class="consult__title title">
                Оформление заказа
            </h3>
            <div class="consult__subtitle subtitle">
                После отправки вашего заказа мы свяжемся с Вами в течении 5 минут

            </div>
            <div class="consult__form">
                <form action="#">
                    <div class="consult__form-body js-get-form-info">
                        <div class="consult__input form-input">
                            <input type="text" class="js-get-name" placeholder="Имя">
                        </div>
                        <div class="consult__input form-input">
                            <input type="email" class="js-get-email" placeholder="Email">
                        </div>
                        <div class="consult__input form-input">
                            <input class="form-phone js-get-phone" type="text" placeholder="Телефон">
                        </div>
                        <div class="consult__input">
                            <button class="btn js-click-cart-order" type="submit">Заказать</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>

<section class="goods goods--bottom">
    <div class="container">
        <div class="goods__wrapper">
            <div class="gift-slide__head gift-slide__head--center">
                <div class="gift-slide__title">
                    К каждому заказу 1 подарок!
                </div>
                <div class="gift-slide__option">
                    <div class="gift-slide__if">Если сумма более </div>
                    <div class="gift-slide__option">
                        <ul>
                            @php
                            $first = true;
                            @endphp
                            @foreach( $all_gifts['repeater-price'] as $product )
                                <li>
                                    <button class="gift-slide__option-btn {{ $first ? 'active' : '' }}">
                                        {{ $product['price'] }} р
                                    </button>
                                </li>
                                @php
                                    $first = false;
                                @endphp
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="goods-slider__wrapper">
                <div class="goods-slider goods-slider--height">
                    @if(isset($all_gifts['repeater-price'][1]['repeater-product']))
                    @foreach( $all_gifts['repeater-price'][1]['repeater-product'] as $key => $product )
                        <div class="goods-slide">
                            <div class="card card--filter">
                                <div>
                                    <div class="card__slider">
                                        @if( $product['image'])
                                            <div class="card__slide">
                                                <div class="card__img ibg">
                                                <picture>
                                                    <source srcset="{{ \Illuminate\Support\Facades\URL::asset($product['image']) }}" type="image/webp">
                                                    <img src="{{ \Illuminate\Support\Facades\URL::asset($product['image']) }}" alt="Gantelya">
                                                </picture>
                                                </div>
                                            </div>
                                        @endif
                                        @if( $product['gallery'])
                                            @foreach( $product['gallery'] as $image)
                                                <div class="card__slide">
                                                    <div class="card__img ibg">
                                                    <picture>
                                                        <source srcset="{{ \Illuminate\Support\Facades\URL::asset($image['file-id']) }}" type="image/webp">
                                                        <img src="{{ \Illuminate\Support\Facades\URL::asset($image['file-id']) }}" alt="Gantelya">
                                                    </picture>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <a href="{{ route('product-page', $product['slug']) }}" class="card__descr">
                                        {{ $product['title'] }}
                                    </a>
                                </div>
                                <div class="card__bottom">

                                    <div class="card__buttons buttons-buy">
                                        <div class="card__add-btn">
                                            <button class="btn js-click-add-gift" data-gift-id="{{ $product['id'] }}">Добавить в заказ</button>
                                        </div>
                                    </div>
                                    <div class="card__review">
                                        <button data-quick="{{ $key }}" class="card__review-btn js-quick">Быстрый просмотр</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
                @if(isset($all_gifts['repeater-price'][1]['repeater-product']))
                    @foreach( $all_gifts['repeater-price'][1]['repeater-product'] as $key => $product )
                        <div data-quick-id="{{ $key }}" class=" discount__quick quick">
                            <h3 class="quick__title">
                                Быстрый просмотр
                            </h3>
                            <div class="quick__close">
                                <div class="quick__close-icon icon">
                                    <svg>
                                        <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#close">
                                        </use>
                                    </svg>
                                </div>
                            </div>
                            <div class="quick__main">
                                <div class="quick__slider-container">
                                    <div class="quick-slider">
                                        @if( $product['image'])
                                            <div class="quick-slide ibg">
                                                <picture>
                                                    <source srcset="{{ \Illuminate\Support\Facades\URL::asset($product['image']) }}" type="image/webp">
                                                    <img src="{{ \Illuminate\Support\Facades\URL::asset($product['image']) }}" alt="Gantelya">
                                                </picture>
                                            </div>
                                        @endif
                                        @if( $product['gallery'])
                                            @foreach( $product['gallery'] as $image)
                                                <div class="quick-slide ibg">
                                                    <picture>
                                                        <source srcset="{{ \Illuminate\Support\Facades\URL::asset($image['file-id']) }}" type="image/webp">
                                                        <img src="{{ \Illuminate\Support\Facades\URL::asset($image['file-id']) }}" alt="Gantelya">
                                                    </picture>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="quick-slider__nav">
                                        @if( $product['image'])
                                            <div class="quick-slide__nav">
                                                <picture>
                                                    <source srcset="{{ \Illuminate\Support\Facades\URL::asset($product['image']) }}" type="image/webp">
                                                    <img src="{{ \Illuminate\Support\Facades\URL::asset($product['image']) }}" alt="Gantelya">
                                                </picture>
                                            </div>
                                        @endif
                                        @if( $product['gallery'])
                                            @foreach( $product['gallery'] as $image)
                                                <div class="quick-slide__nav">
                                                    <picture>
                                                        <source srcset="{{ \Illuminate\Support\Facades\URL::asset($image['file-id']) }}" type="image/webp">
                                                        <img src="{{ \Illuminate\Support\Facades\URL::asset($image['file-id']) }}" alt="Gantelya">
                                                    </picture>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                                <div class="quick__block">
                                    <div class="quick__details">
                                        <div class="quick__name-product">
                                            {!! $product['title'] !!}
                                        </div>
                                        <div class="quick__labels">
                                            @if( $product['regular_price'] )
                                                <div class="quick__procent quick__circle">
                                                    <span>%</span>
                                                </div>
                                            @endif
                                            {{--                                            <div class="quick__hit quick__circle">--}}
                                            {{--                                                <span>Хит</span>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                        <div class="quick__features">
                                            <div class="quick__features-head">
                                                <div class="quick__features-title">
                                                    {{ $product['features_title'] }}
                                                </div>
                                                <div class="quick__features-link">
                                                    <a href="{{ route('product-page', $product['slug']) }}">Перейти в карточку товара</a>
                                                </div>
                                            </div>
                                            <div class="quick__list">
                                                <ul>
                                                    @foreach( $product['features'] as $feature)
                                                        <li>
                                                            <div class="quick__ok-icon icon">
                                                                <svg>
                                                                    <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#ok">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <span>{!! $feature['item'] !!}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick__block-bottom">
                                        <div class="quick__prices">
                                            <div class="quick__price">
                                                {{ $product['regular_price'] ?? $product['price'] }} руб
                                            </div>
                                            @if( ($product['regular_price'] != $product['price']) && ($product['regular_price'] != null ))
                                                <div class="quick__old-price">{{ $product['price'] }} руб</div>
                                            @endif
                                        </div>
                                        <div class="quick__btn-buy buttons-buy js-get-product-info" data-product-id="{{ $product['post_id'] ?? '' }}">
                                            <button class="buttons-buy__one-click">Купить в 1 клик</button>
                                            <a class="buttons-buy__basket-btn js-click-add-gift" data-gift-id="{{ $product['id'] }}" href="#">
                                                <div class="buttons-buy__icon icon">
                                                    <svg>
                                                        <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#cart">
                                                        </use>
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if( isset($product['set']))
                                <div class="quick__complect ">
                                    <div class="quick__complect-title">
                                        Комплектация
                                    </div>
                                    <div class="quick__complect-items">

                                        @foreach( $product['set'] as $set )

                                            <a href="{{ route('product-page', $set['slug']) }}" class="quick__complect-item">
                                                <div class="quick__complect-top">
                                                    <div class="quick__complect-img ibg">
                                                        <picture>
                                                            <source srcset="{{ \Illuminate\Support\Facades\URL::asset($set['image']) }}" type="image/webp">
                                                            <img src="{{ \Illuminate\Support\Facades\URL::asset($set['image']) }}" alt="Rukav">
                                                        </picture>
                                                    </div>
                                                    <div class="quick__complect-name">{!! $set['title'] !!}</div>
                                                </div>
                                                <div class="quick__complect-price"> {{ $set['price'] }} руб</div>
                                            </a>

                                        @endforeach

                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
