
<div class="benefits">
    <div class="container">
        <div class="benefits__wrapper">
            <div class="benefits__items">

                @foreach( $fields['Benefits'] as $field)
                    <div data-aos="fade-down" data-aos-duration="800" class="benefits__item">
                            <div class="benefits__icon icon">
                                <svg>
                                    <use href="{{ \Illuminate\Support\Facades\URL::asset($field['imageField']['url']) }}">
                                    </use>
                                </svg>
                            </div>
                            <div class="benefits__text">
                      <span>{{ $field['textareaInput'] }}</span>
                            </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
