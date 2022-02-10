
@foreach( $fields['Catalog'] as $fields_)

@if ( $fields_['show_top'] == false )

<section class="high-ath">
    <div class="container">
        <div class="high-ath__wrapper">
            <h3 class="high-ath__title title">
                {!! $fields_['title'] !!}
            </h3>
            <div class="high-ath__subtitle subtitle">
                {!! $fields_['description'] !!}
            </div>
            <div class="high-ath__items">

                @foreach( $fields_['repeater'] as $field)

                <a data-aos="flip-right" href="{{ $field['page-link'] }}" data-aos-duration="700" class="high-ath__item">
                    <div class="high-ath__item-content">
                        <div class="high-ath__img ibg">
                            <picture>
                                @php
                                $image_url = '';
                                @endphp

                                @if ( $field['file-id']['status'] == 'ok' )
                                    @php
                                        $image_url =  \Illuminate\Support\Facades\URL::asset($field['file-id']['url']);
                                    @endphp
                                @endif

                                <source srcset="{{ $image_url }}" type="image/webp">
                                <img src="{{ $image_url }}" alt="">
                            </picture>
                        </div>
                        <div class="high-ath__name">
                            {{ $field['title'] }}
                        </div>
                    </div>
                </a>

                @endforeach

            </div>
        </div>
    </div>
</section>

@else

<section class="type">
    <div class="container">
        <div data-aos-duration="700" data-aos="fade-right" class="type__wrapper">
            <div class="type__head">
                <h2 class="type__title title">
                    {!! $fields_['title'] !!}
                </h2>
                <div class="type__subtitle subtitle">
                    {!! $fields_['description'] !!}
                </div>
                <a href="{{ $fields_['important_link'] }}" class="btn-link type__link">{!! $fields_['important_title'] !!}</a>
            </div>
            <div class="type__items">

                @foreach( $fields_['repeater'] as $field)
                <div data-aos="flip-right" data-aos-duration="700" class="type__item type-item">
                    <div class="type-item__img ibg">
                        <picture>
                            @php
                                $image_url = '';
                            @endphp

                            @if ( $field['file-id']['status'] == 'ok' )
                                @php
                                    $image_url =  \Illuminate\Support\Facades\URL::asset($field['file-id']['url']);
                                @endphp
                            @endif
                            <source srcset="{{ $image_url }}" type="image/webp">
                            <img src="{{ $image_url }}" alt="Inventar">
                        </picture>
                    </div>

                    <div class="type-item__bottom">
                        <div class="type-item__name">{!! $field['title'] !!}</div>
                        <div class="type-item__hide">
                            <a href="{{ $field['page-link'] }}" class="type-item__all btn">Посмотреть все</a>
                            <a href="{{ $field['top_link'] }}" class="btn-link type-item__top">{{ $field['top_title'] }}</a></div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

@endif

@endforeach
