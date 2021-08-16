@if (Auth::user()->tipo_usuario==1)
<!-- 
<div class='columns is-mobile is-gapless is-multiline '>

    <div class='column centrar-full is-4-fullhd is-4-desktop  is-12-tablet  is-12-mobile ' style="color: white;">

        <div class='column is-2-fullhd is-2-desktop  is-6-tablet  is-6-mobile  product-add'>
            <div class='centrar-full' onclick="formProduct(true);eg1OpenModal('eg1_modal');">
                <p class='_title-1'>+</p>
            </div>
        </div>
    </div>
    <div class='column is-8-fullhd is-8-desktop  is-12-tablet  is-12-mobile viewProducts'>
        @forelse ($data as $product)
        <div class="productTarget">
            <div style="background-image:  linear-gradient(rgba(0, 0, 0, 0.774), rgba(22, 22, 22, 0.856)), url('{{ $product->img_back }}');">
                <img class="centrar" src="{{ $product->img_logo }}" alt="">
                <h4><strong>{{ $product->name }}</strong></h4>
                <span class="productspam">Nuevo</span>
                <p class="productTecno">
                    {{ $product->tecnology }}
                </p>
                @if (Auth::user()->tipo_usuario==1)
                <form method='get' action="{{ route('product.del') }}">
                    @csrf
                    <input type="hidden" name="idDelete" value="{{ $product->id }}"> <br>
                    <button type="submit" class="btn-square" style="width:100% !important;display:block;"> Borrar</button>
                </form>
                @endif
                <a  class="btn-solid" onclick="cargarVer('{{ $product->id }}','{{ $product->name }}','{{ $product->description }}','{{ $product->link }}','{{ $product->tecnology }}','{{  $product->img_logo }}','{{ $product->img_back }}')" style="width:100% !important;display:block;">Ver</a> 
                <a  class="productvisitar btn-solid" href=" {{ $product->link}}" target="_blank" >Visitar</a>
                <a  class="btn-transparent" href="{!! route('pageProedit', ['id'=>$product->id]) !!}" style="width:100% !important;display:block;">Modificar</a>
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
</div> -->


<div class='columns is-mobile is-gapless is-multiline '>
    <div class='column centrar-full is-12-fullhd is-12-desktop  is-12-tablet  is-12-mobile ' style="color: white;">
        <table class="listBlogs">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>acciones</th>
                    <th>Activo</th>
                </tr>
            </thead>
            <tbody>
                <tr onclick="formProduct(true);eg1OpenModal('eg1_modal');">
                    <td>Agregar [+]</td>
                </tr>
                @forelse ($data as $product)

                <tr id="item{{ $product->id }}">
                    <td>{{ $product->name }}</td>
                    <td><img width="50px" src="{{ $product->img_back }}" alt=""></td>
                    <td class="centrar-full">
                        <button onclick="deleteProduct('{{ $product->id }}')">Borrar</a>
                    </td>
                    <td class="centrar-full"><a   href="{!! route('pageProedit', ['id'=>$product->id]) !!}" >Modificar</a></td>
                    <td >
                        <form action="">
                            <input onchange="checkProductos('{{ $product->id }}','check{{ $product->id }}')" type="checkbox" value="{{ $product->active }}" id="check{{ $product->id }}" {{ $product->active==1 ? 'checked' : '' }}>
                        </form>
                    </td>
                </tr>
                @empty
                @endforelse

            </tbody>
        </table>
    </div>
</div>
<script>
    function deleteProduct(id) {
        var opcion = confirm("Eliminar producto?");
        if (opcion) {
            $.ajax({
                type: 'get',
                url: "{{ route('product.del') }}",
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

    function checkProductos(id, idCheck) {
            let valueActual = $("#" + idCheck).val();
            $.ajax({
                type: 'post',
                url: "{{ route('product.active') }}",
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
@endif