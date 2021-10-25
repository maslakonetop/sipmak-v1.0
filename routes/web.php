<?php

use App\Models\DataModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataModelController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KarangsuciController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KerkoffController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KijingController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PembayaranModelController;
use App\Http\Controllers\PrintController;

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

Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::resource('/ijin', DataModelController::class)->middleware('auth');
Route::resource('/user', UserController::class)->middleware('admin');
Route::resource('/kecamatan', KecamatanController::class)->middleware('admin');
Route::resource('/desa', DesaController::class)->middleware('admin');
Route::get('/profil', [DashboardController::class, 'profil'])->middleware('auth');
Route::resource('/karangsuci', KarangsuciController::class)->middleware('auth');
Route::get('/cari/karangsuci', [KarangsuciController::class, 'carikarangsuci'])->middleware('auth');
Route::get('/cari/kerkoff', [KerkoffController::class, 'carikerkoff'])->middleware('auth');
Route::get('/pemutihan/karangsuci', [KarangsuciController::class, 'pemutihan'])->middleware('auth');
Route::get('/pemutihan/karangsuci/cari', [KarangsuciController::class, 'cari'])->middleware('auth');
Route::get('/pemutihan/karangsuci/form/{karangsuci}', [KarangsuciController::class, 'form'])->middleware('auth');
Route::put('/pemutihan/karangsuci/update/{karangsuci}', [KarangsuciController::class, 'perbaharui'])->middleware('auth');
Route::get('/pemutihan/kerkoff', [KerkoffController::class, 'pemutihan'])->middleware('auth');
Route::get('/pemutihan/kerkoff/cari', [KerkoffController::class, 'cari'])->middleware('auth');
Route::get('/pemutihan/kerkoff/form/{kerkoff}', [KerkoffController::class, 'form'])->middleware('auth');
Route::put('/pemutihan/kerkoff/update/{kerkoff}', [KerkoffController::class, 'perbaharui'])->middleware('auth');
Route::resource('/kerkoff', KerkoffController::class)->middleware('auth');
Route::resource('/kijing', KijingController::class)->middleware('auth');
Route::get('/keuangan', [KeuanganController::class, 'index'])->middleware('auth');
Route::get('/pembayaran/karangsuci/pemutihan/cari', [PembayaranController::class, 'krcaripemutihan']);
Route::get('/pembayaran/karangsuci/ijinbaru/cari', [PembayaranController::class, 'krcaribaru']);
Route::get('/pembayaran/karangsuci/ijinbaru', [PembayaranController::class, 'krijinbaru']);
Route::get('/pembayaran/karangsuci/pemutihan', [PembayaranController::class, 'krpemutihan']);
Route::get('/pembayaran/karangsuci/form/pemutihan/{karangsuci}', [PembayaranController::class, 'krformbayarpemutihan']);
Route::put('/pembayaran/karangsuci/update/pemutihan/{karangsuci}', [PembayaranController::class, 'krpemutihanupdate']);
Route::resource('/prosesbayar', PembayaranModelController::class)->middleware('auth');
Route::resource('/kijing', KijingController::class)->middleware('auth');
Route::get('/cetak/karangsuci/ijinbaru/', [PrintController::class, 'krijinbaruindex'])->middleware('auth');
Route::get('/cetak/karangsuci/ijinbaru/cari', [PrintController::class, 'krijinbarucari'])->middleware('auth');
Route::get('/cetak/karangsuci/ijinbaru/print/{karangsuci}', [PrintController::class, 'krijinbarucetak'])->middleware('auth');
Route::get('/cetak/karangsuci/pemutihan/', [PrintController::class, 'krpemutihanindex'])->middleware('auth');
Route::get('/cetak/karangsuci/pemutihan/cari', [PrintController::class, 'krpemutihancari'])->middleware('auth');
Route::get('/cetak/karangsuci/pemutihan/print', [PrintController::class, 'krpemutihancetak'])->middleware('auth');
Route::get('/cetak/karangsuci/kijing/', [PrintController::class, 'krkijingindex'])->middleware('auth');
Route::get('/cetak/karangsuci/kijing/cari', [PrintController::class, 'krkijingcari'])->middleware('auth');
Route::get('/cetak/karangsuci/kijing/print', [PrintController::class, 'krkijingcetak'])->middleware('auth');
Route::get('/cetak/kerkoff/ijinbaru/', [PrintController::class, 'kfijinbaruindex'])->middleware('auth');
Route::get('/cetak/kerkoff/ijinbaru/cari', [PrintController::class, 'kfijinbarucari'])->middleware('auth');
Route::get('/cetak/kerkoff/ijinbaru/print', [PrintController::class, 'kfijinbarucetak'])->middleware('auth');
Route::get('/cetak/kerkoff/pemutihan/', [PrintController::class, 'kfpemutihanindex'])->middleware('auth');
Route::get('/cetak/kerkoff/pemutihan/cari', [PrintController::class, 'kfpemutihancari'])->middleware('auth');
Route::get('/cetak/kerkoff/pemutihan/print', [PrintController::class, 'kfpemutihancetak'])->middleware('auth');
Route::get('/cetak/kerkoff/kijing/', [PrintController::class, 'kfkijingindex'])->middleware('auth');
Route::get('/cetak/kerkoff/kijing/cari', [PrintController::class, 'kfkijingcari'])->middleware('auth');
Route::get('/cetak/kerkoff/kijing/print', [PrintController::class, 'kfkijingcetak'])->middleware('auth');
