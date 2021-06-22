<?php

namespace App\Http\Controllers\Deliferia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function getAll()
    {
        return DB::table('pedidos')->get();
    }

    public function getPedidos()
    {
        return DB::table('pedidos')->where('vendedor', '=', Auth::user()->id)->get();
    }

    // 
    public function filterPedido(Request $request)
    {
        $id = $request->input('id');

        return DB::table('pedidos')->where('id', '=', $id)->get();
    }

    public function addPedido(Request $request)
    {
        DB::table('pedidos')->insert([
            'precio_total' => "",
            'estado' => "",
            'cliente' => "",
            'vendedor' => "",
            'detalleVenta' => "",
        ]);
        $resp = "listo";
        return redirect('zonavendedor');
    }

    public function deletePedido(Request $request)
    {
        $idDelete = $request->input('idDelete');
        $resp = DB::table('pedidos')
            ->select('products.*')
            ->Where('products.id', '=', $idDelete)->delete();

        if ($resp == 1) {
            $resp == "borrado";
        } else {
            $resp == "error al borrar";
        }


        return redirect()->back();
        // return view('vendedor', compact('resp'));
    }

    public function editPedido(Request $request)
    {
        $id = $request->input('idinput');

        $resp =   DB::table('pedidos')
            ->where('id', '=', $id)
            ->update([
                // "id" => $id,
                // "id_seller" => Auth::user()->id,
                "name" => $request->input('name'),
                "description" => $request->input('description'),
                "price" => $request->input('price'),
                "img_url" => $request->input('img_url'),
                // "active" => "$request->input('active')",
                // "order" => $request->input('order'),
            ]);

        dd($request->input('name'));
        return redirect('zonavendedor')->with('variable_en_vista', $request);
    }
}
