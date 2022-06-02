<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Lokakarya;
use App\Models\LokakaryaJawaban;
use App\Models\SubKategori;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokakaryaController extends Controller
{
    public function lokakarya()
    {
        $items = Lokakarya::where('user_id', '!=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $items2 = Lokakarya::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $sub_kategori = SubKategori::orderBy('kategori_id', 'ASC')->get();

        return ResponseFormatter::success(
            ['Lokakarya' => $items,
            'Lokakarya Saya' => $items2,
            'Kategori' => $sub_kategori], 'Data list Lokakarya berhasil diambil'
        );
    }

    public function tambah_lokakarya(Request $request)
    {
        try {
            $request->validate([
                'pertanyaan' => ['required', 'string', 'max:255']
            ]);

            $lokakarya = Lokakarya::create([
                'user_id' => Auth::user()->id,
                'sub_kategori_id' => $request->sub_kategori_id,
                'pertanyaan' => $request->pertanyaan
            ]);

            return ResponseFormatter::success(
                $lokakarya, 'Berhasil Menambahkan Lokakarya'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function ubah_lokakarya(Request $request)
    {
        try {
            $request->validate([
                'pertanyaan' => ['required', 'string', 'max:255']
            ]);

            $item = Lokakarya::findOrFail($request->lokakarya_id);

            $item->update([
                'sub_kategori_id' => $request->sub_kategori_id,
                'pertanyaan' => $request->pertanyaan
            ]);

            return ResponseFormatter::success(
                $item, 'Berhasil Mengubah Lokakarya'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function kirim_jawaban(Request $request)
    {
        try {
            $request->validate([
                'jawaban' => ['required', 'string', 'max:255']
            ]);

            $item = LokakaryaJawaban::create([
                'user_id' => Auth::user()->id,
                'lokakarya_id' => $request->lokakarya_id,
                'jawaban' => $request->jawaban
            ]);

            return ResponseFormatter::success(
                $item, 'Berhasil Mengirim Jawaban Lokakarya'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function hapus_jawaban(Request $request)
    {
        try {
            $item = LokakaryaJawaban::findOrFail($request->jawaban_id);

            $item->delete();

            return ResponseFormatter::success(
                $item, 'Berhasil Menghapus Jawaban Lokakarya'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }
}
