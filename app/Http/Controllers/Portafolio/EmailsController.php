<?php

namespace App\Http\Controllers\Portafolio;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmailsController extends Controller
{
    public function getEmails()
    {
        return Email::where('user_id', '=', Auth::user()->id)->get();
    }
    public function getEmail(Request $request)
    {
        $id = $request->input('id');
        return Email::where('id', '=', $id)->get();
    }

    public function addEmail(Request $request)
    {
        DB::table('emails')->insert([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'numero' => $request->input('numero'),
            'mensaje' => $request->input('mensaje'),
            'form_nom' => "landing franco",
            'estado' => "active",
            'fijar' => 0,
            'extras' => "[]",
        ]);
        return redirect()->back()->with('message', "Gracias por contactarse")->with('submessage', 'Se le contactará a la brevedad');
    }

    public function deleteEmail(Request $request)
    {
        $idDelete = $request->input('idDelete');
        $resp = DB::table('emails')
            ->select('emails.*')
            ->Where('emails.id', '=', $idDelete)->delete();

        return redirect()->back();
    }

    public function editNoticia(Request $request)
    {
        $id = $request->input('idinput');

        if ($request->input('estado') != null) {
            DB::table('emails')
                ->where('id', '=', $request->input('id'))
                ->update([
                    'estado' => $request->input('estado'),
                ]);
        }
        if ($request->input('fijar') != null) {
            DB::table('emails')
                ->where('id', '=', $request->input('id'))
                ->update([
                    'fijar' => $request->input('fijar'),
                ]);
        }



        return redirect()->back();
    }
}
