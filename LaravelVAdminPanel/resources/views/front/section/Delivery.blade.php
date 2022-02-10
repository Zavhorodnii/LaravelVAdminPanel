
@foreach( $fields['Delivery'] as $field)

<section class="delivery">
    <div class="container">
        <div class="delivery__wrapper">
            <div class="delivery__head">
                <h3 class="delivery__title">
                    {{ $field['title']['title'] }}
                </h3>
                <div class="delivery__subtitle">{{ $field['title']['subtitle'] }}</div>
            </div>
            <div class="delivery__content">
                <div class="delivery__map-wrap">
                    <div class="delivery__map ibg map">
                        <picture>
                            <source srcset="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/home/delivery.png" type="image/webp">
                            <img src="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/home/delivery.png" alt="Map">
                        </picture>

                        @foreach( $field['delivery-work-address']['repeater1'] as $city_item)
                            @if( count($city_item['repeater2']) == 1 )
                            <div data-aos="fade-down" data-aos-duration="700" class="map__point map__point-item7 map-point" style="{{ $city_item['point-style'] }}">
                                <div class="map-point__detal">
                                    <div class="map-point__city">
                                        {{ $city_item['region'] }}
                                    </div>
                                    <div class="map-point__info">
                                        Забрать товар Вы можете по адресу:
                                    </div>
                                    <div class="map-point__adress">
                                        <div class="map-point__adress-icon icon">
                                            <svg>
                                                <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#adress">
                                                </use>
                                            </svg>
                                        </div>
                                        <span>{{ $city_item['repeater2'][1]['address'] }}</span>
                                    </div>
                                    <div class="map-point__operator">
                                        <div class="map-point__operator-icon icon">
                                            <svg>
                                                <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#phone">
                                                </use>
                                            </svg>
                                        </div>
                                        <span>{{ $city_item['repeater2'][1]['phone'] }}</span>
                                    </div>
                                    <div class="map-point__time">
                                        <div class="map-point__time-icon icon">
                                            <svg>
                                                <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#clock">
                                                </use>
                                            </svg>
                                        </div>
                                        <div class="map-point__time-block">
                                            @php
                                            $work_time = explode('|', $city_item['repeater2'][1]['work-time']);
                                            @endphp
                                            @foreach( $work_time as $item)
                                                @php
                                                    $work_ = explode(' ', $item);
                                                @endphp
                                            <div class="map-point__time-row">
                                                <div class="map-point__time-days">{{ $work_[0] }}</div>

                                                <div class="map-point__time-hours">{{ $work_[1] }}</div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div data-aos="fade-down" data-aos-duration="700" class="map__point map__point-item8 map-point" style="{{ $city_item['point-style'] }}">
                                <div class="map-point__digit">{{ count($city_item['repeater2']) }}</div>
                                <div class="map-point__detal">
                                    <div class="map-point__city">
                                        {{ $city_item['region'] }}
                                    </div>
                                    <div class="map-point__info">
                                        Забрать товар Вы можете по адресу:
                                    </div>
                                    @foreach( $city_item['repeater2'] as $item_info)
                                    <div data-spollers="" class="map-point__spolers">
                                        <div data-spoller="" class="map-point__spolers-head">
                                            <div class="map-point__adress">
                                                <div class="map-point__adress-icon icon">
                                                    <svg>
                                                        <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#adress">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <span>{{ $item_info['address'] }}</span>
                                            </div>
                                        </div>
                                        <div class="map-point__spolers-body">
                                            <div class="map-point__operator">
                                                <div class="map-point__operator-icon icon">
                                                    <svg>
                                                        <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#phone">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <span>{{ $item_info['phone'] }}</span>
                                            </div>
                                            <div class="map-point__time">
                                                <div class="map-point__time-icon icon">
                                                    <svg>
                                                        <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#clock">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <div class="map-point__time-block">
                                                    @php
                                                        $work_time = explode('|', $item_info['work-time']);
                                                    @endphp
                                                    @foreach( $work_time as $item)
                                                        @php
                                                            $work_ = explode(' ', $item);
                                                        @endphp
                                                        <div class="map-point__time-row">
                                                            <div class="map-point__time-days">{{ $work_[0] }}</div>

                                                            <div class="map-point__time-hours">{{ $work_[1] }}</div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        @endforeach

                    </div>
                </div>

                <div class="delivery__point point">
                    <div class="point__block">
                        <div class="point__head">
                            <h4 class="point__title">{{ count($field['delivery-work-address']['repeater1']) }} пункт выдачи товаров</h4>
                            <div class="point__allcity">
                                <div class="point__allcity-close"></div>
                                <p class="point__allcity-wrap">
                                @foreach( $field['delivery-work-address']['repeater1'] as $address_item)
                                        <span>{{ $address_item['region'] }}, </span>
                                @endforeach

                                </p>
                            </div>
                        </div>
                        <p class="point__city">
                            @php
                                $index = 0;
                            @endphp
                            @foreach( $field['delivery-work-address']['repeater1'] as $address_item)
                                {{ $address_item['region'] }},
                                @php
                                    $index++;
                                @endphp
                                @if($index == 7)
                                    @break
                                @endif
                            @endforeach
                            @if( count($field['delivery-work-address']['repeater1']) > 7)
                                <button class="point__all-city btn-dotted">
                                    Показать еще
                                </button>
                            @endif
                        </p>
                    </div>
                    <div class="point__block">
                        <div class="point__title">{{ $field['title']['title-type-pay'] }}</div>
                        <div class="point__list">
                            <ul>
                                @foreach( $field['title']['type-pay-title'] as $item)
                                    <li>{{ $item['title'] }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="point__block">
                        <div class="point__title">{{ $field['title']['title-type-delivery'] }}</div>
                        <div class="point__list">
                            <ul>
                                @php
                                $index_popup = 1;
                                @endphp
                                @foreach( $field['price'] as $price_item)
                                <li>{{ $price_item['repeater-title'] }}
                                    <div class="point__more-row">
                                        <span>Стоимость от {{ $price_item['min_price'] }} рублей</span>
                                        <a href="#popup-terminal-{{ $index_popup }}" class="point__terminal-btn btn-dotted popup-link">Подробнее</a>
                                    </div>

                                    <div id="popup-terminal-{{ $index_popup }}" class="popup popup-courier popup-terminal main-popup">
                                        <div class="popup__body">
                                            <div class="popup__content popup-courier__content">
      <span class="popup__close close-popup">
      </span>
                                                <div class="popup-day__title popup-title">
                                                    {{ $price_item['title'] }}
                                                </div>
                                                <div class="popup-courier__subtitle">
                                                    {{ $price_item['subtitle'] }}
                                                </div>
                                                <div class="popup-courier__info">
                                                    {{ $price_item['important-info'] }}
                                                </div>
                                                <div class="popup-courier__items">
                                                    @php
                                                        $new_row = 0;
                                                    @endphp
                                                    @foreach( $price_item['repeater1'] as $repeater_price)
                                                        @if ($new_row == 0)
                                                        <div class="popup-courier__row">
                                                        @endif
                                                            <div class="popup-courier__item courier-item">
                                                                <div class="courier-item__cities">
                                                                    {!! $repeater_price['cities'] !!}
                                                                </div>
                                                                <div class="popup-courier__body">
                                                                    @if( isset($repeater_price['repeater2']) && is_array( $repeater_price['repeater2']))
                                                                        <div class="courier-item__head-row">
                                                                            <div class="courier-item__column">
                                                                                Вес от, кг
                                                                            </div>
                                                                            <div class="courier-item__column">
                                                                                Вес до, кг
                                                                            </div>
                                                                            <div class="courier-item__column">
                                                                                Цена, руб
                                                                            </div>
                                                                        </div>
                                                                        @foreach( $repeater_price['repeater2'] as $repeater_item)
                                                                        <div class="courier-item__row">
                                                                            <div class="courier-item__column">
                                                                                {{ $repeater_item['weight-from'] }}
                                                                            </div>
                                                                            <div class="courier-item__column">
                                                                                {{ $repeater_item['weight-to'] }}
                                                                            </div>
                                                                            <div class="courier-item__column">
                                                                                {{ $repeater_item['price'] }}
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @else
                                                                        <div class="popup-courier__gift">Доставка бесплатно</div>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        @if ($new_row == 1)
                                                        </div>
                                                        @endif
                                                        @php
                                                            $new_row++;
                                                            if( $new_row == 2)
                                                                $new_row = 0;
                                                        @endphp
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                    @php
                                        $index_popup++;
                                    @endphp
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="point__bottom">
                        <a href="#popup-point" class="btn-dotted popup-link">
                            {{ $field['title']['title-place-delivery'] }}
                        </a>
                        <a href="#popup-day" class="btn-dotted popup-link">
                            {{ $field['title']['title-day-delivery'] }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<div id="popup-day" class="popup popup-day main-popup">
    <div class="popup__body">
        <div class="popup__content popup-day__content">
      <span class="popup__close close-popup">
      </span>
            <div class="popup-day__title popup-title">
                Дни доставки товара по району
            </div>
            <div class="popup-day__list-city">
                <ul>
                    @foreach( $field['delivery-work-day']['repeater1'] as $region)
                    <li><a class="table__link" href="#{{ $region['id-for-select'] }}">{{ $region['region'] }} </a></li>
                    @endforeach
                </ul>
            </div>
            <div class="popup-day__table table">
                <div class="table__row table__row-head table__head">
                    <div class="table__column-name">Районы РБ</div>
                    <div class="table__column-day">Пн</div>
                    <div class="table__column-day">Вт</div>
                    <div class="table__column-day">Ср</div>
                    <div class="table__column-day">Чт</div>
                    <div class="table__column-day">Пт</div>
                    <div class="table__column-day">Сб</div>
                    <div class="table__column-day">Вс</div>
                </div>

                @foreach( $field['delivery-work-day']['repeater2'] as $work_day)
                <div @if(isset($work_day['id-select'])) id="{{ $work_day['id-select'] }}" @endif class="table__row">
                    <div class="table__column-name">{{ $work_day['delivery-region-title'] }}</div>
                    <div class="table__column-day @if( !$work_day['monday']) not-work @endif"></div>
                    <div class="table__column-day @if( !$work_day['tuesday']) not-work @endif"></div>
                    <div class="table__column-day @if( !$work_day['wednesday']) not-work @endif"></div>
                    <div class="table__column-day @if( !$work_day['thursday']) not-work @endif"></div>
                    <div class="table__column-day @if( !$work_day['friday']) not-work @endif"></div>
                    <div class="table__column-day @if( !$work_day['saturday']) not-work @endif"></div>
                    <div class="table__column-day @if( !$work_day['sunday']) not-work @endif"></div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>


<div id="popup-point" class="popup popup-point main-popup">
    <div class="popup__body">
        <div class="popup__content popup-point__content">
      <span class="popup__close close-popup">
      </span>
            <div class="popup-day__title popup-title">
                {{ count($field['delivery-work-address']['repeater1']) }} пункта выдачи товаров
            </div>
            <div class="popup-day__list-city popup-point__list">
                <ul>
                    @php
                        $index = 0;
                    @endphp
                    @foreach( $field['delivery-work-address']['repeater1'] as $address_item)
                    <li><a class="table__link" href="#city-point{{ $index }}">{{ $address_item['region'] }}, </a></li>
                        @php
                            $index++;
                        @endphp
                    @endforeach
                </ul>
            </div>
            <div data-spollers="991, max" class="popup-point__items">
                @php
                    $index = 0;
                @endphp
                @foreach( $field['delivery-work-address']['repeater1'] as $address_item )

                    @foreach( $address_item['repeater2'] as $address )

                    <div id="city-point{{ $index }}" class="popup-point__item">
                        <div data-spoller="" class="popup-point__city">
                            {{ $address_item['region'] }}
                        </div>
                        <div class="popup-point__info">
                            <div class="popup-point__adress">
                                <div class="popup-point__icon-adress icon">
                                    <svg>
                                        <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#adress">
                                        </use>
                                    </svg>
                                </div>
                                <span>{{ $address['address'] }}</span>
                            </div>
                            <div class="popup-point__phone">
                                <div class="popup-point__icon-phone icon">
                                    <svg>
                                        <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#phone">
                                        </use>
                                    </svg>
                                </div>
                                <span>{{ $address['phone'] }}</span>
                            </div>
                            <div class="popup-point__time">
                                <div class="popup-point__icon-time icon">
                                    <svg>
                                        <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#clock">
                                        </use>
                                    </svg>
                                </div>
                                <div class="popup-point__time-wrap">
                                    @php
                                    $work_time = explode('|', $address['work-time'])
                                    @endphp
                                    @foreach( $work_time as $item )
                                        <span>{{ $item }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                    @php
                        $index++;
                    @endphp
                @endforeach
            </div>

        </div>
    </div>
</div>

@endforeach
