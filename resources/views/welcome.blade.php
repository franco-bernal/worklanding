@extends('layouts.app')

@section('content')

<style>
    .block1 {
        /* background-image: linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 1, 65, 0.747)),
        url('{{ json_decode($page->img)->header_back_img }}'); */
        background-color: black;
        color: black;
    }

    .promo {
        background-image: linear-gradient(rgba(2, 0, 1, 0.966), rgba(27, 27, 27, 0.555)),
        url('{{ json_decode($page->img)->necesitas_back_img }}');
        /* background-image: url('{{ json_decode($page->img)->necesitas_back_img }}'); */
        background-attachment: fixed;
    }

    .viewTecnologies {
        background-image: linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 50, 65, 0.747)),
        url('{{ json_decode($page->img)->tecnologias_img }}');

    }

    .viewTecnologies2 {
        background-image: linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 50, 65, 0.747)),
        url('{{ json_decode($page->img)->tecnologias_img }}');

    }
</style>

<div class="noticias" style="    margin-top: -5px;">
    @forelse ($noticias as $notice)
    <div class="noticia" style="background:linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 1, 65, 0.747)), url('{{ $notice->background }}');">
        <h3>{{ $notice->title }}</h3>
        <p>{{ $notice->subtitle }}</p>
        @if($notice->btn_link!="")
        <a href="{{ $notice->btn_link }}" class="btn-solid">{{ $notice->btn_text }}</a>
        @endif
    </div>
    @empty
    <div class="noticia" style="background:linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 1, 65, 0.747)), url('https://images.pexels.com/photos/270348/pexels-photo-270348.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');">
        <h3>Tecnologías disponibles</h3>
        <p>Nuevas tecnologías disponibles</p>
        <a href="#" class="btn-solid">Ir</a>
    </div>
    <div class="noticia" style="background:linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 1, 65, 0.747)), url('https://images.pexels.com/photos/802024/pexels-photo-802024.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940')">
        <h3>Nuevos productos agregados</h3>
        <p>Visita los productos creados recientemente</p>
        <a href="#" class="btn-solid">Ir</a>

    </div>
    <div class="noticia" style="background-image:linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 1, 65, 0.747)), url('https://midu.dev/images/wallpapers/web-technologies-4k-wallpaper.png');">
        <h3>Guias programación básica</h3>
        <p>como comenzar en html, js, laravel, etc..</p>
        <a href="#" class="btn-solid">Ir</a>

    </div>
    <div class="noticia" style="background-image:linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 1, 65, 0.747)), url('https://images.pexels.com/photos/5836/yellow-metal-design-decoration.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940')">
        <h3>Portafolios</h3>
        <p>Necesitas diseñador?</p>
        <a href="#" class="btn-solid">Ir</a>
    </div>
    @endforelse

</div>
<div class='columns is-mobile is-gapless is-multiline promo-block'>
    <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile block1 centrar-full'>
        <!-- <h2>{{ json_decode($page->text)->header_sub_text }} - <img src="https://www.frontec.cl/images/icono_web.png" width="30px"></h2>
        <h1><strong>{{ json_decode($page->text)->header_text }}</strong></h1> -->
        <img src="{{ asset(json_decode($page->img)->tarjeta_pre_img) }}" alt="tarjeta-pre" width="90%" class="shadow">
    </div>
    <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile promo' id="promo" >
        <h2>{{ json_decode($page->text)->necesitas_title_text }}</h2>
        <p>{!! json_decode($page->text)->necesitas_sub_text !!}</p>
    </div>
</div>


<div class='columns is-mobile is-gapless is-multiline ' id="productos">

    <div class='column centrar-full is-4-fullhd is-4-desktop  is-12-tablet  is-12-mobile ' style="color: white;">
        <h2>Produc<span class="subraya">tos</span></h2>
    </div>
    <div class='column is-8-fullhd is-8-desktop  is-12-tablet  is-12-mobile viewProducts'>
        @forelse ($data as $product)
        <div class="productTarget">
            <div>
                <span class="product-back" style="background-image: url('{{ $product->img_back }}');">
                    <a class="productvisitar btn-solid" href=" {{ $product->link}}" target="_blank">Visitar</a>
                </span>
                <span class="product-description">
                    <img class="centrar" src="{{ $product->img_logo }}" alt="">
                    <p><strong>{{ $product->name }}</strong></p>
                    <!-- <span class="productspam">Nuevo</span> -->
                    <p class="productTecno">
                        {{ $product->tecnology }}
                    </p>
                </span>
            </div>
        </div>
        @empty
        <div class="productTarget">
            <div>
                <h4><strong>Sin productos</strong></h4>
                <span class="productspam">Vacío</span>

            </div>
        </div>
        @endforelse


    </div>
