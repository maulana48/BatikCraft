<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBatik extends Model
{
    use HasFactory;
    
    public function kategoriproduct()
    {
        return $this->belongsTo(KategoriProduct::class, 'kategori_product_id');
    }
    
    public function reviewproduct()
    {
        return $this->hasMany(ReviewProduct::class, 'product_id', 'id');
    }
    
    public function productkeranjang()
    {
        return $this->hasMany(ProductKeranjang::class, 'product_id', 'id');
    }
}
