<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function productkeranjang()
    {
        return $this->hasMany(ProductKeranjang::class, 'keranjang_id', 'id');
    }

    public function pemesanankeranjang()
    {
        return $this->hasMany(PemesananKeranjang::class, 'keranjang_id', 'id');
    }
}
