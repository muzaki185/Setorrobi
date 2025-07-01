<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <title>Selamat Datang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-100 via-white to-blue-200 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white shadow-xl rounded-xl p-10 max-w-xl w-full">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-blue-700 mb-2">Selamat Datang</h1>
            <p class="text-gray-600">Website Setor & Tarik Tunai</p>
        </div>

        <div class="bg-blue-50 p-6 rounded-lg border border-blue-200">
            <h2 class="text-xl font-semibold text-blue-800 mb-4">👤 Biodata Mahasiswa</h2>
            <ul class="text-gray-700 space-y-2">
                <li><strong>Nama:</strong>Ahmad Sakhiyul Robih</li>
                <li><strong>Pendidikan:</strong> Mahasiswa</li>
                <li><strong>Email:</strong>robihpea@gmail.com</li>
            </ul>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('login') }}"
                class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition">
                🔐 Login sebagai Admin
                </a>

        </div>
    </div>

</body>
</html>

