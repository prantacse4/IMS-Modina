<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceDealer extends Model
{
    use HasFactory;
    protected $fillable = [
        'dealer_id',
        'balance',
    ];
}
