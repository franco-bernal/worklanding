@extends('layouts.admin')

@section('content')
<h3 class="py-6">Favoritos</h3>
<div id="columnFavorite" class='columns is-mobile is-gapless is-multiline proyects'>
    <div class='column is-4-fullhd is-4-desktop  is-6-tablet  is-6-mobile' style="padding:10px !important;">
        <div class="proyect centrar-full " style="cursor:pointer !important" onclick="addProyect()">
            <img src="{{ asset('img/circulo-plus.png') }}" alt="">
            <span class="fecha_proyect">Agregar proyecto</span>
        </div>
    </div>
    @forelse ($proyects as $proyect)
    @if($proyect->favorite==true)
    <div id="proyect{{ $proyect->id }}" class=' column is-4-fullhd is-4-desktop  is-6-tablet  is-6-mobile' style="padding:10px !important;">
        <div class="proyect" style="background-image:url('{{ $proyect->img_link }}')">
            <a href="{{ route('task.proyect',['id'=>$proyect->id]) }}" class="py-4">{{ $proyect->title }}</a>
            <span class="fecha_proyect">{{ $proyect->created_at }}</span>
            <span class="star stactive" data-favorite="true" onclick="favorite('{{ $proyect->id }}')">★</span>
        </div>
    </div>
    @else
    @endif
    @empty
    @endforelse
</div>
<hr>
<h2 class="py-6">Proyects</h2>
<div id="columnProyect" class='columns is-mobile is-gapless is-multiline proyects'>
    @forelse ($proyects as $proyect)
    @if($proyect->favorite==false)
    <div id="proyect{{ $proyect->id }}" class=' column is-4-fullhd is-4-desktop  is-6-tablet  is-6-mobile' style="padding:10px !important;">
        <div class="proyect" style="background-image:url('{{ $proyect->img_link }}')">
            <a href="{{ route('task.proyect',['id'=>$proyect->id]) }}" class="py-4">{{ $proyect->title }}</a>
            <span class="fecha_proyect">{{ $proyect->created_at }}</span>
            <span class="star" data-favorite="false" onclick="favorite('{{ $proyect->id }}')">★</span>
        </div>
    </div>
    @else
    @endif

    @empty
    @endforelse

</div>
<div class="taskSpace">
    <h4>Agregar Proyecto</h4>
    <form method='post' action="{{ route('task.add') }}" class="form space-x" id="updateBlog" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="idInput">

        <label for="title">Titulo</label>
        <input type="text" name="title">
        <label for="description">Descripción</label>
        <textarea name="description" rows="3"></textarea>
        <label for="limit">Fecha limite</label>
        <input type="datetime-local" name="limit" style="border: 1px solid white">
        <label for="header_img">Imagen fondo</label>
        <input type="text" name="img_link">
        <span style="display: flex;">
            <input type="checkbox" name="favorite" style="display: inline-block;">
            <p style="display: inline-block;">Favorito?</p>
        </span>
        <br>
        <label>Procesos</label>
        <input type="text" id="relatedUpdate" autocomplete="off">
        <span class="relatedTags">
        </span>
        <input type="hidden" id="relatedInputUpdate" name="steps" value="">
        <!--  -->
        <div class="centrar-full">
            <a id="cancelProyect" class=" mb-2 mr-4" style="cursor: pointer">Cancelar</a>
            <button type="submit" class="btn-solid  mb-2">Agregar</button>
        </div>
    </form>
</div>
@endsection


@section('js')
<style>
    .taskSpace {
        background-image: linear-gradient(rgba(0, 0, 0, 0.747), rgba(0, 1, 65, 0.747)),
        url('{{ json_decode($page->img)->header_back_img }}');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        border: 1px solid white;
        position: absolute;
        top: 0;
    }
</style>
<script src="{{ asset('js/tasks.js') }}"></script>
<script>
    $('body').on('click', '#cancelProyect', function(e) {
        $('.taskSpace').slideUp();
    })

    function addProyect() {
        $('.taskSpace').slideDown();
    }

    function favorite(id, clase) {
        //recojo el elemento
        let obj = $(`.proyects #proyect${id}`).html();
        //se crea un div para poner el elemento adentro
        let divj = $('<div>', {
            'html': obj,
            'class': 'column is-4-fullhd is-4-desktop  is-6-tablet  is-6-mobile',
            'id': 'proyect' + id,
            'style': 'padding:10px !important;'
        });
        //se recoje el elemento donde está la estrella
        let star = $(`#proyect${id} .star`);
        let favorite = star.attr("data-favorite");
        //proyects
        $.ajax({
            type: 'get',
            url: "{{ route('favorite.proyect') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                'favorite': favorite,
            },
            success: function(data) {
                if (data != -1) {
                    if (favorite == "false") {
                        $(`.proyects #proyect${id}`).remove();
                        $('#columnFavorite').append(divj).slideDown();
                        star.addClass('stactive');
                        star.attr("data-favorite", "true");
                        $(`.proyects #proyect${id} .star`).addClass('stactive');
                        $(`.proyects #proyect${id} .star`).attr("data-favorite", "true");
                    }
                    //favorite
                    if (favorite == "true") {
                        $(`.proyects #proyect${id}`).remove();
                        $('#columnProyect').append(divj).slideDown();
                        // star.removeClass('stactive');
                        $(`.proyects #proyect${id} .star`).removeClass('stactive');
                        $(`.proyects #proyect${id} .star`).attr("data-favorite", "false");
                    }
                } else {
                    alert("error al crear");
                }
            },
            error: function(error) {}
        }).fail(function(jqXHR, textStatus, error) {

        });
    }
</script>

@endsection