</div>
<div class='columns is-mobile is-gapless is-multiline ' id="contact-div">
    <a onclick="sumStadistic('email')" href="mailto:{{ $contactos->email }}" target="_blank" class='email column is-4-fullhd is-4-desktop  is-12-tablet  is-12-mobile' style="padding:25px 0 !important;">
        <img class="centrar" width="40px" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPgo8cmVjdCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjY0IiB5PSI2NCIgc3R5bGU9IiIgd2lkdGg9IjM4NCIgaGVpZ2h0PSIzODQiIGZpbGw9IiNlY2VmZjEiIGRhdGEtb3JpZ2luYWw9IiNlY2VmZjEiPjwvcmVjdD4KPHBvbHlnb24geG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBwb2ludHM9IjI1NiwyOTYuMzg0IDQ0OCw0NDggNDQ4LDE0OC42NzIgIiBmaWxsPSIjY2ZkOGRjIiBkYXRhLW9yaWdpbmFsPSIjY2ZkOGRjIj48L3BvbHlnb24+CjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgc3R5bGU9IiIgZD0iTTQ2NCw2NGgtMTZMMjU2LDIxNS42MTZMNjQsNjRINDhDMjEuNTA0LDY0LDAsODUuNTA0LDAsMTEydjI4OGMwLDI2LjQ5NiwyMS41MDQsNDgsNDgsNDhoMTZWMTQ4LjY3MiAgbDE5MiwxNDcuNjhMNDQ4LDE0OC42NFY0NDhoMTZjMjYuNDk2LDAsNDgtMjEuNTA0LDQ4LTQ4VjExMkM1MTIsODUuNTA0LDQ5MC40OTYsNjQsNDY0LDY0eiIgZmlsbD0iI2Y0NDMzNiIgZGF0YS1vcmlnaW5hbD0iI2Y0NDMzNiI+PC9wYXRoPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8L2c+PC9zdmc+" />
        <p>{{ $contactos->email }}</p>
    </a>
    <a target="_blank" onclick="sumStadistic('whatsapp')" href="https://wa.me/{{ $contactos->whatsapp }}" class='whatsapp column is-4-fullhd is-4-desktop  is-12-tablet  is-12-mobile' style="padding:25px 0 !important;">
        <img class="centrar" width="40px" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTEwLjg5NDUzMSA1MTJjLTIuODc1IDAtNS42NzE4NzUtMS4xMzY3MTktNy43NDYwOTMtMy4yMzQzNzUtMi43MzQzNzYtMi43NjU2MjUtMy43ODkwNjMtNi43ODEyNS0yLjc2MTcxOS0xMC41MzUxNTZsMzMuMjg1MTU2LTEyMS41NDY4NzVjLTIwLjcyMjY1Ni0zNy40NzI2NTYtMzEuNjQ4NDM3LTc5Ljg2MzI4Mi0zMS42MzI4MTMtMTIyLjg5NDUzMi4wNTg1OTQtMTM5Ljk0MTQwNiAxMTMuOTQxNDA3LTI1My43ODkwNjIgMjUzLjg3MTA5NC0yNTMuNzg5MDYyIDY3Ljg3MTA5NC4wMjczNDM4IDEzMS42NDQ1MzIgMjYuNDY0ODQ0IDE3OS41NzgxMjUgNzQuNDMzNTk0IDQ3LjkyNTc4MSA0Ny45NzI2NTYgNzQuMzA4NTk0IDExMS43NDIxODcgNzQuMjg5MDYzIDE3OS41NTg1OTQtLjA2MjUgMTM5Ljk0NTMxMi0xMTMuOTQ1MzEzIDI1My44MDA3ODEtMjUzLjg2NzE4OCAyNTMuODAwNzgxIDAgMC0uMTA1NDY4IDAtLjEwOTM3NSAwLTQwLjg3MTA5My0uMDE1NjI1LTgxLjM5MDYyNS05Ljk3NjU2My0xMTcuNDY4NzUtMjguODQzNzVsLTEyNC42NzU3ODEgMzIuNjk1MzEyYy0uOTE0MDYyLjIzODI4MS0xLjg0Mzc1LjM1NTQ2OS0yLjc2MTcxOS4zNTU0Njl6bTAgMCIgZmlsbD0iI2U1ZTVlNSIgZGF0YS1vcmlnaW5hbD0iI2U1ZTVlNSIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTEwLjg5NDUzMSA1MDEuMTA1NDY5IDM0LjQ2ODc1LTEyNS44NzEwOTRjLTIxLjI2MTcxOS0zNi44Mzk4NDQtMzIuNDQ1MzEyLTc4LjYyODkwNi0zMi40Mjk2ODctMTIxLjQ0MTQwNi4wNTQ2ODctMTMzLjkzMzU5NCAxMDkuMDQ2ODc1LTI0Mi44OTg0MzggMjQyLjk3NjU2Mi0yNDIuODk4NDM4IDY0Ljk5MjE4OC4wMjczNDQgMTI1Ljk5NjA5NCAyNS4zMjQyMTkgMTcxLjg3MTA5NCA3MS4yMzgyODEgNDUuODcxMDk0IDQ1LjkxNDA2MyA3MS4xMjUgMTA2Ljk0NTMxMyA3MS4xMDE1NjIgMTcxLjg1NTQ2OS0uMDU4NTkzIDEzMy45Mjk2ODgtMTA5LjA2NjQwNiAyNDIuOTEwMTU3LTI0Mi45NzI2NTYgMjQyLjkxMDE1Ny0uMDA3ODEyIDAgLjAwMzkwNiAwIDAgMGgtLjEwNTQ2OGMtNDAuNjY0MDYzLS4wMTU2MjYtODAuNjE3MTg4LTEwLjIxNDg0NC0xMTYuMTA1NDY5LTI5LjU3MDMxM3ptMTM0Ljc2OTUzMS03Ny43NSA3LjM3ODkwNyA0LjM3MTA5M2MzMSAxOC4zOTg0MzggNjYuNTQyOTY5IDI4LjEyODkwNyAxMDIuNzg5MDYyIDI4LjE0ODQzOGguMDc4MTI1YzExMS4zMDQ2ODggMCAyMDEuODk4NDM4LTkwLjU3ODEyNSAyMDEuOTQ1MzEzLTIwMS45MDIzNDQuMDE5NTMxLTUzLjk0OTIxOC0yMC45NjQ4NDQtMTA0LjY3OTY4Ny01OS4wOTM3NS0xNDIuODM5ODQ0LTM4LjEzMjgxMy0zOC4xNjAxNTYtODguODMyMDMxLTU5LjE4NzUtMTQyLjc3NzM0NC01OS4yMTA5MzctMTExLjM5NDUzMSAwLTIwMS45ODQzNzUgOTAuNTY2NDA2LTIwMi4wMjczNDQgMjAxLjg4NjcxOS0uMDE1NjI1IDM4LjE0ODQzNyAxMC42NTYyNSA3NS4yOTY4NzUgMzAuODc1IDEwNy40NDUzMTJsNC44MDQ2ODggNy42NDA2MjUtMjAuNDA2MjUgNzQuNXptMCAwIiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjZmZmZmZmIiBzdHlsZT0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtMTkuMzQzNzUgNDkyLjYyNSAzMy4yNzczNDQtMTIxLjUxOTUzMWMtMjAuNTMxMjUtMzUuNTYyNS0zMS4zMjQyMTktNzUuOTEwMTU3LTMxLjMxMjUtMTE3LjIzNDM3NS4wNTA3ODEtMTI5LjI5Njg3NSAxMDUuMjczNDM3LTIzNC40ODgyODIgMjM0LjU1ODU5NC0yMzQuNDg4MjgyIDYyLjc1LjAyNzM0NCAxMjEuNjQ0NTMxIDI0LjQ0OTIxOSAxNjUuOTIxODc0IDY4Ljc3MzQzOCA0NC4yODkwNjMgNDQuMzI0MjE5IDY4LjY2NDA2MyAxMDMuMjQyMTg4IDY4LjY0MDYyNiAxNjUuODk4NDM4LS4wNTQ2ODggMTI5LjMwMDc4MS0xMDUuMjgxMjUgMjM0LjUwMzkwNi0yMzQuNTUwNzgyIDIzNC41MDM5MDYtLjAxMTcxOCAwIC4wMDM5MDYgMCAwIDBoLS4xMDU0NjhjLTM5LjI1MzkwNy0uMDE1NjI1LTc3LjgyODEyNi05Ljg2NzE4OC0xMTIuMDg1OTM4LTI4LjUzOTA2M3ptMCAwIiBmaWxsPSIjNjRiMTYxIiBkYXRhLW9yaWdpbmFsPSIjNjRiMTYxIiBzdHlsZT0iIj48L3BhdGg+PGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBmaWxsPSIjZmZmIj48cGF0aCBkPSJtMTAuODk0NTMxIDUwMS4xMDU0NjkgMzQuNDY4NzUtMTI1Ljg3MTA5NGMtMjEuMjYxNzE5LTM2LjgzOTg0NC0zMi40NDUzMTItNzguNjI4OTA2LTMyLjQyOTY4Ny0xMjEuNDQxNDA2LjA1NDY4Ny0xMzMuOTMzNTk0IDEwOS4wNDY4NzUtMjQyLjg5ODQzOCAyNDIuOTc2NTYyLTI0Mi44OTg0MzggNjQuOTkyMTg4LjAyNzM0NCAxMjUuOTk2MDk0IDI1LjMyNDIxOSAxNzEuODcxMDk0IDcxLjIzODI4MSA0NS44NzEwOTQgNDUuOTE0MDYzIDcxLjEyNSAxMDYuOTQ1MzEzIDcxLjEwMTU2MiAxNzEuODU1NDY5LS4wNTg1OTMgMTMzLjkyOTY4OC0xMDkuMDY2NDA2IDI0Mi45MTAxNTctMjQyLjk3MjY1NiAyNDIuOTEwMTU3LS4wMDc4MTIgMCAuMDAzOTA2IDAgMCAwaC0uMTA1NDY4Yy00MC42NjQwNjMtLjAxNTYyNi04MC42MTcxODgtMTAuMjE0ODQ0LTExNi4xMDU0NjktMjkuNTcwMzEzem0xMzQuNzY5NTMxLTc3Ljc1IDcuMzc4OTA3IDQuMzcxMDkzYzMxIDE4LjM5ODQzOCA2Ni41NDI5NjkgMjguMTI4OTA3IDEwMi43ODkwNjIgMjguMTQ4NDM4aC4wNzgxMjVjMTExLjMwNDY4OCAwIDIwMS44OTg0MzgtOTAuNTc4MTI1IDIwMS45NDUzMTMtMjAxLjkwMjM0NC4wMTk1MzEtNTMuOTQ5MjE4LTIwLjk2NDg0NC0xMDQuNjc5Njg3LTU5LjA5Mzc1LTE0Mi44Mzk4NDQtMzguMTMyODEzLTM4LjE2MDE1Ni04OC44MzIwMzEtNTkuMTg3NS0xNDIuNzc3MzQ0LTU5LjIxMDkzNy0xMTEuMzk0NTMxIDAtMjAxLjk4NDM3NSA5MC41NjY0MDYtMjAyLjAyNzM0NCAyMDEuODg2NzE5LS4wMTU2MjUgMzguMTQ4NDM3IDEwLjY1NjI1IDc1LjI5Njg3NSAzMC44NzUgMTA3LjQ0NTMxMmw0LjgwNDY4OCA3LjY0MDYyNS0yMC40MDYyNSA3NC41em0wIDAiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiNmZmZmZmYiIHN0eWxlPSIiPjwvcGF0aD48cGF0aCBkPSJtMTk1LjE4MzU5NCAxNTIuMjQ2MDk0Yy00LjU0Njg3NS0xMC4xMDkzNzUtOS4zMzU5MzgtMTAuMzEyNS0xMy42NjQwNjMtMTAuNDg4MjgyLTMuNTM5MDYyLS4xNTIzNDMtNy41ODk4NDMtLjE0NDUzMS0xMS42MzI4MTItLjE0NDUzMS00LjA0Njg3NSAwLTEwLjYyNSAxLjUyMzQzOC0xNi4xODc1IDcuNTk3NjU3LTUuNTY2NDA3IDYuMDc0MjE4LTIxLjI1MzkwNyAyMC43NjE3MTgtMjEuMjUzOTA3IDUwLjYzMjgxMiAwIDI5Ljg3NSAyMS43NTc4MTMgNTguNzM4MjgxIDI0Ljc5Mjk2OSA2Mi43OTI5NjkgMy4wMzUxNTcgNC4wNTA3ODEgNDIgNjcuMzA4NTkzIDEwMy43MDcwMzEgOTEuNjQ0NTMxIDUxLjI4NTE1NyAyMC4yMjY1NjIgNjEuNzE4NzUgMTYuMjAzMTI1IDcyLjg1MTU2MyAxNS4xOTE0MDYgMTEuMTMyODEzLTEuMDExNzE4IDM1LjkxNzk2OS0xNC42ODc1IDQwLjk3NjU2My0yOC44NjMyODEgNS4wNjI1LTE0LjE3NTc4MSA1LjA2MjUtMjYuMzI0MjE5IDMuNTQyOTY4LTI4Ljg2NzE4Ny0xLjUxOTUzMS0yLjUyNzM0NC01LjU2NjQwNi00LjA0Njg3Ni0xMS42MzY3MTgtNy4wODIwMzItNi4wNzAzMTMtMy4wMzUxNTYtMzUuOTE3OTY5LTE3LjcyNjU2Mi00MS40ODQzNzYtMTkuNzUtNS41NjY0MDYtMi4wMjczNDQtOS42MTMyODEtMy4wMzUxNTYtMTMuNjYwMTU2IDMuMDQyOTY5LTQuMDUwNzgxIDYuMDcwMzEzLTE1LjY3NTc4MSAxOS43NDIxODctMTkuMjE4NzUgMjMuNzg5MDYzLTMuNTQyOTY4IDQuMDU4NTkzLTcuMDg1OTM3IDQuNTY2NDA2LTEzLjE1NjI1IDEuNTI3MzQzLTYuMDcwMzEyLTMuMDQyOTY5LTI1LjYyNS05LjQ0OTIxOS00OC44MjAzMTItMzAuMTMyODEyLTE4LjA0Njg3NS0xNi4wODk4NDQtMzAuMjM0Mzc1LTM1Ljk2NDg0NC0zMy43NzczNDQtNDIuMDQyOTY5LTMuNTM5MDYyLTYuMDcwMzEyLS4wNTg1OTQtOS4wNzAzMTIgMi42Njc5NjktMTIuMzg2NzE5IDQuOTEwMTU2LTUuOTcyNjU2IDEzLjE0ODQzNy0xNi43MTA5MzcgMTUuMTcxODc1LTIwLjc1NzgxMiAyLjAyMzQzNy00LjA1NDY4OCAxLjAxMTcxOC03LjU5NzY1Ny0uNTAzOTA2LTEwLjYzNjcxOS0xLjUxOTUzMi0zLjAzNTE1Ni0xMy4zMjAzMTMtMzMuMDU4NTk0LTE4LjcxNDg0NC00NS4wNjY0MDZ6bTAgMCIgZmlsbC1ydWxlPSJldmVub2RkIiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjZmZmZmZmIiBzdHlsZT0iIj48L3BhdGg+PC9nPjwvZz48L3N2Zz4=" />
        <p>{{ $contactos->whatsapp }}</p>
    </a>
    <a target="_blank" onclick="sumStadistic('linkedin')" href="https://www.linkedin.com/in/{{ $contactos->linkedin }}" class='linkedin column is-4-fullhd is-4-desktop  is-12-tablet  is-12-mobile' style="padding:25px 0 !important;">
        <img class="centrar" width="40px" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIuMDAwMzgiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxsaW5lYXJHcmFkaWVudCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGlkPSJhIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjE2OS45OTQwMDEwODM0IiB4Mj0iMjk5LjQ5MzQxMzU5MDQiIHkxPSI3MS45ODYyMjcwMSIgeTI9IjM0OS4wNTQ4NDQ4ODY0Ij48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiMwMDc3YjUiPjwvc3RvcD48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiMwMDY2YjIiPjwvc3RvcD48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGlkPSJiIj48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiMwMDY2YjIiIHN0b3Atb3BhY2l0eT0iMCI+PC9zdG9wPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iIzA3NDg1ZSI+PC9zdG9wPjwvbGluZWFyR3JhZGllbnQ+PGxpbmVhckdyYWRpZW50IHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgaWQ9ImMiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4MT0iMzY0LjI4MjUyMzc4MjQiIHgyPSItMzc5LjU4NjQzMjcxMTQiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bGluazpocmVmPSIjYiIgeTE9IjMxNC4wODY4MzYxMzU2IiB5Mj0iLTg0Ljk1MjE4MDgxNjYiPjwvbGluZWFyR3JhZGllbnQ+PGxpbmVhckdyYWRpZW50IHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgaWQ9ImQiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4MT0iMjU2LjAwMDMiIHgyPSIyNTYuMDAwMyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhsaW5rOmhyZWY9IiNiIiB5MT0iNDE1LjgyNjcwMTAyODQiIHkyPSI1MjIuODM0NDQ1ODMxOCI+PC9saW5lYXJHcmFkaWVudD48bGluZWFyR3JhZGllbnQgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBpZD0iZSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSIyNzEuMzU0MzgzNDYwMiIgeDI9Ijc5LjkxNjg5ODg0OSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhsaW5rOmhyZWY9IiNiIiB5MT0iMjczLjc3NTQ1MjUzOTgiIHkyPSI4Mi4zMzgwNjgzMjA4Ij48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGlkPSJmIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjM4My43NDk0NzQ4OTIyIiB4Mj0iLTEuNzU2NTczMTA3OCIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhsaW5rOmhyZWY9IiNiIiB5MT0iNDUxLjYzMDg3NjQxMyIgeTI9IjI3MC45MjQ5MTY0MTMiPjwvbGluZWFyR3JhZGllbnQ+PGxpbmVhckdyYWRpZW50IHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgaWQ9ImciIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4MT0iNDc3LjUzMDU0NzM0NTYiIHgyPSIyMDguOTY5NjY2NDU4MiIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhsaW5rOmhyZWY9IiNiIiB5MT0iNDkxLjI1NDM3MjY1NDQiIHkyPSIyMjIuNjkzNDkxNzY3Ij48L2xpbmVhckdyYWRpZW50PjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTQyMC40MjE4NzUgNTAzLjIzNDM3NWMtMTA5LjUwMzkwNiAxMS42ODc1LTIxOS4zMzk4NDQgMTEuNjg3NS0zMjguODQzNzUgMC00My42NjQwNjMtNC42NjAxNTYtNzguMTUyMzQ0LTM5LjE0ODQzNy04Mi44MTI1LTgyLjgxNjQwNi0xMS42ODc1LTEwOS41MDM5MDctMTEuNjg3NS0yMTkuMzM1OTM4IDAtMzI4LjgzOTg0NCA0LjY2MDE1Ni00My42NjQwNjMgMzkuMTQ4NDM3LTc4LjE1MjM0NCA4Mi44MTI1LTgyLjgxMjUgMTA5LjUwMzkwNi0xMS42ODc1IDIxOS4zMzU5MzctMTEuNjg3NSAzMjguODM5ODQ0IDAgNDMuNjY3OTY5IDQuNjYwMTU2IDc4LjE1NjI1IDM5LjE0ODQzNyA4Mi44MTY0MDYgODIuODEyNSAxMS42ODc1IDEwOS41MDM5MDYgMTEuNjg3NSAyMTkuMzM1OTM3IDAgMzI4LjgzOTg0NC00LjY2MDE1NiA0My42Njc5NjktMzkuMTQ0NTMxIDc4LjE1NjI1LTgyLjgxMjUgODIuODE2NDA2em0wIDAiIGZpbGw9InVybCgjYSkiIGRhdGEtb3JpZ2luYWw9InVybCgjYSkiIHN0eWxlPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im00NzUuMzg2NzE5IDExMC4wOTc2NTZjLTQuMTMyODEzLTM4Ljc0NjA5NC0zNC43MzQzNzUtNjkuMzUxNTYyLTczLjQ4NDM3NS03My40ODgyODEtOTcuMTcxODc1LTEwLjM2NzE4Ny0xOTQuNjMyODEzLTEwLjM2NzE4Ny0yOTEuODA0Njg4IDAtMzguNzQ2MDk0IDQuMTM2NzE5LTY5LjM1MTU2MiAzNC43NDIxODctNzMuNDg4MjgxIDczLjQ4ODI4MS0xMC4zNjcxODcgOTcuMTcxODc1LTEwLjM2NzE4NyAxOTQuNjMyODEzIDAgMjkxLjgwMDc4MiA0LjEzNjcxOSAzOC43NSAzNC43NDIxODcgNjkuMzU1NDY4IDczLjQ4ODI4MSA3My40ODgyODEgOTcuMTcxODc1IDEwLjM3MTA5MyAxOTQuNjMyODEzIDEwLjM3MTA5MyAyOTEuODAwNzgyIDAgMzguNzUtNC4xMzI4MTMgNjkuMzU1NDY4LTM0LjczODI4MSA3My40ODgyODEtNzMuNDg4MjgxIDEwLjM3MTA5My05Ny4xNjc5NjkgMTAuMzcxMDkzLTE5NC42Mjg5MDcgMC0yOTEuODAwNzgyem0wIDAiIGZpbGw9InVybCgjYykiIGRhdGEtb3JpZ2luYWw9InVybCgjYykiIHN0eWxlPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im03LjY3MTg3NSA0MDkuODA0Njg4Yy4zNTE1NjMgMy41MzkwNjIuNzE0ODQ0IDcuMDc4MTI0IDEuMDkzNzUgMTAuNjE3MTg3IDQuNjYwMTU2IDQzLjY2NDA2MyAzOS4xNDg0MzcgNzguMTUyMzQ0IDgyLjgxNjQwNiA4Mi44MTI1IDEwOS41MDM5MDcgMTEuNjg3NSAyMTkuMzM1OTM4IDExLjY4NzUgMzI4LjgzOTg0NCAwIDQzLjY2Nzk2OS00LjY2MDE1NiA3OC4xNTIzNDQtMzkuMTQ4NDM3IDgyLjgxMjUtODIuODEyNS4zNzg5MDYtMy41MzkwNjMuNzQyMTg3LTcuMDc4MTI1IDEuMDk3NjU2LTEwLjYxNzE4N3ptMCAwIiBmaWxsPSJ1cmwoI2QpIiBkYXRhLW9yaWdpbmFsPSJ1cmwoI2QpIiBzdHlsZT0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtNDk3LjcxNDg0NCA0NDMuNTcwMzEyLTMzMC40MDYyNS0zMzAuNDEwMTU2Yy03LjM3ODkwNi05LjYyODkwNi0xOC45ODgyODItMTUuODQzNzUtMzIuMDU0Njg4LTE1Ljg0Mzc1LTIyLjI4OTA2MiAwLTQwLjM1OTM3NSAxOC4wNjY0MDYtNDAuMzU5Mzc1IDQwLjM1NTQ2OSAwIDEzLjA3MDMxMyA2LjIxODc1IDI0LjY3OTY4NyAxNS44NDc2NTcgMzIuMDU0Njg3bDMyOS4yNTc4MTIgMzI5LjI2MTcxOWMyNi42MTMyODEtOC44NTU0NjkgNDcuODI0MjE5LTI5LjMwNDY4NyA1Ny43MTQ4NDQtNTUuNDE3OTY5em0wIDAiIGZpbGw9InVybCgjZSkiIGRhdGEtb3JpZ2luYWw9InVybCgjZSkiIHN0eWxlPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0xNjkuMTUyMzQ0IDIwNC41MDM5MDZoLTY3LjgwMDc4MnYyMTAuMTc5Njg4bDk2LjIwMzEyNiA5Ni4yMDMxMjVjNzQuMzA0Njg3IDIuODEyNSAxNDguNjYwMTU2LjI2OTUzMSAyMjIuODYzMjgxLTcuNjUyMzQ0IDEyLjk3MjY1Ni0xLjM4MjgxMyAyNS4xMjUtNS40MTc5NjkgMzUuOTM3NS0xMS41MjczNDR6bTAgMCIgZmlsbD0idXJsKCNmKSIgZGF0YS1vcmlnaW5hbD0idXJsKCNmKSIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTM5OS40MTAxNTYgMjIyLjEwOTM3NWMtMTIuNDAyMzQ0LTEzLjU5NzY1Ni0zMC4yNTc4MTItMjIuMTI4OTA2LTUwLjEwNTQ2OC0yMi4xMjg5MDYtMzEuMzk0NTMyIDAtNTEuNjU2MjUgMTEuMDI3MzQzLTYzLjcxNDg0NCAyMS4yNjU2MjVsLTEzLjI4NTE1Ni0xNi43NDIxODhoLTYyLjQ3MjY1N3YyMTAuMTc5Njg4bDk2LjQ5MjE4OCA5Ni40OTIxODdjMzguMDU0Njg3LTEuMjM4MjgxIDc2LjA5Mzc1LTMuODg2NzE5IDExNC4wOTc2NTYtNy45NDE0MDYgNDMuNjY3OTY5LTQuNjYwMTU2IDc4LjE1MjM0NC0zOS4xNDg0MzcgODIuODEyNS04Mi44MTI1IDMuMTE3MTg3LTI5LjE5NTMxMyA1LjM5NDUzMS01OC40MTQwNjMgNi44NDc2NTYtODcuNjQwNjI1em0wIDAiIGZpbGw9InVybCgjZykiIGRhdGEtb3JpZ2luYWw9InVybCgjZykiIHN0eWxlPSIiPjwvcGF0aD48ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGw9IiNmZmYiPjxwYXRoIGQ9Im0xMDEuMzU1NDY5IDIwNC41MDM5MDZoNjcuNzk2ODc1djIxMC4xNzk2ODhoLTY3Ljc5Njg3NXptMCAwIiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjZmZmZmZmIiBzdHlsZT0iIj48L3BhdGg+PHBhdGggZD0ibTM0OS4zMDQ2ODggMTk5Ljk4MDQ2OWMtNDkuNjgzNTk0IDAtNzEuNTA3ODEzIDI3LjYxMzI4MS03NyAzNi4wMTk1MzF2LTMxLjQ5NjA5NGgtNjIuNDcyNjU3djIxMC4xNzk2ODhoNjcuODAwNzgxdi0xMDUuNTc0MjE5YzAtMzAuNTA3ODEzIDE0LjA0Mjk2OS01NC4yMzgyODEgNDAuNjc5Njg4LTU0LjIzODI4MSAyNi42MzI4MTIgMCAzMC45OTIxODggMjkuNTM5MDYyIDMwLjk5MjE4OCA2NS44NjMyODF2OTMuOTQ5MjE5aDY3LjgwMDc4MXYtMTQ2LjkwMjM0NGMwLTM3LjQ0NTMxMi0zMC4zNTU0NjktNjcuODAwNzgxLTY3LjgwMDc4MS02Ny44MDA3ODF6bTAgMCIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iI2ZmZmZmZiIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIGQ9Im0xNzUuNjA5Mzc1IDEzNy42NzU3ODFjMCAyMi4yODkwNjMtMTguMDY2NDA2IDQwLjM1NTQ2OS00MC4zNTU0NjkgNDAuMzU1NDY5LTIyLjI4OTA2MiAwLTQwLjM1OTM3NS0xOC4wNjY0MDYtNDAuMzU5Mzc1LTQwLjM1NTQ2OSAwLTIyLjI4OTA2MiAxOC4wNzAzMTMtNDAuMzU5Mzc1IDQwLjM1OTM3NS00MC4zNTkzNzUgMjIuMjg5MDYzIDAgNDAuMzU1NDY5IDE4LjA3MDMxMyA0MC4zNTU0NjkgNDAuMzU5Mzc1em0wIDAiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiNmZmZmZmYiIHN0eWxlPSIiPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg==" />
        <p>{{ $contactos->linkedin }}</p>
    </a>
