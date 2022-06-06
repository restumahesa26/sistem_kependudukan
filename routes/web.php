<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PendudukMeninggalController;
use App\Http\Controllers\PenggunaController;
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

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::middleware(['auth'])
    ->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('/profile', [DashboardController::class, 'edit_profile'])->name('profile.edit');

        Route::put('/profile/update', [DashboardController::class, 'update_profile'])->name('profile.update');

        Route::get('/laporan', [DashboardController::class, 'laporan'])->name('laporan');

        Route::prefix('data-penduduk')
            ->group(function() {

                Route::get('/penduduk-meninggal/kembalikan-ke-penduduk/{nik}', [PendudukMeninggalController::class, 'kembali_ke_penduduk'])->name('penduduk-meninggal.kembalikan-ke-penduduk');

                Route::get('/penduduk-meninggal/cetak-excel-penduduk-meninggal', [PendudukMeninggalController::class, 'export_penduduk_meninggal'])->name('penduduk-meninggal.cetak-excel-penduduk-meninggal');

                Route::resource('penduduk-meninggal', PendudukMeninggalController::class);

            });

        Route::get('/data-penduduk/{tipe}', [KeluargaController::class, 'index'])->name('data-penduduk.index');

        Route::get('/data-penduduk/keluarga/cetak-excel-semua-penduduk', [KeluargaController::class, 'export_semua_penduduk'])->name('data-penduduk.cetak-excel-semua-penduduk');

        Route::get('/data-penduduk/keluarga/cetak-excel-penduduk-miskin', [KeluargaController::class, 'export_penduduk_miskin'])->name('data-penduduk.cetak-excel-penduduk-miskin');

        Route::get('/data-penduduk/keluarga/cetak-excel-penduduk-pindah', [KeluargaController::class, 'export_penduduk_pindah'])->name('data-penduduk.cetak-excel-penduduk-pindah');

        Route::get('/data-penduduk/keluarga/cetak-excel-penduduk-pendatang', [KeluargaController::class, 'export_penduduk_pendatang'])->name('data-penduduk.cetak-excel-penduduk-pendatang');

        Route::get('/data-penduduk/keluarga/tambah-keluarga', [KeluargaController::class, 'create'])->name('data-penduduk.create');

        Route::post('/data-penduduk/keluarga/tambah-keluarga/simpan', [KeluargaController::class, 'store'])->name('data-penduduk.store');

        Route::get('/data-penduduk/keluarga/{no_kk}/tambah-anggota', [KeluargaController::class, 'create_anggota'])->name('data-penduduk.create-anggota');

        Route::post('/data-penduduk/{tipe}/ganti-status-penduduk', [KeluargaController::class, 'change_keluarga'])->name('data-penduduk.ganti-status-penduduk');

        Route::put('/data-penduduk/keluarga/{no_kk}/ubah-keluarga', [KeluargaController::class, 'update'])->name('data-penduduk.update');

        Route::post('/data-penduduk/keluarga/{no_kk}/tambah-anggota/simpan', [KeluargaController::class, 'store_anggota'])->name('data-penduduk.store-anggota');

        Route::put('/data-penduduk/keluarga/{nik}/ubah-anggota', [KeluargaController::class, 'update_anggota'])->name('data-penduduk.update-anggota');

        Route::delete('/data-penduduk/keluarga/{no_kk}/hapus-keluarga', [KeluargaController::class, 'destroy'])->name('data-penduduk.destroy');

        Route::delete('/data-penduduk/keluarga/{nik}/hapus-anggota', [KeluargaController::class, 'destroy_anggota'])->name('data-penduduk.destroy-anggota');

        Route::resource('data-pengguna', PenggunaController::class);

        Route::resource('data-pegawai', PegawaiController::class);

    });

require __DIR__.'/auth.php';
