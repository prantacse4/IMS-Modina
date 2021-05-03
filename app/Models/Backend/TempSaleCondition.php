<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempSaleCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'com_id',
        'dealer_id',
    ];
}
