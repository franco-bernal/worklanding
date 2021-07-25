<?php

namespace App\Http\Controllers;

use App\Models\Stadistics;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class StadisticsController extends Controller
{

    public function getStadistics()
    {
        return Stadistics::all();
    }
    public function getProduct(Request $request)
    {
        $id = $request->input('id');
        return Stadistics::where('id', '=', $id)->get();
    }

    public function addStadistics(Request $request)
    {
        // dd($request, $nameLogo, $nameBack);
        DB::table('stadistics')->insert([
            "name" => $request->input('name'),
            "description" => $request->input('detalles'),
            "numbers" => "",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        return redirect()->back();
    }

    public function deleteStadistics(Request $request)
    {
        $idDelete = $request->input('idDelete');
        $resp = DB::table('stadistics')
            ->select('stadistics.*')
            ->Where('stadistics.id', '=', $idDelete)->delete();

        if ($resp == 1) {
            $resp == "borrado";
        } else {
            $resp == "error al borrar";
        }


        return redirect()->back();
        // return view('vendedor', compact('resp'));
    }

    public function editDetails(Request $request)
    {
        $id = $request->input('idinput');
        DB::table('stadistics')
            ->where('id', '=', $id)
            ->update([
                "name" => $request->input('name'),
                "description" => $request->input('description'),
            ]);
        return redirect()->back();
    }
    public function editStadistics(Request $request)
    {
        $actual = Stadistics::select('numbers')->where('id', '=', 1)->first();
        dd($actual);
        $j_numbers = "{";

        foreach ($request->input() as $input => $value) {
            $j_numbers = $j_numbers . '"' . $input . '"' . ":" . '"' . $value . '",';
        }

        $j_numbers = substr($j_numbers, 0, -1) . "}";

        $id = $request->input('idinput');
        DB::table('stadistics')
            ->where('id', '=', $id)
            ->update([
                'numbers' => $j_numbers,
            ]);
        return redirect()->back();
    }

    public function sumStadistic(Request $request)
    {
        // $request->type
        $actual = Stadistics::select('numbers')->where('id', '=', 1)->first();
        $type = json_decode($actual->numbers, true);
        $type[$request->type]++;

        $exec = DB::table('stadistics')
            ->where('id', '=', 1)
            ->update([
                'numbers' => $type,
            ]);
        dd($exec);
        return redirect()->back();
    }
}
