<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nasabah_id',
        'jenis',
        'jumlah',
    ];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class);
    }
}
