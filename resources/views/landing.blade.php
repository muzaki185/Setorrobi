<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex flex-col justify-center items-center">
        <h1 class="text-4xl font-bold mb-4">Selamat Datang di Website</h1>
        <p class="text-lg mb-6">Nama: Muhamad Bayu Agus Saputra</p>
        <p class="text-lg mb-6">Deskripsi Singkat: Website Setor & Tarik Tunai</p>
        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Login</a>
    </div>
</body>
</html>
