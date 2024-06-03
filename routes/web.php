<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\ManageUsersController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\productController;
use App\Http\Controllers\PharmacieController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\ProductpageController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategorieController;
use App\Http\Controllers\PharmaciedeGardeController;
use App\Http\Controllers\PharmacieProductController;

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
///forum
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
Route::get('/forum/{post}', [ForumController::class, 'show'])->name('forum.show');
Route::post('/forum/{post}/comments', [ForumController::class, 'storeComment'])->name('forum.comments.store');


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
    Route::get('/register/pharmacy',  'pharmacy')->name('registerpharmacy');
    Route::post('/register/pharmacy',  'registerpharmacy')->name('registerpharmacy.submit');
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
    /////////////////////////////////////////
    Route::get('/product/{id}', [AdminProductController::class, 'AssignPage'])->name('product.show');
    Route::post('/product/{id}/pharmacies', [AdminProductController::class, 'addPharmacies'])->name('product.addPharmacies');
    ////////////
    //manage account
    Route::get('/admin/manage-users', [ManageUsersController::class, 'index'])->name('admin.manage-users');
Route::put('/admin/manage-users/{user}/make-admin', [ManageUsersController::class, 'makeAdmin'])->name('admin.make-admin');
Route::delete('/admin/manage-users/{user}', [ManageUsersController::class, 'destroy'])->name('admin.delete-user');
Route::get('/admin/manage-users/create', [ManageUsersController::class, 'create'])->name('admin.create-user');
Route::post('/admin/manage-users', [ManageUsersController::class, 'store'])->name('admin.store-user');
Route::get('/admin/manage-users/{user}', [ManageUsersController::class, 'show'])->name('admin.show-user');
});


Route::middleware(['auth','user-access:admin'])->group(function () {
    Route::get('/admin/categories',[AdminCategorieController::class,'index'])->name('admin/categories');
    Route::get('/admin/categories/create', [AdminCategorieController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [AdminCategorieController::class, 'store'])->name('admin.categories.store');
    Route::delete('/admin/categories/{category}', [AdminCategorieController::class, 'destroy'])->name('admin.categories.destroy');
});


Route::middleware(['auth','user-access:owner'])->group(function () {
    Route::get('/pharmacy/home',[HomeController::class,'ownerhome'])->name('owner/home');
    Route::get('/Pharmacy/products',[PharmacieProductController::class,'showProducts'])->name('pharmacies.products');
    Route::get('/Pharmacy/categories',[AdminCategorieController::class,'index'])->name('Pharmacy/categories');
    Route::get('/pharmacy/categories/create', [AdminCategorieController::class, 'create'])->name('pharmacy.categories.create');
    Route::post('/pharmacy/categories', [AdminCategorieController::class, 'store'])->name('pharmacy.categories.store');
    Route::delete('/pharmacy/categories/{category}', [AdminCategorieController::class, 'destroy'])->name('pharmacy.categories.destroy');

    //products
    Route::get('/Pharmacy/products/create',[AdminProductController::class,'create'])->name('/pharmacy/products/create');
    Route::post('/Pharmacy/products/store',[AdminProductController::class,'store'])->name('/pharmacy/products/store');
//profile
Route::get('/Pharmacy/Profile',[PharmacieController::class,'profileshow'])->name('pharmacies.profile');
Route::post('/Pharmacy/pharmacie/update',[PharmacieController::class,'update'])->name('pharmacies.profile.update');
Route::post('/Pharmacy/password/update',[PharmacieController::class,'changePassword'])->name('pharmacies.profile.password');
});