<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Auth::routes();

Route::get('/zonavendedor', [App\Http\Controllers\Deliferia\SellerController::class, 'index'])->name('seller');

Route::get('/zonacliente', [App\Http\Controllers\Deliferia\ClientController::class, 'index'])->name('client');

Route::get('/productdel', [App\Http\Controllers\Deliferia\ProductController::class, 'deleteProduct'])->name('product.del');
Route::post('/productadd', [App\Http\Controllers\Deliferia\ProductController::class, 'addProduct'])->name('product.add');
Route::get('/productget', [App\Http\Controllers\Deliferia\ProductController::class, 'getProduct'])->name('product.get');
Route::get('/productedit', [App\Http\Controllers\Deliferia\ProductController::class, 'editProduct'])->name('product.edit');
