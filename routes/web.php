<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\DisplayController;

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

/* route full
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::get('/siswa/{id}/show', [SiswaController::class, 'show'])->name('siswa.show');
Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::patch('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
Route::delete('/siswa/destroy/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/antrian', [AntrianController::class, 'index'])->name('antrian.index');
Route::get('/antrian/data', [AntrianController::class, 'data'])->name('antrian.data');
Route::post('/antrian/store', [AntrianController::class, 'store'])->name('antrian.store');
Route::post('/antrian/generate', [AntrianController::class, 'generate'])->name('antrian.generate');

Route::get('/display', [DisplayController::class, 'index'])->name('display.index');