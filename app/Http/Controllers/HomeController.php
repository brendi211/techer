<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::orderBy('id', 'desc')->paginate(10);
    	return view('home',compact('posts'));
    }
}
