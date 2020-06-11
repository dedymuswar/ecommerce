@extends('web.shop')
@section('title')
My Account
@endsection
@section('stylesheets')
<style>
    .wrapper {
        overflow-y: scroll;
    }
</style>
@endsection
@section('content')
<section class="main_content_area">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    @include('web.page.user.lefttabs')
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show active" id="dashboard">
                            <div class="contact_message form">
                                <h3>Profil anda</h3>
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form method="POST" action="{{ route('profil.store') }}">
                                    <p>
                                        <label> Nama Penerima (required)</label>
                                        <input name="penerima" placeholder="Nama Penerima *" value="{{old('penerima')}}"
                                            type="text">
                                    </p>
                                    <p>
                                        <label> Telepon (required)</label>
                                        <input name="telepon" placeholder="Telepon *" value="{{old('telepon')}}"
                                            type="text">
                                    </p>
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <label> Provinsi (required)</label>
                                            <div class="wrapper">
                                                <select name="provinsi" id="sPropinsi" data-dependent="kota">
                                                    @foreach ($provinces as $item)
                                                    <option value="{{ $item->id }}" class="option">{{ $item->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Kota / Kabupaten (required)</label>
                                            <div class="wrapper">
                                                <select name="kota" id="kota">
                                                </select>
                                            </div>
                                            {{ csrf_field() }}
                                        </div>
                                    </div>
                                    <p>
                                        <label> Kode Pos (required)</label>
                                        <input name="kodePos" value="{{old('kodePos')}}" placeholder="Kode Pos *"
                                            type="text">
                                    </p>
                                    <div class="contact_textarea">
                                        <label> Alamat lengkap (required)</label>
                                        <textarea placeholder="Alamat lengkap *" name="alamatLengkap"
                                            class="form-control2">{{old('alamatLengkap')}}</textarea>
                                    </div>
                                    @csrf
                                    <button type="submit"> Simpan</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scriptjs')
<script type="text/javascript">
    $(document).ready(function() {
        $('#sPropinsi').on('change', function(){
            if($(this).val() != ''){
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('profil.dinamis') }}",
                    method: "POST",
                    data: {select:select, value:value, _token:_token, dependent:dependent},
                    success: function(hasil){
                        $('#' + dependent).html(hasil);
                    }
                })
                
            }
        });                
    });
</script>
@endsection