<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealerPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'dealer_id',
        'amount',
        'date'
    ];
}
