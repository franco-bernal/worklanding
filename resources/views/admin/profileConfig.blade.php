@extends('layouts.admin')

@section('content')



@csrf

<h3 class="mt-6">Configuración de página</h3>
<!--  -->
<h4 class="py-3"><strong>Configuración de usuario</strong></h4>
<form method='post' action="{{ route('user.edit') }}" class="form space-x" id="formProduct">

    @csrf

    <p class="mt-3"><strong>Nombre</strong></p>
    <input type="text" name="name" value="{{ $user->name }}"> <br>

    <p class="mt-3"><strong>Email</strong></p>
    <input type="text" name="email" value="{{ $user->email }}"> <br>

    <button type="submit" class="btn-solid centrar mb-6">Agregar</button>
</form>

<h4 class="py-3"><strong>Contraseña</strong></h4>
<form method='post' action="{{ route('password.edit') }}" class="form space-x" id="formProduct">
    @csrf
    <p class="mt-3"><strong>Password</strong></p>
    <input type="password" name="" required> <br>
    <p class="mt-3"><strong>Confirmar</strong></p>
    <input type="password" name="password" required> <br>
    <button type="submit" class="btn-solid centrar mb-6">Agregar</button>
</form>


<h4 class="py-3"><strong>Configuración de Contacto</strong></h4>
<form method='post' action="{{ route('user.edit') }}" class="form space-x" id="formProduct" enctype="multipart/form-data">
    @csrf

    <div class='columns is-mobile is-gapless is-multiline '>
        @foreach(json_decode($user->contactos) as $name => $text)
        @if($name!="cv")
        <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile ' style='padding:5px !important;'>
            <p class="mt-3"><strong>{{ $name }}</strong> <span class="subraya">(actual)</span>:<br> {{ $text }}</p>
            <input type="text" name="{{ $name }}" placeholder="cambiar {{ $name }}*" value="{{ $text }}"> <br>
        </div>
        @else
        <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile ' style='padding:5px !important;'>
            <p class="mt-3"><a href="{{ asset($text) }}">{{ $name }}: {{ $text }}</a></p>
            <input type="file" name="{{ $name . 'file_img' }}" value="{{ $text }}" class="pb-3">
            <input type="hidden" value="{{ $text }}" name="{{ $name.'_copy' }}" placeholder="{{ $name }}*"> <br>
        </div>

        @endif
        @endforeach


    </div>
    <button type="submit" class="btn-solid centrar mb-6">Agregar</button>
</form>


@endsection