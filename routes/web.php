<?php

use App\Models\Blogs;
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
    $data = Product::orderBy('order', 'desc')->where('active', '1')->get();
    $tecnologies = Tecnologies::orderBy('order', 'desc')->where('active', '1')->get();
    $page = Page::where('user', '=', 1)->first();
    $noticias = Noticias::where('id_user', '=', 1)
        ->where('active', '=', 1)
        ->get();
    $usuario = User::select('contactos')
        ->where('id', '=', 1)->first();
    $blog_noticias = Blogs::where('related', 'like', "%" . "noticia" . "%")
        ->where('private', '=', 0)->orderBy('created_at', 'desc')->limit(3)->get();
    $contactos = json_decode($usuario->contactos);
    return view('welcome', compact('data', 'tecnologies', 'page', 'noticias', 'contactos','blog_noticias'));
})->name('welcome');

// addVisita
Route::post('/addvisita', [App\Http\Controllers\visitasController::class, 'addVisita'])->name('visitas.add');

Auth::routes();

Route::POST('/addEmail', [App\Http\Controllers\Portafolio\EmailsController::class, 'addEmail'])->name('email.add');
Route::post('/sumStadistic', [App\Http\Controllers\StadisticsController::class, 'sumStadistic'])->name('stadistic.sum');

Route::get('/blog/{value}', [App\Http\Controllers\Portafolio\BlogsController::class, 'blogView'])->name('blog.view');
Route::get('/search', [App\Http\Controllers\Portafolio\BlogsController::class, 'blogSearch'])->name('blog.search');


//bajo login
Route::group(['middleware' => 'admin'], function () {

    Route::get('/zonavendedor', [App\Http\Controllers\Portafolio\SellerController::class, 'index'])->name('seller');
    Route::get('/productPageEdit', [App\Http\Controllers\Portafolio\SellerController::class, 'editProduct'])->name('pageProedit');
    Route::get('/tecnologyPageEdit', [App\Http\Controllers\Portafolio\SellerController::class, 'editTecnology'])->name('pageTecedit');


    Route::get('/zonacliente', [App\Http\Controllers\Portafolio\ClientController::class, 'index'])->name('client');


    Route::get('/productdel', [App\Http\Controllers\Portafolio\ProductController::class, 'deleteProduct'])->name('product.del');
    Route::post('/productadd', [App\Http\Controllers\Portafolio\ProductController::class, 'addProduct'])->name('product.add');
    Route::get('/productget', [App\Http\Controllers\Portafolio\ProductController::class, 'getProduct'])->name('product.get');
    Route::POST('/productedit', [App\Http\Controllers\Portafolio\ProductController::class, 'editProduct'])->name('product.edit');
    Route::POST('/productactive', [App\Http\Controllers\Portafolio\ProductController::class, 'checkActive'])->name('product.active');

    Route::post('/tecnologyadd', [App\Http\Controllers\Portafolio\TecnologiesController::class, 'addTecnology'])->name('tecnology.add');
    Route::get('/tecnologydel', [App\Http\Controllers\Portafolio\TecnologiesController::class, 'deleteTecnology'])->name('tecnology.del');
    Route::get('/tecnologyget', [App\Http\Controllers\Portafolio\TecnologiesController::class, 'getTecnology'])->name('tecnology.get');
    Route::POST('/tecnologyedit', [App\Http\Controllers\Portafolio\TecnologiesController::class, 'editTecnology'])->name('tecnology.edit');
    Route::POST('/tecnoactive', [App\Http\Controllers\Portafolio\TecnologiesController::class, 'checkTecno'])->name('tecnology.active');

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
    Route::post('/editPassword', [App\Http\Controllers\Portafolio\UsersController::class, 'editPassword'])->name('password.edit');


    Route::post('/editNotice', [App\Http\Controllers\Portafolio\NoticiasController::class, 'editNoticia'])->name('notice.edit');
    Route::get('/deleteNotice', [App\Http\Controllers\Portafolio\NoticiasController::class, 'deleteNoticia'])->name('notice.delete');


    Route::get('/deleteEmail', [App\Http\Controllers\Portafolio\EmailsController::class, 'deleteEmail'])->name('email.delete');


    //estadisticas
    Route::get('/editStadistic', [App\Http\Controllers\StadisticsController::class, 'editDetails'])->name('stadistic.edit');

    //blogs


    Route::get('/blogsConfig', [App\Http\Controllers\Portafolio\BlogsController::class, 'blogsView'])->name('blogs.home');
    Route::get('/deleteBlog', [App\Http\Controllers\Portafolio\BlogsController::class, 'deleteBlog'])->name('delete.blog');
    Route::get('/getBlog', [App\Http\Controllers\Portafolio\BlogsController::class, 'getBlog'])->name('get.blog');
    Route::post('/addblog', [App\Http\Controllers\Portafolio\BlogsController::class, 'addBlog'])->name('add.blog');
    Route::post('/updateblog', [App\Http\Controllers\Portafolio\BlogsController::class, 'updateBlog'])->name('update.blog');
    Route::post('/privateblog', [App\Http\Controllers\Portafolio\BlogsController::class, 'privateBlog'])->name('private.blog');
});
