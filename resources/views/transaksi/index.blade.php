@extends('layouts.app')

@section('content')
<div class="bg-white p-8 rounded-2xl shadow-xl max-w-6xl mx-auto mt-6">
    <div class="flex justify-between items-center mb-8 border-b pb-4">
        <h1 class="text-3xl font-extrabold text-red-700 flex items-center gap-2">
            💰 Daftar Transaksi
        </h1>
        <a href="{{ route('transaksi.create') }}"
           class="bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-2 rounded-lg transition shadow-md">
            + Tambah Transaksi
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-md shadow-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-red-100 to-red-200 text-gray-800 text-xs uppercase tracking-wide">
                <tr>
                    <th class="px-5 py-3 border">#</th>
                    <th class="px-5 py-3 border">Nasabah</th>
                    <th class="px-5 py-3 border">No Rekening</th>
                    <th class="px-5 py-3 border">Jenis</th>
                    <th class="px-5 py-3 border">Jumlah</th>
                    <th class="px-5 py-3 border">Tanggal</th>
                    <th class="px-5 py-3 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($transaksis as $index => $transaksi)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-5 py-3 border font-semibold text-blue-700">{{ $index + 1 }}</td>
                        <td class="px-5 py-3 border text-gray-900">{{ $transaksi->nasabah->nama ?? '-' }}</td>
                        <td class="px-5 py-3 border text-indigo-600 font-medium">{{ $transaksi->nasabah->no_rekening ?? '-' }}</td>
                        <td class="px-5 py-3 border">
                            <span class="px-3 py-1 rounded-full text-xs font-bold 
                                {{ $transaksi->jenis === 'setor' 
                                    ? 'bg-green-200 text-green-800' 
                                    : 'bg-yellow-200 text-yellow-800' }}">
                                {{ ucfirst($transaksi->jenis) }}
                            </span>
                        </td>
                        <td class="px-5 py-3 border text-green-700 font-bold">
                            Rp{{ number_format($transaksi->jumlah, 0, ',', '.') }}
                        </td>
                        <td class="px-5 py-3 border text-gray-600">
                            {{ $transaksi->created_at->format('d-m-Y H:i') }}
                        </td>
                        <td class="px-5 py-3 border text-center space-x-2">
                            <a href="{{ route('transaksi.show', $transaksi->id) }}"
                               class="bg-green-100 hover:bg-green-200 text-green-700 font-medium px-3 py-1 rounded shadow-sm">
                                Lihat
                            </a>
                            <a href="{{ route('transaksi.edit', $transaksi->id) }}"
                               class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 font-medium px-3 py-1 rounded shadow-sm">
                                Edit
                            </a>
                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}"
                                  method="POST" class="inline-block"
                                  onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 hover:bg-red-700 text-white font-medium px-3 py-1 rounded shadow-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-gray-500 py-6">
                            Belum ada transaksi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
