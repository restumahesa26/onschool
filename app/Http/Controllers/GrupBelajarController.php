<?php

namespace App\Http\Controllers;

use App\Models\GrupBelajar;
use App\Models\GrupBelajarSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GrupBelajarController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'GURU') {
            $items = GrupBelajar::where('user_id', Auth::user()->id)->get();

            return view('pages.user.grup-belajar.index', [
                'items' => $items
            ]);
        } elseif (Auth::user()->role == 'SISWA') {
            $items = DB::table('grup_belajars')
            ->join('grup_belajar_siswas', 'grup_belajars.id', '=', 'grup_belajar_siswas.grup_belajar_id')
            ->where('grup_belajar_siswas.user_id', Auth::user()->id)
            ->select('grup_belajars.*')
            ->get();

            return view('pages.user.grup-belajar.index', [
                'items' => $items
            ]);
        }elseif (Auth::user()->role == 'ADMIN') {
            $items = GrupBelajar::all();

            return view('pages.user.grup-belajar.index', [
                'items' => $items
            ]);
        }
    }

    public function tambah()
    {
        return view('pages.user.grup-belajar.create');
    }

    public function store(Request $request)
    {
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

        return redirect()->route('grup-belajar.show', $grup->id);
    }

    public function show($id)
    {
        if (Auth::user()->role === 'SISWA') {
            $grup = GrupBelajarSiswa::where('grup_belajar_id', $id)->where('user_id', Auth::user()->id)->first();
            $this->authorize('view', $grup);

            $item = GrupBelajar::where('id', $id)->first();

            return view('pages.user.grup-belajar.show', [
                'item' => $item
            ]);
        } elseif (Auth::user()->role === 'GURU') {
            $grup = GrupBelajar::where('id', $id)->where('user_id', Auth::user()->id)->first();
            $this->authorize('view', $grup);

            $item = GrupBelajar::where('id', $id)->first();

            return view('pages.user.grup-belajar.show', [
                'item' => $item
            ]);
        } elseif(Auth::user()->role === 'ADMIN') {
            $item = GrupBelajar::where('id', $id)->first();

            return view('pages.user.grup-belajar.show', [
                'item' => $item
            ]);
        }

    }

    public function gabung_kelas(Request $request)
    {
        $check = GrupBelajar::where('kode_kelas', $request->kode_kelas)->first();

        if ($check != NULL) {
            $check2 = GrupBelajarSiswa::where('user_id', Auth::user()->id)->where('grup_belajar_id', $check->id)->first();
        }

        if ($check != NULL) {
            if ($check2 == NULL) {
                GrupBelajarSiswa::create([
                    'user_id' => Auth::user()->id,
                    'grup_belajar_id' => $check->id
                ]);
            } else {
                return redirect()->route('grup-belajar.index')->with('error', 'Anda Sudah Bergabung');
            }
            return redirect()->route('grup-belajar.index');
        } else {
            return redirect()->route('grup-belajar.index')->with('not-found-class', 'Kelas Tidak Ditemukan');
        }

    }
}
