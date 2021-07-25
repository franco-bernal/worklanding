@extends('layouts.admin')

@section('content')

@include('forms')
@include('products')
@include('tecnologies')


<h4 class="py-6"><strong>sliders principal</strong></h4>
<div class='columns is-mobile is-gapless is-multiline slide-notices'>
    @foreach($noticias as $noticia)
    <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile ' style='padding:20px !important;'>
        <button onclick="deleteSlider('{{ $noticia->id }}',`{{ route('notice.delete',['idDelete'=>$noticia->id]) }}`)">Eliminar</button>
        <form method='post' action="{{ route('notice.edit') }}" class="form space-x" id="formProduct" enctype="multipart/form-data">
            @csrf

            <img src="{{ $noticia->background }}" style="height:100px;" class="mt-5 admin-img-form" alt="{{ $noticia->title }}">
            <br>
            <p>Imagen</p>
            <input type="text" value="{{ $noticia->background }}" name="urlback" placeholder="{{ $noticia->title }}*"> <br>
            <input type="file" name="imagen_back" value="{{ $noticia->background }}" class="pb-3">
            <input type="hidden" name="backCopy" value="{{ $noticia->background }}" class="pb-3">
            <div class='columns is-mobile is-gapless is-multiline'>
                <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile' style='padding:5px !important;'>
                    <p>Title</p>
                    <input type="text" value="{{ $noticia->title }}" name="title" placeholder="{{ $noticia->title }}*"> <br>
                </div>
                <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile' style='padding:5px !important;'>
                    <p>sub title</p>
                    <input type="text" value="{{ $noticia->subtitle }}" name="subtitle" placeholder="{{ $noticia->subtitle }}"> <br>
                </div>
                <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile' style='padding:5px !important;'>
                    <p>btn_text</p>
                    <input type="text" value="{{ $noticia->btn_text }}" name="btn_text" placeholder="{{ $noticia->btn_text }}"> <br>
                </div>
                <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile' style='padding:5px !important;'>
                    <p>btn_link</p>
                    <input type="text" value="{{ $noticia->btn_link }}" name="btn_link" placeholder="{{ $noticia->btn_link }}"> <br>
                </div>
                <div class='column is-6-fullhd is-6-desktop  is-12-tablet  is-12-mobile' style='padding:5px !important;'>
                    <p>Orden</p>
                    <input type="number" value="{{ $noticia->order }}" name="order" placeholder="{{ $noticia->order }}*"> <br>
                </div>
            </div>





            <div>
                <input type="checkbox" name="active" {{ $noticia->active==1 ? 'checked' : '' }} id="" style="float:left">
                <p style="float:left">Activo</p>
            </div>

            <input type="hidden" value="{{ $noticia->id }}" name="id" placeholder="{{ $noticia->title }}*"> <br>
            <button type="submit" class="btn-solid centrar mb-6">Actualizar</button>
        </form>
        <br>

    </div>

    @endforeach

</div>
<script>
    function deleteSlider(id, route) {
        alert(id);

        let deletee = confirm("¿Seguro que deseas eliminar?");
        if (deletee) {
            location.href = route;
        }
    }
</script>
@endsection