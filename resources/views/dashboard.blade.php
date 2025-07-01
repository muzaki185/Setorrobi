@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8 text-gray">
    <!-- Total Nasabah -->
    <div class="bg-indigo-600 p-6 rounded-xl shadow hover:shadow-lg transition">
        <h2 class="text-lg font-semibold mb-1">Total Nasabah</h2>
        <p class="text-4xl font-bold">{{ $totalNasabah }}</p>
    </div>

    <!-- Total Saldo -->
    <div class="bg-green-600 p-6 rounded-xl shadow hover:shadow-lg transition">
        <h2 class="text-lg font-semibold mb-1">Total Saldo</h2>
        <p class="text-4xl font-bold">Rp {{ number_format($totalSaldo, 0, ',', '.') }}</p>
    </div>

    <!-- Total Setor -->
    <div class="bg-blue-600 p-6 rounded-xl shadow hover:shadow-lg transition">
        <h2 class="text-lg font-semibold mb-1">Total Setoran</h2>
        <p class="text-4xl font-bold">Rp {{ number_format($totalSetor, 0, ',', '.') }}</p>
    </div>

    <!-- Total Tarik -->
    <div class="bg-indigo-600 p-6 rounded-xl shadow hover:shadow-lg transition">
        <h2 class="text-lg font-semibold mb-1">Total Penarikan</h2>
        <p class="text-4xl font-bold">Rp {{ number_format($totalTarik, 0, ',', '.') }}</p>
    </div>
</div>

<div class="bg-white p-6 rounded-xl shadow text-gray-800">
    <h2 class="text-2xl font-bold mb-3">Selamat Datang, Admin!</h2>
    <p class="text-gray-600">Pantau data nasabah dan transaksi di sini.</p>
</div>
@endsection
