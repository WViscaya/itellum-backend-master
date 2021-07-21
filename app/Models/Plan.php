<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','description','billing_cycle','every_days_number','price','three_months_discount','one_year_discount','quantity','product_id'];
    
    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }

}
