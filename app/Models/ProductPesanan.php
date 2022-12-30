<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPesanan extends Model
{
    use HasFactory;
    
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');
    }
    public function productbatik()
    {
        return $this->belongsTo(ProductBatik::class, 'product_id');
    }
}
