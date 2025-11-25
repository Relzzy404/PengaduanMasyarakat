<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Notification;
use Illuminate\Http\Request;

class PengaduanAdminController extends Controller
{
    public function index()
    {
        $data = Pengaduan::latest()->get();
        return view('admin.pengaduan.index', compact('data'));
    }

    public function show($id)
    {
        $p = Pengaduan::findOrFail($id);
        return view('admin.pengaduan.show', compact('p'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai'
        ]);

        $p = Pengaduan::findOrFail($id);
        $p->status = $request->status;
        $p->save();

        // kirim notifikasi ke warga
        Notification::create([
        'user_id'       => $p->user_id,
        'pengaduan_id'  => $p->id,
        'judul'         => "Status Pengaduan Diperbarui",
        'pesan'         => "Pengaduan '{$p->judul}' sekarang berstatus: " . ucfirst($p->status),
        ]);

        return back()->with('success', 'Status berhasil diperbarui');
    }

    public function laporan()
    {
        $data = Pengaduan::with('user')->latest()->get();
        return view('admin.laporan.index', compact('data'));
    }

    public function exportCsv()
    {
        $fileName = 'laporan_pengaduan_'.date('Ymd_His').'.csv';

        $pengaduan = Pengaduan::with('user')->latest()->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['No', 'Judul', 'Isi Laporan', 'Nama Warga', 'Status', 'Tanggal'];

        $callback = function() use ($pengaduan, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            $no = 1;
            foreach ($pengaduan as $p) {
                fputcsv($file, [
                    $no++,
                    $p->judul,
                    $p->isi_laporan,
                    $p->user->name,
                    ucfirst($p->status),
                    $p->created_at->format('d-m-Y H:i')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function destroy($id)
    {
        Pengaduan::destroy($id);

        return redirect()
            ->route('admin.pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus');
    }
}
