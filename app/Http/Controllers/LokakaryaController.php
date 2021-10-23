<?php

namespace App\Http\Controllers;

use App\Models\Lokakarya;
use App\Models\LokakaryaJawaban;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokakaryaController extends Controller
{
    public function index()
    {
        $items = Lokakarya::where('user_id', '!=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $items2 = Lokakarya::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $sub_kategori = SubKategori::orderBy('kategori_id', 'ASC')->get();

        return view('pages.user.lokakarya.index', [
            'items' => $items, 'sub_kategoris' => $sub_kategori, 'items2' => $items2
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => ['required', 'string', 'max:255']
        ]);

        Lokakarya::create([
            'user_id' => Auth::user()->id,
            'sub_kategori_id' => $request->sub_kategori_id,
            'pertanyaan' => $request->pertanyaan
        ]);

        return redirect()->route('lokakarya.index');
    }

    public function edit($id)
    {
        $item = Lokakarya::findOrFail($id);
        $sub_kategori = SubKategori::orderBy('kategori_id', 'ASC')->get();

        return view('pages.user.lokakarya.edit', [
            'item' => $item, 'sub_kategoris' => $sub_kategori
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => ['required', 'string', 'max:255']
        ]);

        $item = Lokakarya::findOrFail($id);

        $item->update([
            'user_id' => Auth::user()->id,
            'sub_kategori_id' => $request->sub_kategori_id,
            'pertanyaan' => $request->pertanyaan
        ]);

        return redirect()->route('lokakarya.index');
    }

    public function show($id)
    {
        $item = Lokakarya::findOrFail($id);
        $item2 = LokakaryaJawaban::where('lokakarya_id', $id)->orderBy('created_at', 'DESC')->get();

        return view('pages.user.lokakarya.show', [
            'item' => $item, 'item2' => $item2
        ]);
    }

    public function kirim_jawaban(Request $request, $id)
    {
        $request->validate([
            'jawaban' => ['required', 'string', 'max:255']
        ]);

        LokakaryaJawaban::create([
            'user_id' => Auth::user()->id,
            'lokakarya_id' => $id,
            'jawaban' => $request->jawaban
        ]);

        return redirect()->route('lokakarya.show', $id);
    }

    public function hapus_jawaban($id, $id2)
    {
        $item = LokakaryaJawaban::findOrFail($id);

        $item->delete();

        return redirect()->route('lokakarya.show', $id2);
    }
}
