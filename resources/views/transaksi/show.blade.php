@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow border border-gray-300">
    <h2 class="text-center text-xl font-bold mb-4">🧾 Bukti Transaksi</h2>
    
    <div class="text-sm">
        <p class="mb-2"><span class="font-semibold">Nama Nasabah:</span> {{ $transaksi->nasabah->nama }}</p>
        <p class="mb-2"><span class="font-semibold">No Rekening:</span> {{ $transaksi->nasabah->no_rekening }}</p>
        <p class="mb-2"><span class="font-semibold">Jenis Transaksi:</span> {{ ucfirst($transaksi->jenis) }}</p>
        <p class="mb-2"><span class="font-semibold">Jumlah:</span> Rp{{ number_format($transaksi->jumlah, 0, ',', '.') }}</p>
        <p class="mb-2"><span class="font-semibold">Tanggal:</span> {{ $transaksi->created_at->format('d-m-Y H:i') }}</p>
    </div>

    <div class="mt-6 border-t pt-3 text-center text-sm text-gray-500">
        <p>Terima kasih telah melakukan transaksi.</p>
        <p>Website Setor & Tarik Tunai</p>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('transaksi.index') }}" class="text-blue-600 hover:underline text-sm">← Kembali ke Daftar Transaksi</a>
    </div>
</div>
@endsection
