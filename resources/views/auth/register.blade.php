@extends('layouts.app')

@section('viewe_class','view__dictionary_register')

@section('content')

<form class="register__form" role="form" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}

    <div class="register__form_box register__form_name {{ $errors->has('name') ? ' has-error' : '' }}">
        <input id="register__form_name_input" class="register__form_input" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="register__form_box register__form_email {{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="register__form_email_input" class="register__form_input" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email For ID" required>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="register__form_box register__form_password {{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="register__form_password_input" type="password" class="register__form_input" name="password" placeholder="Password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="register__form_box register__form_password {{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="register__form_password_confirm_input" type="password" class="register__form_input" name="password_confirmation" placeholder="Password Confirm" required>
    </div>


    <button type="submit" class="btn__register">가입</button>
</form>
@endsection
