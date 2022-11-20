<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'cate_id',
        'name',
        'slug',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'status',
        'trending',
        'meta_title',
        'meta_descrip',
        'meta_keywords',
        'image'
    ];

    public function findCategory()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }
}
