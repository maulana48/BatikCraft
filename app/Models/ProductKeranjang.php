<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductKeranjang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function productbatik()
    {
        return $this->belongsTo(ProductBatik::class);
    }

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class);
    }
}
