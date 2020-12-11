<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::get();
    	return view('category.category',compact('categories'));
    }

    public function view($code)
    {
    	$categories = Category::where('code', $code)->first();
    	$category = Post::where('category', $categories->id)->orderBy('name', 'desc')->take(10)->get();
    	//dd($category);
    	return view('category.view', compact('category','categories'));
    }

}
