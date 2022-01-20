
<footer class="footer">
    <div class="footer__top footer-top">
        <div class="container">
            <div class="footer-top__wrapper">
                <div class="footer-top__row">
                    <div class="footer-top__column">
                        <div class="footer-top__logo">
                            <a href="{{ \Illuminate\Support\Facades\URL::to("/") }}">
                                <picture>
                                    <source srcset="{{ \Illuminate\Support\Facades\URL::asset( $siteSettings['siteSettings']['file-id']['url'] ) }}" type="image/webp">
                                    <img src="{{ \Illuminate\Support\Facades\URL::asset( $siteSettings['siteSettings']['file-id']['url'] ) }}" alt="Logo">
                                </picture>
                            </a>
                        </div>
                        <div class="footer-top__contact">
                            <div class="footer-top__phone">
                                <a href="tel:{{ preg_replace('/\s+/', '',$siteSettings['siteSettings']['phone']) }}">{{$siteSettings['siteSettings']['phone'] }}</a>
                            </div>
                            <div class="footer-top__mail footer-mail">
                                <a href="mailto:{{ preg_replace('/\s+/', '',$siteSettings['siteSettings']['email']) }}">
                                    <div class="footer-mail__icon icon">
                                        <svg>
                                            <use href="{{ \Illuminate\Support\Facades\URL::asset('front') }}/img/sprite/sprite.svg#mail">
                                            </use>
                                        </svg>
                                    </div>
                                    <span>{{ $siteSettings['siteSettings']['email'] }}</span>
                                </a>
                            </div>
                            <div class="footer-top__messenger">
                                <p>
                                    {{ $siteSettings['siteSettings']['text-under-email'] }}
                                </p>
                            </div>
                        </div>


                    </div>
                    <div class="footer-top__column">
                        <div class="footer-top__links">
                            <ul>
                                <li>
                                    <a href="#">Каталог
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Установка
                                    </a>
                                </li>
                                <li><a href="#">Спорттовары

                                    </a>
                                </li>
                                <li><a href="#">Контакты

                                    </a>
                                </li>
                                <li><a href="#">Отзывы

                                    </a>
                                </li>
                                <li><a href="#">Акция

                                    </a>
                                </li>
                                <li><a href="#">Доставка/Оплата

                                    </a>
                                </li>
                                <li><a href="#">Рассрочка
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="footer-top__column">
                        <div class="footer-top__form footer-form">
                            <form action="#">
                                <div class="footer-form__content">
                                    <div class="footer-form__title">
                                        {{ $siteSettings['siteSettings']['title-above-number'] }}
                                    </div>
                                    <div class="footer-form__subtitle">
                                        {{ $siteSettings['siteSettings']['subtitle-above-number'] }}
                                    </div>
                                    <div class="footer-form__block">
                                        <div class="footer-form__input">
                                            <input type="text" class="form-phone" placeholder="+375 ( ___ )  ___   ___">
                                        </div>
                                        <div class="footer-form__btn-wrap">
                                            <button class="footer-form__btn btn" type="submit">Получить консультацию</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="footer-top__row">
                    <div class="footer-top__column">
                        <div class="footer-top__adress footer__text">
                            <p>{{ $siteSettings['siteSettings']['left-text-block'] }}</p>
                        </div>
                    </div>
                    <div class="footer-top__column">
                        <div class="footer-top__info footer__text">
                            <p>{{ $siteSettings['siteSettings']['right-text-block'] }}</p>
                        </div>
                    </div>
                    <div class="footer-top__column">
                        <div class="footer-top__payments">

                            @foreach( $payment['repeater-payment'] as $pay )
                                <div class="footer-top__payment">
                                    <picture>
                                        <source srcset="{{ \Illuminate\Support\Facades\URL::asset( $pay['file-id']['url'] ) }}" type="image/webp">
                                        <img src="{{ \Illuminate\Support\Facades\URL::asset( $pay['file-id']['url'] ) }}" alt="Payment">
                                    </picture>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="footer__copy">
        <div class="container">
            <div class="footer__copy-wrapper">
                <span>{{ $siteSettings['siteSettings']['copyright'] }}</span>
            </div>
        </div>
    </div>
</footer>
