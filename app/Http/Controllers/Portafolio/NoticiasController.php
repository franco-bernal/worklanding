<?php

namespace App\Http\Controllers\Portafolio;

use App\Http\Controllers\Controller;
use App\Models\Noticias;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoticiasController extends Controller
{
    public function getNoticias()
    {
        return Noticias::where('id_user', '=', Auth::user()->id)->get();
    }
    public function getNoticia(Request $request)
    {
        $id = $request->input('id');
        return Noticias::where('id', '=', $id)->get();
    }

    public function addNoticia(Request $request)
    {
        if ($archivo = $request->file('imagen_logo')) {
            $nameLogo = "logo_" . $request->input('name') . $archivo->getClientOriginalName();
            $archivo->move('images/', $nameLogo);
        } else {
            $nameLogo = "";
        }

        if ($archivo = $request->file('imagen_back')) {
            $nameBack = "back_" . $request->input('name') . $archivo->getClientOriginalName();
            $archivo->move('images/', $nameBack);
        } else {
            $nameBack = "";
        }

        if ($request->input('urllogo') != "") {
            $nameLogo = $request->input('urlloggo');
        }
        if ($request->input('urlback') != "") {
            $nameBack = $request->input('urlback');
        }
        // dd($request, $nameLogo, $nameBack);
        DB::table('noticias')->insert([
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

    public function deleteNoticia(Request $request)
    {
        $idDelete = $request->input('idDelete');
        $resp = DB::table('noticias')
            ->select('noticias.*')
            ->Where('noticias.id', '=', $idDelete)->delete();

        if ($resp == 1) {
            $resp == "borrado";
        } else {
            $resp == "error al borrar";
        }


        return redirect()->back();
        // return view('vendedor', compact('resp'));
    }

    public function editNoticia(Request $request)
    {
        if ($archivo = $request->file('imagen_back')) {
            $nameBack = "back_" . $request->input('name') . $archivo->getClientOriginalName();
            $archivo->move('images/', $nameBack);
        } else {
            $nameBack = $request->input('backCopy');
        }

        if ($request->input('urlback') != "" || $request->input('urlback') != null) {
            $nameBack = $request->input('urlback');
        }

        if ($nameBack == "" || $nameBack == null) {
            $nameBack = $request->input('backCopy');
        }

        $active = false;
        if (isset($request->active)) {
            $active = true;
        }
        if ($request->btn_link == null) {
            $btn_link = "no";
        } else {
            $btn_link = $request->btn_link;
        }


        $id = $request->input('idinput');
        $resp =   DB::table('noticias')
            ->where('id', '=', $request->input('id'))
            ->update([
                "id_user" => 1,
                "title" => $request->input('title'),
                "subtitle" => $request->input('subtitle'),
                "btn_text" => $request->input('btn_text'),
                "btn_link" => $btn_link,
                "background" => $nameBack,
                "order" => $request->input('order'),
                "active" => $active,
            ]);
        return redirect()->back();
    }
}
