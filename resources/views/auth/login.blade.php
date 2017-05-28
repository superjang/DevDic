@extends('layouts.app')

@section('viewe_class','view__dictionary_login')

@section('content')
<form class="login__form" role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="login__form_box login__form_id{{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="login__form_id_input"  class="login__form_input" type="email" name="email" placeholder="ID" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>

    <div class="login__form_box login__form_password{{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="login__form_password_input" class="login__form_input" type="password" placeholder="Password" name="password" required>

        @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>


    <div class="login__form_function">
        <button type="submit" class="btn__login">로그인</button>

        <a class="btn__reset_password" href="{{ route('password.request') }}">Forgot Your Password?</a>

        <label class="btn__remember_id">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
        </label>
    </div>
</form>
@endsection
