<?php

use App\Http\Controllers\AdminCategorieController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\productController;
use App\Http\Controllers\PharmacieController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\ProductpageController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\PharmaciedeGardeController;

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
   $value= DB::table('produit')->where('categorie','Analgesics')->get();
   return view("welcome",["produit"=>$value]);
});

Route::get('/products/{nomcat}',[productController::class,'index'])->name('products');
Route::get('/categories',[categoriesController::class,'index'])->name('categories');


Route::get('/productpage/{id_produit}',[ProductpageController::class,'index'])->name('ProductPage');
Route::get('/products', [productController::class,'search'])->name('products.search');


Route::get('/contact', function () {
    return view('Contact');
});
Route::get('/forum',[PostController::class,'index'])->name('forum');
Route::get('/addpost',[PostController::class,'addpost'])->name('addpost');
Route::post('/post', [PostController::class,'post'])->name('post');
Route::post('/details/{post_id}', [PostController::class,'details'])->name('details');
Route::post('/postsstore', [PostController::class,'store'])->name('posts.store');
Route::post('/comments', [CommentController::class,'store'])->name('comments.store');


Route::get('/pharmaciedegarde',[PharmaciedeGardeController::class,'index'])->name('pharmaciedegarde');
Route::get('/pharmacie/{nom_pharmacie}',[PharmacieController::class,'index'])->name('pharmacie');


Route::middleware('auth')->group(function () {
    Route::post('/favoris/add/{produit}', [FavorisController::class,'addToFavorites'])->name('favoris.add');
    Route::post('/favoris/remove/{produit}',  [FavorisController::class,'removeFromFavorites'])->name('favoris.remove');
    Route::get('/favoris',  [FavorisController::class,'index'])->name('favoris.index');
});



Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register' )->name('register');
    Route::post('register', 'registreSave' )->name('register.save');
    Route::get('login','login')->name('login');
    Route::post('login','loginAction')->name('login.action');
    Route::post('logout','logout')->middleware('auth')->name('logout');
});

Route::middleware(['auth','user-access:user'])->group(function () {
    Route::get('/home',[HomeController::class,'index'])->name('home');
});

Route::middleware(['auth','user-access:admin'])->group(function () {
    Route::get('/admin/home',[HomeController::class,'adminhome'])->name('admin/home');
    Route::get('/admin/profile',[AdminController::class,'profilepage'])->name('admin/profile');
    Route::post('/profile/update', [AdminController::class, 'update'])->name('profile.update');
    Route::get('/admin/products',[AdminProductController::class,'index'])->name('admin/products');
    Route::get('/admin/products/create',[AdminProductController::class,'create'])->name('/admin/products/create');
    Route::post('/admin/products/store',[AdminProductController::class,'store'])->name('/admin/products/store');
    Route::get('/admin/products/show/{id_produit}',[AdminProductController::class,'show'])->name('/admin/products/show');
    Route::get('/admin/products/edit/{id_produit}',[AdminProductController::class,'edit'])->name('/admin/products/edit');
    Route::put('/admin/products/edit/{id_produit}',[AdminProductController::class,'update'])->name('/admin/products/update');
    Route::delete('/admin/poroducts/destroy/{id_produit}',[AdminProductController::class,'destroy'])->name('/admin/poroducts/destroy');
});


Route::middleware(['auth','user-access:admin'])->group(function () {
    Route::get('/admin/categories',[AdminCategorieController::class,'index'])->name('admin/categories');
    Route::get('/admin/categories/create', [AdminCategorieController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [AdminCategorieController::class, 'store'])->name('admin.categories.store');
    Route::delete('/admin/categories/{category}', [AdminCategorieController::class, 'destroy'])->name('admin.categories.destroy');
});