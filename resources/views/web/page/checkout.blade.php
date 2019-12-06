@extends('web.shop')
@section('stylesheets')
<style>
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
    }

    .preloader .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font: 14px arial;
    }

    .dedy {
        opacity: 0.5;
    }
</style>
<script>
    $(document).ready(function(){
            $(".preloader").hide();
            });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

@endsection
@section('content')

<!--Checkout page section-->
<div class="Checkout_section mt-20">
    <div class="container">
        @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message')}}
        </div>
        @elseif(session()->has('errors_message'))
        <div class="alert alert-danger">
            {{ session()->get('errors_message')}}
        </div>
        @endif

        {{-- @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
        @endforeach
        </ul>
    </div>
    @endif --}}
    <div class="preloader">
        <div id="loader" class="loading">
            <img src="{{asset('images/loader.gif')}}" width="80">
            <p>Harap Tunggu</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="user-actions">
                <h3>
                </h3>
            </div>

        </div>
    </div>
    <div class="contianer">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <form method="POST" class="form-horizontal" name="formOngkir" id="formOngkir">
                    <h3>Billing Details</h3>
                    @csrf
                    <div class="form-group row">

                        <div class="col-lg-12 mb-20">
                            <label>Nama Lengkap<span>*</span></label>
                            <input name="name" id="name" type="text" value="{{auth()->user()->name}}"
                                class="form-control" required="">
                        </div>
                        <div class="col-lg-6 mb-20">
                            <label>Phone<span>*</span></label>
                            <input name="phone" id="phone" value="{{ old('phone') }}" class="form-control" required="">
                        </div>
                        <div class="col-lg-6 mb-20">
                            <label> Email Address <span>*</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                type="email" value="{{auth()->user()->email}}" readonly>
                        </div>
                        <div class="col-lg-6 mb-20">
                            <label for="">Provinsi<span>*</span></label>
                            <select class="form-control province_destination" name="province_destination"
                                id="province_destination">
                                <option value="">--Provinsi--</option>
                                @foreach ($provinces as $province => $value)
                                <option value="{{$province}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 mb-20">
                            <label for="">Kota <span>*</span></label>
                            <select class="form-control" name="city_destination" id="city_destination">
                                <option>--Kota--</option>
                            </select>
                        </div>

                        <input type="hidden" id="province_origin" name="province_origin" value="24">
                        <input type="hidden" id="courier" name="courier" value="jne">
                        <input type="hidden" id="city_origin" name="city_origin" value="193">
                        <input type="hidden" name="weight" id="weight" class="form-control" value="1000">
                        <input type="hidden" name="ongkir" id="ongkir" class="form-control">

                        <div class="col-12 mb-20">
                            <div>
                                <label>Alamat Lengkap <span>*</span></label>
                                <textarea class="form-control" id="address" name="address"
                                    placeholder="Alamat lengkap rumah atau kantor " required=""></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="payment_method row">
                        <div class="order_button" style="margin-right:40%; margin-left:3%">
                            <button id="btn-cek"><i class="fa fa-truck"></i> Cek Pengiriman</button>
                        </div>
                        <div class="order_button pull-right">
                            <div class="form-group row">
                                <button id="btn-checkout" type="submit" disabled class="dedy"><i
                                        class="fa fa-shopping-cart"></i> Proses
                                    Checkout</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6">
                <h3>Your order</h3>
                <div class="order_table table-responsive">
                    <table id="#tablecheckout">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                            <tr>
                                <td> {{$item->model->name}} <strong> × {{$item->qty}}</strong></td>
                                <td> {{$item->model->presentPrice()}}</td>

                            </tr>
                            @endforeach
                            {{-- <tr>
                                    <td>Pajak (5%)</td>
                                    <td>Rp{{Cart::tax()}}</td>
                            </tr> --}}
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Subtotal</th>
                                <td id="subtotal"> {{Cart::subtotal()}}</td>
                            </tr>
                            @if (session()->has('coupon'))
                            <tr>  
                                <th class="d-flex justify-content-center">Discount({{session()->get('coupon')['name']}}) :  
                                    <form action="{{route('coupon.destroy')}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Remove Coupon" type="submit">  <i
                                                class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </th>
                                <td>-{{rupiahFormat(session()->get('coupon')['discount'])}}</td>
                            </tr>

                            @endif
                            <tr class="order_total">
                                <th>Order Total</th>
                                <td id="total"><strong>{{rupiahFormat($newTotal)}}</strong></td>
                            </tr>
                        </tfoot>
                    </table>

                </div>

                @if (! session()->has('coupon'))
                <div class="user-actions" style="margin-top:20px">
                    <h3>
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                        Anda memiliki kupon belanja?
                        <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_coupon"
                            aria-expanded="true">Masukkan kupon anda disini</a>

                    </h3>
                    <div id="checkout_coupon" class="collapse" data-parent="#accordion">
                        <div class="checkout_info">
                            <form action="{{route('coupon.store')}}" method="POST">
                                @csrf
                                <input placeholder="Coupon code" name="coupon_code" id="coupon_code" type="text">
                                <button type="submit">Apply coupon</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="user-actions">
                <h3>
                </h3>
            </div>

        </div>
    </div>
</div>
</div>
<!--Checkout page section end-->
@endsection
@section('scriptjs')

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
</script>
@endsection