<?php

use GuzzleHttp\Middleware;
use Database\Factories\BarangFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditBarangController;

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
// Route::get('/admin', function () {
//     return view('login', [
//         'judul' => "login"
//     ]);
// });

Route::get('/',[DashboardController::class,'index'] )->middleware('auth') ;


//ini route ngambil dari BarangController dengan method index
Route::get('/barang', [BarangController::class,'index'])   ;

Route::get('/edit-barang/{id}', [BarangController::class, 'index2']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'storeData']);


Route::get('/login',[LoginController::class, 'index'])->middleware('guest');
Route::post('/login',[LoginController::class, 'autentikasi']);
