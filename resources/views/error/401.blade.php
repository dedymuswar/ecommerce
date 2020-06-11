@extends('web.shop')
@section('title')
401 Unauthorized
@endsection
@section('stylesheets')
@endsection
@section('content')
<div class="error_section">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="error_form">
                    <h1>401</h1>
                    <h2>Opps! MAAF, ANDA TIDAK MEMILIKI AKSES ALAMAT INI</h2>
                    <p>Sorry but the page you are looking for does not exist, have been<br> removed, name changed or is temporarily unavailable.</p>
                    <form action="#">
                        <input placeholder="Search..." type="text">
                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                    <a href="/">Back to home page</a>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection

