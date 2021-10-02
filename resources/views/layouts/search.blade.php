<!doctype html>
<html lang="es" id="app">

<head>


    <style>
        :root {
            /* --color-a:{{ json_decode($page->color)->a_color }} !important;
            --color-b:{{ json_decode($page->color)->b_color }} !important;
            --color-ab: {{ json_decode($page->color)->ab_color }} !important;
            --color-bc: {{ json_decode($page->color)->bc_color }} !important;
            --radio: 3px; */
        }

        .blog_header {
            background-image: linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 1, 65, 0.747)), url('');

        }

    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-EPTW6JSVM3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-EPTW6JSVM3');
    </script>

    <link id="shor" rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Go Blog</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/modal.js') }}" defer></script> -->
    <!-- Styles -->
    <script src="{{ asset('js/click.js') }}" defer></script>
    <link href="{{ asset('css/bulma.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu-header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/functions.css') }}" rel="stylesheet">

    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">


    <link href="{{ asset('css/blogs/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blogs/LearnLaravel.css') }}" rel="stylesheet">


    <style>
        body {
            /* background-image: url(https://images.pexels.com/photos/1252872/pexels-photo-1252872.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed; */
            background-image: linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 1, 65, 0.747)),
                url('{{ json_decode($page->img)->header_back_img }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            height: auto;
            min-height: 100vh;
        }

        h4 {
            /* -webkit-text-stroke: 2px white; */
        }

    </style>

</head>

<body>
    <nav class="menu-header">
        <ul class="header-links burge" id="burge">
            <li class="header-logo">
                <a href="{{ route('welcome') }}"><img src="{{ asset('img/logo-franco-blanco.png') }}"
                        style="width:70px !important" alt=""></a>
            </li>
            <li class="">
                <a href=" {{ route('welcome') }}">Landing</a>
            </li>

            <li>
                <a class="btn-solid">Blogs desarrollo web</a>
            </li>
        </ul>
        <img class="burge-ico" id="burge-ico" src="{{ url('img/burger.png') }}" alt="">

    </nav>
    <section class="search-section">

        <div class='columns is-mobile is-gapless is-multiline pt-6'>

            <div class='column is-12-fullhd is-12-desktop  is-12-tablet  is-12-mobile formu'>
                <form method='get' action="{{ url('search/') }}">
                    <h4>GO BLOG</h4>
                    <p>noticias - blogs - notas</p>
                    <input type="text" name="value" placeholder="Buscar">
                    <button type="submit">Buscar</button>
                </form>
                <br>

            </div>
            @if ($blogs != null)

                <div class='column is-12-fullhd is-12-desktop  is-12-tablet  is-12-mobile'>
                    <div class='columns is-mobile is-gapless is-multiline pt-6 '>
                        @forelse ($blogs as $blog)
                            <div class='column is-8-fullhd is-8-desktop  is-12-tablet  is-12-mobile'>
                                <div class='searched'>
                                    <a href="{{ url('blog/' . $blog->title) }}" class="mb-4">
                                        <img src="{{ asset('img/star-off.png') }}" alt="">
                                        {{ $blog->title }}
                                        <p class='url-description'>{{ url('blog/' . $blog->title) }}</p>
                                    </a>

                                    <p class="created_at">{{ $blog->created_at }}</p>
                                    <p class="description" style="word-break: break-all;">
                                        {{ substr($blog->description, 0, 80) }}</p>
                                </div>
                                <hr style="opacity:0">
                            </div>
                        @empty
                            <h4 style=" width: 100%;">No se encontraron coincidencias</h4>
                        @endforelse
                    </div>

                </div>
            @endif

        </div>


    </section>





    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>


</body>

</html>
