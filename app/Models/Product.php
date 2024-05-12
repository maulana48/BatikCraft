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
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id');
    }

    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class, 'product_id', 'id');
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'product_id', 'id');
    }

    public function media()
    {
        return $this->hasOne(Media::class, 'parent_id', 'id')->where('parent_type', 'product');
    }
}
