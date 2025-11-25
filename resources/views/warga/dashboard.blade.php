@extends('warga.layouts.app')

@section('content')

<div class="bg-white shadow-lg rounded-xl p-8 mb-8 border border-gray-200">
    <h1 class="text-3xl font-semibold text-gray-800">
        Halo, {{ auth()->user()->name }} 👋
    </h1>
    <p class="text-gray-600 mt-2">Selamat datang di sistem pengaduan masyarakat.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">

    <a href="/warga/pengaduan/buat"
       class="bg-white p-8 shadow-md rounded-xl border hover:shadow-xl transition">
        📄 Buat Pengaduan
    </a>

    <a href="/warga/pengaduan-saya"
       class="bg-white p-8 shadow-md rounded-xl border hover:shadow-xl transition">
        📋 Pengaduan Saya
    </a>

    <a href="/warga/status-laporan"
       class="bg-white p-8 shadow-md rounded-xl border hover:shadow-xl transition">
        📊 Status Laporan
    </a>

</div>

@endsection
