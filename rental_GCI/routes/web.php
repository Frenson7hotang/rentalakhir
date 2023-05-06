<?php

use App\Models\Mobil;
use App\Models\Type;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LaporanController;

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
Route::get('/hapus_mobil/{id}', [MobilController::class,'hapus'])->name('hapus_mobil');

Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/loginproses', [LoginController::class,'loginproses'])->name('loginproses');

Route::get('/register', [LoginController::class,'register'])->name('register');
Route::post('/registeruser', [LoginController::class,'registeruser'])->name('registeruser');

Route::get('/logout', [LoginController::class,'logout'])->name('logout');

//pdf
Route::get('/exportpdfmobil', [MobilController::class,'exportpdfmobil'])->name('exportpdfmobil');
Route::get('/exportpdf', [LaporanController::class, 'exportpdf'])->name('exportpdf');

Route::get('/type_mobil', [TypeController::class, 'type_mobil'])->name('type_mobil');
Route::get('/tambah_type', [TypeController::class, 'tambah_type'])->name('tambah_type');
Route::post('/tambah', [TypeController::class, 'tambah'])->name('tambah');
Route::get('/edit_type/{id}', [TypeController::class, 'edit_type'])->name('edit_type');
Route::post('/update_type/{id}', [TypeController::class, 'update_type'])->name('update_type');
Route::get('/hapus_type/{id}', [TypeController::class, 'delete_type'])->name('delete_type');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/laporan', [LaporanController::class, 'laporan']);
Route::get('/tambahlaporan', [LaporanController::class, 'tambahlaporan'])->name('tambahlaporan');
Route::post('/tambahdatalaporan', [LaporanController::class, 'tambahdatalaporan'])->name('tambahdatalaporan');
Route::get('/edit_laporan/{id}', [LaporanController::class, 'edit_laporan']);
Route::post('/update/{id}', [LaporanController::class, 'update']);
Route::get('/hapus_laporan/{id}', [LaporanController::class, 'delete_laporan']);


