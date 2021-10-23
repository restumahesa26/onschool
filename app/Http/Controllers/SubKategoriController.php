<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Http\Request;

class SubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = SubKategori::all();

        return view('pages.admin.data-sub-kategori.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();

        return view('pages.admin.data-sub-kategori.create', [
            'kategories' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sub_kategori' => ['required', 'string', 'max:255'],
            'kategori_id' => ['required', 'numeric'],
        ]);

        SubKategori::create([
            'nama_sub_kategori' => $request->nama_sub_kategori,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('data-sub-kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        $item = SubKategori::findOrFail($id);
        $kategori = Kategori::all();

        return view('pages.admin.data-sub-kategori.edit', [
            'item' => $item, 'kategories' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sub_kategori' => ['required', 'string', 'max:255'],
            'kategori_id' => ['required', 'numeric'],
        ]);

        $item = SubKategori::findOrFail($id);

        $item->update([
            'nama_sub_kategori' => $request->nama_sub_kategori,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('data-sub-kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        $item = SubKategori::findOrFail($id);
        $item->delete();

        return redirect()->route('data-sub-kategori.index');
    }
}
