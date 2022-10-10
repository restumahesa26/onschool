<?php

namespace App\Http\Controllers;

use App\Models\OnschoolTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OnschoolTrainingController extends Controller
{
    public function index()
    {
        return view('pages.user.onschool-training');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => ['required', 'mimes:jpg,jpeg,png'],
            'jenis' => 'required',
            'no_hp' => 'required|numeric'
        ]);

        $value = $request->file('bukti_pembayaran');
        $extension = $value->extension();
        $fileNames = uniqid('bukti_pembayaran_', microtime()) . '.' . $extension;
        Storage::putFileAs('public/file/bukti-pembayaran', $value, $fileNames);

        OnschoolTraining::create([
            'user_id' => Auth::user()->id,
            'jenis' => $request->jenis,
            'bukti_pembayaran' => $fileNames,
            'no_hp' => $request->no_hp,
            'status' => 'Belum Diverifikasi',
        ]);

        return redirect()->route('onschool-training.next');
    }

    public function next()
    {
        return view('pages.user.training-next');
    }

    public function adminIndex()
    {
        $items = OnschoolTraining::all();

        return view('pages.admin.onschool-training.index', compact('items'));
    }

    public function verifikasi($id)
    {
        $item = OnschoolTraining::findOrFail($id);

        $item->update([
            'status' => 'Sudah Diverifikasi'
        ]);

        return redirect()->route('onschool-training.admin-index');
    }

    public function batalVerifikasi($id)
    {
        $item = OnschoolTraining::findOrFail($id);

        $item->update([
            'status' => 'Belum Diverifikasi'
        ]);

        return redirect()->route('onschool-training.admin-index');
    }
}
