<?php

namespace App\Http\Controllers\Deliferia;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{

    public function index()
    {
        $data = Product::orderBy('id', 'desc')->get();
        return view('cliente', compact('data'));
    }
}
