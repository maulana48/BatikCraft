<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $media_type = 'product_category';

    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id', 'id');
    }
    public function media()
    {
        return $this->hasMany(Media::class, 'parent_id', 'id')->where('parent_type', 'product_category');
    }

    public function main_media()
    {
        return $this->hasOne(Media::class, 'parent_id', 'id')->where('parent_type', 'products');
    }
}
