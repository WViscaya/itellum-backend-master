<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'status',
        'number',
        'description',
        'date',
        'amount',
        'payment_type',
        'client_id',
        'created_at',
        'updated_at'
    ];
}
