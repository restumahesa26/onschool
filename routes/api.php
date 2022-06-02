<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\GrupBelajarController;
use App\Http\Controllers\API\JadwalController;
use App\Http\Controllers\API\LokakaryaController;
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

Route::post('login', [UserController::class, 'login']);

Route::post('register', [UserController::class, 'register']);

Route::get('/materi', [UserController::class, 'materi']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('logout', [UserController::class, 'logout']);

    Route::get('/grup-belajar', [GrupBelajarController::class, 'grupBelajar']);

    Route::get('/grup-belajar/detail', [GrupBelajarController::class, 'detail_grup']);

    Route::post('/grup-belajar/gabung-kelas', [GrupBelajarController::class, 'gabung_kelas']);

    Route::get('/lokakarya', [LokakaryaController::class, 'lokakarya']);

    Route::post('/lokakarya/tambah-lokakarya', [LokakaryaController::class, 'tambah_lokakarya']);

    Route::post('/lokakarya/ubah-lokakarya', [LokakaryaController::class, 'ubah_lokakarya']);

    Route::post('/lokakarya/kirim-jawaban', [LokakaryaController::class, 'kirim_jawaban']);

    Route::post('/lokakarya/hapus-jawaban', [LokakaryaController::class, 'hapus_jawaban']);

    Route::get('/jadwal', [JadwalController::class, 'jadwal']);

    Route::post('/jadwal/tambah-jadwal', [JadwalController::class, 'tambah_jadwal']);

    Route::post('/jadwal/ubah-jadwal', [JadwalController::class, 'ubah_jadwal']);

    Route::post('/jadwal/hapus-jadwal', [JadwalController::class, 'hapus_jadwal']);
});

Route::middleware(['auth:sanctum','guru'])->group(function() {
    Route::post('/grup-belajar/tambah-grup-belajar', [GrupBelajarController::class, 'tambah_grupBelajar']);

    Route::post('/grup-belajar/ubah-grup-belajar', [GrupBelajarController::class, 'ubah_grupBelajar']);

    Route::post('/grup-belajar/detail/tambah-pengumuman', [GrupBelajarController::class, 'tambah_pengumuman']);

    Route::post('/grup-belajar/detail/ubah-pengumuman', [GrupBelajarController::class, 'ubah_pengumuman']);

    Route::post('/grup-belajar/detail/hapus-pengumuman', [GrupBelajarController::class, 'hapus_pengumuman']);

    Route::post('/grup-belajar/detail/tambah-komentar-pengumuman', [GrupBelajarController::class, 'tambah_komentar_pengumuman']);

    Route::post('/grup-belajar/detail/ubah-komentar-pengumuman', [GrupBelajarController::class, 'ubah_komentar_pengumuman']);

    Route::post('/grup-belajar/detail/hapus-komentar-pengumuman', [GrupBelajarController::class, 'hapus_komentar_pengumuman']);
});
