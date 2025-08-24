<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\PendampinganController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LaporanController;

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
    // Route::get('/detail-pengajuan-layanan-hukum/{id}', [AdminController::class, 'detail_pengajuan_layanan_hukum']);
    Route::get('/detail-jadwal/{id}', [AdminController::class, 'jadwal_detail']);
    Route::get('/detail-jadwal-kegiatan/{id}', [AdminController::class, 'detail_kegiatan']);
    Route::put('/terima-pengajuan/{id}', [AdminController::class, 'terima_pengajuan']);
    Route::put('/edit-detail-kegiatan/{id}', [AdminController::class, 'edit_detail_kegiatan']);
    Route::put('/edit-jadwal/{id}', [AdminController::class, 'edit_jadwal']);
    Route::put('/update-kegiatan/{id}', [AdminController::class, 'update_kegiatan']);
    Route::put('/update-jadwal/{id}', [AdminController::class, 'update_jadwal']);
    Route::put('/edit-dokumen/{id}', [AdminController::class, 'edit_dokumen']);
    Route::put('/tolak-pengajuan/{id}', [AdminController::class, 'tolak_pengajuan']);
    Route::put('/edit-data/{id}', [ProfilController::class, 'edit_data']);
    Route::put('/edit-foto/{id}', [ProfilController::class, 'edit_foto']);
    Route::post('/atur-jadwal', [AdminController::class, 'atur_jadwal']);
    Route::put('/jawab-konsultasi/{id}', [AdminController::class, 'jawab_konsultasi']);
    Route::post('/tambah-jadwal', [AdminController::class, 'tambah_jadwal']);
    Route::post('/tambah-dokumen', [AdminController::class, 'tambah_dokumen']);
    Route::get('/profil', [ProfilController::class, 'profil']);
    Route::get('/dokumen', [AdminController::class, 'dokumen']);
    Route::delete('/hapus-dokumen/{id}', [AdminController::class, 'hapus_dokumen']);
    Route::get('/laporan', [LaporanController::class, 'laporan']);
    Route::get('/cetak-laporan-konsultasi/{tglawal}/{tglakhir}', [LaporanController::class, 'laporan_konsultasi']);
    Route::get('/cetak-laporan-pendampingan/{tglawal}/{tglakhir}', [LaporanController::class, 'laporan_pendampingan']);
    Route::get('/cetak-laporan-jadwal-pendampingan/{tglawal}/{tglakhir}', [LaporanController::class, 'laporan_jadwal']);
    Route::get('/konsultasi-masuk', [AdminController::class, 'konsultasi_masuk']);
    
    Route::get('/notifikasi/konsultasi/{id}', [AdminController::class, 'bacaNotifikasi'])
    ->name('konsultasi.notifikasi');
    Route::get('/detail_konsultasi_masuk/{id}', [AdminController::class, 'detail'])
    ->name('detail.konsultasi');
    Route::get('/notifikasi/pendampingan/{id}', [AdminController::class, 'bacaNotifikasiPendampingan'])
    ->name('pendampingan.notifikasi');
    Route::get('/detail-pengajuan-layanan-hukum/{id}', [AdminController::class, 'detail_pengajuan_layanan_hukum'])
    ->name('detail.pendampingan');
    
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard_users'])->name('users.dashboard');
    Route::get('/ajukan-konsultasi', [KonsultasiController::class, 'ajukan_konsultasi']);
    Route::post('/pengajuan-konsultasi', [KonsultasiController::class, 'pengajuan_konsultasi']);
    Route::post('/konsultasi-otomatis', [KonsultasiController::class, 'konsultasi_otomatis']);
    Route::get('/ajukan-pendampingan', [PendampinganController::class, 'ajukan_pendampingan']);
    Route::get('/riwayat-layanan-pendampingan', [PendampinganController::class, 'riwayat_layanan']);
    Route::get('/detail-riwayat-layanan-pendampingan/{id}', [PendampinganController::class, 'detail_riwayat_layanan'])
    ->name('detail.pendampinganUser');
    Route::post('/pengajuan-pendampingan', [PendampinganController::class, 'pengajuan_pendampingan']);
    Route::get('/jadwal-pendampingan', [PendampinganController::class, 'jadwal_pendampingan']);
    Route::get('/detail-jadwal-pendampingan/{id}', [PendampinganController::class, 'jadwal_detail']);
    Route::get('/detail-jadwal-kegiatan/{id}', [PendampinganController::class, 'detail_jadwal_kegiatan'])
    ->name('detail.jadwalUser');
    Route::get('/dokumen-hukum', [AdminController::class, 'dokumen_hukum']);
    Route::get('/profil', [ProfilController::class, 'profil']);
    Route::get('/riwayat-konsultasi', [KonsultasiController::class, 'riwayat_layanan']);
    Route::put('/edit-data/{id}', [ProfilController::class, 'edit_data']);
    Route::put('/edit-foto/{id}', [ProfilController::class, 'edit_foto']);
    Route::get('/notifikasi/konsultasiuser/{id}', [KonsultasiController::class, 'bacaNotifikasiUser'])
    ->name('user.konsultasi');
    Route::get('/detail_konsultasiuser/{id}', [KonsultasiController::class, 'detail'])
    ->name('konsultasiUser.detail');
    Route::get('/notifikasi/pendampinganuser/{id}', [PendampinganController::class, 'bacaNotifikasiPendampinganUser'])
    ->name('pendampingan.user');

    Route::get('/notifikasi/jadwaluser/{id}', [PendampinganController::class, 'bacaNotifikasiJadwalUser'])
    ->name('jadwal.user');
    
});
