@extends('layouts.app')

@section('content')

@if (Auth::user()->tipo_usuario==1)


<div id="eg1_modal" class="eg1_modal">
    <a onclick="eg1CloseModal(`eg1_modal`)" class="close_modal_eg1">x</a>
    <div id="eg1_cont" class="eg1_cont">
        <div>
            @if (Auth::user()->tipo_usuario==1)
            <form method='post' action="{{ route('product.add') }}" class="form" id="formProduct" enctype="multipart/form-data">
                @csrf
                <h3>Agregar</h3>

                <input type="text" name="name" placeholder="nombre*"> <br>
                <input type="text" name="tecnology" placeholder="Tecnologia*"> <br>
                <input type="text" name="link" placeholder="link"> <br>
                <textarea name="description" placeholder="Descripción" width="100%" rows="10"></textarea>
                <p>Logo</p>
                <input type="file" name="imagen_logo"> <br>
                <input type="text" name="urllogo" id="" placeholder="o también puede ingresar url">
                <p>background*</p>
                <input type="file" name="imagen_back"> <br>
                <input type="text" name="urlback" id="" placeholder="o también puede ingresar url">
                <!-- <input type="check" name="active" placeholder="activo"> <br>
                <input type="number" name="order" placeholder="orden"> <br> -->

                <button type=" submit" class="btn-solid">Agregar</button>
            </form>
            <form method='get' action="{{ route('product.edit') }}" id="editProduct">
                @csrf
                <h3>Actualizar</h3>
                <input type="hidden" name="idinput" value="" id="idedit"> <br>
                <input type="text" name="name" placeholder="nombre"> <br>
                <input type="text" name="description" placeholder="descripcion"> <br>
                <input type="number" name="price" placeholder="precio"> <br>
                <input type="text" name="img_url" placeholder="imagen url"> <br>

                <button type="submit" class="btn-solid"> Buscar</button>
            </form>
            @endif
            <div id="productInfo">
                <p><strong>Nombre:</strong><span id="nameInfo"></span></p>
                <p><strong>Descripción:</strong><span id="desInfo"></span></p>
                <p><strong>Link:</strong><span id="linkInfo"></span></p>
                <p><strong>Tecnologia principal:</strong><span id="tecInfo"></span></p>
                <img src="" alt="" id="logoInfo" style="filter: drop-shadow(0 1px 1px rgba(0, 0, 0, 0.7)); height:150px !important" class="centrar">
                <img src="" alt="" id="backInfo" width="90%" class="centrar">
            </div>
            <!--  -->
            <!--  -->
            <!--  -->
            <!--  -->

            @if (Auth::user()->tipo_usuario==1)
            <form method='post' action="{{ route('tecnology.add') }}" class="form" id="formTecnology" enctype="multipart/form-data">
                @csrf
                <h3>Agregar tecnología</h3>

                <input type="text" name="name" placeholder="nombre*"> <br>
                <textarea name="description" placeholder="Descripción" width="100%" rows="10"></textarea>

                <p>Logo</p>
                <input type="file" name="img_logo"> <br>
                <input type="text" name="urllogo" id="" placeholder="o también puede ingresar url">
               
                <button type="submit" class="btn-solid">Agregar</button>
            </form>
            <form method='get' action="{{ route('product.edit') }}" id="editTecnology">
                @csrf
                <h3>Actualizar</h3>
                <input type="hidden" name="idinput" value="" id="idTec"> <br>
                <input id="nomTec" value="" type="text" name="name" placeholder="nombre"> <br>
                <input id="desTec" value="" type="text" name="description" placeholder="descripcion"> <br>
                <input id="imgTec" value="" type="text" name="img_logo" placeholder="imagen logo"> <br>

                <button type="submit" class="btn-solid"> Buscar</button>
            </form>
            @endif
            <div id="tecnologyInfo">
                <p><strong>Nombre:</strong><span id="nameInfoTec"></span></p>
                <img src="" id="imgInfoTec" alt="" class="centrar">
                <p><strong>Descripción:</strong><span id="descriptionInfoTec"></span></p>
                @if (Auth::user()->tipo_usuario==1)
                <a href="" class="btn-solid">Modificasdasdar</a>
                @endif

            </div>
        </div>
    </div>
</div>



@include('products')
@include('tecnologies')
@else
<p>No autorizado</p>
@endif



@endsection