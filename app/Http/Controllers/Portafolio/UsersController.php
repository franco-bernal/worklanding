<?php

namespace App\Http\Controllers\Portafolio;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{

    public function getUsers()
    {
        return User::all();
    }
    public function getUser(Request $request)
    {
        $id = $request->id;
        return User::where('id', '=', $id)->first();
    }

    public function addUser(Request $request)
    {
        $j_contactos = [
            "whatsapp" => "",
            "linkedin" => "",
            "cv" => "",
            "email" => "",
        ];

        DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'),),
            'tipo_usuario' => 1,
            'contactos' => json_encode($j_contactos, true),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        return redirect()->back();
    }

    public function deletePage(Request $request)
    {
        $idDelete = $request->input('idDelete');
        $resp = DB::table('users')
            ->select('users.*')
            ->Where('users.id', '=', $idDelete)->delete();

        return redirect()->back();
    }

    public function editUser(Request $request)
    {
        $user = User::where('id', '=', 1)->first();
        $nameCv = null;
        foreach ($request->file() as $input => $value) {
            // if (Str::contains($input, '_cv')) {

            if ($archivo = $request->file($input)) {
                $nameCv = "pdf/cv_" . $request->input($input) . $archivo->getClientOriginalName();
                $archivo->move('pdf/', $nameCv);
            }
            // }
        }
        // dd($nameCv);

        $j_contactos = [
            "whatsapp" => $request->input('whatsapp') ?: json_decode($user->contactos)->whatsapp,
            "linkedin" => $request->input('linkedin') ?: json_decode($user->contactos)->linkedin,
            "cv" => $nameCv ?: json_decode($user->contactos)->cv,
            "email" => $request->input('email') ?: json_decode($user->contactos)->email,
        ];

        $resp =   DB::table('users')
            ->where('id', '=', Auth::user()->id)
            ->update([
                'name' => $request->input('name')  ?: $user->name,
                'email' => $request->input('email')  ?: $user->email,
                // 'password' => Hash::make($request->input('password'),)  ?: "defectuoso",
                'contactos' => json_encode($j_contactos, true),
            ]);

        return redirect()->back();
    }
}
