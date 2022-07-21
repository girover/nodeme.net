<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkout_id',
        'status',
    ];
}
