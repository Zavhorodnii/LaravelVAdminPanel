@foreach( $fields['GiftSet'] as $fields__)

<section class="complect">
    <div class="container">
        <div class="complect__wrapper">
            <h3 class="complect__title title">
                {!! $fields__['title'] !!}
            </h3>
            <div class="complect-slider">
                @if( isset($fields__['repeater-set']) )
                    @foreach( $fields__['repeater-set'] as $set)
                    <div data-aos="flip-left" data-aos-duration="700" class="complect-slider__slide complect-slide">
                        <div class="complect__card complect-card">
                            <div class="complect-card__img-box">
                                <div class="complect-card__img ibg">
                                    <picture>
                                        <source srcset="{{ \Illuminate\Support\Facades\URL::asset($set['image']) }}" type="image/webp">
                                        <img src="{{ \Illuminate\Support\Facades\URL::asset($set['image']) }}" alt="complect-foto">
                                    </picture>
                                </div>

                            </div>
                            <div class="complect-card__content">
                                <div class="complect-card__title">
                                   {!! $set['list-title'] !!}
                                </div>
                                <div class="complect-card__list">
                                    <ul>
                                        @if( isset($set['repeater-list']) )
                                        @foreach( $set['repeater-list'] as $list)
                                        <li>
                                            <div class="complect-card__name">
                                                {!! $list['item'] !!}
                                            </div>
                                            <div class="complect-card__price">
                                                {!! $list['value'] !!}
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="complect-card__price-row">
                                    <div class="complect-card__new-price">
                                        {{ $set['regular_price'] ?? $set['price'] }} руб
                                    </div>

                                    @if( ($set['regular_price'] != $set['price']) && ($set['regular_price'] != null ))
                                    <div class="complect-card__old-price">{{ $set['price'] }} руб</div>
                                    @endif
                                </div>
                                <div class="card__buttons buttons-buy">
                                    <button class="buttons-buy__one-click">Купить в 1 клик</button>
                                    <a class="buttons-buy__basket-btn" href="#">
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
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

@endforeach
