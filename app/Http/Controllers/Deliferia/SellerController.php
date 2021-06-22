<?php

namespace App\Http\Controllers\Deliferia;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function index()
    {
        $data = Product::orderBy('id', 'desc')->where('id_seller', '=', Auth::user()->id)->get();
        return view('vendedor', compact('data'));
    }
}
