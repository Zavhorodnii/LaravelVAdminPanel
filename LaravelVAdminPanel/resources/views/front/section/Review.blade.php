
@foreach( $fields['Review'] as $field)

<div class="review">
    <div class="container">
        <div class="review__wrapper">
            <div data-aos="zoom-in" data-aos-duration="700" class="review__tabs-container">
                <div class="review__tabs review-tabs _tabs">
                    <div class="review-tabs__nav">
                        <div class="review-tabs__item _tabs-item _active">{{ $field['title']['title_text'] }}</div>
                        <div class="review-tabs__item _tabs-item">{{ $field['title']['title_video'] }}</div>
                        <div class="review-tabs__item _tabs-item">{{ $field['title']['title_audio'] }}</div>
                    </div>
                    <div class="review__subtitle">
                        {!! $field['title']['subtitle'] !!}
                    </div>
                    <div class="review-tabs__body">
                        <div class="review-tabs__block _active _tabs-block">
                            <div class="review__slider review-slider">

                                @foreach( $field['text_reviews'] as $review)

                                <div class="review-slide">
                                    <div class="review-slide__img ibg">
                                        <picture>
                                            <source srcset="{{ \Illuminate\Support\Facades\URL::asset( $review['file'] ) }}" type="image/webp">
                                            <img src="{{ \Illuminate\Support\Facades\URL::asset( $review['file'] ) }}" alt="Woman">
                                        </picture>
                                    </div>
                                    <div class="review-slide__content">
                                        <p class="review-slide__text">
                                            {!! $review['description'] !!}
                                        </p>
                                        <div class="review-slide__name">{{ $review['name'] }}</div>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>
                        <div class="review-tabs__block _tabs-block">
                            <div class="review__slider review-slider">

                                @foreach( $field['video_review'] as $review)

                                <div class="review-slide">
                                    <div class="review-slide__video">
                                        <div class="yt-lazyload ibg" data-id="{{ $review['video']['youtube_video_id'] }}">
                                            <picture>
                                                <source srcset="{{ $review['video']['youtube_thumbnail'] }}" type="image/webp">
                                                <img src="{{ $review['video']['youtube_thumbnail'] }}" alt="User">
                                            </picture>
                                            <div class="video-fon"></div>
                                        </div>
                                    </div>
                                    <div class="review-slide__content">
                                        <div class="review-slide__name">{{ $review['name'] }}</div>
                                        <p class="review-slide__text">
                                            {!! $review['review'] !!}
                                        </p>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>
                        <div class="review-tabs__block _tabs-block">
                            <div class="review__slider review-slider--audio  review-slider">

                                @foreach( $field['audio_review'] as $review)

                                <div class="review-slide">
                                    <div class="review-slide__audio-body">
                                        <div class="review-slide__adress">
                                            г. {{ $review['city'] }}
                                        </div>
                                        <div class="review-slide__date">
                                            {{ $review['date'] }}
                                        </div>
                                        <div class="review-slide__audio-wrap">
                                            <audio controls="controls">
                                                <source src="{{ $review['file'] }}" type="audio/mpeg">
                                            </audio>
                                        </div>
                                    </div>
                                    <div class="review-slide__content">
                                        <div class="review-slide__name">{{ $review['name'] }}</div>
                                        <p class="review-slide__text">
                                            {!! $review['review'] !!}
                                        </p>

                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<section class="form-review">
    <div class="container">
        <div class="form-review__wrapper">
            <h3 class="form-review__title title">
                Здесь Вы можете оставить свой отзыв, предложение, претензию по нашей работе
            </h3>
            <div class="form-review__form review-form">
                <form action="#" class="js-get-form-info">
                    <div class="review-form__body">
                        <div class="review-form__inputs">
                            <div class="review-form__input form-input">
                                <input type="text" class="js-get-name" placeholder="Имя">
                            </div>
                            <div class="review-form__input form-input">
                                <input class="form-phone js-get-phone" type="text" placeholder="Телефон">
                            </div>
                            <div class="review-form__input form-input">
                                <input type="text" class="js-get-email" placeholder="Email">
                            </div>
                            <div class="review-form__input form-input">
                                <input type="text" class="js-get-link" placeholder="Ссылка на видео">
                            </div>
                        </div>
                        <div class="review-form__textarea">
                            <textarea class="js-get-message" placeholder="Ваш комментарий"></textarea>
                        </div>
                        <div class="review-form__buttons">
                            <div class="review-form__add-btn">
                                <label for="img-select">
                                    Прикрепить фотографию
                                </label>
                                <input id="img-select" class="js-get-files" multiple type="file" accept="image/*">
                            </div>
                            <div class="review-form__send">
                                <button type="submit" class="btn js-send-form-review">Отправить</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endforeach
