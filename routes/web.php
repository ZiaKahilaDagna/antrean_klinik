<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpesialisController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AntrianController;

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

Route::get('/spesialis', [SpesialisController::class, 'index'])->name('spesialis.index');
Route::get('/spesialis/create', [SpesialisController::class, 'create'])->name('spesialis.create');
Route::post('/spesialis', [SpesialisController::class, 'store'])->name('spesialis.store');
Route::get('/spesialis/{id}/edit', [SpesialisController::class, 'edit'])->name('spesialis.edit');
Route::put('/spesialis/{id}', [SpesialisController::class, 'update'])->name('spesialis.update');
Route::delete('/spesialis/{id}', [SpesialisController::class, 'destroy'])->name('spesialis.destroy');

Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokter.create');
Route::post('/dokter', [DokterController::class, 'store'])->name('dokter.store');
Route::get('/dokter/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
Route::put('/dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');
Route::delete('/dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');

Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');
Route::get('/pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');

Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

Route::get('/antrian', [AntrianController::class, 'index'])->name('antrian.index');
Route::get('/antrian/create', [AntrianController::class, 'create'])->name('antrian.create');
Route::post('/antrian', [AntrianController::class, 'store'])->name('antrian.store');
Route::get('/antrian/{id}/edit', [AntrianController::class, 'edit'])->name('antrian.edit');
Route::put('/antrian/{id}', [AntrianController::class, 'update'])->name('antrian.update');
Route::delete('/antrian/{id}', [AntrianController::class, 'destroy'])->name('antrian.destroy');