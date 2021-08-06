@extends('layouts.user')

@section('content')





<!-- @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif -->

<div id="login-button">
    <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
    </img>
</div>
<div id="container">
    <h1>Log In</h1>
    <span class="close-btn">
        <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
    </span>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail">
        @error('email')
        <strong>{{ $message }}</strong>
        @enderror
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
        @error('password')
        <strong>{{ $message }}</strong>
        @enderror


        <button type="submit">
            {{ __('Login') }}
        </button>

        <div id="remember-container">
            <input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked" />
            <span id="remember">Remember me</span>
            <span id="forgotten">Forgotten password</span>
        </div>
    </form>
</div>

<!-- Forgotten Password Container -->
<div id="forgotten-container">
    <h1>Forgotten</h1>
    <span class="close-btn">
        <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
    </span>

    <form>
        <input type="email" name="email" placeholder="E-mail">
        <a href="#" class="orange-btn">Get new password</a>
    </form>
</div>
@endsection