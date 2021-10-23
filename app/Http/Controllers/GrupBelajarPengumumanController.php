<?php

namespace App\Http\Controllers;

use App\Models\GrupBelajarPengumuman;
use App\Models\GrupBelajar;
use App\Models\GrupBelajarPengumumanKomentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GrupBelajarPengumumanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'isi_pengumuman' => ['required', 'string', 'max:255']
        ]);

        $item = GrupBelajar::where('id', $request->grup_belajar_id)->first();
        $this->authorize('store', $item);

        GrupBelajarPengumuman::create([
            'user_id' => Auth::user()->id,
            'grup_belajar_id' => $request->grup_belajar_id,
            'isi_pengumuman' => $request->isi_pengumuman
        ]);

        return redirect()->route('grup-belajar.show', $request->grup_belajar_id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'isi_pengumuman_2' => ['required', 'string', 'max:255']
        ]);

        $item = GrupBelajarPengumuman::findOrFail($id);

        $item->update([
            'isi_pengumuman' => $request->isi_pengumuman_2
        ]);

        return redirect()->route('grup-belajar.show', $request->grup_belajar_id);
    }

    public function delete($id)
    {
        $item = GrupBelajarPengumuman::findOrFail($id);
        $idd = $item->grup_belajar_id;

        $item->delete();
        return redirect()->route('grup-belajar.show', $idd);
    }

    public function store_komentar(Request $request, $id, $id2)
    {
        $request->validate([
            'komentar' => ['required', 'string', 'max:255']
        ]);

        GrupBelajarPengumumanKomentar::create([
            'user_id' => Auth::user()->id,
            'grup_belajar_id' => $id2,
            'pengumuman_id' => $id,
            'komentar' => $request->komentar
        ]);

        return redirect()->route('grup-belajar.show', $id2);
    }

    public function update_komentar(Request $request, $id, $id2)
    {

        $request->validate([
            'komentar' => ['required', 'string', 'max:255']
        ]);

        $item = GrupBelajarPengumumanKomentar::findOrFail($id);
        $this->authorize('update', $item);

        $item->update([
            'komentar' => $request->komentar
        ]);

        return redirect()->route('grup-belajar.show', $id2);
    }

    public function delete_komentar($id, $id2)
    {
        $item = GrupBelajarPengumumanKomentar::findOrFail($id);
        $this->authorize('update', $item);

        $item->delete();

        return redirect()->route('grup-belajar.show', $id2);
    }
}
