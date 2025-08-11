<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\PendampinganController;

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
    return view('landing_page');
});

Route::get('/landing-page', function () {
    return view('landing_page');
});


Auth::routes();


Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/dashboard-admin', [DashboardController::class, 'dashboard_admin'])->name('admin.dashboard');
    Route::get('/pengajuan-layanan-hukum', [AdminController::class, 'pengajuan_layanan_hukum']);
    Route::get('/kelola-jadwal-pendampingan', [AdminController::class, 'jadwal_pendampingan']);
    Route::get('/detail-pengajuan-layanan-hukum/{id}', [AdminController::class, 'detail_pengajuan_layanan_hukum']);
    Route::get('/detail-jadwal/{id}', [AdminController::class, 'jadwal_detail']);
    Route::put('/terima-pengajuan/{id}', [AdminController::class, 'terima_pengajuan']);
    Route::put('/tolak-pengajuan/{id}', [AdminController::class, 'tolak_pengajuan']);
    Route::post('/atur-jadwal', [AdminController::class, 'atur_jadwal']);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard_users'])->name('users.dashboard');
    Route::get('/ajukan-konsultasi', [KonsultasiController::class, 'ajukan_konsultasi']);
    Route::post('/pengajuan-konsultasi', [KonsultasiController::class, 'submit']);
    Route::get('/ajukan-pendampingan', [PendampinganController::class, 'ajukan_pendampingan']);
    Route::get('/riwayat-layanan-pendampingan', [PendampinganController::class, 'riwayat_layanan']);
    Route::get('/detail-riwayat-layanan-pendampingan/{id}', [PendampinganController::class, 'detail_riwayat_layanan']);
    Route::post('/pengajuan-pendampingan', [PendampinganController::class, 'pengajuan_pendampingan']);
});
