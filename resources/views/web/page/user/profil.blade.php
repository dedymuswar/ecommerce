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
                            <div class="row ml-4">
                                <h3>Profil Saya</h3>
                                <div class="float-right ml-2"><a href="{{ route('user.profilku') }}"
                                        class="btn btn-success btn-sm" title="edit"><i class="fa fa-edit"></i></a></div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-sm-4">
                                    <div>
                                        <img src="{{ asset('storage/'.$users->avatar) }}" width="220" alt="" srcset="">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Username</td>
                                                <td>{{ $users->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{ $users->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Bergabung sejak</td>
                                                <td>{{ $users->created_at->diffForHumans() }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection