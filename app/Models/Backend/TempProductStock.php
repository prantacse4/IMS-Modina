<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempProductStock extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'stock',
    ];
}
