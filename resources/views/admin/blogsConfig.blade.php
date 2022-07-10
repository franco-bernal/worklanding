@extends('layouts.admin')

@section('content')


<h1>Blogs</h1>
<div class='columns is-mobile is-gapless is-multiline '>
    <div class='column is-12-fullhd is-12-desktop  is-12-tablet  is-12-mobile spaceDiv ' style='margin-top:20px; margin-bottom: 20px;'>
        <button class='agregarBlog centrar-full'>Agregar blog</button>
        <form method='post' action="{{ route('add.blog') }}" class="form space-x" id="formBlog" enctype="multipart/form-data" style="display:none;">
            @csrf
            <label for="title">Titulo</label>
            <input type="text" name="title">
            <label for="description">Descripción</label>
            <textarea name="description" rows="3"></textarea>
            <label for="html_content">Contenido</label><br><br>
            <textarea name="html_content" rows="10" style="overflow:auto;resize:vertical; min-height: 100px;"></textarea>

            <label for="header_img">Imagen header</label>
            <input type="file" name="header_img" value="">
            <label for="url_header">Imagen url</label>
            <input type="text" name="url_header">
            <span style="display: flex;">
                <input type="checkbox" name="private" style="display: inline-block;">
                <p style="display: inline-block;">Privado (sólo admin lo puede ver)</p>
            </span>
            <br>
            <label>Relacionados (presione espacio para insertar tag)</label>
            <input type="text" id="related" autocomplete="off">
            <span class="relatedTags">
            </span>
            <input type="hidden" id="relatedInput" name="related" value="">
            <!--  -->
            <button type="submit" class="btn-solid centrar mb-2">Actualizar</button>
        </form>

    </div>
    <br>
    <div class='column is-12-fullhd is-12-desktop  is-12-tablet  is-12-mobile spaceDiv' style='margin-top:20px; margin-bottom: 20px;' style='position: relative;'>
        <div class='updateBlog'>
            <form method='post' action="{{ route('update.blog') }}" class="form space-x" id="updateBlog" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="idInput">

                <label for="title">Titulo</label>
                <input type="text" name="title">
                <br><br>
                <label for="description">Descripción</label><br><br>
                <textarea name="description" rows="3"></textarea>
                <label for="html_content">Contenido</label>
                <textarea name="html_content" rows="10" style="overflow:auto;resize:vertical; min-height: 100px;"></textarea>
                <br><br>
                <label for="header_img">Imagen header</label>
                
                <img src="" style="height:70px !important" id="updateImagen" alt="">
                <input type="file" name="header_img" value="">
                <br><br>
                <label for="url_header">Imagen url</label>
                <input type="text" name="url_header">
                <input type="hidden" name="url_hidden">

                <span style="display: flex;">
                    <input type="checkbox" name="private" style="display: inline-block;">
                    <p style="display: inline-block;">Privado (sólo admin lo puede ver)</p>
                </span>
                <br><br>
                <label>Relacionados (presione espacio para insertar tag)</label>
                <input type="text" id="relatedUpdate" autocomplete="off">
                <span class="relatedTags">
                </span>
                <input type="hidden" id="relatedInputUpdate" name="related" value="">
                <!--  -->
                <br><br>
                <div class="centrar-full">
                    <button id="cancelUpdate" class="btn-transparent mb-2" style="cursor: pointer">Cancelar</button>
                    <button type="submit" class="btn-solid  mb-2">Actualizar</button>
                </div>
            </form>
        </div>
        <table class="listBlogs">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Ver</th>
                    <th>Borrar</th>
                    <th>Actualizar</th>
                    <th>Privado</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blogs as $blog)
                <tr id="item{{ $blog->id }}">
                    <td>{{ $blog->title }}</td>
                    <td><a href="{{ url('blog/'.$blog->id) }}">Ver</a></td>
                    <td><button onclick="deleteBlog('{{ $blog->id }}')">Borrar</a></td>
                    <td><button onclick="updateBlog('{{ $blog->id }}')">Actualizar</button></td>
                    <td class="centrar-full">
                        <form action="">
                            <input onchange="checkPrivate('{{ $blog->id }}','check{{ $blog->id }}')" type="checkbox" value="{{ $blog->private }}" id="check{{ $blog->id }}" {{ $blog->private==1 ? 'checked' : '' }}>
                        </form>
                    </td>
                </tr>
                @empty
                @endforelse

            </tbody>
        </table>
    </div>
</div>


</section>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
@endsection