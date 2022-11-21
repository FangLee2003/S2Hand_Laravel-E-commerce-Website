<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'orders_items';

    protected $fillable = [
        'order_id',
        'user_id',
        'product_id',
        'product_price',
        'product_quantity',
    ];
    public function findProduct()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
