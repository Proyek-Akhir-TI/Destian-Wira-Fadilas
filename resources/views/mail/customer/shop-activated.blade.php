@component('mail::message')
# Selamat!

Toko Anda telah aktif.


@component('mail::button', ['url' => route('shops.show', $shop->id)])
Kelola Toko Anda
@endcomponent

Terimakasih,<br>
{{ config('app.name') }}
@endcomponent
