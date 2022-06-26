<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
Route::post('/post/create', [ProductController::class, 'prosestambahproduct'])->name('tambah');
Route::get('myproducts/create', [ProductController::class, 'create']);

Route::get('myproducts', [ProductController::class, 'index'])->name('index');
Route::delete('myproducts/{id}', [ProductController::class, 'destroy']);
Route::delete('myproductsDeleteAll', [ProductController::class, 'deleteAll']);
Route::get('/', function () {
    return view('welcome');
});
