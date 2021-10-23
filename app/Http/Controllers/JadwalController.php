<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $items = Jadwal::where('user_id', Auth::user()->id)->orderByDesc('is_mendesak')->get();

        return view('pages.user.jadwal.index', [
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('pages.user.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => ['required', 'string', 'max:255'],
            'detail_kegiatan' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            'jam' => ['required']
        ]);

        Jadwal::create([
            'user_id' => Auth::user()->id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'detail_kegiatan' => $request->detail_kegiatan,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'is_mendesak' => $request->isMendesak,
        ]);

        return redirect()->route('jadwal.index');
    }

    public function edit($id)
    {
        $item = Jadwal::findOrFail($id);

        return view('pages.user.jadwal.edit', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => ['required', 'string', 'max:255'],
            'detail_kegiatan' => ['required', 'max:255'],
            'tanggal' => ['required', 'date'],
            'jam' => ['required']
        ]);

        $item = Jadwal::findOrFail($id);

        $item->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'detail_kegiatan' => $request->detail_kegiatan,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'is_mendesak' => $request->isMendesak
        ]);

        return redirect()->route('jadwal.index');
    }

    public function destroy($id)
    {
        $item = Jadwal::findOrFail($id);

        $item->delete();

        return redirect()->route('jadwal.index');
    }
}
