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
                <p class="title">3.4k</p>
                <p class="subtitle">Open Orders</p>
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
        <div class="card events-card">
            <header class="card-header">
                <p class="card-header-title">
                    Mensajes
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-table">
                <div class="content">
                    <table class="table is-fullwidth is-striped">
                        <tbody>
                            @forelse($emails as $mail)
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>{{ $mail->mensaje }}</td>
                                <td class="level-right"><a class="button is-small is-primary" href="#" onclick="verMensaje('{{ json_encode($mail) }}')">Ver</a></td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="column is-6">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Inventory Search
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-large" type="text" placeholder="">
                        <span class="icon is-medium is-left">
                            <i class="fa fa-search"></i>
                        </span>
                        <span class="icon is-medium is-right">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    User Search
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-large" type="text" placeholder="">
                        <span class="icon is-medium is-left">
                            <i class="fa fa-search"></i>
                        </span>
                        <span class="icon is-medium is-right">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection