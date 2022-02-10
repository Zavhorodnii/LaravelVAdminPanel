
@foreach( $fields['Gift'] as $field)

<div class="gift">
    <div class="container">
        <div class="gift__wrapper">
            <div class="gift-slider " data-aos="flip-down" data-aos-duration="800">

                @foreach( $field['product'] as $product)
                    <div class="gift-slide">
                        <div class="gift-slide__wrap">
                            <div class="gift-slide__head">
                                <div class="gift-slide__title">
                                    {{ $field['title'] }}
                                </div>
                                <div class="gift-slide__option">
                                    <div class="gift-slide__if">Если сумма более</div>
                                    <div class="gift-slide__option">
                                        <ul>
                                            @php
                                            $first = true;
                                            @endphp
                                            @foreach( $field['price'] as $price)
                                                <li>
                                                    <button class="gift-slide__option-btn {{ $first ? 'active' : '' }}">
                                                        {{ $price }} р
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
                            <div class="gift-slide__content">
                                <div class="gift-slide__img-box">
                                    <div class="gift-slide__img ibg">
                                        <picture>
                                            <source srcset="{{ \Illuminate\Support\Facades\URL::asset($product['image']) }}" type="image/webp">
                                            <img src="{{ \Illuminate\Support\Facades\URL::asset($product['image']) }}" alt="Gift">
                                        </picture>
                                    </div>
                                    <div class="gift-slide__video">
                                        <div class="yt-lazyload ibg" data-id="{{ $product['video-id'] }}">
                                            <picture>
                                                <source srcset="{{ $product['youtube_thumbnail'] }}" type="image/webp">
                                                <img src="{{ $product['youtube_thumbnail'] }}" alt="">
                                            </picture>
                                            <div class="video-fon"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gift-slide__info">
                                    <div class="gift-slide__descr">
                                        <div class="gift-slide__sale-text">Акция!</div>
                                        <p>
                                            <strong>Дарим</strong> при заказе на сайте {{ $product['title'] }}
                                            <span>стоимостью {{ $product['price'] }} рублей</span>
                                        </p>
                                    </div>
                                    <div class="gift-slide__time">
                                        <span>
                                          Действует до {{ $field['date-finish'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                @endforeach

            </div>

        </div>
    </div>
</div>

@endforeach
