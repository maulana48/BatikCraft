<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'pemesanan_id', 'id');
    }
    
    public function productpesanan()
    {
        return $this->hasMany(ProductPesanan::class, 'pemesanan_id', 'id');
    }

    public function pemesanankeranjang()
    {
        return $this->hasOne(PemesananKeranjang::class, 'pemesanan_id', 'id');
    }
}
