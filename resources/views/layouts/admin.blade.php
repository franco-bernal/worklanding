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

        .block1 {
            background-image: linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 1, 65, 0.747)),
            url('{{ json_decode($page->img)->header_back_img }}');
        }

        .promo {
            background-image: linear-gradient(rgba(2, 0, 1, 0.966), rgba(83, 26, 83, 0.747)),
            url('{{ json_decode($page->img)->necesitas_back_img }}');
        }

        .viewTecnologies {
            background-image: linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 50, 65, 0.747)),
            url('{{ json_decode($page->img)->tecnologias_img }}');

        }

        .viewTecnologies2 {
            background-image: linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 50, 65, 0.747)),
            url('{{ json_decode($page->img)->tecnologias_img }}');

        }

        html {
            background-color: black !important;
            background-image: linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 1, 65, 0.747)),
            url('{{ json_decode($page->img)->header_back_img }}') !important;
            background-position: bottom;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        @media(max-width:769px) {
            html {
                background-image: linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 1, 65, 0.747)),
                url('{{ json_decode($page->img)->header_back_img }}') !important;
                background-size: auto 100vh !important;
            }
        }
    </style>



    <link id="shor" rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin fb</title>

    <!-- Scripts -->
    <script src="{{ asset('js/modal.js') }}" defer></script>



    <!-- Styles -->
    <link href="{{ asset('css/bulma.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/reset.css') }}" rel="stylesheet">

    <link href="{{ asset('css/admin/functions.css') }}" rel="stylesheet">

    <link href="{{ asset('css/admin/productClient.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/targetSession.css') }}" rel="stylesheet">
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
    <link href="{{ asset('carrusel/slick.css') }}" rel="stylesheet">

    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <link href="{{ asset('carrusel/slick-theme.css') }}" rel="stylesheet">


</head>

