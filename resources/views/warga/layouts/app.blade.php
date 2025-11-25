<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Warga Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex">
@php
$unread = \App\Models\Notification::where('user_id', auth()->id())
            ->where('is_read', false)
            ->count();
@endphp

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gradient-to-b from-blue-700 to-indigo-800 text-white p-6 shadow-xl fixed inset-y-0 left-0">
        <h2 class="text-2xl font-bold mb-10 mt-2 tracking-wide">Warga Panel</h2>

        <nav class="flex flex-col gap-4">

            <a href="/warga/dashboard"
               class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/20 transition">
                📊 <span class="font-medium">Dashboard</span>
            </a>

            <a href="/warga/pengaduan/buat"
               class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/20 transition">
                📝 <span class="font-medium">Buat Pengaduan</span>
            </a>

            <a href="/warga/pengaduan-saya"
               class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/20 transition">
                📂 <span class="font-medium">Pengaduan Saya</span>
            </a>

            <a href="/warga/status-laporan"
               class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/20 transition">
                📌 <span class="font-medium">Status Laporan</span>
            </a>

            <a href="/notifikasi"
   class="flex items-center gap-3 p-3 rounded-xl hover:bg-white/20 transition relative">
    🔔 <span class="font-medium">Notifikasi</span>

    @if($unread > 0)
        <span class="absolute right-4 top-1/2 -translate-y-1/2 bg-red-500 text-white text-xs
                     px-2 py-0.5 rounded-full font-bold">
            {{ $unread }}
        </span>
    @endif
</a>


            <a href="/logout"
               class="flex items-center gap-3 p-3 rounded-xl bg-red-500 hover:bg-red-600 transition mt-8">
                🚪 <span class="font-medium">Logout</span>
            </a>
        </nav>
    </aside>

    

    <!-- MAIN CONTENT -->
    <main class="ml-64 p-10 w-full">
        @yield('content')
    </main>

</body>
</html>
