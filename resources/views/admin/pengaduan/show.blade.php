@extends('admin.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-8">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Detail Pengaduan</h1>
        <a href="/admin/pengaduan" class="text-blue-600 hover:underline text-sm">&larr; Kembali</a>
    </div>

    {{-- INFO DASAR --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        <div class="bg-gray-50 p-5 rounded-lg border">
            <p class="text-sm text-gray-500">Judul</p>
            <p class="text-lg font-semibold">{{ $p->judul }}</p>
        </div>

        <div class="bg-gray-50 p-5 rounded-lg border">
            <p class="text-sm text-gray-500">Tanggal Dibuat</p>
            <p class="text-lg font-semibold">{{ $p->created_at->format('d M Y') }}</p>
        </div>

        <div class="bg-gray-50 p-5 rounded-lg border">
            <p class="text-sm text-gray-500">Warga</p>
            <p class="text-lg font-semibold">{{ $p->user->name }}</p>
        </div>

        <div class="bg-gray-50 p-5 rounded-lg border">
            <p class="text-sm text-gray-500">Status Saat Ini</p>
            <span class="px-3 py-1 rounded-full text-sm font-semibold
                @if($p->status=='menunggu') bg-yellow-100 text-yellow-700
                @elseif($p->status=='diproses') bg-blue-100 text-blue-700
                @else bg-green-100 text-green-700 @endif">
                {{ ucfirst($p->status) }}
            </span>
        </div>
    </div>

    {{-- ISI LAPORAN --}}
    <div class="mb-8">
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Isi Laporan</h2>
        <p class="text-gray-700 leading-relaxed bg-gray-50 rounded-lg p-5 border">
            {{ $p->isi_laporan }}
        </p>
    </div>

    {{-- FORM STATUS + HAPUS --}}
    <div class="bg-blue-50 border border-blue-200 p-6 rounded-lg flex flex-col md:flex-row items-center gap-4 mb-8">

<form method="POST" action="/admin/pengaduan/{{ $p->id }}/status" class="flex items-center gap-3">
    @csrf
    <select name="status" class="p-2 border rounded-lg focus:ring focus:ring-blue-300">
        <option value="menunggu" {{ $p->status=='menunggu' ? 'selected' : '' }}>
            Menunggu
        </option>
        <option value="diproses" {{ $p->status=='diproses' ? 'selected' : '' }}>
            Diproses
        </option>
        <option value="selesai" {{ $p->status=='selesai' ? 'selected' : '' }}>
            Selesai
        </option>
    </select>

    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
        Update Status
    </button>
</form>


        <form method="POST" action="/admin/pengaduan/{{ $p->id }}"
              onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
                Hapus Pengaduan
            </button>
        </form>
    </div>
    </div>

</div>
@endsection
