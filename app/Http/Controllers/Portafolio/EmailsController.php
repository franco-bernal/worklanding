<?php

namespace App\Http\Controllers\Portafolio;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $exec =  DB::table('emails')->insert([
            'user_id' => 1,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'numero' => $request->input('numero'),
            'mensaje' => $request->input('mensaje'),
            'form_nom' => "landing franco",
            'estado' => "active",
            'fijar' => 0,
            'extras' => "[]",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        $_email = $request->input('email');
        $_name = $request->input('name');
        try { //try por si no quiere agregarle creadenciales
            if ($exec) {
                Mail::send('email.email', $request->all(), function ($message) {
                    $message->from('franco9bernal@gmail.com', 'Franco');
                    $message->sender('franco9bernal@gmail.com', 'Franco');
                    $message->to('franco9bernal@gmail.com', 'franco');
                    $message->subject('Formulario portafolio');
                    $message->priority(3);
                    // $message->attach('pathToFile');
                });
                Mail::send('email.email_interesed', $request->all(), function ($message) use ($_email, $_name) {
                    $message->from('franco9bernal@gmail.com', 'Franco');
                    $message->sender('franco9bernal@gmail.com', 'Franco');
                    $message->to($_email, $_name);
                    $message->subject('inndev mensaje recibido');
                    $message->priority(3);
                    // $message->attach('pathToFile');
                });
            }
        } catch (Exception $e) {
        }
        return redirect()->back()->with('message', "Gracias por contactarse")->with('submessage', 'Se le contactará a la brevedad');
    }

    public function deleteEmail(Request $request)
    {
        $idDelete = $request->input('id');
        $resp = DB::table('emails')
            ->select('emails.*')
            ->Where('emails.id', '=', $idDelete)->delete();

        return true;
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
