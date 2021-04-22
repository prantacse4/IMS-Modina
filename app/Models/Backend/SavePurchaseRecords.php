<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavePurchaseRecords extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'company',
        'dealer',
        'showroom',
        'total_amount',
    ];
}
