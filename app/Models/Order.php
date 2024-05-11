<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id', 'id');
    }

    public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }

    public function cartOrder()
    {
        return $this->hasOne(CartOrder::class, 'order_id', 'id');
    }
}
