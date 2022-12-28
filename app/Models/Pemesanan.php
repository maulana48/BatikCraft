<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'pemesanan_id', 'id');
    }
    
    public function pemesanankeranjang()
    {
        return $this->hasMany(PemesananKeranjang::class, 'pemesanan_id', 'id');
    }
}
