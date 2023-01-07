<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function productbatik()
    {
        return $this->hasMany(ProductBatik::class, 'kategori_product_id', 'id');
    }
    public function media(): HasOne
    {
        return $this->hasOne(Media::class, ['entitas_id', 'nama_entitas'], ['id', 'entity_name']);
    }
}
