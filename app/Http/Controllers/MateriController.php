<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Materi;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Materi::all();

        return view('pages.admin.materi.index', [
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
        $sub_kategori = SubKategori::all();

        return view('pages.admin.materi.create', [
            'kategories' => $kategori, 'sub_kategories' => $sub_kategori
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
            'judul' => ['required', 'string', 'max:255'],
            'kategori_id' => ['required', 'numeric'],
            'sub_kategori_id' => ['required', 'numeric'],
            'kelas' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required','string', 'max:255'],
            'isi_materi' => ['required', 'string', 'max:255'],
            'thumbnail' => ['required', 'image'],
            'pdf' => ['required', 'mimes:pdf'],
        ]);

        $file = $request->file('thumbnail');
        $extension = $file->extension();
        $imageNames = uniqid('img_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/images/thumbnail', $file, $imageNames);
        $thumbnailpath = storage_path('app/public/images/thumbnail/' . $imageNames);
        Image::make($thumbnailpath)->resize(600, 400)->save($thumbnailpath);

        $file2 = $request->file('pdf');
        $extension2 = $file2->extension();
        $imageNames2 = uniqid('img_', microtime()) . '.' . $extension2;
        Storage::putFileAs('public/file/materi', $file2, $imageNames2);

        Materi::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'sub_kategori_id' => $request->sub_kategori_id,
            'kelas' => $request->kelas,
            'deskripsi' => $request->deskripsi,
            'isi_materi' => $request->isi_materi,
            'thumbnail' => $imageNames,
            'file' => $imageNames2
        ]);

        return redirect()->route('materi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Materi::findOrFail($id);
        $kategori = Kategori::all();
        $sub_kategori = SubKategori::all();

        return view('pages.admin.materi.edit', [
            'item' => $item, 'kategories' => $kategori, 'sub_kategories' => $sub_kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'kategori_id' => ['required', 'numeric'],
            'sub_kategori_id' => ['required', 'numeric'],
            'kelas' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required','string', 'max:255'],
            'isi_materi' => ['required', 'string', 'max:255']
        ]);

        $item = Materi::findOrFail($id);

        if ($request->thumbnail) {
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/images/thumbnail', $file, $imageNames);
            $thumbnailpath = storage_path('app/public/images/thumbnail/' . $imageNames);
            Image::make($thumbnailpath)->resize(600, 400)->save($thumbnailpath);
        }else {
            $imageNames = $item->thumbnail;
        }

        if ($request->pdf) {
            $file2 = $request->file('pdf');
            $extension2 = $file2->extension();
            $imageNames2 = uniqid('materi_', microtime()) . '.' . $extension2;
            Storage::putFileAs('public/file/materi', $file2, $imageNames2);
        }else {
            $imageNames2 = $item->pdf;
        }

        $item->update([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'sub_kategori_id' => $request->sub_kategori_id,
            'kelas' => $request->kelas,
            'deskripsi' => $request->deskripsi,
            'isi_materi' => $request->isi_materi,
            'thumbnail' => $imageNames,
            'file' => $imageNames2,
        ]);

        return redirect()->route('materi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Materi::findOrFail($id);

        $item->delete();

        return redirect()->route('materi.index');
    }
}
