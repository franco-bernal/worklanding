@if (Auth::user()->tipo_usuario==1)

<div class='columns is-mobile is-gapless is-multiline '>

    <div class='column centrar-full is-4-fullhd is-4-desktop  is-12-tablet  is-12-mobile ' style="color: white;">
        @if (Auth::user()->tipo_usuario==1)

        <div class='column is-2-fullhd is-2-desktop  is-6-tablet  is-6-mobile  product-add'>
            <div class='centrar-full' onclick="formProduct(true);eg1OpenModal('eg1_modal');">
                <p class='_title-1'>+</p>
            </div>
        </div>
        @else
        <h2>Produc<span class="subraya">tos</span></h2>
        @endif
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
</div>
@endif