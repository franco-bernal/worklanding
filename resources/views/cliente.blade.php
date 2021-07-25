@extends('layouts.app')

@section('content')
@if (Auth::user()->tipo_usuario==0)



@include('products')

@else
<p>No autorizado</p>
@endif
@endsection