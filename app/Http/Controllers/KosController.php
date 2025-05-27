<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class KosController extends Controller
{
    public function index()
    {
        $result = Kos::latest()->get(); // atau sesuai logikamu
        return view('kos.index', compact('result'));

    }

    public function filter()
    {
        return view('kos.filter');
    }

    public function cariKos(KosSearchRequest $request)
    {
        $lokasi = $request->input('lokasi');

        $hasilPencarian = Kos::where('lokasi', 'like', '%' . $lokasi . '%')->get();

        if ($hasilPencarian->isEmpty()) {
            $pesanHasil = "Tidak ada kos yang ditemukan untuk lokasi: " . $lokasi;
            return view('kos.hasil', compact('pesanHasil'));
        }

        return view('kos.hasil', compact('hasilPencarian'));
    }
}
