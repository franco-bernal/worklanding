@extends('layouts.admin')

@section('content')


<!-- 
<form method='post' action="{{ route('page.edit') }}" class="form space-x" id="formProduct" enctype="multipart/form-data">
    @csrf

    <h3 class="mt-6">Configuración de estadisticas</h3>

    <h4 class="py-6"><strong>Configuración de estadisticas</strong></h4>

    <div class='columns is-mobile is-gapless is-multiline '>
        <div class='column is-3-fullhd is-3-desktop  is-12-tablet  is-12-mobile '>
            <p><strong>nombre: {{ $stadistics->name }} </strong></p>
            <input class="pb-2" type="color" name="name" style="height: 44px;" placeholder="{{ $stadistics->name }}" value="{{ $stadistics->name }}"> <br>
            <p><strong>detalles: {{ $stadistics->detalles }} </strong></p>
            <input class="pb-2" type="color" name="detalles" style="height: 44px;" placeholder="{{ $stadistics->detalles }}" value="{{ $stadistics->detalles }}"> <br>
        </div>
    </div>

    <button type="submit" class="btn-solid centrar mb-6">Agregar</button>
</form> -->


@endsection