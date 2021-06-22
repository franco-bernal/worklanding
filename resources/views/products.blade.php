<div class='columns is-mobile is-gapless is-multiline products'>
    @if (Auth::user()->tipo_usuario==1)

    <div class='column is-2-fullhd is-2-desktop  is-6-tablet  is-6-mobile  product-add'>
        <div class='centrar-full' onclick="formProduct(true);eg1OpenModal('eg1_modal');">
            <p class='_title-1'>+</p>
        </div>
    </div>
    @endif
    @foreach ($data as $product)
    <div class='column is-2-fullhd is-2-desktop  is-3-tablet  is-3-mobile '>

        <div class="product-on">
            <p class="text-center">{{ $product->name }}</p>
            <div class="product-img">
                <img class="centrar" src="{{ $product->img_url }}" width="100px" alt="">
                <a onclick="cargarVer('{{ $product->id }}')">Ver</a>
                @if (Auth::user()->tipo_usuario==1)
                <form method='get' action="{{ route('product.del') }}">
                    @csrf
                    <input type="hidden" name="idDelete" value="{{ $product->id }}"> <br>
                    <button type="submit" class="btn-square"> Borrar</button>
                </form>
                @endif
                @if (Auth::user()->tipo_usuario==0)
                <a class="btn-solid" onclick="addToCar('{{ $product->id }}','{{ $product->price }}','{{ $product->name }}');">Agregar</a>
                @endif
            </div>
        </div>

    </div>
    @endforeach
</div>


<div id="eg1_modal" class="eg1_modal">
    <a onclick="eg1CloseModal(`eg1_modal`)" class="close_modal_eg1">x</a>
    <div id="eg1_cont" class="eg1_cont">
        <div>
            @if (Auth::user()->tipo_usuario==1)
            <form method='post' action="{{ route('product.add') }}" id="formProduct">
                @csrf
                <h3>Agregar</h3>
                <input type="text" name="name" placeholder="nombre"> <br>
                <input type="text" name="description" placeholder="descripcion"> <br>
                <input type="number" name="price" placeholder="precio"> <br>
                <input type="text" name="img_url" placeholder="imagen url"> <br>
                <!-- <input type="check" name="active" placeholder="activo"> <br>
                <input type="number" name="order" placeholder="orden"> <br> -->

                <button type=" submit" class="btn-solid"> Buscar</button>
            </form>
            <form method='get' action="{{ route('product.edit') }}" id="editProduct">
                @csrf
                <h3>Actualizar</h3>
                <input type="hidden" name="idinput" value="" id="idedit"> <br>
                <input type="text" name="name" placeholder="nombre"> <br>
                <input type="text" name="description" placeholder="descripcion"> <br>
                <input type="number" name="price" placeholder="precio"> <br>
                <input type="text" name="img_url" placeholder="imagen url"> <br>

                <button type="submit" class="btn-solid"> Buscar</button>
            </form>
            @endif
            <div id="productInfo">
                <p><strong>Nombre:</strong><span id="nameInfo"></span></p>
                <p><strong>precio:</strong><span id="priceInfo"></span></p>
                <img src="" alt="" id="imgInfo" class="centrar">
                <p><strong>Descripción:</strong><span id="descriptionInfo"></span></p>
                @if (Auth::user()->tipo_usuario==1)
                <a class="btn-solid" onclick="editProduct(true);eg1OpenModal('eg1_modal');">Modificar</a>
                @endif

            </div>
        </div>
    </div>
</div>


<script>
    // var toAdd = [];

    // localStorage.setItem("carrito", JSON.stringify(toAdd));

    // var lleno = JSON.parse(localStorage.getItem("carrito"));


    function cargarVer(id) {
        $.ajax({
            type: 'GET',
            url: "{{ route('product.get') }}",
            data: {
                id: id,
            },
            success: function(data) {
                console.log(data[0].price);
                $('#nameInfo').text(data[0].name);
                $('#priceInfo').text(data[0].price);
                $('#descriptionInfo').text(data[0].description);
                $('#imgInfo').attr('src', data[0].img_url);

                $('#idedit').attr('value', id);

                clearModal();
                let info = $('#productInfo');
                if (info.css("display") == "none") {
                    info.css("display", "block");
                }
                eg1OpenModal('eg1_modal');
            },
            error: function(error) {
                console.log(error);
            }
        }).fail(function(jqXHR, textStatus, error) {
            // Handle error here
            console.log(jqXHR.responseText);
        });

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

    function clearModal() {
        let form = $('#formProduct');
        form.css("display", "none");

        let info = $('#productInfo');
        info.css("display", "none");
        let edit = $('#editProduct');
        edit.css("display", "none");
    }

    function addToCar(id, price, name) {
        let toAdd = {
            'id': id,
            'price': price,
            'nombre': name
        };
        try {
            var lleno = JSON.parse(localStorage.getItem("carrito"));
        } catch (ex) {
            createSession();
            var lleno = [];

        }
        lleno.push(toAdd);


        localStorage.setItem("carrito", JSON.stringify(lleno));

        viewCar(JSON.parse(localStorage.getItem("carrito")));
    }

    function createSession() {
        let toAdd = [];
        localStorage.setItem("carrito", toAdd);

        try {
            var lleno = JSON.parse(localStorage.getItem("carrito"));
        } catch (ex) {
            let toAdd = [];
            localStorage.setItem("carrito", toAdd);
        }
    }

    function clearSession() {
        localStorage.clear();
    }

    function viewCar(llenar) {

        var sumas = [];
        var suma = 0;
        var idPas = "";
        llenar.map(function(fila) {
            llenar.map(function(sub) {
                if (fila.id == sub.id) {
                    suma += parseInt(fila.price);
                } else {
                    idPas = fila.id;
                }
            });

            let data = {
                'id': fila.id,
                'nombre': fila.nombre,
                'price': suma
            };
            var exist = false;
            for (var i = 0; i < sumas.length; i++) {
                if (sumas[i].id === fila.id) {
                    sumas[i] = data;
                    exist = true;
                    break;
                }
                exist = false;
            }
            if (exist == false) {
                sumas.push(data);
            }


            suma = 0;
        });
        console.log(sumas);
        let htmlTags = "";
        let sum = 0;
        sumas.map(function(lleno) {
            htmlTags += '<tr>' +
                '<td>' + lleno.id + '</td>' +
                '<td>' + lleno.nombre + '</td>' +
                '<td>' + lleno.price + '</td>' +
                '</tr>';

            sum += lleno.price;
        })
        $('#items-total').text(sum);
        $('#carrito tbody').html(htmlTags);
        // localStorage.setItem("carrito", JSON.stringify(sumas));
    }

    createSession();
    // viewCar(JSON.parse(localStorage.getItem("carrito")));
</script>