<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Pengaduan Saya</title>
</head>

<body class="bg-gray-100 min-h-screen p-10">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-800">📄 Pengaduan Saya</h1>

        <a href="/warga/dashboard"
           class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md transition flex items-center gap-2">
            ← Kembali ke Dashboard
        </a>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-lg border">

        <table class="w-full text-left text-gray-700">
            <thead>
                <tr class="border-b bg-gray-50">
                    <th class="p-4 font-semibold">Judul</th>
                    <th class="p-4 font-semibold">Isi Laporan</th>
                    <th class="p-4 font-semibold">Lokasi</th>
                    <th class="p-4 font-semibold">Foto</th>
                    <th class="p-4 font-semibold">Status</th>
                    <th class="p-4 font-semibold">Tanggal</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $p)
                <tr class="border-b hover:bg-gray-50 transition">

                    <!-- Judul -->
                    <td class="p-4 font-medium">{{ $p->judul }}</td>

                    <!-- Isi laporan (dipotong biar rapi) -->
                    <td class="p-4 text-gray-600">
                        {{ Str::limit($p->isi_laporan, 50) }}
                    </td>

                    <!-- Lokasi -->
                    <td class="p-4">{{ $p->lokasi }}</td>

                    <!-- Foto -->
                    <td class="p-4">
                        @if ($p->foto)
                            <img src="{{ asset('storage/' . $p->foto) }}"
                                 class="w-20 h-20 object-cover rounded-lg border shadow-md">
                        @else
                            <span class="text-gray-400 italic">Tidak ada</span>
                        @endif
                    </td>

                    <!-- Status -->
                    <td class="p-4">
                        <span class="
                            px-3 py-1 rounded-full text-sm font-semibold
                            @if($p->status == 'pending') bg-yellow-100 text-yellow-700
                            @elseif($p->status == 'diproses') bg-blue-100 text-blue-700
                            @elseif($p->status == 'selesai') bg-green-100 text-green-700
                            @else bg-gray-100 text-gray-600 @endif
                        ">
                            {{ ucfirst($p->status ?? 'pending') }}
                        </span>
                    </td>

                    <!-- Tanggal -->
                    <td class="p-4">{{ $p->created_at->format('d M Y') }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>
