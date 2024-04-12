<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
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

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix'=>'admin',
    'as' => 'admin.',
    'middleware' => ['auth']
],function ()
{
    Route::resource('category',CategoryController::class);
});
Route::group([
    'prefix'=>'admin',
    'as' => 'admin.',
    'middleware' => ['auth']
],function ()
{
    Route::resource('sub-category',SubCategoryController::class);
});
