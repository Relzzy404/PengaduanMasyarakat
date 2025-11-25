<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'total'   => Pengaduan::count(),
            'pending' => Pengaduan::where('status', 'menunggu')->count(),
            'diproses'=> Pengaduan::where('status', 'diproses')->count(),
            'selesai' => Pengaduan::where('status', 'selesai')->count(),
            'recent'  => Pengaduan::latest()->take(5)->get(),
        ]);
    }
  
}
