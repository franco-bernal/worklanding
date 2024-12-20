<!doctype html>
<html lang="es" id="app">

<head>


    <style>
        :root {
            --color-a:{{ json_decode($page->color)->a_color }} !important;
            --color-b:{{ json_decode($page->color)->b_color }} !important;
            --color-ab: {{ json_decode($page->color)->ab_color }} !important;
            --color-bc: {{ json_decode($page->color)->bc_color }} !important;
            --radio: 3px;
        }

        .blog_header {
            background-image:linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 1, 65, 0.747)), url('{{ asset($blogs->header_img) }}');
        }
    </style>



    <link id="shor" rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $blogs->title }} - Franco Bernal</title>
    <meta name="keywords"
    content="{{ $blogs->related }}" />
<meta name="description"
    content="{{ $blogs->description }}">

    <link rel="sitemap" type="application/xml" title="Sitemap" href="sitemap.xml">
    <meta name="robots" content="all" />

    <!--Open Graph data-->
    <meta property="og:title" content="{{ $blogs->title }}" />
    <meta property="og:url" content="https://francobernal.net/blog/{{ $blogs->title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="{{ $blogs->description }}" />
    <meta property="og:image" content="{{ asset($blogs->header_img) }}" />

    <!--Twitter-->
    <meta name=" twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $blogs->title }}">
    <meta name="twitter:description" content="{{ $blogs->description }}">
    <meta name="twitter:url" content="https://francobernal.net/blog/{{ $blogs->title }}">
    <meta name="twitter:image" content="{{ asset($blogs->header_img) }}">

    <script type="application/ld+json">
        {
            "name": "francobernal.net",
            "homepage": "https://www.francobernal.net/blog"
        }
    </script>


    <!-- Scripts -->
    <!-- <script src="{{ asset('js/modal.js') }}" defer></script> -->
    <script src="{{ asset('js/click.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/bulma.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blogs/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu-header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/functions.css') }}" rel="stylesheet">

    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('carrusel/slick.css') }}" rel="stylesheet">

    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <link href="{{ asset('carrusel/slick-theme.css') }}" rel="stylesheet">

    <link href="{{ asset('css/blogs/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blogs/LearnLaravel.css') }}" rel="stylesheet">

    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">



</head>

