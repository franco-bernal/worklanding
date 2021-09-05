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
            "ip" => $request->ip(),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        return $request->ip();
    }

    public function deleteVisita(Request $request)
    {
        if ($request->deleteAll) {
            $resp = DB::table('visitas')
                ->select('visitas.*')
                ->delete();
        } else {
            $idDelete = $request->input('id');
            $resp = DB::table('visitas')
                ->select('visitas.*')
                ->Where('visitas.id', '=', $idDelete)->delete();
        }

        return $resp;
    }
}
