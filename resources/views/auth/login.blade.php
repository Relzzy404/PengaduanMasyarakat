<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">

        <h2 class="text-2xl font-bold text-center mb-6 text-gray-700">Login Akun</h2>

        @if ($errors->any())
            <p class="text-red-600 text-center mb-4">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="/login">
            @csrf

            <label class="block mb-3">
                <span class="text-gray-700">Email</span>
                <input type="email" name="email" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </label>

            <label class="block mb-5">
                <span class="text-gray-700">Password</span>
                <input type="password" name="password" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </label>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold transition">
                Login
            </button>
        </form>

        <p class="text-center text-gray-600 mt-5">
            Belum punya akun?
            <a href="/register" class="text-blue-600 font-semibold hover:underline">Daftar Sekarang</a>
        </p>
    </div>

</body>
</html>