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
    public function medias()
    {
        return Media::query()->where([['parent_id', '=', $this->id], ['parent_type', '=', $this->media_type]])->get();
    }
}
