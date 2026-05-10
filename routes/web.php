<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpesialisController;
use App\Http\Controllers\DokterController;

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