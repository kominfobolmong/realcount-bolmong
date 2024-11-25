<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DesaController;
use App\Http\Controllers\Api\HasilBupatiController;
use App\Http\Controllers\Api\HasilGubernurController;
use App\Http\Controllers\Api\KabupatenController;
use App\Http\Controllers\Api\KecamatanController;
use App\Http\Controllers\Api\PaslonController;
use App\Http\Controllers\Api\TpsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('kabupaten')->group(function () {
        Route::get('/', [KabupatenController::class, 'index']);
        Route::get('/{id}', [KabupatenController::class, 'show']);
    });

    Route::prefix('kecamatan')->group(function () {
        Route::get('/', [KecamatanController::class, 'index']);
        Route::get('/{id}', [KecamatanController::class, 'show']);
    });

    Route::prefix('desa')->group(function () {
        Route::get('/', [DesaController::class, 'index']);
        Route::get('/{id}', [DesaController::class, 'show']);
    });

    Route::prefix('tps')->group(function () {
        Route::get('/total-dpt', [TpsController::class, 'getTotalDPT']);
        Route::get('/total-suara-tidak-sah', [TpsController::class, 'getTotalSuaraTidakSah']);
        Route::get('/', [TpsController::class, 'index']);
        Route::get('/{id}', [TpsController::class, 'show'])->where('id', '[0-9]+');
    });

    Route::prefix('paslon')->group(function () {
        Route::get('/', [PaslonController::class, 'index']);
        Route::get('/gubernur', [PaslonController::class, 'paslonGubernur']);
        Route::get('/bupati', [PaslonController::class, 'paslonBupati']);
    });

    Route::prefix(('gubernur'))->group(function () {
        Route::get('/hasil-perolehan-suara', [HasilGubernurController::class, 'getPerolehanSuara']);
        Route::get('/data', [HasilGubernurController::class, 'index']);
        Route::post('/batch', [HasilGubernurController::class, 'storeBatch']);
        Route::put('/batch', [HasilGubernurController::class, 'updateBatch']);
    });

    Route::prefix(('bupati'))->group(function () {
        Route::get('/hasil-perolehan-suara', [HasilBupatiController::class, 'getPerolehanSuara']);
        Route::get('/data', [HasilBupatiController::class, 'index']);
        Route::post('/batch', [HasilBupatiController::class, 'storeBatch']);
        Route::put('/batch', [HasilBupatiController::class, 'updateBatch']);
    });

});
