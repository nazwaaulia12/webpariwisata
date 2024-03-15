<?php

use Illuminate\Support\Facades\Auth;
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
    return view('homepage');
});

Route::get('about1', function () {
    return view('about1');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {return view('home');})->name('home')->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('pemilik-users', \App\Http\Controllers\PemilikUsersController::class)->middleware('auth');
Route::get('/exportpdf5', [App\Http\Controllers\PemilikUsersController::class, 'exportpdf5'])->name('exportpdf5');

Route::resource('karyawan', \App\Http\Controllers\KaryawanController::class)->middleware('auth');
Route::resource('pemilik-karyawan',\App\Http\Controllers\PemilikKaryawanController::class)->middleware('auth');
Route::get('/exportpdf4', [App\Http\Controllers\PemilikKaryawanController::class, 'exportpdf4'])->name('exportpdf4');

Route::resource('pelanggan', \App\Http\Controllers\PelangganController::class)->middleware('auth');
Route::resource('pemilik-pelanggan',\App\Http\Controllers\PemilikPelangganController::class)->middleware('auth');
Route::get('/exportpdf3', [App\Http\Controllers\PemilikPelangganController::class, 'exportpdf3'])->name('exportpdf3');

Route::resource('daftar_paket', \App\Http\Controllers\DaftarPaketController::class)->middleware('auth');
Route::resource('pemilik-daftarpaket',\App\Http\Controllers\PemilikDaftarPaketController::class)->middleware('auth');
Route::get('/exportpdf2', [App\Http\Controllers\PemilikDaftarPaketController::class, 'exportpdf2'])->name('exportpdf2');

Route::resource('paket_wisata', \App\Http\Controllers\PaketWisataController::class)->middleware('auth');
Route::resource('pemilik-paketwisata',\App\Http\Controllers\PemilikPaketWisataController::class)->middleware('auth');
Route::get('/exportpdf1', [App\Http\Controllers\PemilikPaketWisataController::class, 'exportpdf1'])->name('exportpdf1');

Route::resource('reservasi', \App\Http\Controllers\ReservasiController::class)->middleware('auth');
Route::resource('pemilik-reservasi',\App\Http\Controllers\PemilikReservasiController::class)->middleware('auth');
Route::get('/exportpdf', [App\Http\Controllers\PemilikReservasiController::class, 'exportpdf'])->name('exportpdf');

Route::resource('profil-pelanggan', \App\Http\Controllers\ProfilPelangganController::class)->middleware('auth');




