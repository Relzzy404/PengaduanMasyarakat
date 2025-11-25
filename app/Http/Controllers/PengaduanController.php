<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function create()
    {
        return view('warga.buat_pengaduan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi_laporan' => 'required',
            'lokasi' => 'required',
            'foto' => 'image|max:2048'
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('pengaduan', 'public');
        }

        Pengaduan::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'isi_laporan' => $request->isi_laporan,
            'lokasi' => $request->lokasi,
            'foto' => $foto,
        ]);

        return redirect('/warga/pengaduan-saya')
            ->with('success', 'Pengaduan berhasil diajukan!');
    }

    public function index()
    {
        $data = Pengaduan::where('user_id', Auth::id())->get();
        return view('warga.pengaduan_saya', compact('data'));
    }

     public function status()
    {
        $data = Pengaduan::where('user_id', Auth::id())->get();
        return view('warga.status_laporan', compact('data'));
    }
}
