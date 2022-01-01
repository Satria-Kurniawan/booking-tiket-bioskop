<?php

use App\Http\Controllers\API\FilmController;
use App\Http\Controllers\API\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/film', [FilmController::class, 'index']);
Route::post('/film', [FilmController::class, 'store']);
Route::get('/edit-film/{id}', [FilmController::class, 'edit']);
Route::post('/update-film/{id}', [FilmController::class, 'update']);
Route::delete('/delete-film/{id}', [FilmController::class, 'destroy']);

Route::get('/transaction', [TransactionController::class, 'transaction'])->name('transaksi');
