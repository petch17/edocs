@extends('layouts.homelogin')

@section('content')
<div class="kt-login__container">
    <div class="kt-login__logo">
        <a href="#">
            <img src="{{asset('assets/media/logos/logo-5.png')}}">
        </a>
    </div>
    <div class="kt-login__signin">
        <div class="kt-login__head">
            <h3 class="kt-login__title">เข้าสู่ระบบ</h3>
        </div>

        {!! Form::open(['route' => 'login', 'method' => 'post', 'class' => 'kt-form']) !!}
        @csrf
        <div class="input-group">
            <input id="email" type="email" placeholder="อีเมล์"
                class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>

        <div class="input-group">
            <input id="password" type="password" placeholder="รหัสผ่าน"
                class="form-control @error('password') is-invalid @enderror" name="password" required
                autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="row kt-login__extra">
            <div class="col">
                <label class="kt-checkbox" for="remember">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    {{ __('จดจำรหัสนี้') }}
                    <span></span>
                </label>
            </div>

            <div class="col kt-align-right">
                <a href="javascript:;" id="kt_login_forgot" class="kt-login__link">ลืมรหัสผ่าน ?</a>
                {{-- @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
                </a>
                @endif --}}
            </div>
        </div>
        <div class="kt-login__actions">
            <button type="submit" class="btn btn-outline-primary">เข้าสู่ระบบ</button>
            {{-- <button id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">เข้าสู่ระบบ</button> --}}
        </div>
        {!! Form::close() !!}

    </div>
    <div class="kt-login__signup">
        <div class="kt-login__head">
            <h3 class="kt-login__title">เข้าสู่ระบบ</h3>
            <div class="kt-login__desc">Enter your details to create your account:</div>
        </div>
        <form class="kt-form" action="">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Fullname" name="fullname">
            </div>
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
            </div>
            <div class="input-group">
                <input class="form-control" type="password" placeholder="Password" name="password">
            </div>
            <div class="input-group">
                <input class="form-control" type="password" placeholder="Confirm Password" name="rpassword">
            </div>
            <div class="row kt-login__extra">
                <div class="col kt-align-left">
                    <label class="kt-checkbox">
                        <input type="checkbox" name="agree">I Agree the <a href="#"
                            class="kt-link kt-login__link kt-font-bold">terms and conditions</a>.
                        <span></span>
                    </label>
                    <span class="form-text text-muted"></span>
                </div>
            </div>
            <div class="kt-login__actions">
                <button id="kt_login_signup_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign
                    Up</button>&nbsp;&nbsp;
                <button id="kt_login_signup_cancel"
                    class="btn btn-light btn-elevate kt-login__btn-secondary">Cancel</button>
            </div>
        </form>

    </div>
    <div class="kt-login__forgot">
        <div class="kt-login__head">
            <h3 class="kt-login__title">Forgotten Password ?</h3>
            <div class="kt-login__desc">Enter your email to reset your password:</div>
        </div>
        <form class="kt-form" action="">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email"
                    autocomplete="off">
            </div>
            <div class="kt-login__actions">
                <button id="kt_login_forgot_submit"
                    class="btn btn-brand btn-elevate kt-login__btn-primary">Request</button>&nbsp;&nbsp;
                <button id="kt_login_forgot_cancel"
                    class="btn btn-light btn-elevate kt-login__btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
    <div class="kt-login__account">
        <span class="kt-login__account-msg">
            ถ้ายังไม่มีบัญชี ?
        </span>
        &nbsp;&nbsp;
        <a href="javascript:;" id="kt_login_signup" class="kt-login__account-link"> คลิกเพื่อสร้างบัญชี !</a>
    </div>
</div>
@endsection

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div> --}}