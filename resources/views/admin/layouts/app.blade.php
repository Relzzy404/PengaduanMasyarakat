<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-gray-900 text-white p-6 fixed inset-y-0 shadow-lg">

        <h2 class="text-2xl font-bold mb-10 tracking-wide">Admin Panel</h2>

        <nav class="flex flex-col gap-2 text-[15px]">

            {{-- Dashboard --}}
            <a href="/admin/dashboard"
                class="flex items-center gap-3 p-3 rounded-lg transition
                {{ request()->is('admin/dashboard') ? 'bg-white text-gray-900 font-semibold' : 'hover:bg-white/10' }}">
                📊 <span>Dashboard</span>
            </a>

            {{-- Manajemen Pengaduan --}}
            <a href="/admin/pengaduan"
                class="flex items-center gap-3 p-3 rounded-lg transition
                {{ request()->is('admin/pengaduan*') ? 'bg-white text-gray-900 font-semibold' : 'hover:bg-white/10' }}">
                📁 <span>Manajemen Pengaduan</span>
            </a>

            {{-- Laporan --}}
            <a href="/admin/laporan"
                class="flex items-center gap-3 p-3 rounded-lg transition
                {{ request()->is('admin/laporan*') ? 'bg-white text-gray-900 font-semibold' : 'hover:bg-white/10' }}">
                📑 <span>Laporan</span>
            </a>

            {{-- Logout --}}
            <a href="/logout"
                class="flex items-center gap-3 p-3 rounded-lg bg-red-500 hover:bg-red-600 transition mt-10">
                🚪 <span>Logout</span>
            </a>
        </nav>
    </aside>

    {{-- CONTENT AREA --}}
    <main class="ml-64 p-10 w-full">
        @yield('content')
    </main>

</body>
</html>
