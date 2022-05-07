<?php

use GuzzleHttp\Middleware;
use Database\Factories\BarangFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\EditBarangController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\DetailPenjualanController;

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



Route::get('/',[WebController::class,'index']);
Route::post('/create-pesanan',[WebController::class,'store']);

Route::get('/web/testimoni',[WebController::class,'testimoni']);
Route::get('/web/ulasan',[WebController::class,'ulasan']);


Route::get('/ulasan',[UlasanController::class,'index'])->middleware('auth');
Route::post('/create-ulasan',[UlasanController::class,'store']);
Route::post('/hapus-ulasan/{id}',[UlasanController::class,'destroy'])->middleware('auth');



Route::get('/testimoni',[TestimoniController::class,'index'])->middleware('auth');
Route::get('/create-testimoni',[TestimoniController::class,'create'])->middleware('auth');
Route::post('/create-testimoni',[TestimoniController::class,'store'])->middleware('auth');

Route::post('/edit-testimoni',[TestimoniController::class,'update'])->middleware('auth');
Route::post('/hapus-testimoni/{id}',[TestimoniController::class,'destroy'])->middleware('auth');


Route::get('/penjualan',[PenjualanController::class,'index'])->middleware('auth');
Route::get('/create-penjualan',[PenjualanController::class,'create'])->middleware('auth');
Route::post('/create-penjualan',[PenjualanController::class,'store'])->middleware('auth');
Route::post('/edit-penjualan',[PenjualanController::class,'update'])->middleware('auth');

Route::post('/penjualan/detail',[DetailPenjualanController::class,'index'])->middleware('auth');
Route::post('/hapus-penjualan/detail/{id}',[PenjualanController::class,'destroy'])->middleware('auth');

Route::get('/pembeli',[PembeliController::class,'index'])->middleware('auth');
Route::post('/create-pembeli',[PembeliController::class,'store'])->middleware('auth');
Route::post('/edit-pembeli',[PembeliController::class,'update'])->middleware('auth');
Route::post('/hapus-pembeli/{id}', [PembeliController::class, 'destroy'])->middleware('auth');


// Route::get('/testimoni',[TestimoniController::class,'index'])->middleware('auth');

// Route::get('/ulasan',[UlasanController::class,'index'])->middleware('auth');








Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//dikasih name('login') merujuk ke authenticate.php karena secara default kalo ada yang akses sebelum login redirect ke /login
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'autentikasi']);
Route::post('/logout',[LoginController::class, 'logout']);


Route::get('/admin',[DashboardController::class,'index'] )->middleware('auth') ;
Route::get('/admin/{t}',[DashboardController::class,'index'] )->middleware('auth') ;
Route::post('/setting-akun',[DashboardController::class,'autentikasi'] )->middleware('auth') ;
Route::post('/setting-akun/admin',[DashboardController::class,'update'] ) ;

// Route::get('/admin/{$tahun}',[DashboardController::class, 'showGrafikPendapatan']);



//ini route ngambil dari BarangController dengan method index
Route::get('/barang', [BarangController::class,'index'])->middleware('auth');

Route::get('/create-barang', [BarangController::class,'create'])->middleware('auth');

Route::post('/create-barang', [BarangController::class,'store'])->middleware('auth');

Route::get('/edit-barang/{id}', [BarangController::class, 'edit'])->middleware('auth');
Route::post('/edit-barang', [BarangController::class, 'update'])->middleware('auth');


Route::post('/hapus-barang/{id}', [BarangController::class, 'destroy'])->middleware('auth');




Route::get('/pengeluaran', [PengeluaranController::class,'index'])->middleware('auth');

Route::get('/create-pengeluaran', [PengeluaranController::class,'create'])->middleware('auth');
Route::post('/create-pengeluaran', [PengeluaranController::class,'store'])->middleware('auth');

Route::get('/edit-pengeluaran/{id}', [PengeluaranController::class, 'edit'])->middleware('auth');
Route::post('/edit-pengeluaran', [PengeluaranController::class, 'update'])->middleware('auth');

Route::post('/hapus-pengeluaran/{id}', [PengeluaranController::class, 'destroy'])->middleware('auth');



