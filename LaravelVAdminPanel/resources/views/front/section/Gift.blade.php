
<div class="gift">
    <div class="container">
        <div class="gift__wrapper">
            <div class="gift-slider " data-aos="flip-down" data-aos-duration="800">

                @foreach( $fields['Gift']['product'] as $product)
                    <div class="gift-slide">
                        <div class="gift-slide__wrap">
                            <div class="gift-slide__head">
                                <div class="gift-slide__title">
                                    {{ $fields['Gift']['title'] }}
                                </div>
                                <div class="gift-slide__option">
                                    <div class="gift-slide__if">Если сумма более</div>
                                    <div class="gift-slide__option">
                                        <ul>
                                            @php
                                            $first = true;
                                            @endphp
                                            @foreach($fields['Gift']['price'] as $price)
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
                                          Действует до {{ $fields['Gift']['date-finish'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                @endforeach

            </div>
            <div class="gift__warn gift-warn">
                <div class="gift-warn__body">
                    <div class="gift-warn__title">
                        Успей купить <br>
                        пока есть в наличии!
                    </div>
                    <div class="gift-warn__content">
                        <div class="gift-warn__head">
                            <div class="gift-warn__warning">
                                Внимание!
                            </div>
                            <div class="gift-warn__text">
                                <span>На 23 июля осталось</span>
                                <strong>14</strong>
                                <span>подарков</span>
                            </div>
                        </div>
                        <div class="gift-warn__form">
                            <form action="#">
                                <div class="gift-warn__form-body">
                                    <div class="form-input gift-warn__input">
                                        <input class="form-phone" type="text" placeholder="Ваш телефон">
                                    </div>
                                    <div class="gift-warn__btn-wrap">
                                        <button class="gift-warn__btn btn" type="submit">
                                            Зафиксировать подарок на 3 дня
                                        </button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
