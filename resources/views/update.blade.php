@extends('layouts.app')

@section('content')

<div class="block1" style="padding:50px 0px">

</div>
@if($type=="product")
<form method='post' action="{{ route('product.edit') }}" id="editProduct" enctype="multipart/form-data" class="updatePage form">
    @csrf
    <h3>Actualizar</h3>
    <input type="hidden" name="idinput" value="{{ $edit->id }}" id="idinput"> <br>
    <p>Nombre</p>
    <input type="text" name="name" placeholder="nombre" value="{{ $edit->name }}"> <br>
    <p>Descripción</p>
    <input type="text" name="description" placeholder="descripcion" value="{{ $edit->description }}" <br>
    <p>Link</p>
    <input type="text" name="link" placeholder="link" value="{{ $edit->link }}" <br>
    <p>Tecnologia</p>
    <input type="text" name="tecnology" placeholder="tecnología" value="{{ $edit->tecnology }}" <br>
    <p>Logo</p>
    <input type="file" name="imagen_logo"><br>
    <input type="text" name="urllogo" id="" placeholder="o también puede ingresar url">
    <img src="{{ $edit->img_logo }}" class="centrar" style="height:120px !important; filter: drop-shadow(0 1px 1px rgba(0, 0, 0, 0.7));" alt="">


    <p>background*</p>
    <input type="file" name="imagen_back"> <br>
    <input type="text" name="urlback" id="" placeholder="o también puede ingresar url">
    <img src="{{ $edit->img_back }}" style="height:200px !important" alt="">
    <br>
    <input type="hidden" name="backCopy" value="{{ $edit->img_back }}">
    <input type="hidden" name="logoCopy" value="{{ $edit->img_logo }}">

    <button type="submit" class="btn-solid centrar">Actualizar</button>
</form>
@endif
@if($type=="tecnology")
<form method='post' action="{{ route('tecnology.edit') }}" id="editProduct" enctype="multipart/form-data" class="updatePage form">
    @csrf
    <h3>Actualizar</h3>
    <input type="hidden" name="idinput" value="{{ $edit->id }}" id="idinput"> <br>
    <p>Nombre</p>
    <input type="text" name="name" placeholder="nombre" value="{{ $edit->name }}"> <br>
    <p>Descripción</p>
    <input type="text" name="description" placeholder="descripcion" value="{{ $edit->description }}" <br>

    <p>Logo</p>
    <input type="file" name="imagen_logo"><br>
    <input type="text" name="urllogo" id="" placeholder="o también puede ingresar url">
    <img src="{{ $edit->img_logo }}" class="centrar" style="height:120px !important; filter: drop-shadow(0 1px 1px rgba(0, 0, 0, 0.7));" alt="">


    <input type="hidden" name="logoCopy" value="{{ $edit->img_logo }}">

    <button type="submit" class="btn-solid centrar">Actualizar</button>
</form>
@endif

@endsection