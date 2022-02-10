
@foreach( $fields['HurryUpToBuy'] as $field)
<div class="gift">
    <div class="container">
        <div class="gift__wrapper">
            <div class="gift__warn gift-warn" style="margin-top: initial">
                <div class="gift-warn__body">
                    <div class="gift-warn__title">
                        {!! $field['title'] !!}
                    </div>
                    <div class="gift-warn__content">
                        <div class="gift-warn__head">
                            <div class="gift-warn__warning">
                                Внимание!
                            </div>
                            <div class="gift-warn__text">
                                <span>На {{ $field['date'] }} осталось</span>
                                <strong>{{ $field['gift-count'] }}</strong>
                                <span>подарков</span>
                            </div>
                        </div>
                        <div class="gift-warn__form">
                            <form action="#">
                                <div class="gift-warn__form-body">
                                    <div class="form-input gift-warn__input">
                                        <input class="form-phone" type="text" placeholder="Ваш телефон">
                                    </div>
                                    <div class="gift-warn__btn-wrap">
                                        <button class="gift-warn__btn btn" type="submit">
                                            {{ $field['button-title'] }}
                                        </button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
