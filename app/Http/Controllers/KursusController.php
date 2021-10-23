<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KursusController extends Controller
{
    public function index()
    {
        $items = Materi::inRandomOrder()->get();

        return view('pages.user.kursus.index', [
            'items' => $items
        ]);
    }

    public function show($id)
    {
        $item = Materi::findOrFail($id);

        return view('pages.user.kursus.show', [
            'item' => $item
        ]);
    }
}
