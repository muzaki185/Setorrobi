<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Nasabah;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Tampilkan daftar transaksi.
     */
    public function index()
    {
        $transaksis = Transaksi::with('nasabah')->get();
        return view('transaksi.index', compact('transaksis'));
    }

    /**
     * Tampilkan form tambah transaksi.
     */
    public function create()
    {
        $nasabahs = Nasabah::all();
        return view('transaksi.create', compact('nasabahs'));
    }

    /**
     * Simpan transaksi baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nasabah_id' => 'required|exists:nasabahs,id',
            'jenis' => 'required|in:setor,tarik',
            'jumlah' => 'required|numeric|min:1',
        ]);

        $nasabah = Nasabah::findOrFail($request->nasabah_id);
        $jumlah = $request->jumlah;

        if ($request->jenis === 'tarik') {
            if ($nasabah->saldo < $jumlah) {
                return back()->withErrors(['jumlah' => 'Saldo tidak mencukupi.'])->withInput();
            }
            $nasabah->saldo -= $jumlah;
        } else {
            $nasabah->saldo += $jumlah;
        }

        $nasabah->save();

        Transaksi::create([
            'nasabah_id' => $nasabah->id,
            'jenis' => $request->jenis,
            'jumlah' => $jumlah,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit transaksi.
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $nasabahs = Nasabah::all();
        return view('transaksi.edit', compact('transaksi', 'nasabahs'));
    }

    /**
     * Perbarui transaksi yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nasabah_id' => 'required|exists:nasabahs,id',
            'jenis' => 'required|in:setor,tarik',
            'jumlah' => 'required|numeric|min:1',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }
    public function destroy($id)
{
    $transaksi = Transaksi::findOrFail($id);
    $transaksi->delete();

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
}
    public function show(Transaksi $transaksi)
    {
    $transaksi->load('nasabah');
    return view('transaksi.show', compact('transaksi'));
}

}
