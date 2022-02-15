
<div class="product">
    <div class="container">
        <div class=" discount__quick quick--relative quick">

            <div class="quick__main">
                <div class="quick__slider-container">
                    <div class="quick-slider">
                        @if( $productInfo['product-image'])
                            <div class="quick-slide ibg">
                                <picture>
                                    <source srcset="{{ \Illuminate\Support\Facades\URL::asset($productInfo['product-image']['url']) }}" type="image/webp">
                                    <img src="{{ \Illuminate\Support\Facades\URL::asset($productInfo['product-image']['url']) }}" alt="Gantelya">
                                </picture>
                            </div>
                        @endif
                        @if( is_array($productInfo['repeater-gallery']))
                            @foreach( $productInfo['repeater-gallery'] as $image)
                                <div class="quick-slide ibg">
                                    <picture>
                                        <source srcset="{{ \Illuminate\Support\Facades\URL::asset($image['file-id']['url']) }}" type="image/webp">
                                        <img src="{{ \Illuminate\Support\Facades\URL::asset($image['file-id']['url']) }}" alt="Gantelya">
                                    </picture>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="quick-slider__nav">
                        @if( $productInfo['product-image'])
                            <div class="quick-slide__nav">
                                <picture>
                                    <source srcset="{{ \Illuminate\Support\Facades\URL::asset($productInfo['product-image']['url']) }}" type="image/webp">
                                    <img src="{{ \Illuminate\Support\Facades\URL::asset($productInfo['product-image']['url']) }}" alt="Gantelya">
                                </picture>
                            </div>
                        @endif
                        @if( is_array($productInfo['repeater-gallery']))
                            @foreach( $productInfo['repeater-gallery'] as $image)
                                <div class="quick-slide__nav">
                                    <picture>
                                        <source srcset="{{ \Illuminate\Support\Facades\URL::asset($image['file-id']['url']) }}" type="image/webp">
                                        <img src="{{ \Illuminate\Support\Facades\URL::asset($image['file-id']['url']) }}" alt="Gantelya">
                                    </picture>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="quick__block">
                    <div class="quick__details">
                        <div class="quick__name-product">
                            {{ $productInfo['title'] }}
                        </div>
                        <div class="quick__labels">
                            @if( $productInfo['regular-price'] )
                                <div class="quick__procent quick__circle">
                                    <span>%</span>
                                </div>
                            @endif
{{--                            <div class="quick__hit quick__circle">--}}
{{--                                <span>Хит</span>--}}
{{--                            </div>--}}
                        </div>
                        <div class="quick__features">
                            <div class="quick__features-head">
                                <div class="quick__features-title">
                                    {{ $productInfo['features-title'] }}
                                </div>
                            </div>
                            <div class="quick__list">
                                <ul>
                                    @foreach( $productInfo['repeater-features'] as $features)
                                    <li>
                                        <div class="quick__ok-icon icon">
                                            <svg>
                                                <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#ok">
                                                </use>
                                            </svg>
                                        </div>
                                        <span>{{ $features['product-feature-item'] }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="quick__block-bottom">
                        <div class="quick__prices">
                            <div class="quick__price">
                                {{ $productInfo['regular-price'] ?? $productInfo['price'] }} руб
                            </div>
                            @if( ($productInfo['regular-price'] != $productInfo['price']) && ($productInfo['regular-price'] != null ))
                                <div class="quick__old-price">{{ $productInfo['price'] }} руб</div>
                            @endif
                        </div>
                        <div class="quick__btn-buy buttons-buy js-get-product-info" data-product-id="{{ $productInfo['post_id'] ?? '' }}">
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
        </div>

        @if( isset($productInfo['set-products']))
            <div class="quick__complect ">
                <div class="quick__complect-title">
                    Комплектация
                </div>
                <div class="quick__complect-items">
                    @foreach( $productInfo['set-products'] as $set )

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
</div>

<div class="video">

    @if( isset($productInfo['repeater-video']) && is_array( $productInfo['repeater-video'] ) )
        <div class="container">
            <div class="video__wrapper">
                <h3 class="video__title title">
                    Видеообзоры
                </h3>
                <div class="video__items">

                    @foreach( $productInfo['repeater-video'] as $video)
                        <div class="video__item">
                            <div class="yt-lazyload video__content ibg" data-id="{{ $video['video-info']['youtube_video_id'] }}">
                                <picture>
                                    <source srcset="{{ $video['video-info']['youtube_thumbnail'] }}" type="image/webp">
                                    <img src="{{ $video['video-info']['youtube_thumbnail'] }}" alt="">
                                </picture>
                                <div class="video-fon"></div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif


    <div class="details">
        <div class="container">
            <div class="details__wrapper">
                <div class="details__content">
                    <div class="details__column">

                        @php
                        $index = 1;
                        @endphp
                        @while( $index <= intval($productInfo['midl_count']))
                            @if( isset($productInfo['repeater-addition'][$index]) )
                            <div class="details__block">
                                <div class="details__title title">
                                    {{ $productInfo['repeater-addition'][$index]['title-addition-info'] }}
                                </div>
                                <div class="details__list">
                                    <ul>
                                        @foreach( $productInfo['repeater-addition'][$index]['repeater-addition-item'] as $item)
                                        <li>
                                            {{ $item['title-addition-info-item'] }} <span>{{ $item['value-addition-info-item'] }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            @php
                                $index++;
                            @endphp
                        @endwhile


                    </div>
                    <div class="details__column">
                        @while( $index <= count($productInfo['repeater-addition']))
                            @if( isset($productInfo['repeater-addition'][$index]) )
                            <div class="details__block">
                                <div class="details__title title">
                                    {{ $productInfo['repeater-addition'][$index]['title-addition-info'] }}
                                </div>
                                <div class="details__list">
                                    <ul>
                                        @foreach( $productInfo['repeater-addition'][$index]['repeater-addition-item'] as $item)
                                            <li>
                                                {{ $item['title-addition-info-item'] }} <span>{{ $item['value-addition-info-item'] }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            @php
                                $index++;
                            @endphp
                        @endwhile
                    </div>
                </div>
                <div class="details__warning">
                    <div class="details__title details__warning-title title">
                        {{ $productInfo['product-description-title'] ?? '' }}
                    </div>
                    <div class="details__warning-info">
                        <p>{{ $productInfo['product-description'] ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="goods goods--bottom">
        <div class="container">
            <div class="goods__wrapper">
                <h3 class="title goods__title">
                    {{ $productInfo['related-products-title'] ?? '' }}
                </h3>
                <div class="subtitle goods__subtitle">
                    {{ $productInfo['related-products-description'] ?? '' }}
                </div>
                <div class="goods-slider__wrapper">
                    <div class="goods-slider">

                        @if( isset($productInfo['related-products']) && is_array($productInfo['related-products']))
                        @foreach( $productInfo['related-products'] as $product_item)

                        <div class="goods-slide">
                            <div class="card card--filter">
                                <div>
                                    <div class="card__slider">

                                        @foreach( $productInfo['image-related-product'][$product_item[0]->id] as $image )

                                            @if( is_array($image) )

                                                @foreach ( $image as $image_item )
                                                    <div class="card__slide">
                                                        <div class="card__img ibg">
                                                            <picture>
                                                                <source srcset="{{ $image_item['file-id'] }}" type="image/webp">
                                                                <img src="{{ $image_item['file-id'] }}" alt="gantelya">
                                                            </picture>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            @else
                                                <div class="card__slide">
                                                    <div class="card__img ibg">
                                                        <picture>
                                                            <source srcset="{{ $image }}" type="image/webp">
                                                            <img src="{{ $image }}" alt="gantelya">
                                                        </picture>
                                                    </div>
                                                </div>
                                            @endif



                                        @endforeach

                                    </div>
                                    <a href="#" class="card__descr">
                                        {{ $product_item[0]->title }}
                                    </a>
                                </div>
                                <div class="card__bottom">
                                    <div class="card__price">
                                        {{ $product_item[0]->regular_price ?? $product_item[0]->price }} руб
                                    </div>
                                    <div class="card__buttons buttons-buy js-get-product-info" data-product-id="{{ $product_item[0]->id ?? '' }}">
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
                                        <button data-quick="{{ $product_item[0]->id }}" class="card__review-btn js-quick">Быстрый просмотр</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        @endif

                    </div>
                    @if( isset($productInfo['related-products']) && is_array($productInfo['related-products']))
                        @foreach( $productInfo['related-products'] as $product_item)
                            @php
                            $product_relative = $productInfo['related-product-info'][$product_item[0]->id];
                            @endphp
                        <div data-quick-id="{{ $product_item[0]->id }}" class=" discount__quick quick">
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

                                    @if( $product_relative['image'])
                                        <div class="quick-slide ibg">
                                            <picture>
                                                <source srcset="{{ \Illuminate\Support\Facades\URL::asset($product_relative['image']) }}" type="image/webp">
                                                <img src="{{ \Illuminate\Support\Facades\URL::asset($product_relative['image']) }}" alt="Gantelya">
                                            </picture>
                                        </div>
                                    @endif
                                    @if( $product_relative['gallery'])
                                        @foreach( $product_relative['gallery'] as $image)
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
                                    @if( $product_relative['image'])
                                        <div class="quick-slide__nav">
                                            <picture>
                                                <source srcset="{{ \Illuminate\Support\Facades\URL::asset($product_relative['image']) }}" type="image/webp">
                                                <img src="{{ \Illuminate\Support\Facades\URL::asset($product_relative['image']) }}" alt="Gantelya">
                                            </picture>
                                        </div>
                                    @endif
                                    @if( $product_relative['gallery'])
                                        @foreach( $product_relative['gallery'] as $image)
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
                                        {{ $product_relative['title'] }}
                                    </div>
                                    <div class="quick__labels">
                                        @if( $product_relative['regular_price'] )
                                        <div class="quick__procent quick__circle">
                                            <span>%</span>
                                        </div>
                                        @endif
{{--                                        <div class="quick__hit quick__circle">--}}
{{--                                            <span>Хит</span>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="quick__features">
                                        <div class="quick__features-head">
                                            <div class="quick__features-title">
                                                {{ $product_relative['features_title'] ?? '' }}
                                            </div>
                                            <div class="quick__features-link">
                                                <a href="{{ route('product-page', $product_relative['slug']) }}">Перейти в карточку товара</a>
                                            </div>
                                        </div>
                                        <div class="quick__list">
                                            <ul>
                                                @foreach( $product_relative['features'] as $feature)
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
                                            {{ $product_relative['regular_price'] ?? $product_relative['price'] }} руб
                                        </div>

                                        @if( ($product_relative['regular_price'] != $product_relative['price']) && ($product_relative['regular_price'] != null ))
                                            <div class="quick__old-price">{{ $product_relative['price'] }} руб</div>
                                        @endif
                                    </div>
                                    <div class="quick__btn-buy buttons-buy js-get-product-info" data-product-id="{{ $product_item[0]->id ?? '' }}">
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

                        @if( isset($product_relative['set']))
                        <div class="quick__complect ">
                            <div class="quick__complect-title">
                                Комплектация
                            </div>
                            <div class="quick__complect-items">
                                @foreach( $product_relative['set'] as $set )

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
</div>
