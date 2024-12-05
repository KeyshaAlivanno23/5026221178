<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\DosenController;

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

Route::get('/Linktree', function () {
    return view('Linktree');
});

Route::get('/Testimony', function () {
    return view('Testimony');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/Contact', function () {
    return view('Contact');
});

Route::get('/Helmet', function () {
    return view('Helmet');
});

Route::get('/Support', function () {
    return view('Support');
});

Route::get('/World link', function () {
    return view('World link');
});

Route::get('/Form', function () {
    return view('Form');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/responsive1', function () {
    return view('responsive1');
});

Route::get('/Style', function () {
    return view('Style');
});

Route::get('/Style2', function () {
    return view('Style2');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/error', function () {
    return "<h1>Server Error: Ada kesalahan di Server</h1>";
});

Route::get('blog', function () {
    return view('blog');
});

Route::get('/sandal','App\Http\Controllers\sandalControllerDB@index');

Route::get('/sandal/tambah','App\Http\Controllers\sandalControllerDB@tambah');

Route::post('/sandal/store','App\Http\Controllers\sandalControllerDB@store');

Route::get('/sandal/edit/{id}','App\Http\Controllers\sandalControllerDB@edit');

Route::post('/sandal/update','App\Http\Controllers\sandalControllerDB@update');

Route::get('/sandal/cari','App\Http\Controllers\sandalControllerDB@cari');

Route::get('/sandal/hapus/{id}','App\Http\Controllers\sandalControllerDB@hapus');
