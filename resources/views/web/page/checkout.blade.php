@extends('web.shop')
@section('title')
Checkout
@endsection
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

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> --}}
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
        <div class="preloader">
            <div id="loader" class="loading">
                <img src="{{asset('images/loader.gif')}}" width="80">
                <p>Harap Tunggu</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="user-actions">
                    <h3>
                    </h3>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="row ml-1">
                        <h3>Billing Details</h3>
                        @if (!empty($alamat))
                        <div class="float-right ml-4"><a href="{{ route('user.profilku' ) }}"
                                class="btn btn-success btn-sm" title="edit"><i class="fa fa-edit"></i></a></div>
                        @endif
                    </div>
                    @if (!empty($alamat))
                    <table class="table">
                        <form method="POST" id="formku" class="form-horizontal"
                            action="{{ route('checkout.submitOrder') }}">
                            @csrf
                            <tbody>
                                @foreach ($alamat as $item)
                                <tr>
                                    <td>Nama Penerima</td>
                                    <td><strong>{{ $item->penerima }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td>{{ $item->telepon }}</td>
                                </tr>
                                <tr>
                                    <td>Provinsi</td>
                                    <td>{{ $item->province->title }}</td>
                                </tr>
                                <tr>
                                    <td>Kota / Kabupaten</td>
                                    <td>{{ $item->city->title }}</td>
                                </tr>
                                <tr>
                                    <td>Kodepos</td>
                                    <td>{{ $item->kodePos }}</td>
                                </tr>
                                <tr>
                                    <td width="40%">Alamat lengkap</td>
                                    <td>{{ $item->alamatLengkap }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    <div class="col-12 mb-20">
                        <div>
                            <label>Catatan <span>*</span></label>
                            <textarea class="form-control" id="catatan" name="catatan"
                                placeholder="Tambah catatan untuk pesanan anda" required=""></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="biayakirim" id="biayakirim" class="form-control">
                    @else
                    <form method="POST" id="formku" class="form-horizontal"
                        action="{{ route('checkout.submitOrder') }}">
                        @csrf
                        <div id="dedy"></div>
                        <div class="form-group row">

                            <div class="col-lg-12 mb-20">
                                <label>Nama Penerima<span>*</span></label>
                                <input name="penerima" id="name" type="text" value="{{ old('penerima') }}"
                                    class="form-control" required="">
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label>Phone<span>*</span></label>
                                <input name="telepon" id="phone" value="{{ old('phone') }}" class="form-control"
                                    required="">
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label> Kode Pos <span>*</span></label>
                                <input class="form-control @error('kodePos') is-invalid @enderror" id="kodePos"
                                    name="kodePos" type="text" required="">
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
                            <input type="hidden" name="biayakirim" id="biayakirim" class="form-control">
                            <div class="col-12 mb-20">
                                <div>
                                    <label>Alamat Lengkap <span>*</span></label>
                                    <textarea class="form-control" id="address" name="alamatLengkap"
                                        placeholder="Alamat lengkap rumah atau kantor " required=""></textarea>
                                </div>
                            </div>
                            <div class="col-12 mb-20">
                                <div>
                                    <label>Catatan <span>*</span></label>
                                    <textarea class="form-control" id="catatan" name="catatan"
                                        placeholder="Tambah catatan untuk pesanan anda" required=""></textarea>
                                </div>
                            </div>
                        </div>

                        @endif
                </div>
                <div class="col-lg-6 col-md-6">
                    <h3>Your order</h3>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
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
                                    <td><a href="{{route('shop.show',$item->model->slug)}}"><img style="width:45px"
                                                src="{{asset('storage/'. cropedImage($item->model->image, 'small'))}}"
                                                alt=""></a>
                                        {{$item->model->name}} <strong> × {{$item->qty}}</strong></td>
                                    <td> {{ number_format($item->model->price, 2)}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr id="kontol">
                                    <th>Subtotal</th>
                                    <td id="subtotal"> {{Cart::subtotal()}}</td>
                                    <input type="hidden" name="subtotal" value="{{ Cart::subtotal() }}">
                                </tr>

                                @if (!empty($dataOngkir))
                                <tr>
                                    <th rowspan="2">Biaya Pengiriman</th>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="ongkir"
                                                value=" {{ number_format($dataOngkir['reg'], 2) }}">
                                            <label class="form-check-label" for="defaultCheck1">
                                                REG : {{ number_format($dataOngkir['reg'], 2) }} - Estimasi
                                                ({{ $dataOngkir['regEtd'] }})
                                                Hari
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @if (!empty($dataOngkir))
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="ongkir"
                                                value="{{ number_format($dataOngkir['oke'], 2) }}">
                                            <label class="form-check-label" for="defaultCheck1">
                                                OKE : {{ number_format($dataOngkir['oke'], 2) }} -
                                                Estimasi ({{ $dataOngkir['okeEtd'] }})
                                                Hari
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @if (session()->has('coupon'))
                                <tr>
                                    <th>Discount ({{session()->get('coupon')['name']}})</th>
                                    <td id="subtotal"> {{rupiahFormat(session()->get('coupon')['discount'])}}</td>
                                </tr>
                                @endif
                                <tr class="order_total" id="order_total">
                                    <th>Order Total</th>
                                    <td id="total"><strong>Rp -</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-shopping-cart"></i>
                            Pembayaran</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <total></total>
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


@endsection
@section('scriptjs')

<script>
    $(document).ready(function(){
        const province = $('#provinsi').text();
        const kota = $('#kota').text();        

        // MENGUBAH TOTAL ORDER
        $('tfoot').on("change", "input[type=radio][name=ongkir]", function(){
            const ongkir = $('input[name=ongkir]:checked').val();
            const subtotal = $('#subtotal').text();
            const total = parseInt(ongkir.replace(/,/g,'')) + parseInt(subtotal.replace(/,/g,''));
            $('#total').html(`<strong>Rp ${numberWithCommas(total)}.00</strong>`);

            $('input[name="biayakirim"]').val('');
            $('#biayakirim').val(ongkir)          
        });

        // MENCARI JUMLAH ONGKIR BERDASARKAN KOTA TUJUAN
        $('#formku'). on("change","select[name=city_destination]",function(){
            console.log($(this).val());
            var kotaasal = $('#city_origin').val();
            var kotatujuan = $('#city_destination').val();
            var courier = $('#courier').val();
            var weight = $('#weight').val();
            $("#biayapengiriman").remove();
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "ongkir/cekOngkir",
                method: "POST",
                data: {
                    city_origin: kotaasal,
                    city_destination: kotatujuan,
                    courier: courier,
                    weight: weight
                },
                processing: true,
                serverSide: true,
                beforeSend: function () {
                    $('.preloader').show();
                },
                complete: function () {
                   $('.preloader').hide();
                },
                success: function (data) {
                    $('#hasilOngkir1').empty();
                    $('#hasilOngkir2').empty();
                    var datas =`
                    <tr id="hasilOngkir1">
                        <th rowspan="2">Biaya Pengiriman [JNE]</th>
                        <td>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="ongkir"
                                    value="${data.ongkir.oke}">
                                <label class="form-check-label" for="defaultCheck1">
                                    REG : ${data.ongkir.oke} - Estimasi
                                    (${data.ongkir.okeEtd})
                                    Hari
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr id="hasilOngkir2">
                        <td>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="ongkir"
                                    value="${data.ongkir.reg}">
                                <label class="form-check-label" for="defaultCheck1">
                                    OKE : ${ data.ongkir.reg } -
                                    Estimasi (${ data.ongkir.regEtd })
                                    Hari
                                </label>
                            </div>
                        </td>
                    </tr>`;
                    $('#kontol').after(datas);                   
                }
            });
        });
    });

    function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    
</script>
@endsection