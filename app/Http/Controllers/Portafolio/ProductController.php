<?php

namespace App\Http\Controllers\Portafolio;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{



    public function getProducts()
    {
        return Product::where('id_seller', '=', Auth::user()->id)->get();
    }
    public function getProduct(Request $request)
    {
        $id = $request->input('id');
        return Product::where('id', '=', $id)->get();
    }

    public function addProduct(Request $request)
    {
        if ($archivo = $request->file('imagen_logo')) {

            $nameLogo = "logo_" . $request->input('name') . $archivo->getClientOriginalName();
            $archivo->move('images/', $nameLogo);
        } else {
            $nameLogo = $request->input('logoCopy');
        }

        if ($archivo = $request->file('imagen_back')) {

            $nameBack = "images/back_" . $request->input('name') . $archivo->getClientOriginalName();
            $archivo->move('images/', $nameBack);
        } else {
            $nameBack = $request->input('backCopy');
        }

        if ($request->input('urllogo') != "" || $request->input('urllogo') != null) {
            $nameLogo = $request->input('urlloggo');
        }
        if ($request->input('urlback') != "" || $request->input('urlback') != null) {
            $nameBack = $request->input('urlback');
        }


        if ($nameLogo == "" || $nameLogo == null) {
            $nameLogo = $request->input('urllogo');
        }
        if ($nameBack == "" || $nameBack == null) {
            $nameBack = $request->input('urlback');
        }
        // dd($request, $nameLogo, $nameBack);
        DB::table('products')->insert([
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            "img_logo" => $nameLogo,
            "img_back" => $nameBack,
            "link" => $request->input('link'),
            "tecnology" => $request->input('tecnology'),
            "active" => 1,
            "order" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        $resp = "listo";
        return redirect()->back();
    }

    public function deleteProduct(Request $request)
    {
        $idDelete = $request->input('idDelete');
        $resp = DB::table('products')
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

    public function editProduct(Request $request)
    {
        if ($archivo = $request->file('imagen_logo')) {

            $nameLogo = "logo_" . $request->input('name') . $archivo->getClientOriginalName();
            $archivo->move('images/', $nameLogo);
        } else {
            $nameLogo = $request->input('logoCopy');
        }

        if ($archivo = $request->file('imagen_back')) {

            $nameBack = "images/back_" . $request->input('name') . $archivo->getClientOriginalName();
            $archivo->move('images/', $nameBack);
        } else {
            $nameBack = $request->input('backCopy');
        }

        if ($request->input('urllogo') != "" || $request->input('urllogo') != null) {
            $nameLogo = $request->input('urlloggo');
        }
        if ($request->input('urlback') != "" || $request->input('urlback') != null) {
            $nameBack = $request->input('urlback');
        }


        if ($nameLogo == "" || $nameLogo == null) {
            $nameLogo = $request->input('urllogo');
        }
        if ($nameBack == "" || $nameBack == null) {
            $nameBack = $request->input('urlback');
        }

        // dd($nameBack, $nameLogo);


        $id = $request->input('idinput');
        $resp =   DB::table('products')
            ->where('id', '=', $id)
            ->update([
                // "id" => $id,
                // "id_seller" => Auth::user()->id,
                "name" => $request->input('name'),
                "description" => $request->input('description'),
                "img_logo" => $nameLogo,
                "img_back" => $nameBack,
                "link" => $request->input('link'),
                "tecnology" => $request->input('tecnology'),
                "active" => 1,
                "order" => 1,
            ]);
        return redirect()->back();
    }
}
