<div class='columns is-mobile is-gapless is-multiline '>
    <div class='column is-8-fullhd is-8-desktop  is-12-tablet  is-12-mobile viewTecnologies'>



        @forelse ($tecnologies as $tecny)
        <div class="tecnyTarget">
            <div>
                <img class="centrar" src="{{ $tecny->img_logo }}" style="height:60px !important;" alt="">
                <p class="text-center">{{ $tecny->name }}</p>
                <!-- <span class="centrar-full tecnyspam">
                    <p>{{ $tecny->description }}</p>
                </span> -->
                @if (Auth::user()->tipo_usuario==1)
                <form method='get' action="{{ route('tecnology.del') }}">
                    @csrf
                    <input type="hidden" name="idDelete" value="{{ $tecny->id }}"> <br>
                    <button type="submit" class="btn-square" style="width:100% !important;display:block;"> Borrar</button>
                </form>
                <a class="btn-square" style="width:100% !important;display:block;" href="{!! route('pageTecedit', ['id'=>$tecny->id]) !!}">Modificar</a>
                <a class="btn-square" style="width:100% !important;display:block;" onclick="cargarVerTec('{{ $tecny->id }}','{{ $tecny->name }}','{{ $tecny->img_logo }}',)">Ver</a>
                @endif
            </div>
        </div>



        @empty
        @endforelse


    </div>

    <div class='column centrar-full is-4-fullhd is-4-desktop  is-12-tablet  is-12-mobile viewTecnologies2'>
        <div class='column is-2-fullhd is-2-desktop  is-6-tablet  is-6-mobile  product-add'>
            <div class='centrar-full text-center' onclick="formTecnology(true); eg1OpenModal('eg1_modal');">
                <p class='_title-1' style="cursor:pointer; "><span class="subraya">Agregar</span> tecnología</p>
            </div>
        </div>
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
    // var toAdd = [];

    // localStorage.setItem("carrito", JSON.stringify(toAdd));

    // var lleno = JSON.parse(localStorage.getItem("carrito"));


    function cargarVerTec(id) {
        // $.ajax({
        //     type: 'GET',
        //     url: "{{ route('tecnology.get') }}",
        //     data: {
        //         id: id,
        //     },
        //     success: function(data) {
        //         console.log(data);
        //         $('#nameInfoTec').text(data[0].name);
        //         $('#descriptionInfoTec').text(data[0].description);
        //         $('#imgInfoTec').attr('src', data[0].img_logo);

        //         $('#btnModificar').attr('onclick', "editTecnology(true,'" +
        //             data[0].id + "','" +
        //             data[0].name + "','" +
        //             data[0].description + "','" +
        //             data[0].img_logo + "');eg1OpenModal('eg1_modal');")

        //         $('#idedit').attr('value', id);

        //         clearModal();
        //         let info = $('#tecnologyInfo');
        //         if (info.css("display") == "none") {
        //             info.css("display", "block");
        //         }
        //         eg1OpenModal('eg1_modal');
        //     },
        //     error: function(error) {
        //         console.log(error);
        //     }
        // }).fail(function(jqXHR, textStatus, error) {
        //     // Handle error here
        //     console.log(jqXHR.responseText);
        // });

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
</script>