@extends('layouts.user')

@section('content')
<div class="targetSession">

    <form method="POST" action="{{ route('register') }}" class="form">
        @csrf
        <img class="center" src="{{ asset('img/logo-franco-blanco.png') }}"  alt="">


        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <strong>{{ $message }}</strong>
        @enderror
        <label for="name" class="col-md-4 col-form-label text-md-right">Tipo usuario</label>

        <input id="name" type="number" class="form-control @error('tipo_usuario') is-invalid @enderror" name="tipo_usuario" value="{{ old('tipo_usuario') }}">

        @error('tipo_usuario')
        <strong>{{ $message }}</strong>
        @enderror
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
        <strong>{{ $message }}</strong>
        @enderror
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
        <strong>{{ $message }}</strong>
        @enderror

        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

        <button type="submit" class="btn-square">
            {{ __('Register') }}
        </button>
    </form>
</div>
@endsection