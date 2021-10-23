<?php

namespace App\Http\Controllers;

use App\Models\Founder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class FounderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Founder::orderBy('urutan', 'ASC')->get();

        return view('pages.admin.founder.index', [
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
        return view('pages.admin.founder.create');
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
            'nama' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:255'],
            'urutan' => ['required', 'numeric', 'min:0'],
            'foto_profil' => ['required', 'image'],
        ]);

        $file = $request->file('foto_profil');
        $extension = $file->extension();
        $imageNames = uniqid('img_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/images/foto_profil', $file, $imageNames);
        $thumbnailpath = storage_path('app/public/images/foto_profil/' . $imageNames);
        Image::make($thumbnailpath)->resize(300, 300)->save($thumbnailpath);

        Founder::create([
            'nama' => $request->nama,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
            'urutan' => $request->urutan,
            'foto_profil' => $imageNames
        ]);

        return redirect()->route('founder.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function show(Founder $founder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Founder::findOrFail($id);

        return view('pages.admin.founder.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Founder::findOrFail($id);

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:255'],
            'urutan' => ['required', 'numeric', 'min:0']
        ]);

        if ($request->foto_profil) {
            $file = $request->file('foto_profil');
            $extension = $file->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/images/foto_profil', $file, $imageNames);
            $thumbnailpath = storage_path('app/public/images/foto_profil/' . $imageNames);
            Image::make($thumbnailpath)->resize(300, 300)->save($thumbnailpath);
        } else {
            $imageNames = $item->foto_profil;
        }

        $item->update([
            'nama' => $request->nama,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
            'urutan' => $request->urutan,
            'foto_profil' => $imageNames
        ]);

        return redirect()->route('founder.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Founder::findOrFail($id);

        $item->delete();

        return redirect()->route('founder.index');
    }
}
