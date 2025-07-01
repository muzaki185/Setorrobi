<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nasabah extends Model
{
    
    public function user()
{
    return $this->belongsTo(User::class);
}
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'no_rekening',
        'saldo',
    ];

    /**
     * Relasi ke transaksi (satu nasabah punya banyak transaksi)
     */
    public function transaksis()
    {
        return $this->hasMany(\App\Models\Transaksi::class);
    }
}
