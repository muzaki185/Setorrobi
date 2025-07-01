@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Nasabah</h1>

    {{-- Tampilkan error validasi jika ada --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('nasabah.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nama" class="block">Nama :</label>
            <input type="text" name="nama" id="nama" class="border p-2 w-full"
                   value="{{ old('nama') }}" required>
        </div>

        <div class="mb-4">
            <label for="nik" class="block">NIK :</label>
            <input type="text" name="nik" id="nik" class="border p-2 w-full"
                   value="{{ old('nik') }}" required>
        </div>

        <div class="mb-4">
            <label for="alamat" class="block">Alamat :</label>
            <textarea name="alamat" id="alamat" class="border p-2 w-full" required>{{ old('alamat') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="no_rekening" class="block">No Rekening :</label>
            <input type="text" name="no_rekening" id="no_rekening" class="border p-2 w-full"
                   value="{{ old('no_rekening') }}" required>
        </div>

        <div class="mb-4">
            <label for="saldo" class="block">Saldo Awal :</label>
            <input type="number" name="saldo" id="saldo" class="border p-2 w-full"
                   value="{{ old('saldo', 0) }}" required>
        </div>

        <button type="submit" class="bg-blue-600 text-gray px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('nasabah.index') }}" class="ml-2 text-gray-600 underline">Batal</a>
    </form>
@endsection

        