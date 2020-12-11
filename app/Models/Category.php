<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Post;
class Category extends Model
{
    use HasFactory;

    public function post()
    {
    	return $this->hasMany('App\Models\Post','category','id');
    }
}
