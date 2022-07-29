<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Founder;
use App\Models\Materi;
use App\Models\SubKategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $materi = Materi::all();
        $founder = Founder::orderBy('urutan', 'ASC')->get();
        $kategori = SubKategori::all();

        return view('pages.home', [
            'materies' => $materi, 'founders' => $founder, 'kategories' => $kategori
        ]);
    }

    public function about()
    {
        $founder = Founder::orderBy('urutan', 'ASC')->get();

        return view('pages.tentang', [
            'founders' => $founder
        ]);
    }

    public function Blogs()
    {
        $items = blog::paginate(10);
        $items = blog::all();

        return view('pages.blog', [
            'items' => $items
        ]);
    }

    public function Blogss( $slug)
    {
        $item = blog::where('slug' , '=' , $slug)->first();
        $recent = blog::latest('created_at')->paginate(3);

        return view('pages.blog-show', [
            'item' => $item, 'recents' => $recent
        ]);
    }
}
