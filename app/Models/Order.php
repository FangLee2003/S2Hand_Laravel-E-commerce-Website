<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'city',
        'country',
        'address1',
        'address2',
        'postcode',
        'notes',
        'total_price',
        'status',
        'tracking_number'];
}
