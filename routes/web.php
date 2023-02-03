<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
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
Route::get('/pelanggan', [HomeController::class, 'pelanggan'])->name('pelanggan');
Route::post('/pelanggan/tambah', [HomeController::class, 'tambahPelanggan'])->name('tambahPelanggan');
Route::get('/pelanggan/edit/{id}', [HomeController::class, 'modalEditPelanggan'])->name('modalEditPelanggan');
Route::post('/pelanggan/edit', [HomeController::class, 'editPelanggan'])->name('editPelanggan');
Route::post('/pelanggan/nonaktif/{id}', [HomeController::class, 'nonaktifkanPelanggan'])->name('nonaktifkanPelanggan');
Route::post('/pelanggan/aktif/{id}', [HomeController::class, 'aktifkanPelanggan'])->name('aktifkanPelanggan');

Route::get('/tarif', [HomeController::class, 'tarif'])->name('tarif');
Route::post('/tarif/update', [HomeController::class, 'updateTarif'])->name('updateTarif');

Route::get('/pemakaian', [HomeController::class, 'pemakaian'])->name('pemakaian');
Route::post('/pemakaian/table', [HomeController::class, 'pemakaianTable'])->name('pemakaianTable');