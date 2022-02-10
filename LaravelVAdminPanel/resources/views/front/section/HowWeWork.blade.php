
@foreach( $fields['HowWeWork'] as $field)

<section class="how-work">
    <div class="container">
        <div class="how-work__wrapper">
            <h3 class="how-work__title title">
                {{ $field['title'] }}
            </h3>
        </div>
        <div class="how-work__items">

            @foreach( $field as $item )

                @if( is_array($item) )
                <div class="how-work__item">
                    <div class="how-work__icon icon">
                        @php
                            $url = '#';
                            if($item['file-id']['status'] == 'ok') {
                                $url = (\Illuminate\Support\Facades\URL::asset($item['file-id']['url']));
                            }
                        @endphp
                        <svg>
                            <use href="{{ $url }}">
                            </use>
                        </svg>
                    </div>
                    <div class="how-work__item-title">
                        {{ $item['title'] }}
                    </div>
                    <div class="how-work__descr">
                        {!! $item['description'] !!}
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

@endforeach
