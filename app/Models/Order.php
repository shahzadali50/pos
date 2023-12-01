<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'c_name',
        'phone',
        'item_id',
        'code',
        'qty',
        'sale_rate',

    ];

}
