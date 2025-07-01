@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8 text-gray-800">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Nasabah -->
        <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-blue-500">
            <div class="text-center">
                <h2 class="text-lg font-semibold text-gray-600">Total Nasabah</h2>
                <p class="text-4xl font-bold text-blue-600 mt-2">{{ $totalNasabah }}</p>
            </div>
        </div>

        <!-- Total Transaksi -->
        <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-green-500">
            <div class="text-center">
                <h2 class="text-lg font-semibold text-gray-600">Total Transaksi</h2>
                <p class="text-4xl font-bold text-green-600 mt-2">{{ $totalTransaksi }}</p>
            </div>
        </div>

        <!-- Total Saldo -->
        <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-yellow-500">
            <div class="text-center">
                <h2 class="text-lg font-semibold text-gray-600">Total Saldo</h2>
                <p class="text-2xl font-bold text-yellow-600 mt-2">Rp {{ number_format($totalSaldo, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
@endsection
