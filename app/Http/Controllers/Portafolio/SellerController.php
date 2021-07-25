<?php

namespace App\Http\Controllers\Portafolio;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Controller\Portafolio;
use App\Models\Email;
use App\Models\Noticias;
use App\Models\Page;
use App\Models\Product;
use App\Models\Stadistics;
use App\Models\Tecnologies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    public function dashboard()
    {
        $data = Product::orderBy('order', 'desc')->get();
        $users = User::count();
        $tecnologies = Tecnologies::orderBy('order', 'desc')->get();
        $page = Page::where('user', '=', 1)->first();
        $stadistics = Stadistics::select('numbers')->where('id', '=', 1)->first();
        $stadistics = json_decode($stadistics->numbers);
        $emails = Email::get();

        return view('admin/dashboard', compact(
            'data',
            'tecnologies',
            'users',
            'page',
            'emails',
            'stadistics'
        ));
    }

    public function pageConfig()
    {
        $tecnologies = Tecnologies::orderBy('order', 'desc')->get();
        $data = Product::orderBy('order', 'desc')->get();
        $page = Page::where('user', '=', 1)->first();
        return view('admin/pageConfig', compact('data', 'tecnologies', 'page'));
    }


    public function slidersConfig()
    {
        $data = Product::orderBy('order', 'desc')->get();
        $tecnologies = Tecnologies::orderBy('order', 'desc')->get();
        $page = Page::where('user', '=', 1)->first();
        $noticias = Noticias::where('id_user', '=', 1)->get();
        return view('admin/slidersConfig', compact('data', 'tecnologies', 'page', 'noticias'));
    }
    public function profileConfig()
    {
        $page = Page::where('user', '=', 1)->first();
        $user = User::where('id', '=', Auth::user()->id)->first();
        return view('admin/profileConfig', compact('user', 'page'));
    }
    public function stadisticsConfig()
    {
        $page = Page::where('user', '=', 1)->first();
        $stadistics = Stadistics::where('id', '=', 1)->first();
        return view('admin/stadisticsConfig', compact('stadistics', 'page'));
    }

    public function editProduct(Request $request)
    {
        $edit = Product::where('id', '=', $request->id)->first();
        $type = "product";
        $page = Page::where('user', '=', 1)->first();
        $usuario = User::select('contactos')
            ->where('id', '=', 1)->first();
        $contactos = json_decode($usuario->contactos);


        return view('update', compact('edit', 'type', 'page','contactos'));
    }
    public function editTecnology(Request $request)
    {
        $edit = Tecnologies::where('id', '=', $request->id)->first();
        $type = "tecnology";
        $page = Page::where('user', '=', 1)->first();

        return view('update', compact('edit', 'type', 'page'));
    }
}
