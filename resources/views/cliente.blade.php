@extends('layouts.app')

@section('content')
@if (Auth::user()->tipo_usuario==0)

<div class='columns is-mobile is-gapless is-multiline'>
    <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile ' id="carrito">
        <table class="table items-car">
            <thead>
                <tr>
                    <th><abbr title="id">ID</abbr></th>
                    <th><abbr title="nombre">NOMBRE</abbr></th>
                    <th><abbr title="precio">PRECIO</abbr></th>
                </tr>
            </thead>

            <tbody>


            </tbody>
        </table>
        <div>total $<span id="items-total"></span></div>
    </div>
    <div class='column is-6-fullhd is-6-desktop  is-6-tablet  is-6-mobile '>
    </div>
</div>






@include('products')

@else
<p>No autorizado</p>
@endif
@endsection