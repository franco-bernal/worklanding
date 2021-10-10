@extends('layouts.admin')

@section('content')



<form method='post' action="{{ route('page.edit') }}" class="form space-x" id="formProduct" enctype="multipart/form-data">
    @csrf

    <h3 class="mt-6">Configuración de página</h3>

    <h4 class="py-3"><strong>Configuración de Colores</strong></h4>

    <div class='columns is-mobile is-gapless is-multiline '>
        @foreach(json_decode($page->color) as $name => $color)
        <div class='column is-3-fullhd is-3-desktop  is-12-tablet  is-12-mobile '>
            <p><strong> {{ $name }}: {{ $color }} </strong></p>
            <input required class="pb-2" type="color" name="{{ $name }}" style="height: 44px;" placeholder="color {{ $name }}*" value="{{ $color }}"> <br>
        </div>
        @endforeach
    </div>

    <h4 class="py-3"><strong>Configuración de Imagenes</strong></h4>
    <div class='columns is-mobile is-gapless is-multiline '>
        @foreach(json_decode($page->img) as $name => $imagen)
        <div class='column is-3-fullhd is-3-desktop  is-12-tablet  is-12-mobile ' style='padding:5px !important;'>
            <img src="{{ asset($imagen) }}" style="height:100px;" class="mt-5 admin-img-form" alt="{{ $name }}">
            <p style="color:white">{{ $name }}</p>
            <input  type="text" value="{{ $imagen }}" name="{{ $name }}" placeholder="{{ $name }}*"> <br>
            <input  type="file" name="{{ $name . 'file_img' }}" value="{{ $imagen }}" class="pb-3" accept="image/*">
            <input required type="hidden" value="{{ $imagen }}" name="{{ $name.'_copy' }}" placeholder="{{ $name }}*" style="color:white;"> <br>
        </div>

        @endforeach
    </div>


    <h4 class="py-3"><strong>Configuración de Texto</strong></h4>
    <h5 class="subraya mb-2" style="width:max-content;">No usar comillas dobles</h5>

    <div class='columns is-mobile is-gapless is-multiline conftext'>
        @foreach(json_decode($page->text) as $name => $text)
        <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile ' style='padding:5px !important;'>
            <p class="mt-2"><strong>{{ $name }}</strong>  <span class="subraya">(actual)</span>:<br></p>
            <label> {{ $text }}</p>
            <input required type="text" name="{{ $name }}" placeholder="cambiar {{ $name }}*" value="{{ $text }}"> <br>
        </div>
        @endforeach
    </div>

    <h4 class="py-3"><strong>Settings</strong></h4>
    @foreach(json_decode($page->settings) as $name => $set)
    <p><strong>{{ $name }}</strong>: {{ $set }}</p>
    <input required type="text" name="{{ $name }}" value="{{ $set }}" placeholder="cambiar {{ $name }}*"> <br>
    @endforeach

    <button type="submit" class="btn-solid centrar mb-6">Agregar</button>
</form>


@endsection