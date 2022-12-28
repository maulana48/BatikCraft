<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduct extends Model
{
    use HasFactory;

    public function productbatik()
    {
        return $this->hasMany(ProductBatik::class, 'kategori_product_id', 'id');
    }
}
