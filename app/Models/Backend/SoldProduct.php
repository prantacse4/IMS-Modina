<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'sale_id',
        'product_name',
        'qty',
        'free',
        'pro_sell',
        'total',
    ];
}
