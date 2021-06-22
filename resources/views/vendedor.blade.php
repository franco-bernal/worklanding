@extends('layouts.app')

@section('content')
@if (Auth::user()->tipo_usuario==1)

<h2>Mis productos</h2>
@include('products')


@else
<p>No autorizado</p>
@endif
@endsection