<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'account_type',
        'number_id',
        'email',
        'phone',
        'country_id',
        'province_id',
        'canton_id',
        'city_id',
        'address1',
        'address2',
        'postal_code',
        'username',
        'password',
        'active',
        'created_at',
        'updated_at'
    ];
}
