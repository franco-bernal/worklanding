<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class visitasController extends Controller
{
    public function addVisita(Request $request)
    {
        // dd($request, $nameLogo, $nameBack);
        DB::table('visitas')->insert([
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        return redirect()->back();
    }

    public function deleteVisita(Request $request)
    {
        $idDelete = $request->input('idDelete');
        $resp = DB::table('visitas')
            ->select('visitas.*')
            ->Where('visitas.id', '=', $idDelete)->delete();

        return redirect()->back();
    }
}
