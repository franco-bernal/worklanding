@extends('layouts.admin')

@section('content')


<h1>Contadores</h1>




<div class='columns is-mobile is-gapless is-multiline contadores' style='margin-top:20px; margin-bottom: 20px;'>
    @forelse($stadistics as $key => $value)
    <div class='column is-3-fullhd is-3-desktop  is-3-tablet  is-3-mobile ' style='padding:20px !important;'>
        <p>{{ $value }}</p>
        <p>{{ $key }}</p>
    </div>
    @empty
    @endforelse
    <div class='column is-3-fullhd is-3-desktop  is-3-tablet  is-3-mobile ' style='padding:20px !important;'>
        <p>{{ $users }}</p>
        <p>Users</p>
    </div>
    <div class='column is-3-fullhd is-3-desktop  is-3-tablet  is-3-mobile ' style='padding:20px !important;'>
        <p>{{ count($emails) }}</p>
        <p>Mensaje</p>
    </div>
    <div class='column is-3-fullhd is-3-desktop  is-3-tablet  is-3-mobile ' style='padding:20px !important;'>
        <p>{{ $visitasAll }}</p>
        <p>Visitas</p>
    </div>
</div>




</section>

<div class="columns">
    <div class="column is-8">
        <h3>Mensajes</h3>
        <a onclick="minMensajes()">Minimizar mensajes</a>
        <div class="fbg_table">

            @forelse($emails as $mail)
            <div class="fbg_table_item" id="item-mensaje{{ $mail->id }}">
                <p class="fbg_tag1">{{ $mail->created_at }}</p>
                <p style="float:left" class="fbg_coment">{{ $mail->name }}</p>
                <a style="float:right" class="btn btn-solid" onclick="vermensaje('#vermensaje{{ $mail->id }}')">Mensaje</a>
                <div class="fbg_vermensaje" id="vermensaje{{ $mail->id }}">
                    <span class="fbg_delete" onclick="deleteMensaje('{{ $mail->id }}')">borrar</span>
                    <a href="mailto:{{ $mail->email }}" class="m-email"><strong>Email:</strong> {{ $mail->email }}</a>
                    <br>
                    <a href="tel:{{ $mail->numero }}" class="m-numero"><strong>Numero:</strong> {{ $mail->numero }}</a>
                    <hr style="margin: 3px;height: 0.1px;">
                    <p class="m-mensajes"><strong>Mensaje:</strong> {{ $mail->mensaje }}</p>
                </div>
            </div>
            @empty
            <div class="fbg_table_item">
                vacio
            </div>
            @endforelse

        </div>
    </div>
    <div class="column is-4">
        <h3>Visitas</h3>
        <p>Desde la última</p>
        <a class="btn-solid" onclick="deleteVisita(-1,true)">Limpiar todas</a>
        <div class="visitas">
            @forelse($visitas as $visita)
            <p id="visita{{ $visita->id }}" onclick="deleteVisita('{{ $visita->id }}',false)"> {{ todayDate($visita->created_at) }} - <strong>{{ $visita->ip }}</strong></p>
            @empty
            <p>Sin visitas</p>
            @endforelse
        </div>
    </div>
</div>

@endsection