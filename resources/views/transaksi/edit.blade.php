@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Transaksi</h1>

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nasabah_id" class="block">Nasabah</label>
            <select name="nasabah_id" id="nasabah_id" class="border p-2 w-full" required>
                @foreach($nasabahs as $nasabah)
                    <option value="{{ $nasabah->id }}" {{ $transaksi->nasabah_id == $nasabah->id ? 'selected' : '' }}>
                        {{ $nasabah->nama }} - {{ $nasabah->no_rekening }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="jenis" class="block">Jenis Transaksi</label>
            <select name="jenis" id="jenis" class="border p-2 w-full" required>
                <option value="setor" {{ $transaksi->jenis == 'setor' ? 'selected' : '' }}>Setor</option>
                <option value="tarik" {{ $transaksi->jenis == 'tarik' ? 'selected' : '' }}>Tarik</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="jumlah" class="block">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="border p-2 w-full" value="{{ old('jumlah', $transaksi->jumlah) }}" required>
        </div>

        <button type="submit" class="bg-blue-600 text-gray px-4 py-2 rounded">Perbarui</button>
        <a href="{{ route('transaksi.index') }}" class="ml-2 text-gray-600 underline">Batal</a>
    </form>
@endsection
