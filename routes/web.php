<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanBulananController;
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

Route::get('/', function () { return view('home'); })->name('home');
Route::post('/searchTagihan', [loginController::class, 'searchTagihan']);
Route::post('/login', [loginController::class, 'login']);
Route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

//admin
Route::get('/pelanggan', [HomeController::class, 'pelanggan'])->name('pelanggan')->middleware('roleAuth:1');
Route::post('/pelanggan/tambah', [HomeController::class, 'tambahPelanggan'])->name('tambahPelanggan')->middleware('roleAuth:1');;
Route::get('/pelanggan/edit/{id}', [HomeController::class, 'modalEditPelanggan'])->name('modalEditPelanggan')->middleware('roleAuth:1');;
Route::post('/pelanggan/edit', [HomeController::class, 'editPelanggan'])->name('editPelanggan')->middleware('roleAuth:1');;
Route::post('/pelanggan/nonaktif/{id}', [HomeController::class, 'nonaktifkanPelanggan'])->name('nonaktifkanPelanggan')->middleware('roleAuth:1');;
Route::post('/pelanggan/aktif/{id}', [HomeController::class, 'aktifkanPelanggan'])->name('aktifkanPelanggan')->middleware('roleAuth:1');;

Route::get('/tarif', [HomeController::class, 'tarif'])->name('tarif')->middleware('roleAuth:1');;
Route::post('/tarif/update', [HomeController::class, 'updateTarif'])->name('updateTarif')->middleware('roleAuth:1');;

Route::get('/pemakaian', [HomeController::class, 'pemakaian'])->name('pemakaian')->middleware('roleAuth:1,2,3');;
Route::post('/pemakaian/table', [HomeController::class, 'pemakaianTable'])->name('pemakaianTable')->middleware('roleAuth:1,2,3');;
Route::post('/pemakaian/input', [HomeController::class, 'pemakaianInput'])->name('pemakaianInput')->middleware('roleAuth:1,2');;
Route::post('/pemakaian/bayar', [HomeController::class, 'pemakaianBayar'])->name('pemakaianBayar')->middleware('roleAuth:1,3');;

Route::get('/laporan_bulanan', [LaporanBulananController::class, 'index'])->name('index')->middleware('roleAuth:1,2,3,4');;
Route::post('/laporan_bulanan/table', [LaporanBulananController::class, 'laporanTable'])->name('laporanTable')->middleware('roleAuth:1,2,3,4');;

Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::post('/profile/edit', [HomeController::class, 'editProfile'])->name('editProfile');
