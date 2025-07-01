@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Transaksi</h1>

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nasabah_id" class="block">Nasabah</label>
            <select name="nasabah_id" id="nasabah_id" class="border p-2 w-full" required>
                <option value="">-- Pilih Nasabah --</option>
                @foreach($nasabahs as $nasabah)
                    <option value="{{ $nasabah->id }}">{{ $nasabah->nama }} - {{ $nasabah->no_rekening }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="jenis" class="block">Jenis Transaksi</label>
            <select name="jenis" id="jenis" class="border p-2 w-full" required>
                <option value="setor">Setor</option>
                <option value="tarik">Tarik</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="jumlah" class="block">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="border p-2 w-full" required>
        </div>

        <button type="submit" class="bg-green-600 text-gray  px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('transaksi.index') }}" class="ml-2 text-gray-600 underline">Batal</a>
    </form>
@endsection
