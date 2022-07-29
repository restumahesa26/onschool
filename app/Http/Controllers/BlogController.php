<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=blog::paginate(10);
        $items = blog::all();

        return view('pages.admin.blog.index', [
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
        return view('pages.admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $thumbnailName = time() . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move('storage/blog/', $thumbnailName);
        } else {
            $thumbnailName = 'default.png';
        }

        if (!empty($request->konten)) {
            $storage = 'storage/content';
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            // $dom->loadHTML($request->konten, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            $dom->loadHTML($request->konten);
            libxml_clear_errors();
            $images = $dom->getElementsByTagName('img');
            foreach ($images as $img) {
                $src = $img->getAttribute('src');
                if (preg_match('/data:image/', $src)) {
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $group);
                    $mimetype = $group['mime'];
                    $fileNameContent = uniqid();
                    $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
                    $filepath = ("$storage/$fileNameContentRand.$mimetype");
                    $image = Image::make($src)
                        ->encode($mimetype, 100)
                        ->save($filepath);
                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                    $img->setAttribute('class', 'img-fluid');
                }
            }
        }

        $berita = new blog();
        $berita->judul = $request->input('judul');
        $berita->slug = Str::slug($request->input('judul'));
        $berita->thumbnail = $thumbnailName;
        if (!empty($request->konten)) {
            $berita->konten = $dom->saveHTML();
        } else {
            $berita->konten = " - ";
        }
        $berita->save();

        return redirect()->route('blog.index')->with('success', 'kegiatan mahasiswa berhasil dibuat !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = blog::findOrFail($id);

        return view('pages.admin.blog.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $berita = blog::findOrFail($id);
        if ($request->hasFile('thumbnail')) {
            $thumbnailName = time() . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move('storage/blog/', $thumbnailName);
        } else {
            $thumbnailName = $berita->thumbnail;
        }

        if (!empty($request->konten)) {
            $storage = 'storage/content';
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            // $dom->loadHTML($request->konten, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            $dom->loadHTML($request->konten);
            libxml_clear_errors();
            $images = $dom->getElementsByTagName('img');
            foreach ($images as $img) {
                $src = $img->getAttribute('src');
                if (preg_match('/data:image/', $src)) {
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $group);
                    $mimetype = $group['mime'];
                    $fileNameContent = uniqid();
                    $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
                    $filepath = ("$storage/$fileNameContentRand.$mimetype");
                    $image = Image::make($src)
                        ->encode($mimetype, 100)
                        ->save($filepath);
                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                    $img->setAttribute('class', 'img-fluid');
                }
            }
        }

        
        $berita->judul = $request->input('judul');
        $berita->slug = Str::slug($request->input('judul'));

        $berita->thumbnail = $thumbnailName;
        if (!empty($request->konten)) {
            $berita->konten = $dom->saveHTML();
        } else {
            $berita->konten = " - ";
        }
        $berita->save();

        return redirect()->route('blog.index')->with('success', 'kegiatan mahasiswa berhasil edit !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = blog::findOrFail($id);

        $item->delete();

        return redirect()->route('blog.index')->with('success', 'kegiatan mahasiswa berhasil dihapus !!');
    }
}
