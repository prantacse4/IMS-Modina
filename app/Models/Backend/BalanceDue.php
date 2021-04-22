<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceDue extends Model
{
    use HasFactory;
    protected $fillable = [
        'com_id',
        'balance',
    ];
}
