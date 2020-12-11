<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use View_post, Comments;
class Post extends Model
{
    use HasFactory;
    public function getCategory()
    {
    	return $this->hasOne('App\Models\Category','id','category');

    }

    public function viewPost()
    {
    	return $this->hasMany('App\Models\View_post','post_id','id');

    }

    public function Comments()
    {
        return $this->hasMany('App\Models\Comments');

    }


    public static function codeToPost($code)
    {
    	return Post::where('code',$code)->first();
    }


}
