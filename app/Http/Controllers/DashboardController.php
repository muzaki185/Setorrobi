<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Transaksi;

class DashboardController extends Controller
{public function index()
{
    $totalNasabah = Nasabah::count();
    $totalSaldo = Nasabah::sum('saldo');
    $totalSetor = Transaksi::where('jenis', 'setor')->sum('jumlah');
    $totalTarik = Transaksi::where('jenis', 'tarik')->sum('jumlah');

    return view('dashboard', compact('totalNasabah', 'totalSaldo', 'totalSetor', 'totalTarik'));
}
}