<body>
    <nav class="menu-header">
        <ul class="header-links burge" id="burge">
            <li class="header-logo">
                <a href="{{ route('welcome') }}"><img src="{{ asset('img/logo-franco-blanco.png') }}" style="width:70px !important" alt=""></a>
            </li>
            <li class="">
                <a href="{{ route('welcome') }}">Landing</a>
            </li>
            <li><a class="btn-normal" href="{{ route('blog.search') }}">GO Blogs</a></li>
            <li>
                <a class="btn-solid">Blogs desarrollo web</a>
            </li>




        </ul>
        <img class="burge-ico" id="burge-ico" src="{{ url('img/burger.png') }}" alt="">

    </nav>
    <div class="blog_header">
        <p>{{ $blogs->created_at }}</p>
        <h1>{{ $blogs->title }}</h1>
        <p>{{ $blogs->description }}</p>
        @forelse(json_decode($blogs->related) as $related)
        <a href="{{ url('search?value='.$related) }}">{{ $related }}</a>
        @empty
        @endforelse
    </div>


    <section class="content-section">
        <p>{!! $blogs->html_content !!}</p>
    </section>

    <footer class="py-6 ">
        <div class='columns is-mobile is-gapless is-multiline'>
            <div class='column centrar-full is-4-fullhd is-4-desktop  is-12-tablet  is-12-mobile' style='padding:5px !important;'>
                <a href="{{ route('welcome') }}"><img src="{{ asset('img/logo-franco-blanco.png') }}" class="centrar" style="width:70% !important" alt=""></a>
            </div>
            <div class='column is-4-fullhd is-4-desktop  is-12-tablet  is-12-mobile' style='padding:5px !important;'>
                <h4 class='my-2 py-2 subraya'>Contactos</h4>
                <a onclick="sumStadistic('email')" href="mailto:{{ $contactos->email }}" target="_blank" style="padding:25px 0 !important;">
                    <img style="float:left; " class="mx-2" width="20px" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPgo8cmVjdCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjY0IiB5PSI2NCIgc3R5bGU9IiIgd2lkdGg9IjM4NCIgaGVpZ2h0PSIzODQiIGZpbGw9IiNlY2VmZjEiIGRhdGEtb3JpZ2luYWw9IiNlY2VmZjEiPjwvcmVjdD4KPHBvbHlnb24geG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHlsZT0iIiBwb2ludHM9IjI1NiwyOTYuMzg0IDQ0OCw0NDggNDQ4LDE0OC42NzIgIiBmaWxsPSIjY2ZkOGRjIiBkYXRhLW9yaWdpbmFsPSIjY2ZkOGRjIj48L3BvbHlnb24+CjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgc3R5bGU9IiIgZD0iTTQ2NCw2NGgtMTZMMjU2LDIxNS42MTZMNjQsNjRINDhDMjEuNTA0LDY0LDAsODUuNTA0LDAsMTEydjI4OGMwLDI2LjQ5NiwyMS41MDQsNDgsNDgsNDhoMTZWMTQ4LjY3MiAgbDE5MiwxNDcuNjhMNDQ4LDE0OC42NFY0NDhoMTZjMjYuNDk2LDAsNDgtMjEuNTA0LDQ4LTQ4VjExMkM1MTIsODUuNTA0LDQ5MC40OTYsNjQsNDY0LDY0eiIgZmlsbD0iI2Y0NDMzNiIgZGF0YS1vcmlnaW5hbD0iI2Y0NDMzNiI+PC9wYXRoPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8L2c+PC9zdmc+" />
                    <p class="my-2">{{ $contactos->email }}</p>
                </a>
                <a target="_blank" onclick="sumStadistic('whatsapp')" href="https://wa.me/{{ $contactos->whatsapp }}" style="padding:25px 0 !important;">
                    <img style="float:left; " class="mx-2" width="20px" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTEwLjg5NDUzMSA1MTJjLTIuODc1IDAtNS42NzE4NzUtMS4xMzY3MTktNy43NDYwOTMtMy4yMzQzNzUtMi43MzQzNzYtMi43NjU2MjUtMy43ODkwNjMtNi43ODEyNS0yLjc2MTcxOS0xMC41MzUxNTZsMzMuMjg1MTU2LTEyMS41NDY4NzVjLTIwLjcyMjY1Ni0zNy40NzI2NTYtMzEuNjQ4NDM3LTc5Ljg2MzI4Mi0zMS42MzI4MTMtMTIyLjg5NDUzMi4wNTg1OTQtMTM5Ljk0MTQwNiAxMTMuOTQxNDA3LTI1My43ODkwNjIgMjUzLjg3MTA5NC0yNTMuNzg5MDYyIDY3Ljg3MTA5NC4wMjczNDM4IDEzMS42NDQ1MzIgMjYuNDY0ODQ0IDE3OS41NzgxMjUgNzQuNDMzNTk0IDQ3LjkyNTc4MSA0Ny45NzI2NTYgNzQuMzA4NTk0IDExMS43NDIxODcgNzQuMjg5MDYzIDE3OS41NTg1OTQtLjA2MjUgMTM5Ljk0NTMxMi0xMTMuOTQ1MzEzIDI1My44MDA3ODEtMjUzLjg2NzE4OCAyNTMuODAwNzgxIDAgMC0uMTA1NDY4IDAtLjEwOTM3NSAwLTQwLjg3MTA5My0uMDE1NjI1LTgxLjM5MDYyNS05Ljk3NjU2My0xMTcuNDY4NzUtMjguODQzNzVsLTEyNC42NzU3ODEgMzIuNjk1MzEyYy0uOTE0MDYyLjIzODI4MS0xLjg0Mzc1LjM1NTQ2OS0yLjc2MTcxOS4zNTU0Njl6bTAgMCIgZmlsbD0iI2U1ZTVlNSIgZGF0YS1vcmlnaW5hbD0iI2U1ZTVlNSIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTEwLjg5NDUzMSA1MDEuMTA1NDY5IDM0LjQ2ODc1LTEyNS44NzEwOTRjLTIxLjI2MTcxOS0zNi44Mzk4NDQtMzIuNDQ1MzEyLTc4LjYyODkwNi0zMi40Mjk2ODctMTIxLjQ0MTQwNi4wNTQ2ODctMTMzLjkzMzU5NCAxMDkuMDQ2ODc1LTI0Mi44OTg0MzggMjQyLjk3NjU2Mi0yNDIuODk4NDM4IDY0Ljk5MjE4OC4wMjczNDQgMTI1Ljk5NjA5NCAyNS4zMjQyMTkgMTcxLjg3MTA5NCA3MS4yMzgyODEgNDUuODcxMDk0IDQ1LjkxNDA2MyA3MS4xMjUgMTA2Ljk0NTMxMyA3MS4xMDE1NjIgMTcxLjg1NTQ2OS0uMDU4NTkzIDEzMy45Mjk2ODgtMTA5LjA2NjQwNiAyNDIuOTEwMTU3LTI0Mi45NzI2NTYgMjQyLjkxMDE1Ny0uMDA3ODEyIDAgLjAwMzkwNiAwIDAgMGgtLjEwNTQ2OGMtNDAuNjY0MDYzLS4wMTU2MjYtODAuNjE3MTg4LTEwLjIxNDg0NC0xMTYuMTA1NDY5LTI5LjU3MDMxM3ptMTM0Ljc2OTUzMS03Ny43NSA3LjM3ODkwNyA0LjM3MTA5M2MzMSAxOC4zOTg0MzggNjYuNTQyOTY5IDI4LjEyODkwNyAxMDIuNzg5MDYyIDI4LjE0ODQzOGguMDc4MTI1YzExMS4zMDQ2ODggMCAyMDEuODk4NDM4LTkwLjU3ODEyNSAyMDEuOTQ1MzEzLTIwMS45MDIzNDQuMDE5NTMxLTUzLjk0OTIxOC0yMC45NjQ4NDQtMTA0LjY3OTY4Ny01OS4wOTM3NS0xNDIuODM5ODQ0LTM4LjEzMjgxMy0zOC4xNjAxNTYtODguODMyMDMxLTU5LjE4NzUtMTQyLjc3NzM0NC01OS4yMTA5MzctMTExLjM5NDUzMSAwLTIwMS45ODQzNzUgOTAuNTY2NDA2LTIwMi4wMjczNDQgMjAxLjg4NjcxOS0uMDE1NjI1IDM4LjE0ODQzNyAxMC42NTYyNSA3NS4yOTY4NzUgMzAuODc1IDEwNy40NDUzMTJsNC44MDQ2ODggNy42NDA2MjUtMjAuNDA2MjUgNzQuNXptMCAwIiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjZmZmZmZmIiBzdHlsZT0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtMTkuMzQzNzUgNDkyLjYyNSAzMy4yNzczNDQtMTIxLjUxOTUzMWMtMjAuNTMxMjUtMzUuNTYyNS0zMS4zMjQyMTktNzUuOTEwMTU3LTMxLjMxMjUtMTE3LjIzNDM3NS4wNTA3ODEtMTI5LjI5Njg3NSAxMDUuMjczNDM3LTIzNC40ODgyODIgMjM0LjU1ODU5NC0yMzQuNDg4MjgyIDYyLjc1LjAyNzM0NCAxMjEuNjQ0NTMxIDI0LjQ0OTIxOSAxNjUuOTIxODc0IDY4Ljc3MzQzOCA0NC4yODkwNjMgNDQuMzI0MjE5IDY4LjY2NDA2MyAxMDMuMjQyMTg4IDY4LjY0MDYyNiAxNjUuODk4NDM4LS4wNTQ2ODggMTI5LjMwMDc4MS0xMDUuMjgxMjUgMjM0LjUwMzkwNi0yMzQuNTUwNzgyIDIzNC41MDM5MDYtLjAxMTcxOCAwIC4wMDM5MDYgMCAwIDBoLS4xMDU0NjhjLTM5LjI1MzkwNy0uMDE1NjI1LTc3LjgyODEyNi05Ljg2NzE4OC0xMTIuMDg1OTM4LTI4LjUzOTA2M3ptMCAwIiBmaWxsPSIjNjRiMTYxIiBkYXRhLW9yaWdpbmFsPSIjNjRiMTYxIiBzdHlsZT0iIj48L3BhdGg+PGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBmaWxsPSIjZmZmIj48cGF0aCBkPSJtMTAuODk0NTMxIDUwMS4xMDU0NjkgMzQuNDY4NzUtMTI1Ljg3MTA5NGMtMjEuMjYxNzE5LTM2LjgzOTg0NC0zMi40NDUzMTItNzguNjI4OTA2LTMyLjQyOTY4Ny0xMjEuNDQxNDA2LjA1NDY4Ny0xMzMuOTMzNTk0IDEwOS4wNDY4NzUtMjQyLjg5ODQzOCAyNDIuOTc2NTYyLTI0Mi44OTg0MzggNjQuOTkyMTg4LjAyNzM0NCAxMjUuOTk2MDk0IDI1LjMyNDIxOSAxNzEuODcxMDk0IDcxLjIzODI4MSA0NS44NzEwOTQgNDUuOTE0MDYzIDcxLjEyNSAxMDYuOTQ1MzEzIDcxLjEwMTU2MiAxNzEuODU1NDY5LS4wNTg1OTMgMTMzLjkyOTY4OC0xMDkuMDY2NDA2IDI0Mi45MTAxNTctMjQyLjk3MjY1NiAyNDIuOTEwMTU3LS4wMDc4MTIgMCAuMDAzOTA2IDAgMCAwaC0uMTA1NDY4Yy00MC42NjQwNjMtLjAxNTYyNi04MC42MTcxODgtMTAuMjE0ODQ0LTExNi4xMDU0NjktMjkuNTcwMzEzem0xMzQuNzY5NTMxLTc3Ljc1IDcuMzc4OTA3IDQuMzcxMDkzYzMxIDE4LjM5ODQzOCA2Ni41NDI5NjkgMjguMTI4OTA3IDEwMi43ODkwNjIgMjguMTQ4NDM4aC4wNzgxMjVjMTExLjMwNDY4OCAwIDIwMS44OTg0MzgtOTAuNTc4MTI1IDIwMS45NDUzMTMtMjAxLjkwMjM0NC4wMTk1MzEtNTMuOTQ5MjE4LTIwLjk2NDg0NC0xMDQuNjc5Njg3LTU5LjA5Mzc1LTE0Mi44Mzk4NDQtMzguMTMyODEzLTM4LjE2MDE1Ni04OC44MzIwMzEtNTkuMTg3NS0xNDIuNzc3MzQ0LTU5LjIxMDkzNy0xMTEuMzk0NTMxIDAtMjAxLjk4NDM3NSA5MC41NjY0MDYtMjAyLjAyNzM0NCAyMDEuODg2NzE5LS4wMTU2MjUgMzguMTQ4NDM3IDEwLjY1NjI1IDc1LjI5Njg3NSAzMC44NzUgMTA3LjQ0NTMxMmw0LjgwNDY4OCA3LjY0MDYyNS0yMC40MDYyNSA3NC41em0wIDAiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiNmZmZmZmYiIHN0eWxlPSIiPjwvcGF0aD48cGF0aCBkPSJtMTk1LjE4MzU5NCAxNTIuMjQ2MDk0Yy00LjU0Njg3NS0xMC4xMDkzNzUtOS4zMzU5MzgtMTAuMzEyNS0xMy42NjQwNjMtMTAuNDg4MjgyLTMuNTM5MDYyLS4xNTIzNDMtNy41ODk4NDMtLjE0NDUzMS0xMS42MzI4MTItLjE0NDUzMS00LjA0Njg3NSAwLTEwLjYyNSAxLjUyMzQzOC0xNi4xODc1IDcuNTk3NjU3LTUuNTY2NDA3IDYuMDc0MjE4LTIxLjI1MzkwNyAyMC43NjE3MTgtMjEuMjUzOTA3IDUwLjYzMjgxMiAwIDI5Ljg3NSAyMS43NTc4MTMgNTguNzM4MjgxIDI0Ljc5Mjk2OSA2Mi43OTI5NjkgMy4wMzUxNTcgNC4wNTA3ODEgNDIgNjcuMzA4NTkzIDEwMy43MDcwMzEgOTEuNjQ0NTMxIDUxLjI4NTE1NyAyMC4yMjY1NjIgNjEuNzE4NzUgMTYuMjAzMTI1IDcyLjg1MTU2MyAxNS4xOTE0MDYgMTEuMTMyODEzLTEuMDExNzE4IDM1LjkxNzk2OS0xNC42ODc1IDQwLjk3NjU2My0yOC44NjMyODEgNS4wNjI1LTE0LjE3NTc4MSA1LjA2MjUtMjYuMzI0MjE5IDMuNTQyOTY4LTI4Ljg2NzE4Ny0xLjUxOTUzMS0yLjUyNzM0NC01LjU2NjQwNi00LjA0Njg3Ni0xMS42MzY3MTgtNy4wODIwMzItNi4wNzAzMTMtMy4wMzUxNTYtMzUuOTE3OTY5LTE3LjcyNjU2Mi00MS40ODQzNzYtMTkuNzUtNS41NjY0MDYtMi4wMjczNDQtOS42MTMyODEtMy4wMzUxNTYtMTMuNjYwMTU2IDMuMDQyOTY5LTQuMDUwNzgxIDYuMDcwMzEzLTE1LjY3NTc4MSAxOS43NDIxODctMTkuMjE4NzUgMjMuNzg5MDYzLTMuNTQyOTY4IDQuMDU4NTkzLTcuMDg1OTM3IDQuNTY2NDA2LTEzLjE1NjI1IDEuNTI3MzQzLTYuMDcwMzEyLTMuMDQyOTY5LTI1LjYyNS05LjQ0OTIxOS00OC44MjAzMTItMzAuMTMyODEyLTE4LjA0Njg3NS0xNi4wODk4NDQtMzAuMjM0Mzc1LTM1Ljk2NDg0NC0zMy43NzczNDQtNDIuMDQyOTY5LTMuNTM5MDYyLTYuMDcwMzEyLS4wNTg1OTQtOS4wNzAzMTIgMi42Njc5NjktMTIuMzg2NzE5IDQuOTEwMTU2LTUuOTcyNjU2IDEzLjE0ODQzNy0xNi43MTA5MzcgMTUuMTcxODc1LTIwLjc1NzgxMiAyLjAyMzQzNy00LjA1NDY4OCAxLjAxMTcxOC03LjU5NzY1Ny0uNTAzOTA2LTEwLjYzNjcxOS0xLjUxOTUzMi0zLjAzNTE1Ni0xMy4zMjAzMTMtMzMuMDU4NTk0LTE4LjcxNDg0NC00NS4wNjY0MDZ6bTAgMCIgZmlsbC1ydWxlPSJldmVub2RkIiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjZmZmZmZmIiBzdHlsZT0iIj48L3BhdGg+PC9nPjwvZz48L3N2Zz4=" />
                    <p class="my-2">{{ $contactos->whatsapp }}</p>
                </a>
                <a target="_blank" onclick="sumStadistic('linkedin')" href="https://www.linkedin.com/in/{{ $contactos->linkedin }}" style="padding:25px 0 !important;">
                    <img style="float:left; " class="mx-2" width="20px" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIuMDAwMzgiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxsaW5lYXJHcmFkaWVudCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGlkPSJhIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjE2OS45OTQwMDEwODM0IiB4Mj0iMjk5LjQ5MzQxMzU5MDQiIHkxPSI3MS45ODYyMjcwMSIgeTI9IjM0OS4wNTQ4NDQ4ODY0Ij48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiMwMDc3YjUiPjwvc3RvcD48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiMwMDY2YjIiPjwvc3RvcD48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGlkPSJiIj48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiMwMDY2YjIiIHN0b3Atb3BhY2l0eT0iMCI+PC9zdG9wPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iIzA3NDg1ZSI+PC9zdG9wPjwvbGluZWFyR3JhZGllbnQ+PGxpbmVhckdyYWRpZW50IHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgaWQ9ImMiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4MT0iMzY0LjI4MjUyMzc4MjQiIHgyPSItMzc5LjU4NjQzMjcxMTQiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bGluazpocmVmPSIjYiIgeTE9IjMxNC4wODY4MzYxMzU2IiB5Mj0iLTg0Ljk1MjE4MDgxNjYiPjwvbGluZWFyR3JhZGllbnQ+PGxpbmVhckdyYWRpZW50IHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgaWQ9ImQiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4MT0iMjU2LjAwMDMiIHgyPSIyNTYuMDAwMyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhsaW5rOmhyZWY9IiNiIiB5MT0iNDE1LjgyNjcwMTAyODQiIHkyPSI1MjIuODM0NDQ1ODMxOCI+PC9saW5lYXJHcmFkaWVudD48bGluZWFyR3JhZGllbnQgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBpZD0iZSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSIyNzEuMzU0MzgzNDYwMiIgeDI9Ijc5LjkxNjg5ODg0OSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhsaW5rOmhyZWY9IiNiIiB5MT0iMjczLjc3NTQ1MjUzOTgiIHkyPSI4Mi4zMzgwNjgzMjA4Ij48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGlkPSJmIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjM4My43NDk0NzQ4OTIyIiB4Mj0iLTEuNzU2NTczMTA3OCIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhsaW5rOmhyZWY9IiNiIiB5MT0iNDUxLjYzMDg3NjQxMyIgeTI9IjI3MC45MjQ5MTY0MTMiPjwvbGluZWFyR3JhZGllbnQ+PGxpbmVhckdyYWRpZW50IHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgaWQ9ImciIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4MT0iNDc3LjUzMDU0NzM0NTYiIHgyPSIyMDguOTY5NjY2NDU4MiIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhsaW5rOmhyZWY9IiNiIiB5MT0iNDkxLjI1NDM3MjY1NDQiIHkyPSIyMjIuNjkzNDkxNzY3Ij48L2xpbmVhckdyYWRpZW50PjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTQyMC40MjE4NzUgNTAzLjIzNDM3NWMtMTA5LjUwMzkwNiAxMS42ODc1LTIxOS4zMzk4NDQgMTEuNjg3NS0zMjguODQzNzUgMC00My42NjQwNjMtNC42NjAxNTYtNzguMTUyMzQ0LTM5LjE0ODQzNy04Mi44MTI1LTgyLjgxNjQwNi0xMS42ODc1LTEwOS41MDM5MDctMTEuNjg3NS0yMTkuMzM1OTM4IDAtMzI4LjgzOTg0NCA0LjY2MDE1Ni00My42NjQwNjMgMzkuMTQ4NDM3LTc4LjE1MjM0NCA4Mi44MTI1LTgyLjgxMjUgMTA5LjUwMzkwNi0xMS42ODc1IDIxOS4zMzU5MzctMTEuNjg3NSAzMjguODM5ODQ0IDAgNDMuNjY3OTY5IDQuNjYwMTU2IDc4LjE1NjI1IDM5LjE0ODQzNyA4Mi44MTY0MDYgODIuODEyNSAxMS42ODc1IDEwOS41MDM5MDYgMTEuNjg3NSAyMTkuMzM1OTM3IDAgMzI4LjgzOTg0NC00LjY2MDE1NiA0My42Njc5NjktMzkuMTQ0NTMxIDc4LjE1NjI1LTgyLjgxMjUgODIuODE2NDA2em0wIDAiIGZpbGw9InVybCgjYSkiIGRhdGEtb3JpZ2luYWw9InVybCgjYSkiIHN0eWxlPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im00NzUuMzg2NzE5IDExMC4wOTc2NTZjLTQuMTMyODEzLTM4Ljc0NjA5NC0zNC43MzQzNzUtNjkuMzUxNTYyLTczLjQ4NDM3NS03My40ODgyODEtOTcuMTcxODc1LTEwLjM2NzE4Ny0xOTQuNjMyODEzLTEwLjM2NzE4Ny0yOTEuODA0Njg4IDAtMzguNzQ2MDk0IDQuMTM2NzE5LTY5LjM1MTU2MiAzNC43NDIxODctNzMuNDg4MjgxIDczLjQ4ODI4MS0xMC4zNjcxODcgOTcuMTcxODc1LTEwLjM2NzE4NyAxOTQuNjMyODEzIDAgMjkxLjgwMDc4MiA0LjEzNjcxOSAzOC43NSAzNC43NDIxODcgNjkuMzU1NDY4IDczLjQ4ODI4MSA3My40ODgyODEgOTcuMTcxODc1IDEwLjM3MTA5MyAxOTQuNjMyODEzIDEwLjM3MTA5MyAyOTEuODAwNzgyIDAgMzguNzUtNC4xMzI4MTMgNjkuMzU1NDY4LTM0LjczODI4MSA3My40ODgyODEtNzMuNDg4MjgxIDEwLjM3MTA5My05Ny4xNjc5NjkgMTAuMzcxMDkzLTE5NC42Mjg5MDcgMC0yOTEuODAwNzgyem0wIDAiIGZpbGw9InVybCgjYykiIGRhdGEtb3JpZ2luYWw9InVybCgjYykiIHN0eWxlPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im03LjY3MTg3NSA0MDkuODA0Njg4Yy4zNTE1NjMgMy41MzkwNjIuNzE0ODQ0IDcuMDc4MTI0IDEuMDkzNzUgMTAuNjE3MTg3IDQuNjYwMTU2IDQzLjY2NDA2MyAzOS4xNDg0MzcgNzguMTUyMzQ0IDgyLjgxNjQwNiA4Mi44MTI1IDEwOS41MDM5MDcgMTEuNjg3NSAyMTkuMzM1OTM4IDExLjY4NzUgMzI4LjgzOTg0NCAwIDQzLjY2Nzk2OS00LjY2MDE1NiA3OC4xNTIzNDQtMzkuMTQ4NDM3IDgyLjgxMjUtODIuODEyNS4zNzg5MDYtMy41MzkwNjMuNzQyMTg3LTcuMDc4MTI1IDEuMDk3NjU2LTEwLjYxNzE4N3ptMCAwIiBmaWxsPSJ1cmwoI2QpIiBkYXRhLW9yaWdpbmFsPSJ1cmwoI2QpIiBzdHlsZT0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtNDk3LjcxNDg0NCA0NDMuNTcwMzEyLTMzMC40MDYyNS0zMzAuNDEwMTU2Yy03LjM3ODkwNi05LjYyODkwNi0xOC45ODgyODItMTUuODQzNzUtMzIuMDU0Njg4LTE1Ljg0Mzc1LTIyLjI4OTA2MiAwLTQwLjM1OTM3NSAxOC4wNjY0MDYtNDAuMzU5Mzc1IDQwLjM1NTQ2OSAwIDEzLjA3MDMxMyA2LjIxODc1IDI0LjY3OTY4NyAxNS44NDc2NTcgMzIuMDU0Njg3bDMyOS4yNTc4MTIgMzI5LjI2MTcxOWMyNi42MTMyODEtOC44NTU0NjkgNDcuODI0MjE5LTI5LjMwNDY4NyA1Ny43MTQ4NDQtNTUuNDE3OTY5em0wIDAiIGZpbGw9InVybCgjZSkiIGRhdGEtb3JpZ2luYWw9InVybCgjZSkiIHN0eWxlPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0xNjkuMTUyMzQ0IDIwNC41MDM5MDZoLTY3LjgwMDc4MnYyMTAuMTc5Njg4bDk2LjIwMzEyNiA5Ni4yMDMxMjVjNzQuMzA0Njg3IDIuODEyNSAxNDguNjYwMTU2LjI2OTUzMSAyMjIuODYzMjgxLTcuNjUyMzQ0IDEyLjk3MjY1Ni0xLjM4MjgxMyAyNS4xMjUtNS40MTc5NjkgMzUuOTM3NS0xMS41MjczNDR6bTAgMCIgZmlsbD0idXJsKCNmKSIgZGF0YS1vcmlnaW5hbD0idXJsKCNmKSIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTM5OS40MTAxNTYgMjIyLjEwOTM3NWMtMTIuNDAyMzQ0LTEzLjU5NzY1Ni0zMC4yNTc4MTItMjIuMTI4OTA2LTUwLjEwNTQ2OC0yMi4xMjg5MDYtMzEuMzk0NTMyIDAtNTEuNjU2MjUgMTEuMDI3MzQzLTYzLjcxNDg0NCAyMS4yNjU2MjVsLTEzLjI4NTE1Ni0xNi43NDIxODhoLTYyLjQ3MjY1N3YyMTAuMTc5Njg4bDk2LjQ5MjE4OCA5Ni40OTIxODdjMzguMDU0Njg3LTEuMjM4MjgxIDc2LjA5Mzc1LTMuODg2NzE5IDExNC4wOTc2NTYtNy45NDE0MDYgNDMuNjY3OTY5LTQuNjYwMTU2IDc4LjE1MjM0NC0zOS4xNDg0MzcgODIuODEyNS04Mi44MTI1IDMuMTE3MTg3LTI5LjE5NTMxMyA1LjM5NDUzMS01OC40MTQwNjMgNi44NDc2NTYtODcuNjQwNjI1em0wIDAiIGZpbGw9InVybCgjZykiIGRhdGEtb3JpZ2luYWw9InVybCgjZykiIHN0eWxlPSIiPjwvcGF0aD48ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGw9IiNmZmYiPjxwYXRoIGQ9Im0xMDEuMzU1NDY5IDIwNC41MDM5MDZoNjcuNzk2ODc1djIxMC4xNzk2ODhoLTY3Ljc5Njg3NXptMCAwIiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjZmZmZmZmIiBzdHlsZT0iIj48L3BhdGg+PHBhdGggZD0ibTM0OS4zMDQ2ODggMTk5Ljk4MDQ2OWMtNDkuNjgzNTk0IDAtNzEuNTA3ODEzIDI3LjYxMzI4MS03NyAzNi4wMTk1MzF2LTMxLjQ5NjA5NGgtNjIuNDcyNjU3djIxMC4xNzk2ODhoNjcuODAwNzgxdi0xMDUuNTc0MjE5YzAtMzAuNTA3ODEzIDE0LjA0Mjk2OS01NC4yMzgyODEgNDAuNjc5Njg4LTU0LjIzODI4MSAyNi42MzI4MTIgMCAzMC45OTIxODggMjkuNTM5MDYyIDMwLjk5MjE4OCA2NS44NjMyODF2OTMuOTQ5MjE5aDY3LjgwMDc4MXYtMTQ2LjkwMjM0NGMwLTM3LjQ0NTMxMi0zMC4zNTU0NjktNjcuODAwNzgxLTY3LjgwMDc4MS02Ny44MDA3ODF6bTAgMCIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iI2ZmZmZmZiIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIGQ9Im0xNzUuNjA5Mzc1IDEzNy42NzU3ODFjMCAyMi4yODkwNjMtMTguMDY2NDA2IDQwLjM1NTQ2OS00MC4zNTU0NjkgNDAuMzU1NDY5LTIyLjI4OTA2MiAwLTQwLjM1OTM3NS0xOC4wNjY0MDYtNDAuMzU5Mzc1LTQwLjM1NTQ2OSAwLTIyLjI4OTA2MiAxOC4wNzAzMTMtNDAuMzU5Mzc1IDQwLjM1OTM3NS00MC4zNTkzNzUgMjIuMjg5MDYzIDAgNDAuMzU1NDY5IDE4LjA3MDMxMyA0MC4zNTU0NjkgNDAuMzU5Mzc1em0wIDAiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiNmZmZmZmYiIHN0eWxlPSIiPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg==" />
                    <p class="my-2">/{{ $contactos->linkedin }}</p>
                </a>

            </div>
            <div class='column is-4-fullhd is-4-desktop  is-12-tablet  is-12-mobile centrar-full' style='padding:5px !important;'>
                <p class="centrar sub-square">{{ json_decode($page->settings)->footer_sett }}</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('carrusel/slick.js') }}"></script>
    <script>
        // $(".slide-notices").slick({
        //     infinite: true,
        //     dots: true,
        //     speed: 300,
        //     slidesToShow: 2,
        //     adaptiveHeight: true,
        //     autoplay: true,
        //     autoplaySpeed: 2000,
        //     arrows: true,
        //     slidesToScroll: 1,
        //     rows: 1,
        //     prevArrow: '<button type="button" class="slick-prev"></button>',
        //     nextArrow: '<button type="button" class="slick-next"></button>',
        // });
    </script>
    <!-- <script>
        (function() {
            var burger = document.querySelector('.burger');
            var menu = document.querySelector('#' + burger.dataset.target);
            burger.addEventListener('click', function() {
                burger.classList.toggle('is-active');
                menu.classList.toggle('is-active');
            });
        })();
    </script> -->
    <script>
        function sendto(type) {
            "{{ route('stadistic.edit',['type'=>'email']) }}"
            // "{{ route('stadistic.edit',['type'=>'mailto:'.$contactos->email]) }}"
        }

        function sumStadistic(type = "whatsapp") {
            $.ajax({
                type: 'post',
                url: "{{ route('stadistic.sum') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    type: type,
                },
                success: function(data) {
                    // $(".estado" + ide).html(data).fadeIn();
                    // console.log(data);
                },
                error: function(error) {
                    // console.log(error);
                }
            }).fail(function(jqXHR, textStatus, error) {
                // Handle error here
                // console.log(jqXHR.responseText);
            });
        }
    </script>
    <script>
        visita();
    function visita() {
            $.ajax({
                type: 'post',
                url: "{{ route('visitas.add') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    sum: 1,
                },
                success: function(data) {
                },
                error: function(error) {
                }
            }).fail(function(jqXHR, textStatus, error) {
             
            });
        }
    </script>
</body>

</html>