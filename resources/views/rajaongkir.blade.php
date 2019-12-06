<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

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
    </style>
    {{-- <script>
        $(document).ready(function(){
        $(".preloader").hide();
        });
    </script> --}}
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif
        <div class="container">
            {{-- <div class="preloader">
                <div id="loader" class="loading">
                    <img src="{{asset('images/loader.gif')}}" width="80">
            <p>Harap Tunggu</p>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Cek Ongkir
                </div>
                <div class="card-body">
                    <form action="{{route('ongkir.submit')}}" class="form-horizontal" name="formOngkir" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Provinsi Asal</label>
                                        <select name="province_origin" id="province_origin" class="form-control">
                                            <option value="">--Provinsi--</option>
                                            @foreach ($provinces as $province => $value)
                                            <option value="{{$province}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Kota Asal</label>
                                        <select name="city_origin" id="city_origin" class="form-control">
                                            <option>--Kota--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Provinsi Tujuan</label>
                                        <select name="province_destination" id="province_destination"
                                            class="form-control">
                                            <option value="">--Provinsi--</option>
                                            @foreach ($provinces as $province => $value)
                                            <option value="{{$province}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Kota Tujuan</label>
                                        <select name="city_destination" id="city_destination" class="form-control">
                                            <option>--Kota--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Kurir</label>
                                        <select name="courier" id="courier" class="form-control">
                                            @foreach ($couriers as $courier => $value)
                                            <option value="{{$courier}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Berat (g)</label>
                                        <input type="number" name="weight" id="weight" class="form-control"
                                            value="1000">
                                    </div>
                                </div>
                                <button id="btn-simpan" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group" id="tabelOngkir"></div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</body>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/esm/popper.min.js"></script>
<script src="{{asset('js/checkout.js')}}"></script>
<script>
    $(document).ready(function(){
        $('select[name="province_origin"]').on('change', function(){
            let provinceId = $(this).val();
            if (provinceId) {
                jQuery.ajax({
                    url:'/province/'+provinceId+'/cities',
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        $('select[name="city_origin"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="city_origin"]').append('<option value="'+ key +'">' + value + '</option>');
                        });
                    }
                })
            } else {
                $('select[name="city_origin"]').empty();
            }
        });
        $('select[name="province_destination"]').on('change', function(){
            let provinceId = $(this).val();
            if (provinceId) {
                jQuery.ajax({
                    url:'/province/'+provinceId+'/cities',
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        $('select[name="city_destination"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="city_destination"]').append('<option value="'+ key +'">' + value + '</option>');
                        });
                    }
                })
            } else {
                $('select[name="city_destination"]').empty();
            }
        });
    })
</script>

</html>