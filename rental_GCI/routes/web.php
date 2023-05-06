<?php

use App\Models\Mobil;
use App\Models\Type;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\TypeController;

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
    $jumlahmobil = Mobil::count();
    return view('welcome', compact('jumlahmobil'));
})->middleware('auth');

Route::get('/mobil', [MobilController::class,'index'])->name('mobil')->middleware('auth');

Route::get('/tambahmobil', [MobilController::class,'tambahmobil'])->name('tambahmobil');
Route::post('/tambahdata', [MobilController::class,'tambahdata'])->name('tambahdata');
Route::get('/tampilkandata/{id}', [MobilController::class,'tampilkandata'])->name('tampilkandata');
Route::post('/perbaharuidata/{id}', [MobilController::class,'perbaharuidata'])->name('perbaharuidata');
Route::get('/hapus/{id}', [MobilController::class,'hapus'])->name('hapus');

Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/loginproses', [LoginController::class,'loginproses'])->name('loginproses');

Route::get('/register', [LoginController::class,'register'])->name('register');
Route::post('/registeruser', [LoginController::class,'registeruser'])->name('registeruser');

Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::get('/exportpdf', [MobilController::class,'exportpdf'])->name('exportpdf');

Route::get('/type_mobil', [TypeController::class, 'type_mobil']);
Route::get('/tambah_type', [TypeController::class, 'tambah_type']);
Route::post('/tambah', [TypeController::class, 'tambah']);
Route::get('/edit/{id}', [TypeController::class, 'edit']);
Route::post('/update/{id}', [TypeController::class, 'update']);
Route::get('/hapus/{id}', [TypeController::class, 'delete']);

