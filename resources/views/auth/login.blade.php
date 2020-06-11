@extends('web.mAuth')
@section('stylesheets')
<style>
    .btnku {
        display: flex;
        font-weight: 350;
        /* text-align: center;
        white-space: nowrap; */
        /* vertical-align: middle; */
        /* -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none; */
        user-select: none;
        border: 1px solid transparent;
        padding: 15px 15px 15px 15px;
        font-size: 14px;
        line-height: 10px;
        border-radius: .25rem;
    }

    .btn-putih {
        display: flex;
        margin-top: 5px;
        padding: 10px 0;
        border-radius: 5px;
        border: 1px solid #999;
        -ms-flex-pack: center;
        justify-content: center;
        cursor: pointer;
    }

    .btn-biru {
        color: #fff;
        margin-top: 5px;
        padding: 10px 0;
        border-radius: 5px;
        background: #4C66A4;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-pack: center;
        justify-content: center;
        cursor: pointer;
    }

    a.btn-putih:hover {
        color: inherit;
        text-decoration: none;
    }

    a.btn-biru:hover {
        color: #fff;
        text-decoration: none;
        cursor: pointer;
    }
    }
</style>
<link href="{{asset('css/algolia.css')}}" rel=stylesheet />
@endsection
@section('title')
Login
@endsection
@section('content')
<div class="customer_login mt-30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="account_form">
                    <h2>login</h2>
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        {{-- <button type="button" class="close" data-dismiss="alert">×</button>  --}}
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <p>
                            <label>Email <span>*</span></label>
                            <input type="email" id="email" @error('email') class="form-control is-invalid @enderror"
                                name="email" value="{{old('email')}}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </p>
                        <p>
                            <label>Passwords <span>*</span></label>
                            <input type="password" id="password" @error('password')
                                class="form-control is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </p>
                        <div class="login_submit">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Lost your password?</a>
                            @endif
                            <label for="remember">
                                <input id="remember" name="remember" type="checkbox"
                                    {{ old('remember') ? 'checked' : '' }}>
                                Remember me
                            </label>
                            <button type="submit">login</button>
                        </div>
                    </form>
                </div>
                <div>
                    <a href="{{ url('/auth/google') }}" class="btn-putih"><span style="margin-right:10px"><svg
                                data-v-9d2c9970="" width="1em" height="1em" viewBox="0 0 48 48" class="google__svg">
                                <g data-v-9d2c9970="">
                                    <path data-v-9d2c9970="" fill="#EA4335"
                                        d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z">
                                    </path>
                                    <path data-v-9d2c9970="" fill="#4285F4"
                                        d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z">
                                    </path>
                                    <path data-v-9d2c9970="" fill="#FBBC05"
                                        d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z">
                                    </path>
                                    <path data-v-9d2c9970="" fill="#34A853"
                                        d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z">
                                    </path>
                                    <path data-v-9d2c9970="" fill="none" d="M0 0h48v48H0z"></path>
                                </g>
                            </svg></span> <span>Sign in with Google</span></a>
                    <a href="{{ url('/auth/facebook') }}" class="btn-biru"><img data-v-9d2c9970=""
                            src="https://www.static-src.com/frontend/member/static/img/facebook.2671f52.png"
                            height="5px" alt="facebook" style="margin-right:10px"> <span> Sign in with
                            Facebook</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection