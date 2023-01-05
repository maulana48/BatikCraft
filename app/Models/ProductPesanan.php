<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPesanan extends Model
{
    use HasFactory;

    protected $guarded =  ['id'];
    
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');
    }
    
    public function productbatik()
    {
        return $this->belongsTo(ProductBatik::class, 'product_id');
    }
    
    public function reviewproduct()
    {
        return $this->hasMany(ReviewProduct::class, 'product_id', 'product_id');
    }
}
