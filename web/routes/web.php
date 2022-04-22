<?php

use Database\Factories\BarangFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
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

Route::get('/', function () {
    return view('home', [
        'judul' => "dashboard"
    ]);
});

//ini route ngambil dari BarangController dengan method index
Route::get('/barang', [BarangController::class,'index']);

Route::get('/edit-barang/{id}', [BarangController::class, 'index2']);


//LATIHAN
// Route::get('/', function () {
//     return view('latihan1', [
//         'judul' => "home"
//     ]);
// });


// Route::get('/about', function () {
//     return view('latihan2', [
//         'judul' => "tentang"
//     ]);
// });




// Route::get('/blog', function () {
//     $post =
//             [
//                 [
//                     'judul post' => 'judul berita pertama',
//                     'author' => 'ilham',
//                     'body'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus voluptas nobis omnis labore consectetur, rem ipsum est ipsam optio, facere ex doloribus libero at, harum ut fugiat quaerat debitis voluptatum! Error quia ut rem laborum odit assumenda reiciendis reprehenderit blanditiis a. Non laudantium in cumque ratione ut alias nesciunt officia culpa at qui, asperiores distinctio eaque itaque aut ipsam iusto illo! Impedit, perferendis quis cumque illo quas voluptates eligendi fugit earum tempore iure ipsa ad officia doloribus ex vero assumenda?'
//                 ],
//                 [
//                     'judul post' => 'judul berita kedua',
//                     'author' => 'kirino',
//                     'body'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus voluptas nobis omnis labore consectetur, rem ipsum est ipsam optio, facere ex doloribus libero at, harum ut fugiat quaerat debitis voluptatum! Error quia ut rem laborum odit assumenda reiciendis reprehenderit blanditiis a. Non laudantium in cumque ratione ut alias nesciunt officia culpa at qui, asperiores distinctio eaque itaque aut ipsam iusto illo! Impedit, perferendis quis cumque illo quas voluptates eligendi fugit earum tempore iure ipsa ad officia doloribus ex vero assumenda?'
//                 ]
//             ];
//     return view('latihan3', [
//         'judul' => "posts",
//         'p' => $post,

//     ]);
// });
