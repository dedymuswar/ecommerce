@extends('web.shop')
@section('title')
My Account
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
                            <table class="table">
                                @forelse ($profil as $item)
                                <div class="row ml-3">
                                    <h3>Alamat utama anda </h3>
                                    <div class="float-right ml-2"><a href="{{ route('user.profilku') }}"
                                            class="btn btn-success btn-sm" title="ubah alamat"><i
                                                class="fa fa-edit"></i></a></div>
                                </div>
                                <tbody>
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
                                        <td>Kota</td>
                                        <td>{{ $item->city->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Pos</td>
                                        <td>{{ $item->kodePos }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Detail</td>
                                        <td>{{ $item->alamatLengkap }}</td>
                                    </tr>
                                </tbody>
                                @empty
                                <h3>Maaf anda belum mengisikan alamat lengkap anda.</h3> <a
                                    href="{{ route('profil.create') }}" class="btn btn-primary"> Buat Alamat</a>
                                @endforelse
                            </table>
                            <p>Untuk mempermudah kami dalam menemukan anda harap dapat mengisi alamat dengan lengkap and
                                <a href="#">Edit your password and account details.</>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection