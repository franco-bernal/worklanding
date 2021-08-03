@extends('layouts.admin')

@section('content')


<section class="hero is-info welcome is-small my-5">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Hello, Franco.
            </h1>
            <h2 class="subtitle">
                Espero que tengas un buen día!
            </h2>
        </div>
    </div>
</section>
<section class="info-tiles">
    <div class="tile is-ancestor has-text-centered">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">{{ $users }}</p>
                <p class="subtitle">Users</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">{{ count($emails) }}</p>
                <p class="subtitle">Mensaje</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">{{ $visitasAll }}</p>
                <p class="subtitle">Visitas</p>
            </article>
        </div>
    </div>
</section>
<h3 class="my-4">Clics</h3>
<section class="info-tiles">
    <div class="tile is-ancestor has-text-centered">
        @forelse($stadistics as $key => $value)
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">{{ $value }}</p>
                <p class="subtitle">{{ $key }}</p>
            </article>
        </div>
        @empty

        @endforelse
    </div>
</section>
<div class="columns">
    <div class="column is-6">
        <h3>Mensajes</h3>
        <div class="fbg_table">

            @forelse($emails as $mail)
            <div class="fbg_table_item" id="item-mensaje{{ $mail->id }}">
                <p class="fbg_tag1">{{ $mail->created_at }}</p>
                <p style="float:left" class="fbg_coment">{{ $mail->name }}</p>
                <a style="float:right" class="btn btn-solid" onclick="vermensaje('#vermensaje{{ $mail->id }}')">Mensaje</a>
                <div class="fbg_vermensaje" id="vermensaje{{ $mail->id }}">
                    <span class="fbg_delete" onclick="deleteMensaje('{{ $mail->id }}')">borrar</span>
                    <p class="m-email"><strong>Email:</strong> {{ $mail->email }}</p>
                    <p class="m-numero"><strong>Numero:</strong> {{ $mail->numero }}</p>
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
    <div class="column is-6">
        <h3>Visitas</h3>
        <div class="visitas">
            @forelse($visitas as $visita)
            <p> {{ todayDate($visita->created_at) }}</p>
            @empty
            <p>Sin visitas</p>
            @endforelse
        </div>
    </div>
</div>

@endsection