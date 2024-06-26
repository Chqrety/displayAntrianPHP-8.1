<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('antrian/tv', [DisplayController::class, 'getData'])->name('antrian.tv.get');
Route::post('antrian/tv', [DisplayController::class, 'data'])->name('antrian.tv.data');
Route::delete('/antrian/tv', [DisplayController::class, 'deleteData'])->name('antrian.tv.delete');

