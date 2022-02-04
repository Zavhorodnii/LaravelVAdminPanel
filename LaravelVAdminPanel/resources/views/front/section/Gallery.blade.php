
@foreach( $fields['Gallery'] as $field )
<section class="foto">
    <div class="container">
        <div class="foto__wrapper">
            <h3 class="title foto__title">
                {{ $field['title'] }}
            </h3>
            <div class="foto__subtitle">
                {{ $field['description'] }}
            </div>

            @php
             $index = 0;
            $index_image = 0;
            @endphp

            @while( $index < $field['while_count'] )

            <div class="foto__gallery">
                <div data-aos="fade-right" data-aos-duration="800" class="foto__left">
                    <div class="foto__row">
                        <div class="foto__img ibg">
                            @if(isset($field['images'][$index_image]))
                            <picture>
                                <source srcset="{{ \Illuminate\Support\Facades\URL::asset($field['images'][$index_image]['file-id']['url']) }}" type="image/webp">
                                <img src="{{ \Illuminate\Support\Facades\URL::asset($field['images'][$index_image]['file-id']['url']) }}" alt="foto">
                                @php
                                $index_image++;
                                @endphp
                            </picture>
                            @endif
                        </div>
                        <div class="foto__img ibg">
                            @if(isset($field['images'][$index_image]))
                                <picture>
                                    <source srcset="{{ \Illuminate\Support\Facades\URL::asset($field['images'][$index_image]['file-id']['url']) }}" type="image/webp">
                                    <img src="{{ \Illuminate\Support\Facades\URL::asset($field['images'][$index_image]['file-id']['url']) }}" alt="foto">
                                    @php
                                        $index_image++;
                                    @endphp
                                </picture>
                            @endif
                        </div>
                    </div>
                    <div class="foto__row">
                        <div class="foto__img--big foto__img ibg">
                            @if(isset($field['images'][$index_image]))
                                <picture>
                                    <source srcset="{{ \Illuminate\Support\Facades\URL::asset($field['images'][$index_image]['file-id']['url']) }}" type="image/webp">
                                    <img src="{{ \Illuminate\Support\Facades\URL::asset($field['images'][$index_image]['file-id']['url']) }}" alt="foto">
                                    @php
                                        $index_image++;
                                    @endphp
                                </picture>
                            @endif
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-duration="800" class="foto__right">
                    <div class="foto__img--height ibg">
                        @if(isset($field['images'][$index_image]))
                            <picture>
                                <source srcset="{{ \Illuminate\Support\Facades\URL::asset($field['images'][$index_image]['file-id']['url']) }}" type="image/webp">
                                <img src="{{ \Illuminate\Support\Facades\URL::asset($field['images'][$index_image]['file-id']['url']) }}" alt="foto">
                                @php
                                    $index_image++;
                                @endphp
                            </picture>
                        @endif
                    </div>
                </div>
            </div>
                @php
                    $index++;
                @endphp

            @endwhile

        </div>
    </div>

</section>
@endforeach
