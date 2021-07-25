<?php

namespace App\Http\Controllers\Portafolio;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PageController extends Controller
{

    public function getPages()
    {
        return Page::all();
    }
    public function getPage(Request $request)
    {
        $id = $request->input('id');
        return Page::where('id', '=', $id)->first();
    }

    public function addPage(Request $request)
    {
        $j_color = [
            "a" => "white",
            "b" => "red",
            "ab" => "black",
            "bc" => "green",
        ];
        $j_img = [
            "header_back" => "https://martialartsplusinc.com/wp-content/uploads/2017/04/default-image-620x600.jpg"
        ];
        $j_text = [
            "header_text" => "texto por default",
        ];
        $j_settings = [
            "iva" => "19"
        ];

        DB::table('pages')->insert([
            "user" => Auth::user()->id,
            "color" => $j_color,
            "img" => $j_img,
            "text" => $j_text,
            "settings" => $j_settings,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        return redirect()->back();
    }

    public function deletePage(Request $request)
    {
        $idDelete = $request->input('idDelete');
        $resp = DB::table('pages')
            ->select('pages.*')
            ->Where('pages.id', '=', $idDelete)->delete();

        if ($resp == 1) {
            $resp == "borrado";
        } else {
            $resp == "error al borrar";
        }


        return redirect()->back();
        // return view('vendedor', compact('resp'));
    }

    public function editPage(Request $request)
    {
        $j_color = "{";
        $j_img = "{";
        $j_text = "{";
        $j_settings = "{";

        foreach ($request->input() as $input => $value) {

            if (Str::contains($input, '_color')) {
                $j_color = $j_color . '"' . $input . '"' . ":" . '"' . $value . '",';
            }
            if (Str::contains($input, '_img')) {
                if (Str::contains($input, '_copy')) {
                    continue;
                }

                if ($input != null || $input != "") {
                    $nameImg = $value;
                } else {
                    $nameImg = $request->input($input . '_copy');
                }
                $archivo = $request->file($input . 'file_img');
                if ($archivo  != null) {
                    $nameImg = "images/back_"  . $archivo->getClientOriginalName();
                    $archivo->move('images/', $nameImg);
                }


                $j_img = $j_img . '"' . $input . '"' . ":" . '"' . $nameImg . '",';
            }
            if (Str::contains($input, '_text')) {
                $j_text =  $j_text . '"' . $input . '"' . ":" . '"' . $value . '",';
            }
            if (Str::contains($input, '_sett')) {
                $j_settings = $j_settings . '"' . $input . '"' . ":" . '"' . $value . '",';
            }
        }
        $j_color = substr($j_color, 0, -1) . "}";
        $j_img = substr($j_img, 0, -1) . "}";
        $j_text = substr($j_text, 0, -1) . "}";
        $j_settings = substr($j_settings, 0, -1) . "}";
        // dd($j_text);
        // dd($j_img);
        $resp =   DB::table('pages')
            ->where('id', '=', Auth::user()->id)
            ->update([
                "user" => Auth::user()->id,
                "color" => $j_color,
                "img" => $j_img,
                "text" => $j_text,
                "settings" => $j_settings,
            ]);

        return redirect('pageConfig');
    }
}
