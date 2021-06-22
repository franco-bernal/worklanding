<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/click.js') }}" defer></script>
    <script src="{{ asset('js/modal.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bulma.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/functions.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu-header.css') }}" rel="stylesheet">

    <link href="{{ asset('css/productClient.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/targetSession.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carrito.css') }}" rel="stylesheet">

</head>

<body>



    <div id="app">
        <nav class="menu-header">
            <ul class="header-links burge" id="burge">
                <li class="header-logo">
                    <a href="{{ route('welcome') }}"><img src="{{ asset('img/logo-2.png') }}" alt=""></a>
                </li>
                <li><a class="btn-normal" href="Noticias.php#contenido">Noticias</a></li>


                @guest
                @if (Route::has('login'))
                <li>
                    <a class="btn-solid" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li>
                    <a class="btn-solid" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="">
                    <a class="sub-square">
                        {{ Auth::user()->name }}
                    </a>


                </li>
                <li>
                    <a class="btn-transparent" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @endguest



            </ul>
            <img class="burge-ico" id="burge-ico" src="{{ url('img/burger.png') }}" alt="">

        </nav>
        <br>
        <br>
        <br>

        <main>
            @yield('content')

        </main>




    </div>


</body>

</html>