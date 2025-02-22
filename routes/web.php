<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');
// export pdf
Route::post('produk/export-produk', [App\Http\Controllers\ProdukController::class, 'viewPDF'])->name('produk.view-pdf');
Route::resource('merk', App\Http\Controllers\MerkController::class)->middleware('auth');
