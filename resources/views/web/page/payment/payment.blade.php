@extends('web.shop')
@section('title')
Thank you
@endsection
@section('stylesheets')
@endsection
@section('content')
<div class="container mt-30 mb-30">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center text-white bg-info">

                <div class="card-body">
                    <h5 class="card-title">Terima kasih...!!!</h5>
                    <p class="card-text">Orderan anda telah di proses, silahkan cek email anda untuk melakukan proses
                        pembayaran.</p>
                    <a href="{{route('shop.index')}}" class="btn btn-success"><i class="fa fa-shopping-cart"></i>
                        kembali belanja</a>
                    
                        @if (!$order->isPaid())
                            <a href="{{$order->payment_url}}" class="btn btn-success"><i class="fa fa-shopping-cart"></i>
                                Proses Pembayaran</a>
                        @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection