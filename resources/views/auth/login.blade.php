@extends('web.shop')

@section('content')
<div class="customer_login mt-30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="account_form">
                    <h2>login</h2>
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
            </div>
        </div>
    </div>
</div>
@endsection