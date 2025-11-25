<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gradient-to-b from-gray-800 to-gray-900 text-white p-6 shadow-lg fixed inset-y-0">

    <h2 class="text-2xl font-bold mb-10">Admin Panel</h2>

    <nav class="flex flex-col gap-4">

        <!-- Dashboard -->
        <a href="/admin/dashboard"
            class="flex items-center gap-3 p-3 rounded-lg bg-white/10 hover:bg-white/20 transition">
            📊 <span>Dashboard</span>
        </a>

        <!-- Manajemen Pengaduan -->
        <a href="/admin/pengaduan"
            class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/20 transition">
            🗂️ <span>Manajemen Pengaduan</span>
        </a>

        <!-- Laporan -->
        <a href="/admin/laporan"
            class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/20 transition">
            📑 <span>Laporan</span>
        </a>

        <!-- Logout -->
        <a href="/logout"
            class="flex items-center gap-3 p-3 rounded-lg bg-red-500 hover:bg-red-600 transition mt-10">
            🚪 <span>Logout</span>
        </a>
    </nav>
</aside>

    <!-- MAIN CONTENT -->
    <main class="ml-64 p-10 w-full">

        <h1 class="text-3xl font-semibold mb-6">Selamat Datang, Admin 👋</h1>

        <!-- STATISTIC CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

            <div class="bg-white p-6 shadow-lg rounded-xl border hover:shadow-xl transition">
                <h3 class="text-lg font-semibold text-gray-700">Total Pengaduan</h3>
                <p class="text-3xl font-bold text-blue-600 mt-2">{{ $total }}</p>
            </div>

            <div class="bg-white p-6 shadow-lg rounded-xl border hover:shadow-xl transition">
                <h3 class="text-lg font-semibold text-gray-700">Pending</h3>
                <p class="text-3xl font-bold text-yellow-500 mt-2">{{ $pending }}</p>
            </div>

            <div class="bg-white p-6 shadow-lg rounded-xl border hover:shadow-xl transition">
                <h3 class="text-lg font-semibold text-gray-700">Diproses</h3>
                <p class="text-3xl font-bold text-blue-500 mt-2">{{ $diproses }}</p>
            </div>

            <div class="bg-white p-6 shadow-lg rounded-xl border hover:shadow-xl transition">
                <h3 class="text-lg font-semibold text-gray-700">Selesai</h3>
                <p class="text-3xl font-bold text-green-600 mt-2">{{ $selesai }}</p>
            </div>

        </div>

        <!-- RECENT PENGADUAN -->
        <div class="bg-white p-6 rounded-2xl shadow-md border">
            <h2 class="text-xl font-semibold mb-4">Pengaduan Terbaru</h2>

            <table class="w-full text-left">
                <thead>
                    <tr class="border-b bg-gray-50">
                        <th class="p-3">Judul</th>
                        <th class="p-3">Warga</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Tanggal</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($recent as $p)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-3">{{ $p->judul }}</td>
                            <td class="p-3">{{ $p->user->name }}</td>

                            <td class="p-3">
                                <span class="px-3 py-1 rounded-full text-sm font-semibold
                                    @if($p->status == 'menunggu') bg-yellow-100 text-yellow-700
                                    @elseif($p->status == 'diproses') bg-blue-100 text-blue-700
                                    @elseif($p->status == 'selesai') bg-green-100 text-green-700 @endif">
                                    {{ ucfirst($p->status) }}
                                </span>
                            </td>

                            <td class="p-3">{{ $p->created_at->format('d M Y') }}</td>

                            <td class="p-3">
                                <a href="/admin/pengaduan/{{ $p->id }}"
                                   class="text-blue-600 font-semibold hover:underline">Lihat</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>

</body>

</html>
