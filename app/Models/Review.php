<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'review'
    ];

    public function findUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function findProduct()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
