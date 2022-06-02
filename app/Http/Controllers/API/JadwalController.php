<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function jadwal()
    {
        $items = Jadwal::where('user_id', Auth::user()->id)->orderByDesc('is_mendesak')->get();

        return ResponseFormatter::success(
            $items, 'Data list Jadwal berhasil diambil'
        );
    }

    public function tambah_jadwal(Request $request)
    {
        try {
            $request->validate([
                'nama_kegiatan' => ['required', 'string', 'max:255'],
                'detail_kegiatan' => ['required', 'string', 'max:255'],
                'tanggal' => ['required', 'date'],
                'jam' => ['required']
            ]);

            $jadwal = Jadwal::create([
                'user_id' => Auth::user()->id,
                'nama_kegiatan' => $request->nama_kegiatan,
                'detail_kegiatan' => $request->detail_kegiatan,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'is_mendesak' => $request->isMendesak,
            ]);

            return ResponseFormatter::success(
                $jadwal, 'Berhasil Menambahkan Jadwal'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function ubah_jadwal(Request $request)
    {
        try {
            $request->validate([
                'nama_kegiatan' => ['required', 'string', 'max:255'],
                'detail_kegiatan' => ['required', 'max:255'],
                'tanggal' => ['required', 'date'],
                'jam' => ['required']
            ]);

            $item = Jadwal::findOrFail($request->jadwal_id);

            $item->update([
                'nama_kegiatan' => $request->nama_kegiatan,
                'detail_kegiatan' => $request->detail_kegiatan,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'is_mendesak' => $request->isMendesak
            ]);

            return ResponseFormatter::success(
                $item, 'Berhasil Mengubah Jadwal'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function hapus_jadwal(Request $request)
    {
        try {
            $item = Jadwal::findOrFail($request->jadwal_id);

            $item->delete();

            return ResponseFormatter::success(
                $item, 'Berhasil Menghapus Jadwal'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }
}
