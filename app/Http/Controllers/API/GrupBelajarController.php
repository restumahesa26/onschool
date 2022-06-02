<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\GrupBelajar;
use App\Models\GrupBelajarPengumuman;
use App\Models\GrupBelajarPengumumanKomentar;
use App\Models\GrupBelajarSiswa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GrupBelajarController extends Controller
{
    public function tambah_grupBelajar(Request $request)
    {
        try {
            $request->validate([
                'nama_grup' => ['required', 'string', 'max:255'],
                'kelas' => ['required', 'string', 'max:255']
            ]);

            $kode_kelas = rand();

            $grup = GrupBelajar::create([
                'nama_grup' => $request->nama_grup,
                'kelas' => $request->kelas,
                'user_id' => Auth::user()->id,
                'kode_kelas' => $kode_kelas
            ]);

            return ResponseFormatter::success(
                $grup, 'Berhasil Membuat Grup Belajar Baru'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function ubah_grupBelajar(Request $request)
    {
        try {
            $request->validate([
                'nama_grup' => ['required', 'string', 'max:255'],
                'kelas' => ['required', 'string', 'max:255']
            ]);

            $grup = GrupBelajar::findOrFail($request->grup_belajar_id);

            $grup->update([
                'nama_grup' => $request->nama_grup,
                'kelas' => $request->kelas,
            ]);

            return ResponseFormatter::success(
                $grup, 'Berhasil Mengubah Grup Belajar'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function grupBelajar()
    {
        if (Auth::user()->role == 'GURU') {
            $items = GrupBelajar::where('user_id', Auth::user()->id)->get();

            return ResponseFormatter::success(
                $items, 'Data list Grup Belajar berhasil diambil'
            );
        } elseif (Auth::user()->role == 'SISWA') {
            $items = DB::table('grup_belajars')
            ->join('grup_belajar_siswas', 'grup_belajars.id', '=', 'grup_belajar_siswas.grup_belajar_id')
            ->where('grup_belajar_siswas.user_id', Auth::user()->id)
            ->select('grup_belajars.*')
            ->get();

            return ResponseFormatter::success(
                $items, 'Data list Grup Belajar berhasil diambil'
            );
        }
    }

    public function gabung_kelas(Request $request)
    {
        try {
            $check = GrupBelajar::where('kode_kelas', $request->kode_kelas)->first();

            if ($check != NULL) {
                $check2 = GrupBelajarSiswa::where('user_id', Auth::user()->id)->where('grup_belajar_id', $check->id)->first();
            }

            if ($check != NULL) {
                if ($check2 == NULL) {
                    $grup = GrupBelajarSiswa::create([
                        'user_id' => Auth::user()->id,
                        'grup_belajar_id' => $check->id
                    ]);
                } else {
                    return ResponseFormatter::error(['kode_kelas' => $request->kode_kelas], 'Anda Sudah Gabung Kelas Sebelumnya');
                }
                return ResponseFormatter::success(
                    $grup, 'Data list Grup Belajar berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(['kode_kelas' => $request->kode_kelas], 'Kelas Tidak Ditemukan');
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function detail_grup(Request $request)
    {
        try {
            if (Auth::user()->role === 'SISWA') {
                $grup = GrupBelajarSiswa::where('grup_belajar_id', $request->id)->where('user_id', Auth::user()->id)->first();
                $this->authorize('view', $grup);

                $item = GrupBelajar::with(['user','grup_belajar_pengumuman','grup_belajar_siswa'])->where('id', $request->id)->first();

                return ResponseFormatter::success(
                    $item, 'Data Detail Grup Belajar berhasil diambil'
                );
            } elseif (Auth::user()->role === 'GURU') {
                $grup = GrupBelajar::where('id', $request->id)->where('user_id', Auth::user()->id)->first();
                $this->authorize('view', $grup);

                $item = GrupBelajar::with(['user','grup_belajar_pengumuman','grup_belajar_siswa'])->where('id', $request->id)->first();

                return ResponseFormatter::success(
                    $item, 'Data Detail Grup Belajar berhasil diambil'
                );
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }

    }

    public function tambah_pengumuman(Request $request)
    {
        try {
            $request->validate([
                'isi_pengumuman' => ['required', 'string', 'max:255']
            ]);

            $item = GrupBelajar::where('id', $request->grup_belajar_id)->first();
            $this->authorize('store', $item);

            $grup = GrupBelajarPengumuman::create([
                'user_id' => Auth::user()->id,
                'grup_belajar_id' => $request->grup_belajar_id,
                'isi_pengumuman' => $request->isi_pengumuman
            ]);

            return ResponseFormatter::success(
                $grup, 'Berhasil Menambahkan Pengumuman'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function ubah_pengumuman(Request $request)
    {
        try {
            $request->validate([
                'isi_pengumuman' => ['required', 'string', 'max:255']
            ]);

            $item = GrupBelajarPengumuman::findOrFail($request->grup_belajar_pengumuman_id);

            $item->update([
                'isi_pengumuman' => $request->isi_pengumuman
            ]);

            return ResponseFormatter::success(
                $item, 'Berhasil Mengubah Pengumuman'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function hapus_pengumuman(Request $request)
    {
        try {
            $item = GrupBelajarPengumuman::findOrFail($request->grup_belajar_pengumuman_id);

            GrupBelajarPengumumanKomentar::where('pengumuman_id', $request->grup_belajar_pengumuman_id)->delete();

            $item->delete();

            return ResponseFormatter::success(
                $item, 'Berhasil Menghapus Pengumuman'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function tambah_komentar_pengumuman(Request $request)
    {
        try {
            $request->validate([
                'komentar' => ['required', 'string', 'max:255']
            ]);

            $item = GrupBelajarPengumumanKomentar::create([
                'user_id' => Auth::user()->id,
                'grup_belajar_id' => $request->grup_belajar_id,
                'pengumuman_id' => $request->grup_belajar_pengumuman_id,
                'komentar' => $request->komentar
            ]);

            return ResponseFormatter::success(
                $item, 'Berhasil Menambah Komentar Pada Pengumuman'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function ubah_komentar_pengumuman(Request $request)
    {
        try {
            $request->validate([
                'komentar' => ['required', 'string', 'max:255']
            ]);

            $item = GrupBelajarPengumumanKomentar::findOrFail($request->komentar_pengumuman_id);
            $this->authorize('update', $item);

            $item->update([
                'komentar' => $request->komentar
            ]);

            return ResponseFormatter::success(
                $item, 'Berhasil Mengubah Komentar Pada Pengumuman'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function hapus_komentar_pengumuman(Request $request)
    {
        try {
            $item = GrupBelajarPengumumanKomentar::findOrFail($request->komentar_pengumuman_id);
            $this->authorize('update', $item);

            $item->delete();

            return ResponseFormatter::success(
                $item, 'Berhasil Menghapus Komentar Pada Pengumuman'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }
}
