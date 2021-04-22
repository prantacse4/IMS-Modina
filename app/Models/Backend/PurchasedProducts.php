<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedProducts extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'purchase_id',
        'product_name',
        'qty',
        'free',
        'pro_pur',
        'total',
    ];
}
