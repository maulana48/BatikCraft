<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'product_reviews';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function orderProduct()
    {
        return $this->belongsTo(OrderProduct::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
