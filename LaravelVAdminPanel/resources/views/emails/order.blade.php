@component('mail::message')
Новый заказ

{{ $bodyEmail ?? '' }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
