
@foreach( $fields['TextBlockFields'] as $field)

<section class="section-info">
    <div class="container">
        <div class="section-info__wrapper">
            <h3 class="title section-info__title">
                {!! $field['title'] !!}
            </h3>
            <div class="section-info__text">
                <p>
                    {!! $field['description'] !!}
                </p>
            </div>
        </div>
    </div>
</section>

@endforeach
