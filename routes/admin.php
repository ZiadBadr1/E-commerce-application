<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\SubCategory\SubCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/admin/', function () {
//    return view('admin.auth.login');
//})->name('dashboard');

Route::group([
    'prefix'=>'admin',
    'as' => 'admin.',
    'middleware' => ['guest']
],function ()
{
    Route::get('login',[AuthController::class,'loginForm'])->name('login-form');
    Route::post('check',[AuthController::class,'login'])->name('login');
});


Route::group([
    'prefix'=>'admin',
    'as' => 'admin.',
    'middleware' => ['auth:admin']
],function ()
{
    Route::get('dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::post('logout',[AuthController::class,'logout'])->name('logout');
});


Route::group([
    'prefix'=>'admin',
    'as' => 'admin.',
    'middleware' => ['auth:admin']
],function ()
{
    Route::resource('category',CategoryController::class);
});
Route::group([
    'prefix'=>'admin',
    'as' => 'admin.',
    'middleware' => ['auth:admin']
],function ()
{
    Route::resource('sub-category',SubCategoryController::class);
});

Route::group([
    'prefix'=>'admin',
    'as' => 'admin.',
    'middleware' => ['auth:admin']
],function ()
{
    Route::resource('product',ProductController::class);
    Route::get('/sub_categories/{id}', [ProductController::class, 'getSubCategories']);

});