</div>
<div class='columns is-mobile is-gapless is-multiline  viewTecnologies2' id="tecnologias">
    <div class='column centrar-full is-4-fullhd is-4-desktop  is-12-tablet  is-12-mobile '>
        <h2>Tecno<span class="subraya">logías</span></h2>
    </div>
    <div class='column is-8-fullhd is-8-desktop  is-12-tablet  is-12-mobile viewTecnologies'>

        @forelse ($tecnologies as $tecny)
        <div class="tecnyTarget">
            <div>
                <img class="centrar" src="{{ $tecny->img_logo }}" style="height:40px !important;" alt="">
                <p class="text-center">{{ $tecny->name }}</p>
                <span class="centrar-full tecnyspam">
                    <p>{{ $tecny->description }}</p>
                </span>

            </div>
        </div>
        @empty
        @endforelse
    </div>


</div>

<div class='columns is-mobile is-gapless is-multiline promo' id="formulario">
    <div class='column is-4-fullhd is-4-desktop  is-12-tablet  is-12-mobile curriculum centrar-full'>
        <img width="100px" class="centrar " src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMi4wMDMgNTEyLjAwMyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGc+CjxyZWN0IHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeD0iMTAzLjEyNiIgeT0iODkuMDEzIiB0cmFuc2Zvcm09Im1hdHJpeCgtMC4xMDcxIDAuOTk0MiAtMC45OTQyIC0wLjEwNzEgNjAyLjAxOTIgLTQwLjU3MDIpIiBzdHlsZT0iIiB3aWR0aD0iNDMyLjIwMiIgaGVpZ2h0PSIzMjIuMDYiIGZpbGw9IiMxMzJmM2IiIGRhdGEtb3JpZ2luYWw9IiMxMzJmM2IiPjwvcmVjdD4KPHJlY3QgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4PSIyNC4yODEiIHk9IjEwLjc3MyIgdHJhbnNmb3JtPSJtYXRyaXgoLTAuOTk3NSAwLjA3MDEgLTAuMDcwMSAtMC45OTc1IDM4Ni4wMzkxIDQ0MC4xNjAyKSIgc3R5bGU9IiIgd2lkdGg9IjMyMi4wMyIgaGVpZ2h0PSI0MzIuMTYyIiBmaWxsPSIjMzg4Y2IyIiBkYXRhLW9yaWdpbmFsPSIjMzg4Y2IyIj48L3JlY3Q+Cjxwb2x5Z29uIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgc3R5bGU9IiIgcG9pbnRzPSIyNTUuNzMyLDQzOC41MjcgMzYxLjEsNDMxLjExOCAzMzAuNzgzLDAgMjU1LjczMiw1LjI3OCAiIGZpbGw9IiMyNjVkNzciIGRhdGEtb3JpZ2luYWw9IiMyNjVkNzciPjwvcG9seWdvbj4KPHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBkPSJNOTguODY5LDUxMmgyOTIuMDI1Vjg1LjAzN0g5OC44NjlWNTEyeiIgZmlsbD0iI2I3ZTRmOCIgZGF0YS1vcmlnaW5hbD0iI2I3ZTRmOCI+PC9wYXRoPgo8cmVjdCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjI1NS43MzIiIHk9Ijg1LjAzNyIgc3R5bGU9IiIgd2lkdGg9IjEzNS4xNjQiIGhlaWdodD0iNDI2Ljk2NiIgZmlsbD0iIzZmYzhmMSIgZGF0YS1vcmlnaW5hbD0iIzZmYzhmMSI+PC9yZWN0Pgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPHJlY3QgeD0iMTQ2Ljk4NyIgeT0iMjk5Ljg3OCIgc3R5bGU9IiIgd2lkdGg9IjE5NS43OTYiIGhlaWdodD0iMzAuMDIxIiBmaWxsPSIjMjY1ZDc3IiBkYXRhLW9yaWdpbmFsPSIjMjY1ZDc3Ij48L3JlY3Q+Cgk8cmVjdCB4PSIxNDYuOTg3IiB5PSIzNTMuMjc1IiBzdHlsZT0iIiB3aWR0aD0iMTk1Ljc5NiIgaGVpZ2h0PSIzMC4wMjEiIGZpbGw9IiMyNjVkNzciIGRhdGEtb3JpZ2luYWw9IiMyNjVkNzciPjwvcmVjdD4KCTxyZWN0IHg9IjE0Ni45ODciIHk9IjQwNi42NzIiIHN0eWxlPSIiIHdpZHRoPSIxOTUuNzk2IiBoZWlnaHQ9IjMwLjAyMSIgZmlsbD0iIzI2NWQ3NyIgZGF0YS1vcmlnaW5hbD0iIzI2NWQ3NyI+PC9yZWN0Pgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8cmVjdCB4PSIyNTUuNzMyIiB5PSIyOTkuODc4IiBzdHlsZT0iIiB3aWR0aD0iODcuMDQ3IiBoZWlnaHQ9IjMwLjAyMSIgZmlsbD0iIzEzMmYzYiIgZGF0YS1vcmlnaW5hbD0iIzEzMmYzYiI+PC9yZWN0PgoJPHJlY3QgeD0iMjU1LjczMiIgeT0iNDA2LjY3MiIgc3R5bGU9IiIgd2lkdGg9Ijg3LjA0NyIgaGVpZ2h0PSIzMC4wMjEiIGZpbGw9IiMxMzJmM2IiIGRhdGEtb3JpZ2luYWw9IiMxMzJmM2IiPjwvcmVjdD4KCTxyZWN0IHg9IjI1NS43MzIiIHk9IjM1My4yNzUiIHN0eWxlPSIiIHdpZHRoPSI4Ny4wNDciIGhlaWdodD0iMzAuMDIxIiBmaWxsPSIjMTMyZjNiIiBkYXRhLW9yaWdpbmFsPSIjMTMyZjNiIj48L3JlY3Q+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KCTxwYXRoIHN0eWxlPSIiIGQ9Ik0xNDMuOTU3LDIxMy40MjdjMC0yOS4wNDQsMjIuMjg5LTQ5LjQ0Miw1Mi42ODQtNDkuNDQyYzE4LjUwOCwwLDMzLjA5Nyw2Ljc1NSw0Mi40MTgsMTguOTEyICAgbC0yMC4xMjgsMTcuOTY2Yy01LjUzOS03LjAyNS0xMi4xNTctMTEuMDc4LTIwLjY2OC0xMS4wNzhjLTEzLjIzOCwwLTIyLjE1NCw5LjE4Ni0yMi4xNTQsMjMuNjRzOC45MTYsMjMuNjQsMjIuMTU0LDIzLjY0ICAgYzguNTExLDAsMTUuMTMtNC4wNTMsMjAuNjY4LTExLjA3OGwyMC4xMjgsMTcuOTY2Yy05LjMyMSwxMi4xNTctMjMuOTExLDE4LjkxMi00Mi40MTgsMTguOTEyICAgQzE2Ni4yNDYsMjYyLjg2OSwxNDMuOTU3LDI0Mi40NzEsMTQzLjk1NywyMTMuNDI3eiIgZmlsbD0iIzI2NWQ3NyIgZGF0YS1vcmlnaW5hbD0iIzI2NWQ3NyI+PC9wYXRoPgoJPHBhdGggc3R5bGU9IiIgZD0iTTM0OS4yOTMsMTY2LjE0NmwtMzkuOTg2LDk0LjU2MmgtMzEuMzQxbC0zOS45ODctOTQuNTYyaDM0LjMxMmwyMi41Niw1NS4yNTFsMjMuMTAxLTU1LjI1MUgzNDkuMjkzICAgeiIgZmlsbD0iIzI2NWQ3NyIgZGF0YS1vcmlnaW5hbD0iIzI2NWQ3NyI+PC9wYXRoPgo8L2c+Cjxwb2x5Z29uIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgc3R5bGU9IiIgcG9pbnRzPSIzMTcuOTUzLDE2Ni4xNDYgMjk0Ljg1MywyMjEuMzk4IDI3Mi4yOTMsMTY2LjE0NiAyNTUuNzMyLDE2Ni4xNDYgMjU1LjczMiwyMDguMTI3ICAgMjc3Ljk2NywyNjAuNzA4IDMwOS4zMDgsMjYwLjcwOCAzNDkuMjkzLDE2Ni4xNDYgIiBmaWxsPSIjMTMyZjNiIiBkYXRhLW9yaWdpbmFsPSIjMTMyZjNiIj48L3BvbHlnb24+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=" />
        <br>
        <a class="btn-solid centrar" onclick="sumStadistic('cv')" target="_blank" href="{{ asset($contactos->cv) }}">
            Descargar
        </a>
        <div>Descargar curriculum</div>
    </div>
    <div class='column is-8-fullhd is-8-desktop  is-12-tablet  is-12-mobile promo'>
        <form method='post' action="{{ route('email.add') }}" class="form py-6" id="formProduct">


            @csrf
            <h3 class="mb-6">Contacto</h3>

            <div class='columns is-mobile is-gapless is-multiline'>
                <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile' style='padding:5px !important;'>
                    <input type="text" name="name" placeholder="nombre*" maxlength="50"> <br>
                </div>
                <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile' style='padding:5px !important;'>
                </div>
                <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile' style='padding:5px !important;'>
                    <input type="email" name="email" placeholder="email*" maxlength="50"> <br>
                </div>
                <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile' style='padding:5px !important;'>
                    <input type="number" name="numero" placeholder="numero*" maxlength="9">
                </div>
                <div class='column is-12-fullhd is-12-desktop  is-12-tablet  is-12-mobile' style='padding:5px !important;'>
                    <textarea name="mensaje" placeholder="Mensaje" width="100%" rows="10" maxlength="200"></textarea>
                </div>
            </div>
            <button type="submit" class="btn-solid">Contactar</button>
        </form>
    </div>

</div>


@if (session('message'))
<div id="eg1_modal" class="eg1_modal" style="display:block;">
    <a onclick="eg1CloseModal(`eg1_modal`)" class="close_modal_eg1">x</a>
    <div id="eg1_cont" class="eg1_cont">
        <div>
            <div id="productInfo">
                <h3 class="subraya">{{ session('message') }}</h3>
                <p>{{ session('submessage') }}</p>
            </div>
        </div>
    </div>
</div>



@endif

@endsection