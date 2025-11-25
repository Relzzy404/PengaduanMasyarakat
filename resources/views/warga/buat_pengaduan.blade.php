<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Buat Pengaduan</title>
</head>

<body class="bg-gray-100 min-h-screen p-10">

    <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-2xl p-10 border">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Buat Pengaduan</h1>

            <a href="/warga/dashboard"
               class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md transition flex items-center gap-2">
                ← Kembali ke Dashboard
            </a>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Judul -->
            <label class="block font-semibold mb-2">Judul Pengaduan</label>
            <input type="text" name="judul"
                class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-blue-400 focus:outline-none">

            <!-- Isi laporan -->
            <label class="block font-semibold mb-2">Isi Laporan</label>
            <textarea name="isi_laporan" rows="5"
                class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>

            <!-- Lokasi -->
            <label class="block font-semibold mb-2">Lokasi Kejadian</label>
            <input type="text" name="lokasi"
                class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-blue-400 focus:outline-none">

            <!-- Foto -->
            <label class="block font-semibold mb-2">Foto Bukti</label>
            <input type="file" name="foto" class="mb-6">

            <!-- Submit -->
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow-lg">
                Kirim Pengaduan
            </button>

        </form>

    </div>

</body>

</html>
