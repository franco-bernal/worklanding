<h2>Tecnologias</h2>

<div class='columns is-mobile is-gapless is-multiline '>
    <div class='column centrar-full is-12-fullhd is-12-desktop  is-12-tablet  is-12-mobile ' style="color: white;">
        <table class="listBlogs">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Borrar</th>
                    <th>Modificar</th>
                    <th>Activo</th>
                </tr>
            </thead>
            <tbody>
                <tr onclick="formTecnology(true); eg1OpenModal('eg1_modal');">
                    <td>Agregar [+]</td>
                </tr>
                @forelse ($tecnologies as $tecny)

                <tr id="itemTec{{ $tecny->id }}">
                    <td>{{ $tecny->name }}</td>
                    <td><img width="30px" src="{{  $tecny->img_logo }}" alt=""></td>
                    <td>
                        <button onclick="deleteTecny('{{ $tecny->id }}')">Borrar</a>

                    </td>
                    <td>
                        <!-- <a href="">Modificar</a> -->
                        <a href="{!! route('pageTecedit', ['id'=>$tecny->id]) !!}">Modificar</a>
                    </td>
                    <td>
                        <form action="">
                            <input onchange="checkTecno('{{ $tecny->id }}','checkTecno{{ $tecny->id }}')" type="checkbox" value="{{ $tecny->active }}" id="checkTecno{{ $tecny->id }}" {{ $tecny->active==1 ? 'checked' : '' }}>
                        </form>
                    </td>
                </tr>
                @empty
                @endforelse

            </tbody>
        </table>
    </div>
</div>








<div id="eg1_modal" class="eg1_modal">
    <a onclick="eg1CloseModal(`eg1_modal`)" class="close_modal_eg1">x</a>
    <div id="eg1_cont" class="eg1_cont">
        <div>

        </div>
    </div>
</div>

<script>
    function deleteTecny(id) {

        var opcion = confirm("Eliminar producto?");
        if (opcion) {
            $.ajax({
                type: 'get',
                url: "{{ route('tecnology.del') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    idDelete: id,
                },
                success: function(data) {
                    $("#itemTec" + id).remove();
                },
                error: function(error) {}
            }).fail(function(jqXHR, textStatus, error) {

            });
        }
    }


    function formTecnology(active = true) {
        clearModal();
        if (active == true) {
            let form = $('#formTecnology');
            if (form.css("display") == "none") {
                form.css("display", "block");
            }
        }
    }

    function editTecnology(active = true, id, name, description, img_logo) {
        clearModal();



        if (active == true) {
            let edit = $('#editTecnology');
            if (edit.css("display") == "none") {
                edit.css("display", "block");
            }
        }
        $('#idTec').val(id);
        $('#nomTec').val(name);
        $('#desTec').val(description);
        $('#imgTec').val(img_logo);


    }
    function checkTecno(id, idCheck) {
            let valueActual = $("#" + idCheck).val();
            $.ajax({
                type: 'post',
                url: "{{ route('tecnology.active') }}",
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