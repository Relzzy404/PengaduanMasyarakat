@extends('admin.layouts.app')

@section('content')
<div class="bg-white p-8 shadow-md rounded-xl">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Laporan Pengaduan</h1>

        <a href="{{ route('admin.laporan.csv') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
            📥 Download CSV
        </a>
    </div>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-50 border-b">
                <th class="p-3 text-left">Judul</th>
                <th class="p-3 text-left">Warga</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $p)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $p->judul }}</td>
                    <td class="p-3">{{ $p->user->name }}</td>
                    <td class="p-3">{{ ucfirst($p->status) }}</td>
                    <td class="p-3">{{ $p->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