<body>

    <div>


        <main>

            <!-- START NAV -->
            <nav class="navbar frb-nav">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item brand-text" href="../index.html">
                            Bulma Admin
                        </a>
                        <div class="navbar-burger burger" data-target="navMenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div id="navMenu" class="navbar-menu">
                        <div class="navbar-start">
                            <a class="navbar-item" href="{{ route('welcome') }}" target="_blank">
                                landing
                            </a>
                            <a href="{{ route('dashboard') }}" class="navbar-item">Dashboard</a></li>
                            <a href=" {{ route('pageConfig') }}" class="navbar-item">Page</a></li>
                            <a href="{{ route('slidersConfig') }}" class="navbar-item">Sliders</a></li>
                            <a href="{{ route('profileConfig') }}" class="navbar-item">profile</a></li>
                            <a href="{{ route('blogs.home') }}" class="navbar-item">blogs</a></li>
                            <!-- <a href="{{ route('stadisticsConfig') }}" class="navbar-item">stadistics Config</a></li> -->



                        </div>
                        <div class="navbar-end">

                            @guest
                            @if (Route::has('login'))
                            <a class="navbar-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif

                            @if (Route::has('register'))
                            <a class="navbar-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                            @else
                            <a class="navbar-item">
                                {{ Auth::user()->name }}
                            </a>


                            <a class="navbar-item " href=" {{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @endguest

                        </div>

                    </div>
                </div>
            </nav>
            <br>
            <!-- END NAV -->
            <div class="container mt-2">
                <div class="columns">
                    <div class="column is-9">


                        @yield('content')
                    </div>

                    <div class="column is-3 mt-6">
                        <aside class="menu is-hidden-mobile">
                            <p class="menu-label">
                                General
                            </p>
                            <ul class="menu-list">
                                <li><a href="{{ route('dashboard') }}" class=" {{(request()->is('dashboard')) ? 'is-active' : '' }}">Dashboard</a></li>
                                <li><a href=" {{ route('pageConfig') }}" class=" {{(request()->is('pageConfig')) ? 'is-active' : '' }}">Page</a></li>
                                <li><a href="{{ route('slidersConfig') }}" class=" {{(request()->is('slidersConfig')) ? 'is-active' : '' }}">Sliders</a></li>
                                <li><a href="{{ route('profileConfig') }}" class=" {{(request()->is('profileConfig')) ? 'is-active' : '' }}">profile</a></li>
                                <li><a href="{{ route('blogs.home') }}" class=" {{(request()->is('blogs.home')) ? 'is-active' : '' }}">Blogs</a></li>

                                <!-- <li><a href="{{ route('stadisticsConfig') }}" class=" {{(request()->is('stadisticsConfig')) ? 'is-active' : '' }}">stadistics Config</a></li> -->
                            </ul>
                            <!-- 
                            <p class="menu-label">
                                Administration
                            </p>
                            <ul class="menu-list">
                                <li><a>Team Settings</a></li>
                                <li>
                                    <a>Manage Your Team</a>
                                    <ul>
                                        <li><a>Members</a></li>
                                        <li><a>Plugins</a></li>
                                        <li><a>Add a member</a></li>
                                        <li><a>Remove a member</a></li>
                                    </ul>
                                </li>
                                <li><a>Invitations</a></li>
                                <li><a>Cloud Storage Environment Settings</a></li>
                                <li><a>Authentication</a></li>
                                <li><a>Payments</a></li>
                            </ul>
                            <p class="menu-label">
                                Transactions
                            </p>
                            <ul class="menu-list">
                                <li><a>Payments</a></li>
                                <li><a>Transfers</a></li>
                                <li><a>Balance</a></li>
                                <li><a>Reports</a></li>
                            </ul> -->
                        </aside>
                    </div>

                </div>
            </div>

        </main>


    </div>




    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('carrusel/slick.js') }}"></script>
    <script language="javascript">
        //  BLOQUEAR ENTER EN FORMULARIO
        $(document).ready(function() {

            $('form').keypress(function(e) {
                if (e == 13) {
                    return false;
                }
            });

            $('input').keypress(function(e) {
                if (e.which == 13) {
                    return false;
                }
            });

        });
    </script>
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

        $(".slide-notices").slick({
            infinite: true,
            dots: true,
            speed: 300,
            slidesToShow: 2,
            adaptiveHeight: true,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            slidesToScroll: 1,
            rows: 1,
            prevArrow: '<button type="button" class="slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-next"></button>',
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
    <script>
        // The following code is based off a toggle menu by @Bradcomp
        // source: https://gist.github.com/Bradcomp/a9ef2ef322a8e8017443b626208999c1
        (function() {
            var burger = document.querySelector('.burger');
            var menu = document.querySelector('#' + burger.dataset.target);
            burger.addEventListener('click', function() {
                burger.classList.toggle('is-active');
                menu.classList.toggle('is-active');
            });
        })();
    </script>

    <script>
        function vermensaje(elem) {
            // alert(elem);
            // $('.fbg_vermensaje').slideUp();
            $(elem).slideToggle();
        }

        function minMensajes() {
            $('.fbg_vermensaje').slideUp();
        }

        function deleteMensaje(id) {
            var opcion = confirm("Seguro de eliminar el mensaje?");

            if (opcion) {

                $.ajax({
                    type: 'get',
                    url: "{{ route('email.delete') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        $('#item-mensaje' + id).slideUp();
                    },
                    error: function(error) {}
                }).fail(function(jqXHR, textStatus, error) {

                });
            }

        }
    </script>

    <script>
        var related = [];
        var relatedUpdate = [];

        function deleteRelated(value, id) {
            var i = related.indexOf($.trim('"' + value + '"'));

            related.splice(i, 1);

            $("#" + id).remove();
            document.getElementById("relatedInput").setAttribute("value", related);
        }

        function deleteRelatedUpdate(value, id) {
            var i = relatedUpdate.indexOf($.trim('"' + value + '"'));
            relatedUpdate.splice(i, 1);

            $("#" + id).remove();
            //    console.log(related);
            document.getElementById("relatedInputUpdate").setAttribute("value", relatedUpdate);
        }
        $("body").on('click', '.agregarBlog', function() {
            $("#formBlog").slideToggle();
        });

        $("#related").keypress(function(event) {
            let value = $.trim($(this).val()).toLowerCase();

            if (event.which == 32 && value != "") {
                $("#related").val("");
                related.push('"' + value + '"');

                let item = document.createElement('span');
                item.id = "tag" + value;
                let paragraph = document.createElement('p');
                paragraph.innerText = value;
                let deleteButton = document.createElement('a');
                deleteButton.setAttribute("onclick", "deleteRelated('" + value + "','" + "tag" + value + "')");
                deleteButton.innerText = "x";

                item.appendChild(paragraph);
                item.appendChild(deleteButton);
                $(".relatedTags").append(item);

                document.getElementById("relatedInput").setAttribute("value", related);
            }
        });


        $("#relatedUpdate").keypress(function(event) {
            let value = $.trim($(this).val()).toLowerCase();
            if (event.which == 32 && value != "") {
                $("#relatedUpdate").val("");
                relatedUpdate.push('"' + value + '"');


                let item = document.createElement('span');
                item.id = "tag" + value;
                let paragraph = document.createElement('p');
                paragraph.innerText = value;
                let deleteButton = document.createElement('a');
                deleteButton.setAttribute("onclick", "deleteRelatedUpdate('" + value + "','" + "tag" + value + "')");
                deleteButton.innerText = "x";

                item.appendChild(paragraph);
                item.appendChild(deleteButton);
                $(".relatedTags").append(item);

                document.getElementById("relatedInputUpdate").setAttribute("value", relatedUpdate);
            }
        });
    </script>

    <script>
        $("body").on("click", "#cancelUpdate", function(e) {
            e.preventDefault();
            $(".updateBlog").slideUp();
            relatedUpdate=[];
            $("#relatedInputUpdate").val('');

            $("#updateBlog")[0].reset();
        });
        //  $("[name='id']")
        function updateBlog(id) {
            var opcion = confirm("actualizar blog?");
            $("#updateBlog")[0].reset();
            if (opcion) {
                $.ajax({
                    type: 'get',
                    url: "{{ route('get.blog') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        // console.log(data);
                        $("#updateBlog [name='idInput']").val(data.id);

                        $("#updateBlog [name='title']").val(data.title);
                        $("#updateBlog [name='description']").val(data.description);
                        $("#updateBlog [name='html_content']").val(data.html_content);
                        $("#updateBlog [name='url_hidden']").val(data.header_img);
                        document.getElementById("relatedInputUpdate").setAttribute("value", data.related);
                        // relatedUpdate=data.related;
                        $("#updateImagen").attr('src', data.header_img);
                        if (data.private == 1) {
                            $("#updateBlog [name='private']").prop('checked', true);
                        }

                        $(".updateBlog .relatedTags").html("");

                        JSON.parse(data.related).map((value) => {
                            relatedUpdate.push('"' + value + '"');
                        });

                        JSON.parse(data.related).map((value) => {
                            let item = document.createElement('span');
                            item.id = "tag" + value;
                            let paragraph = document.createElement('p');
                            paragraph.innerText = value;
                            let deleteButton = document.createElement('a');
                            deleteButton.setAttribute("onclick", "deleteRelatedUpdate('" + value + "','" + "tag" + value + "')");
                            deleteButton.innerText = "x";

                            item.appendChild(paragraph);
                            item.appendChild(deleteButton);

                            $(".updateBlog .relatedTags").append(item);

                        });
                        $("#updateBlog [name='related']").val(relatedUpdate);
                        $(".updateBlog").slideDown();

                    },
                    error: function(error) {}
                }).fail(function(jqXHR, textStatus, error) {

                });
            }
        }

        function deleteBlog(id) {
            var opcion = confirm("Eliminar blog?");
            if (opcion) {
                $.ajax({
                    type: 'get',
                    url: "{{ route('delete.blog') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        idDelete: id,
                    },
                    success: function(data) {
                        $("#item" + id).remove();
                    },
                    error: function(error) {}
                }).fail(function(jqXHR, textStatus, error) {

                });
            }
        }
    </script>
    <script>
        function checkPrivate(id, idCheck) {
            let valueActual = $("#" + idCheck).val();
            $.ajax({
                type: 'post',
                url: "{{ route('private.blog') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    private: valueActual,
                },
                success: function(data) {
                    console.log(data);
                    if (data != -1) {
                        if (valueActual != 1) {
                            $("#" + idCheck).removeAttr('checked');
                        } else {
                            $("#" + idCheck).attr('checked', 'checked');
                        }
                        $("#" + idCheck).val(data);
                    }else{
                        alert('error al actualizar');
                    }

                },
                error: function(error) {}
            }).fail(function(jqXHR, textStatus, error) {

            });
        }
    </script>
</body>

</html>