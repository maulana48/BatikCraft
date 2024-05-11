<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'kategori_product_id');
    }

    public function reviewproduct()
    {
        return $this->hasMany(ReviewProduct::class, 'product_id', 'id');
    }

    public function productkeranjang()
    {
        return $this->hasMany(ProductKeranjang::class, 'product_id', 'id');
    }

    public function productpesanan()
    {
        return $this->hasMany(ProductPesanan::class, 'product_id', 'id');
    }

    public function media()
    {
        return $this->hasOne(Media::class, ['entitas_id', 'nama_entitas'], ['id', 'entity_name']);
    }
}
