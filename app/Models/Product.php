<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','description','category_id'];

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function plans()
	{
		return $this->hasMany('App\Plan');
	}
}
