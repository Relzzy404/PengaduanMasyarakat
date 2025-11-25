<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Status Laporan</title>
</head>

<body class="bg-gray-100 min-h-screen p-10">

    <!-- TITLE + BUTTON -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-800">📊 Status Laporan</h1>

        <a href="/warga/dashboard"
           class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md transition flex items-center gap-2">
            ← Kembali ke Dashboard
        </a>
    </div>

    <!-- LIST KARTU STATUS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($data as $p)
        <div class="bg-white p-6 rounded-2xl shadow-md border hover:shadow-xl transition">

            <!-- FOTO -->
            @if ($p->foto)
                <img src="{{ asset('storage/' . $p->foto) }}"
                     class="w-full h-48 object-cover rounded-xl mb-4 shadow">
            @else
                <div class="w-full h-48 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400">
                    Tidak ada foto
                </div>
            @endif

            <!-- JUDUL -->
            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                {{ $p->judul }}
            </h3>

            <!-- LOKASI -->
            <p class="text-gray-600 text-sm mb-2">📍 {{ $p->lokasi }}</p>

            <!-- STATUS -->
            <p class="mt-3 mb-2 font-medium text-gray-700">
                Status:
                <span class="
                    px-3 py-1 rounded-full text-sm font-semibold
                    @if($p->status == 'pending') bg-yellow-100 text-yellow-700
                    @elseif($p->status == 'diproses') bg-blue-100 text-blue-700
                    @elseif($p->status == 'selesai') bg-green-100 text-green-700
                    @else bg-gray-100 text-gray-600 @endif
                ">
                    {{ ucfirst($p->status ?? 'pending') }}
                </span>
            </p>

            <!-- TANGGAL -->
            <p class="text-gray-500 text-sm">
                📅 Dibuat: {{ $p->created_at->format('d M Y') }}
            </p>
        </div>
        @endforeach

    </div>

</body>
</html>
