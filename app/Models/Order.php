<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // protected $fillable =[
    //     'customer_name',
    //     'customer_phone',
    //     'sub_total',
    //     'disc',
    //     'grand_total',

    // ];
    protected $guarded=['id'];

}
