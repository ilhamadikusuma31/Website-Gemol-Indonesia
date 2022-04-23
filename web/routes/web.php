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
Route::get('/barang', [BarangController::class,'index'])->middleware('auth');
Route::get('/create-barang', [BarangController::class,'create'])->middleware('auth');
Route::get('/edit-barang/{id}', [BarangController::class, 'edit'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//dikasih name('login') merujuk ke authenticate.php karena secara default kalo ada yang akses sebelum login redirect ke /login
Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'autentikasi']);
Route::post('/logout',[LoginController::class, 'logout']);
