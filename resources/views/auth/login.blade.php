@extends('layouts.homelogin')

@section('css')

@endsection

@section('content')
<div class="kt-login__container">
    <div class="kt-login__logo" style="background-color:lightblue">
        <a href="#">
            {{-- <img src="{{asset('assets/media/logos/logo-5.png')}}"> --}}
            <img src="{{asset('img/ed2.png')}}" width="100%" height="100%">
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

            {{-- <div class="col kt-align-right"> --}}
             {{-- <a href="javascript:;" id="kt_login_forgot" class="kt-login__link">ลืมรหัสผ่าน ?</a> --}}
                {{-- @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
                </a>
                @endif --}}
            {{-- </div> --}}
        </div>
        <div class="kt-login__actions">
            <button type="submit" class="btn btn-outline-primary">เข้าสู่ระบบ</button>
            {{-- <button id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">เข้าสู่ระบบ</button> --}}
        </div>
        {!! Form::close() !!}

       {{-- </div>
    <div class="kt-login__signup">
        <div class="kt-login__head">
            <h3 class="kt-login__title">เข้าสู่ระบบ</h3>
            <div class="kt-login__desc">กรอกรายละเอียดของคุณเพื่อสร้างบัญชีของคุณ:</div>
        </div>
            {!! Form::open(['route' => 'register', 'method' => 'post', 'class' => 'kt-form']) !!}
            @csrf
            <div class="input-group">
                <input type="text" placeholder="ชื่อ-นามสกุล" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus >
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

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
            <div class="input-group">
                <input id="password-confirm" class="form-control" type="password" placeholder="ยืนยันรหัสผ่าน" name="password_confirmation"  required autocomplete="new-password">
            </div>
            <div class="row kt-login__extra">
                <div class="col kt-align-left">
                    <label class="kt-checkbox">
                        <input type="checkbox" name="agree">ฉันยอมรับ ข้อกำหนดและเงื่อนไข.
                        <span></span>
                    </label>
                    <span class="form-text text-muted"></span>
                </div>
            </div>
            <div class="kt-login__actions">
                <button type="submit" class="btn btn-outline-primary">ตกลง</button>
                <button type="reset" class="btn btn-outline-danger" onclick="window.history.back();">ยกเลิก</button>
            </div>
            {!! Form::close() !!}
  
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
</div>  --}}
        @endsection

        @section('js')

        @endsection