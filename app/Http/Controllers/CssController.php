<?php

namespace App\Http\Controllers;

use App\Models\Customcss;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CssController extends Controller
{
    public function getCss(Request $request){
        $customCss = Customcss::get();
        if (count($customCss) == 0) {
            DB::table('customCsses')->insert([
                "html_content" => "",
                "active" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
        }
        return Customcss::get();
    }

    public function updateCustomCss(Request $request)
    {
        if($request->css==null){
            $request->css="";
        }
        $resp = DB::table('customcsses')
        ->where('id', '=', 1)
        ->update([
            "html_content"=>$request->css,
            "active"=>1,
            "updated_at" => Carbon::now(),
        ]);
        return redirect()->back();
    }

}
