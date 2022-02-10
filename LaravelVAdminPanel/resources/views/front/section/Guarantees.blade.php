
@foreach( $fields['Guarantees'] as $field)

<section class="return">
    <div class="container">
        <div data-aos="fade-right" data-aos-duration=" 700" class="return__wrapper">
            <div class="return__items">

                @foreach( $field as $item)

                <div class="return__item">
                    <div class="return__icon icon">
                        @php
                            $image_url = '';
                        @endphp

                        @if ( $item['imageField']['status'] == 'ok' )
                            @php
                                $image_url =  \Illuminate\Support\Facades\URL::asset($item['imageField']['url']);
                            @endphp
                        @endif
                        <svg>
                            <use href="{{ $image_url }}">
                            </use>
                        </svg>
                    </div>
                    <div class="return__content">
                        <h3 class="return__title">
                            {!! $item['inputField'] !!}
                        </h3>
                        <div class="return__info">
                            {!! $item['textareaInput'] !!}
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</section>

@endforeach
