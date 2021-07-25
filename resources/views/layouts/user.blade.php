<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Usuarios</title>

    <!-- Scripts -->
    <script src="{{ asset('js/click.js') }}" defer></script>
    <script src="{{ asset('js/modal.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bulma.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/functions.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">

    <link href="{{ asset('css/menu-header.css') }}" rel="stylesheet">

    <link href="{{ asset('css/productClient.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/targetSession.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carrito.css') }}" rel="stylesheet">
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
    <link href="{{ asset('carrusel/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">

   
</head>

<body>

    <div id="app">
        <nav class="menu-header">
            <ul class="header-links burge" id="burge">
                <li class="header-logo">
                    <a href="{{ route('welcome') }}"><img src="{{ asset('img/logo-franco-blanco.png') }}" style="width:70px !important" alt=""></a>
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




        <main>
            @yield('content')

        </main>


        <footer>
            <a href="{{ route('welcome') }}"><img src="{{ asset('img/logo-franco-blanco.png') }}" style="width:70px !important" alt=""></a>

        </footer>

    </div>




    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('carrusel/slick.js') }}"></script>

    <script>
        function cargarVer(id, name, description, link, tecnology, img_logo, img_back) {
            $('#nameInfo').text(name);
            $('#desInfo').text(description);
            $('#linkInfo').text(link);
            $('#tecInfo').text(tecnology);
            $('#logoInfo').attr('src', img_logo);
            $('#backInfo').attr('src', img_back);

            clearModal();
            let info = $('#productInfo');
            if (info.css("display") == "none") {
                info.css("display", "block");
            }
            eg1OpenModal('eg1_modal');

        }


        function formProduct(active = true) {
            clearModal();
            if (active == true) {
                let form = $('#formProduct');
                if (form.css("display") == "none") {
                    form.css("display", "block");
                }
            }
        }

        function editProduct(active = true) {
            clearModal();
            if (active == true) {
                let edit = $('#editProduct');
                if (edit.css("display") == "none") {
                    edit.css("display", "block");
                }
            }


        }
    </script>
    <script>
        $(".viewTecnologies").slick({
            infinite: true,
            dots: false,
            speed: 300,
            slidesToShow: 3,
            adaptiveHeight: true,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            slidesToScroll: 1,
            rows: 2,
            /*
            prevArrow:'<button type="button" class="slick-prev"></button>',
            nextArrow:'<button type="button" class="slick-next"></button>',
            centerMode:true,
            */
        });
        $(".viewProducts").slick({
            infinite: true,
            dots: false,
            speed: 300,
            slidesToShow: 2,
            adaptiveHeight: true,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            slidesToScroll: 1,
            rows: 1,
            /*
            prevArrow:'<button type="button" class="slick-prev"></button>',
            nextArrow:'<button type="button" class="slick-next"></button>',
            centerMode:true,
            */
        });

        function clearModal() {
            let form = $('#formTecnology');
            form.css("display", "none");
            let info = $('#tecnologyInfo');
            info.css("display", "none");
            let edit = $('#editTecnology');
            edit.css("display", "none");

            let form2 = $('#formProduct');
            form2.css("display", "none");
            let info2 = $('#productInfo');
            info2.css("display", "none");
            let edit2 = $('#editProduct');
            edit2.css("display", "none");
        }
    </script>

</body>

</html>