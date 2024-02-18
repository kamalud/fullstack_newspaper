<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
//  Route::get('/register', [App\Http\Controllers\HomeController::class, 'index'])->name('register');




Route::post('/frontend/get_all_post', [App\Http\Controllers\HomeController::class, 'getPOstInfo'])->name('allpost');


Route::get('/post_details/{slug}', [App\Http\Controllers\HomeController::class, 'postDetailsInfo']);




Route::get('/category_post/{slug}', [App\Http\Controllers\HomeController::class, 'categoryPOstinfo']);


Route::group(['prefix'=>'admin','namespace'=>'Admin','middlware'=>['auth','admin']],function(){
    Route::get('dasboard',[AdminController::class,'index'])->name('admin.dasboard');


    Route::post('/category-add',[CategoryController::class,'store']);
    
    Route::get('/category-get',[CategoryController::class,'index']);
    Route::get('/category-remove/{slug}',[CategoryController::class,'destroy']);
    Route::get('/category-edit/{slug}',[CategoryController::class,'show']);
    Route::post('/category-update',[CategoryController::class,'update']);


    Route::post('/post-add',[PostController::class,'store']);
    Route::get('/post-get',[PostController::class,'index']);
    Route::get('/post-remove/{slug}',[PostController::class,'destroy']);
    Route::get('/post-edit/{slug}',[PostController::class,'show']);
    Route::post('/post-update',[PostController::class,'update']);







});

















Route::group(['prefix'=>'editor','namespace'=>'Admin','middlware'=>['auth','editor']],function(){
    Route::get('dasboard',[AdminController::class,'index'])->name('editor.dasboard') ;
});

Route::get('/admin/{anypath?}', [AdminController::class, 'index'])->where(['anypath'=>'.*']);
Route::get('/{anypath}', [App\Http\Controllers\HomeController::class, 'index'])->where(['anypath'=>'.*']);
