
@foreach( $fields['Bestseller'] as $field__)

    @if( $field__['slider-block'])

    <section class="discount ">
        <div class="container">
            <div class="discount__wrapper">
                <div class="discount__head">
                    <h3 class="discount__title title">
                        {!! $field__['title'] !!}
                    </h3>
                    <a class="discount__all-link" href="{{ $field__['all-text-link'] }}">
                        <span>{!! $field__['all-text-title'] !!}</span>
                        <div class="discount__all-icon icon">
                            <svg>
                                <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#big-arrow">
                                </use>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="discount__quick-wrapper">
                    <div data-aos="fade-up" data-aos-duration="700" class="discount-slider">

                        @php
                        $index = 1;
                        @endphp

                        @foreach( $field__['related-products'] as $product)
                            <div class="discount-slider__slide">
                                <div class="card">
                                    <div>
                                        <a href="{{ route('product-page', $product['slug']) }}" class="card__img ibg">
                                            <picture>
                                                <source srcset="{{ \Illuminate\Support\Facades\URL::asset($product['image']) }}" type="image/webp">
                                                <img src="{{ \Illuminate\Support\Facades\URL::asset($product['image']) }}" alt="gantelya">
                                            </picture>
                                        </a>
                                        <a href="{{ route('product-page', $product['slug']) }}" class="card__descr">
                                            {!! $product['title'] !!}
                                        </a>
                                    </div>
                                    <div class="card__bottom">
                                        <div class="card__price">
                                            {!! $product['regular_price'] ?? $product['price'] !!} руб
                                        </div>
                                        <div class="card__buttons buttons-buy js-get-product-info" data-product-id="{{ $product['post_id'] ?? '' }}">
                                            <button class="buttons-buy__one-click">Купить в 1 клик</button>
                                            <a class="buttons-buy__basket-btn js-click-add-to-cart" href="#">
                                                <div class="buttons-buy__icon icon">
                                                    <svg>
                                                        <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#cart">
                                                        </use>
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card__review">
                                            <button data-quick="{{ $index }}" class="card__review-btn js-quick">Быстрый просмотр</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $index++;
                            @endphp
                        @endforeach
                    </div>
                    @php
                        $index = 1;
                    @endphp

                    @foreach( $field__['related-products'] as $product)
                        <div data-quick-id="{{$index}}" class="discount__quick quick">
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
                                            <a class="buttons-buy__basket-btn js-click-add-to-cart" href="#">
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
                        @php
                            $index++;
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @else

    <div class="filter">
        <div class="container">
            <div class="filter__wrapper">
                <div class="filter__body">
                    <div data-aos="fade-up" data-aos-duration="800" class="filter__items">
                        @foreach( $field__['related-products'] as $product)
                            <div class="filter__item">
                            <div class="card card--filter">
                                @if( $product['regular_price'] )
                                <span class="card__sale">%</span>
                                @endif
                                <div>
                                    <div class="card__slider">

                                        <div class="card__slide">
                                            <div class="card__img ibg">
                                                <picture>
                                                    <source srcset="{{ \Illuminate\Support\Facades\URL::asset($product['image']) }}" type="image/webp">
                                                    <img src="{{ \Illuminate\Support\Facades\URL::asset($product['image']) }}" alt="gantelya">
                                                </picture>
                                            </div>
                                        </div>
                                        @if( $product['gallery'])
                                            @foreach( $product['gallery'] as $image)
                                                <div class="card__slide">
                                                    <div class="card__img ibg">
                                                        <picture>
                                                            <source srcset="{{ \Illuminate\Support\Facades\URL::asset($image['file-id']) }}" type="image/webp">
                                                            <img src="{{ \Illuminate\Support\Facades\URL::asset($image['file-id']) }}" alt="gantelya">
                                                        </picture>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <a href="{{ route('product-page', $product['slug']) }}" class="card__descr">
                                        {!! $product['title'] !!}
                                    </a>
                                </div>
                                <div class="card__bottom">
                                    <div class="card__price">
                                        {{ $product['regular_price'] ?? $product['price'] }} руб
                                        @if( ($product['regular_price'] != $product['price']) && ($product['regular_price'] != null ))
                                        <span class="card__old-price">{{ $product['price'] }} руб</span>
                                        @endif
                                    </div>
                                    <div class="card__buttons buttons-buy js-get-product-info" data-product-id="{{ $product['post_id'] ?? '' }}">
                                        <button class="buttons-buy__one-click">Купить в 1 клик</button>
                                        <a class="buttons-buy__basket-btn js-click-add-to-cart" href="#">
                                            <div class="buttons-buy__icon icon">
                                                <svg>
                                                    <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#cart">
                                                    </use>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card__review">
                                        <button data-quick="{{ $index }}" class="card__review-btn js-quick">Быстрый просмотр</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div data-quick-id="{{ $index }}" class="fixed discount__quick quick">
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
                                                <a class="buttons-buy__basket-btn js-click-add-to-cart" href="#">
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
                            @php
                                $index++;
                            @endphp
                        @endforeach

                    </div>
                </div>
                @if( count( $field__['related-products'] ) > 8)
                <div class="filter__more"> <button class=" btn--transparent btn">
                        Показать еще
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>

    @endif

@endforeach
