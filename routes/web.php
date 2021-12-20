<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

// // Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::group(['middleware' => [
    'auth:sanctum',
    'verified',
]], function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('kategori');
    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy']);
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
    Route::post('/update-category/{id}', [CategoryController::class, 'update']);

    Route::get('/film', [FilmController::class, 'index'])->name('film');
    Route::post('/film', [FilmController::class, 'store']);
    Route::get('/delete-film/{id}', [FilmController::class, 'destroy']);
    Route::get('/edit-film/{id}', [FilmController::class, 'edit']);
    Route::post('/update-film/{id}', [FilmController::class, 'update']);

    Route::get('/order', [TransactionController::class, 'order'])->name('pemesanan');
    Route::post('/order', [TransactionController::class, 'store']);
    Route::get('/transaction', [TransactionController::class, 'transaction'])->name('transaksi');
    Route::get('/transaction-detail', [TransactionController::class, 'detail'])->name('detail-transaksi');
});

Route::get('/', [FrontController::class, 'index'])->name('front');
Route::get('/order-tiket/{id}', [TransactionController::class, 'orderTiket'])->name('order-tiket');
