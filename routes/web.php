<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesaController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\KoperasiController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProfpegController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SosmedController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UkmController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'index']);

Route::prefix('profil')->group(function () {
    Route::get('/profil-pimpinan', [PageController::class, 'pimpinan'])->name('pimpinan');
    Route::get('/visimisi', [PageController::class, 'visimisi'])->name('visimisi');
    Route::get('/struktur-organisasi', [PageController::class, 'struktur_organisasi'])->name('struktur');
});

Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/berita/{news:slug}', [PageController::class, 'berita_detail'])->name('berita-detail');
Route::get('/koperasi', [PageController::class, 'koperasi'])->name('koperasi');
Route::get('/ukm', [PageController::class, 'ukm'])->name('ukm');
Route::get('/ukm/{id}', [PageController::class, 'ukm']);

Route::prefix('realcount/bolmong')->group(function () {
    Auth::routes([
        'register' => false,
        'reset'    => false,  // for resetting passwords
        'confirm'  => false, // for additional password confirmations
        'verify'   => false, // for email verification
    ]);
});

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

        Route::resource('permission', PermissionController::class);
        Route::resource('role', RoleController::class);
        Route::resource('user', UserController::class);
        Route::resource('koperasi', KoperasiController::class);
        Route::resource('ukm', UkmController::class);
        Route::post('api/fetch-desa', [UkmController::class, 'fetchDesa']);
        Route::resource('desa', DesaController::class);
    });
});
