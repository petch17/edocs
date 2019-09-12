@extends('layouts.homelogin')

@section('css')

@endsection

@section('content')
<style>
       #header{
        border-radius:15px;
        background: #3ACEFF;
        padding: 10px;
        width:100%;
        height: 100%;
        color: #FFF;
        font-family:verdana;
       }
       #headerI{

       }
</style>
<div class="kt-login__container">
    <div id="header" class="kt-login__logo" >
        <a>
            <img src="{{asset('img/ed2.png')}}" width="300" height="80"/>
        </a>
    </div>
    <div class="kt-login__signin">
        {{-- <div id="headerI" class="kt-login__head">
            <h2 class="kt-login__title">เข้าสู่ระบบ</h2>
        </div> --}}

        {{-- {!! Form::open(['route' => 'login', 'method' => 'post', 'class' => 'kt-form']) !!} --}}
        {{-- intra --}}
        <form class="kt-form" method="POST" action="{{ route('web-login') }}">
                @csrf
        @csrf
        <div >
            <div class="input-group">
            <input id="email" type="text" placeholder="อีเมล์"
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
        </form>
        {{-- {!! Form::close() !!} --}}

    </div>

        @endsection

        @section('js')

        @endsection
