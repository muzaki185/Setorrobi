@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-xl rounded-2xl p-10 mt-8">
    <div class="mb-8 border-b pb-6">
        <h2 class="text-3xl font-extrabold text-red-700 flex items-center gap-2">👤 Profil Pengguna</h2>
        <p class="text-gray-500 text-sm mt-1">Informasi lengkap dari pengguna/admin.</p>
    </div>

    <!-- Biodata -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-gray-700">
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Nama Lengkap</label>
            <input type="text" value="Ahmad Sakhiyul Robih"
                   class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-2 shadow-inner cursor-not-allowed" readonly>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Pendidikan</label>
            <input type="text" value="Mahasiswa"
                   class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-2 shadow-inner cursor-not-allowed" readonly>
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-semibold text-gray-600 mb-1">Email</label>
            <input type="text" value="robihpea@gmail.com"
                   class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-2 shadow-inner cursor-not-allowed" readonly>
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-semibold text-gray-600 mb-1">Alamat</label>
            <textarea rows="3"
                      class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-2 shadow-inner cursor-not-allowed resize-none"
                      readonly>Jl. Gatotkaca No. 123, Tangerang</textarea>
        </div>
    </div>

    <!-- Tombol -->
    <div class="mt-10 flex justify-end gap-4">
        <a href="{{ route('dashboard') }}"
           class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded-lg font-medium shadow">
            ← Kembali
        </a>
        <button @click="open = true"
           class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg font-medium shadow">
            ✏️ Edit Profil
        </button>
    </div>
</div>

<!-- Modal Popup Edit -->
<div x-data="{ open: false }">
    <div x-show="open"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div @click.away="open = false" class="bg-white p-6 rounded-xl w-full max-w-lg shadow-lg">
            <h3 class="text-xl font-semibold mb-4 text-gray-800">Edit Profil</h3>
            <form>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-600">Nama</label>
                    <input type="text" class="w-full mt-1 rounded-md border px-3 py-2 focus:outline-none focus:ring" value="Ahmad Sakhiyul Robih">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-600">Pendidikan</label>
                    <input type="text" class="w-full mt-1 rounded-md border px-3 py-2 focus:outline-none focus:ring" value="Mahasiswa">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" class="w-full mt-1 rounded-md border px-3 py-2 focus:outline-none focus:ring" value="robihpea@gmail.com">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-600">Alamat</label>
                    <textarea rows="3" class="w-full mt-1 rounded-md border px-3 py-2 focus:outline-none focus:ring">Jl. Gatotkaca No. 123, Tangerang</textarea>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="open = false"
                            class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 text-sm">Batal</button>
                    <button type="submit"
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded text-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
