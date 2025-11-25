@extends('admin.layouts.app')

@section('content')
<div class="bg-white shadow-md p-8 rounded-xl">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Manajemen Pengaduan</h1>
    </div>


    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-50 border-b">
                <th class="p-3 text-left">Judul</th>
                <th class="p-3 text-left">Warga</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Tanggal</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($data as $p)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $p->judul }}</td>
                    <td class="p-3">{{ $p->user->name }}</td>
                    <td class="p-3">
                        <span class="px-3 py-1 rounded-full text-sm font-medium
                            @if($p->status=='menunggu') bg-yellow-100 text-yellow-700
                            @elseif($p->status=='diproses') bg-blue-100 text-blue-700
                            @else bg-green-100 text-green-700 @endif">
                            {{ ucfirst($p->status) }}
                        </span>
                    </td>
                    <td class="p-3">{{ $p->created_at->format('d M Y') }}</td>
                    <td class="p-3 text-center">
                        <a href="/admin/pengaduan/{{ $p->id }}"
                           class="text-blue-600 font-semibold hover:underline">Lihat</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-500 p-4">Belum ada pengaduan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
