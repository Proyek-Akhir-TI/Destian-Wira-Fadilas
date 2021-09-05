@component('mail::message')
# Permintaan Aktivasi Toko

Aktivasi Toko Kami!

Nama Toko : {{$shop['name']}}


@component('mail::button', ['url' => url('admin/shops/')])
Kelola Toko
@endcomponent

Terimakasih,<br>
{{ config('app.name') }}
@endcomponent
