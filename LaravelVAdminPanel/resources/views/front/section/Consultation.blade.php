
@foreach( $fields['Consultation'] as $field)

<section class="consult">
    <div class="container">
        <div class="consult__wrapper">
            <h3 class="consult__title title">
                Если Вам нужна консультация
            </h3>
            <div class="consult__subtitle subtitle">
                Оставьте номер телефона, мы перезвоним и ответим на все Ваши вопросы

            </div>
            <div class="consult__form">
                <form action="#">
                    <div class="consult__form-body js-get-form-info">
                        <div class="consult__input form-input">
                            <input type="text" class="js-get-name" placeholder="Имя">
                        </div>
                        <div class="consult__input form-input">
                            <input type="text" class="js-get-email" placeholder="Email">
                        </div>
                        <div class="consult__input form-input">
                            <input class="form-phone js-get-phone" type="text" placeholder="Телефон">
                        </div>
                        <div class="consult__input">
                            <button class="btn js-send-consultation" type="submit">Получить консультацию</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>

@endforeach
