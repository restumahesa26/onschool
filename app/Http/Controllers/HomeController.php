<?php

namespace App\Http\Controllers;

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
}
