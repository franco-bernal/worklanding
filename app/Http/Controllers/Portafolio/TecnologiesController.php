<?php

namespace App\Http\Controllers\Portafolio;

use App\Http\Controllers\Controller;
use App\Models\Tecnologies;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TecnologiesController extends Controller
{
    public function getTecnologies()
    {
        return Tecnologies::get();
    }

    public function getTecnology(Request $request)
    {
        $id = $request->input('id');
        return Tecnologies::where('id', '=', $id)->get();
    }

    public function addTecnology(Request $request)
    {
        if ($archivo = $request->file('img_logo')) {

            $nameLogo = "tecnology_logo_" . $request->input('name') . $archivo->getClientOriginalName();
            $archivo->move('images/', $nameLogo);
        } else {
            $nameLogo = "";
        }
        if ($request->input('urllogo') != "") {
            $nameLogo = $request->input('urllogo');
        }
        DB::table('tecnologies')->insert([
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            "img_logo" => $nameLogo,
            "active" => 1,
            "order" => 1,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        $resp = "listo";
        return redirect()->back();
    }

    public function deleteTecnology(Request $request)
    {
        $idDelete = $request->input('idDelete');
        $resp = DB::table('tecnologies')
            ->select('tecnologies.*')
            ->Where('tecnologies.id', '=', $idDelete)->delete();

        if ($resp == 1) {
            $resp == "borrado";
        } else {
            $resp == "error al borrar";
        }


        return redirect()->back();
        // return view('vendedor', compact('resp'));
    }

    public function editTecnology(Request $request)
    {
        $id = $request->input('idinput');

        if ($archivo = $request->file('img_logo')) {

            $nameLogo = "tecnology_logo_" . $request->input('name') . $archivo->getClientOriginalName();
            $archivo->move('images/', $nameLogo);
        } else {
            $nameLogo = "";
        }

        if ($request->input('urllogo') != "") {
            $nameLogo = $request->input('urllogo');
        }
        $resp =   DB::table('tecnologies')
            ->where('id', '=', $id)
            ->update([
                // "id" => $id,
                // "id_seller" => Auth::user()->id,
                "name" => $request->input('name'),
                "description" => $request->input('description'),
                "img_logo" => $nameLogo,
                // "active" => "$request->input('active')",
                // "order" => $request->input('order'),
            ]);

        return redirect('zonavendedor');
    }
}
