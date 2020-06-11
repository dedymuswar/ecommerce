
@component('mail::message')
    #Hi.. Bro/Sis {{ $order->user->name }}...!
  
Terimakasih telah melakukan pemesanan di Toko Online kami.
Sebagai konfirmasi, berikut data detail pemesananya.

#Detail Order

@component('mail::table')
| Nama | Quantity | Harga |
| ------------- |:-------------:| --------:|
@foreach ($order->products as $item)
| {{ $item->name }} | {{ $item->pivot->quantity }} | Rp{{ number_format($item->price, 2) }}|
@endforeach
@endcomponent

@component('mail::table')
| | | |
| ------------- |:-------------:| --------:|
| Order ID | {{ $order->id }}|
| Jumlah | Rp{{ $order->billing_subtotal }}|
| Biaya Pengiriman | Rp{{ $order->billing_ongkir }}|
| Discount | {{ $order->billing_discount }}|
| Total Order | <b>Rp{{ $order->billing_total }}</b>|
@endcomponent

@component('mail::button', ['url' => '{{ $order->payment_url }}', 'color' => 'green'])
Proses Pembayaran
@endcomponent

Pembayaran bisa dilakukan melalui transfer ke rekening dibawah ini :

<strong> BRI : 03090102915023821</strong>

<b> lakukan pembayaran anda sebelum tanggal : 18 May 2020, jam 08:13</b>

Harap transfer sesuai dengan nominal "TOTAL ORDER" ke salah satu bank di atas!
Setalah transfer, segera Konfirmasi Pembayaran. *Perbedaan nilai transfer akan menghambat proses verifikasi!

<strong>Pemesanan dianggap batal jika tidak melakukan pembayaran selama 8 jam</strong>

Terima kasih telah memilih kami.
<hr>
<p>Email dikirim secara otomatis. Mohon untuk tidak mengirimkan balasan ke email ini.
Jika anda mengalami kesulitan bisa hubungi kami di No. HP/WA : 082291548484<p>

Regards, 

{{ config('app.name') }}
@endcomponent