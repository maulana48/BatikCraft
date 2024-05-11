<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class, 'cart_id', 'id');
    }

    public function cartOrder()
    {
        return $this->hasMany(CartOrder::class, 'cart_id', 'id');
    }
}
