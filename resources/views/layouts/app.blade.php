<!DOCTYPE html>
<html lang="en">
<head>
     <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <title>Setor Tarik Tunai</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navbar hanya muncul setelah login -->
    @auth
    <!-- Navbar -->
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <div class="space-x-4">
            <a href="{{ route('dashboard') }}">Dashboard</a> |
            <a href="{{ route('nasabah.index') }}">Nasabah</a> |
            <a href="{{ route('transaksi.index') }}">Transaksi</a> |
            <a href="{{ route('profile.edit') }}">Profil</a> |
        </div>
    </nav>
@endauth


    <main class="max-w-5xl mx-auto p-6 bg-white mt-6 rounded shadow">
        @yield('content')
    </main>

</body>
</html>
