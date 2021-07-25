<?php

use App\Models\Noticias;
use App\Models\Page;
use App\Models\Product;
use App\Models\Tecnologies;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    $data = Product::orderBy('order', 'desc')->get();
    $tecnologies = Tecnologies::orderBy('order', 'desc')->get();
    $page = Page::where('user', '=', 1)->first();
    $noticias = Noticias::where('id_user', '=', 1)
        ->where('active', '=', 1)
        ->get();
    $usuario = User::select('contactos')
        ->where('id', '=', 1)->first();


    $contactos = json_decode($usuario->contactos);
    return view('welcome', compact('data', 'tecnologies', 'page', 'noticias', 'contactos'));
})->name('welcome');


Auth::routes();


// Route::group(['middleware' => 'admin'], function () {

    Route::get('/zonavendedor', [App\Http\Controllers\Portafolio\SellerController::class, 'index'])->name('seller');
    Route::get('/productPageEdit', [App\Http\Controllers\Portafolio\SellerController::class, 'editProduct'])->name('pageProedit');
    Route::get('/tecnologyPageEdit', [App\Http\Controllers\Portafolio\SellerController::class, 'editTecnology'])->name('pageTecedit');


    Route::get('/zonacliente', [App\Http\Controllers\Portafolio\ClientController::class, 'index'])->name('client');


    Route::get('/productdel', [App\Http\Controllers\Portafolio\ProductController::class, 'deleteProduct'])->name('product.del');
    Route::post('/productadd', [App\Http\Controllers\Portafolio\ProductController::class, 'addProduct'])->name('product.add');
    Route::get('/productget', [App\Http\Controllers\Portafolio\ProductController::class, 'getProduct'])->name('product.get');
    Route::POST('/productedit', [App\Http\Controllers\Portafolio\ProductController::class, 'editProduct'])->name('product.edit');

    Route::post('/tecnologyadd', [App\Http\Controllers\Portafolio\TecnologiesController::class, 'addTecnology'])->name('tecnology.add');
    Route::get('/tecnologydel', [App\Http\Controllers\Portafolio\TecnologiesController::class, 'deleteTecnology'])->name('tecnology.del');
    Route::get('/tecnologyget', [App\Http\Controllers\Portafolio\TecnologiesController::class, 'getTecnology'])->name('tecnology.get');
    Route::POST('/tecnologyedit', [App\Http\Controllers\Portafolio\TecnologiesController::class, 'editTecnology'])->name('tecnology.edit');

    //admin
    Route::get('/dashboard', [App\Http\Controllers\Portafolio\SellerController::class, 'dashboard'])->name('dashboard');
    Route::get('/pageConfig', [App\Http\Controllers\Portafolio\SellerController::class, 'pageConfig'])->name('pageConfig');
    Route::get('/slidersConfig', [App\Http\Controllers\Portafolio\SellerController::class, 'slidersConfig'])->name('slidersConfig');
    Route::get('/profileConfig', [App\Http\Controllers\Portafolio\SellerController::class, 'profileConfig'])->name('profileConfig');
    Route::get('/stadisticsConfig', [App\Http\Controllers\Portafolio\SellerController::class, 'stadisticsConfig'])->name('stadisticsConfig');

    // editPage
    Route::post('/editPage', [App\Http\Controllers\Portafolio\PageController::class, 'editPage'])->name('page.edit');

    //profiles
    Route::post('/editUser', [App\Http\Controllers\Portafolio\UsersController::class, 'editUser'])->name('user.edit');



    Route::post('/editNotice', [App\Http\Controllers\Portafolio\NoticiasController::class, 'editNoticia'])->name('notice.edit');
    Route::get('/deleteNotice', [App\Http\Controllers\Portafolio\NoticiasController::class, 'deleteNoticia'])->name('notice.delete');


    Route::POST('/addEmail', [App\Http\Controllers\Portafolio\EmailsController::class, 'addEmail'])->name('email.add');

    Route::get('/editStadistic', [App\Http\Controllers\StadisticsController::class, 'editDetails'])->name('stadistic.edit');
    Route::post('/sumStadistic', [App\Http\Controllers\StadisticsController::class, 'sumStadistic'])->name('stadistic.sum');
// });
