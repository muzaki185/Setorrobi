<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    /**
     * Tampilkan semua nasabah
     */
    public function index()
    {
        $nasabahs = Nasabah::all();
        return view('nasabah.index', compact('nasabahs'));
    }

    /**
     * Form tambah nasabah
     */
    public function create()
    {
        return view('nasabah.create');
    }

    /**
     * Simpan nasabah baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:nasabahs',
            'alamat' => 'required',
            'no_rekening' => 'required|unique:nasabahs',
            'saldo' => 'required|numeric',
        ]);

        $nasabah = new Nasabah($request->all());
        $nasabah->user_id = auth()->id(); // ← Tambahkan ini untuk mengisi user_id
        $nasabah->save();

        return redirect()->route('nasabah.index')->with('success', 'Nasabah berhasil ditambahkan');
    }

    /**
     * Form edit nasabah
     */
    public function edit(Nasabah $nasabah)
    {
        return view('nasabah.edit', compact('nasabah'));
    }

    /**
     * Perbarui data nasabah
     */
    public function update(Request $request, Nasabah $nasabah)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:nasabahs,nik,' . $nasabah->id,
            'alamat' => 'required',
            'no_rekening' => 'required|unique:nasabahs,no_rekening,' . $nasabah->id,
            'saldo' => 'required|numeric',
        ]);

        $nasabah->update($request->all());

        return redirect()->route('nasabah.index')->with('success', 'Nasabah berhasil diperbarui');
    }

    /**
     * Hapus nasabah
     */
    public function destroy(Nasabah $nasabah)
    {
        // Hapus juga semua transaksi terkait (jika ada relasi)
        $nasabah->transaksis()->delete();

        $nasabah->delete();

        return redirect()->route('nasabah.index')->with('success', 'Nasabah berhasil dihapus');
    }
}
