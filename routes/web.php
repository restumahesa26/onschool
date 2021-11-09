<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FounderController;
use App\Http\Controllers\GrupBelajarController;
use App\Http\Controllers\GrupBelajarPengumumanController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\LokakaryaController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SubKategoriController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/tentang', [HomeController::class, 'about'])->name('about');

Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

Route::prefix('/kursus')
    ->group(function() {
        Route::get('/', [KursusController::class, 'index'])->name('kursus.index');

        Route::get('/show/{id}', [KursusController::class, 'show'])->name('kursus.show');
    });

Route::prefix('/lokakarya')
    ->group(function() {
        Route::get('/', [LokakaryaController::class, 'index'])->name('lokakarya.index');

        Route::post('/store', [LokakaryaController::class, 'store'])->name('lokakarya.store')->middleware(['auth:sanctum', 'verified']);

        Route::get('/edit/{id}', [LokakaryaController::class, 'edit'])->name('lokakarya.edit')->middleware(['auth:sanctum', 'verified']);

        Route::put('/update/{id}', [LokakaryaController::class, 'update'])->name('lokakarya.update')->middleware(['auth:sanctum', 'verified']);

        Route::get('/detail/{id}', [LokakaryaController::class, 'show'])->name('lokakarya.show')->middleware(['auth:sanctum', 'verified']);

        Route::post('/detail/kirim-jawaban/{id}', [LokakaryaController::class, 'kirim_jawaban'])->name('lokakarya.kirim-jawaban')->middleware(['auth:sanctum', 'verified']);

        Route::delete('/detail/hapus-jawaban/{id}/{id2}', [LokakaryaController::class, 'hapus_jawaban'])->name('lokakarya.hapus-jawaban')->middleware(['auth:sanctum', 'verified']);
    });

Route::prefix('/jadwal')
    ->group(function() {
        Route::get('/', [JadwalController::class, 'index'])->name('jadwal.index')->middleware(['auth:sanctum', 'verified']);

        Route::get('/tambah', [JadwalController::class, 'create'])->name('jadwal.create')->middleware(['auth:sanctum', 'verified']);

        Route::post('/store', [JadwalController::class, 'store'])->name('jadwal.store')->middleware(['auth:sanctum', 'verified']);

        Route::get('/edit/{id}', [JadwalController::class, 'edit'])->name('jadwal.edit')->middleware(['auth:sanctum', 'verified']);

        Route::put('/update/{id}', [JadwalController::class, 'update'])->name('jadwal.update')->middleware(['auth:sanctum', 'verified']);

        Route::delete('/delete/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy')->middleware(['auth:sanctum', 'verified']);

    });

Route::prefix('grup-belajar')
->group(function () {
    Route::get('/', [GrupBelajarController::class, 'index'])->name('grup-belajar.index')->middleware(['auth:sanctum', 'verified']);

    Route::get('/tambah-view', [GrupBelajarController::class, 'tambah'])->name('grup-belajar.tambah')->middleware(['auth:sanctum', 'verified', 'guru']);

    Route::post('/store', [GrupBelajarController::class, 'store'])->name('grup-belajar.store')->middleware(['auth:sanctum', 'verified', 'guru']);

    Route::get('/show/kelas/{id}', [GrupBelajarController::class, 'show'])->name('grup-belajar.show')->middleware(['auth:sanctum', 'verified']);

    Route::post('/gabung-kelas', [GrupBelajarController::class, 'gabung_kelas'])->name('grup-belajar.gabung_kelas')->middleware(['auth:sanctum', 'verified']);

    Route::post('/pengumuman/tambah', [GrupBelajarPengumumanController::class, 'store'])->name('grup-belajar-pengumuman.store')->middleware(['auth:sanctum', 'verified', 'guru']);

    Route::put('/pengumuman/{id}/ubah', [GrupBelajarPengumumanController::class, 'update'])->name('grup-belajar-pengumuman.update')->middleware(['auth:sanctum', 'verified', 'guru']);

    Route::delete('/pengumuman/{id}/hapus', [GrupBelajarPengumumanController::class, 'delete'])->name('grup-belajar-pengumuman.delete')->middleware(['auth:sanctum', 'verified', 'guru']);

    Route::post('/pengumuman/komentar/{id}/{id2}/tambah', [GrupBelajarPengumumanController::class, 'store_komentar'])->name('grup-belajar-pengumuman.store-komentar')->middleware(['auth:sanctum', 'verified']);

    Route::put('/pengumuman/komentar/{id}/{id2}/ubah', [GrupBelajarPengumumanController::class, 'update_komentar'])->name('grup-belajar-pengumuman.update-komentar')->middleware(['auth:sanctum', 'verified']);

    Route::delete('/pengumuman/komentar/{id}/{id2}/delete', [GrupBelajarPengumumanController::class, 'delete_komentar'])->name('grup-belajar-pengumuman.delete-komentar')->middleware(['auth:sanctum', 'verified']);

});

Route::prefix('dashboard')
->middleware(['auth:sanctum', 'verified', 'admin'])
    ->group(function() {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('/data-siswa/ganti-ke-guru/{id}', [SiswaController::class, 'to_guru'])->name('data-siswa.to-guru');

        Route::resource('data-siswa', SiswaController::class);

        Route::resource('data-guru', GuruController::class);

        Route::resource('data-admin', AdminController::class);

        Route::resource('data-kategori', KategoriController::class);

        Route::resource('data-sub-kategori', SubKategoriController::class);

        Route::resource('materi', MateriController::class);

        Route::resource('founder', FounderController::class);
    });

require __DIR__.'/auth.php';
