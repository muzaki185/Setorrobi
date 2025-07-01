@extends('layouts.app')

@section('content')
<div class="bg-white p-8 rounded-2xl shadow-xl max-w-6xl mx-auto mt-6">
    <div class="flex justify-between items-center mb-8 border-b pb-4">
        <h1 class="text-3xl font-extrabold text-blue-800 flex items-center gap-2">
            📋 Daftar Nasabah
        </h1>
        <a href="{{ route('nasabah.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg transition shadow-md">
            + Tambah Nasabah
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-md shadow-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-blue-100 to-blue-200 text-gray-800 text-xs uppercase tracking-wide">
                <tr>
                    <th class="px-5 py-3 border">No</th>
                    <th class="px-5 py-3 border">Nama</th>
                    <th class="px-5 py-3 border">NIK</th>
                    <th class="px-5 py-3 border">No Rekening</th>
                    <th class="px-5 py-3 border">Alamat</th>
                    <th class="px-5 py-3 border">Saldo</th>
                    <th class="px-5 py-3 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($nasabahs as $index => $nasabah)
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-5 py-3 border font-semibold text-blue-700">{{ $index + 1 }}</td>
                        <td class="px-5 py-3 border text-gray-800">{{ $nasabah->nama }}</td>
                        <td class="px-5 py-3 border text-gray-700">{{ $nasabah->nik }}</td>
                        <td class="px-5 py-3 border text-indigo-600 font-semibold">{{ $nasabah->no_rekening }}</td>
                        <td class="px-5 py-3 border text-gray-700">{{ $nasabah->alamat }}</td>
                        <td class="px-5 py-3 border text-green-600 font-bold">Rp{{ number_format($nasabah->saldo, 0, ',', '.') }}</td>
                        <td class="px-5 py-3 border text-center space-x-2">
                            <a href="{{ route('nasabah.edit', $nasabah->id) }}"
                               class="inline-block bg-yellow-400 hover:bg-yellow-500 text-black font-medium px-3 py-1 rounded shadow">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('nasabah.destroy', $nasabah->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white font-medium px-3 py-1 rounded shadow">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-gray-500 py-6">Belum ada data nasabah.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
