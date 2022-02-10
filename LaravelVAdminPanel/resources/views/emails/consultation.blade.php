@component('mail::message')
{{--# Introduction--}}

{{--The body of your message.--}}

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

{{--Thanks,<br>--}}
{{--{{ config('app.name') }}--}}

Нужна консультация

    Имя: {{ $name ?? '' }}
    Номер телефона: {{ $phone ?? '' }}

    Почта: {{ $email ?? '' }}


Thanks,<br>
{{ config('app.name') }}

@endcomponent

