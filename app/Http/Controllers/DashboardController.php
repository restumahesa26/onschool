<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $siswa = User::where('role', 'SISWA')->count();
        $guru = User::where('role', 'GURU')->count();
        $materi = Materi::count();

        return view('pages.admin.dashboard', [
            'siswa' => $siswa, 'guru' => $guru, 'materi' => $materi
        ]);
    }
}
