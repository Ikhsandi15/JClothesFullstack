<?php

use App\Http\Controllers\PesananController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('v1')->group(function () {
    Route::get('pesan/{id}', [PesananController::class, 'index']);
    Route::post('pesan/{id}', [PesananController::class, 'store']);
    Route::get('/checkout', [PesananController::class, 'checkout']);
    Route::delete('/checkout/{id}', [PesananController::class, 'delete']);
    Route::get('/confirm-checkout', [PesananController::class, 'confirm']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/barang', [App\Http\Controllers\BarangController::class, 'showByCategory']);
    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index']);

    Route::prefix('/admin')->group(function () {
        Route::post('/login', [App\Http\Controllers\AdminController::class, 'login']);
        Route::get('/barang', [App\Http\Controllers\HomeController::class, 'allData']);
        Route::get('/barang/{id}', [App\Http\Controllers\BarangController::class, 'showById']);
        Route::post('/barang', [App\Http\Controllers\BarangController::class, 'store'])->middleware('auth:sanctum');
        Route::post('/barang/{id}', [App\Http\Controllers\BarangController::class, 'update'])->middleware('auth:sanctum');
        Route::delete('/barang/{id}', [App\Http\Controllers\BarangController::class, 'destroy'])->middleware('auth:sanctum');
    });
});
