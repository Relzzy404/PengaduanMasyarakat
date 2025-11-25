<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">

        <h2 class="text-2xl font-bold text-center mb-6 text-gray-700">Daftar Akun Baru</h2>

        <form method="POST" action="/register">
            @csrf

            <label class="block mb-3">
                <span class="text-gray-700">Nama Lengkap</span>
                <input type="text" name="name" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
            </label>

            <label class="block mb-3">
                <span class="text-gray-700">Email</span>
                <input type="email" name="email" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
            </label>

            <label class="block mb-3">
                <span class="text-gray-700">Password</span>
                <input type="password" name="password" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
            </label>

            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-semibold transition">
                Daftar
            </button>
        </form>

        <p class="text-center text-gray-600 mt-5">
            Sudah punya akun?
            <a href="/login" class="text-green-600 font-semibold hover:underline">Login di sini</a>
        </p>
    </div>

</body>
</html>