<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'pro_name',
        'pro_code',
        'cat_id',
        'com_id',
        'qty_type',
        'pro_quantity',
        'pro_purchasing',
        'pro_selling',
        'pro_description',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Backend\Category');
    }
}
