<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','description','icon'];

    public function products()
	{
		return $this->hasMany('App\Product');
	}


}
