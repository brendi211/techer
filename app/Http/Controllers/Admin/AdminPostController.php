<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id','DESC')->paginate(10);
        return view('admin.post.home', compact('posts'));
    }

        public function create(Request $request)
    {
        $post = new Post();
        $post->name = $request['name'];
        $post->description = $request['description'];
        $post->category = $request['category'];
        if (!$request['code'] OR $request['code'] == "")
            $post->code = Str::slug($request['name'],'_');
        else
            $post->code = $request['code'];
        if ($request['image'])
        	$post->image = $request['image'];
        $post->save();
        \Session::flash('success', 'Пост успешно добавлен!');
        return redirect()->route('admin.post.index');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        \Session::flash('success', 'Вы успешно удалили Пост');
        return redirect()->route('admin.category.index');
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->name = $request['name'];
        $post->text = $request['text'];
        $postcode = Post::where('code', $request['code'])->where('id', '!=', $id);
        if($postcode->count()){
        \Session::flash('success', 'Пост не был обновлен, посколько есть совпадение в Url адресе. Пожалуйста измените его и попробуйте еще раз');
        return redirect()->route('admin.post.index');
        }
        if (!$request['code'] OR $request['code'] == "")
            $post->code = Str::slug($request['name'],'_');
        else
            $post->code = $request['code'];
        $post->category = $request['category'];
        $post->save();
        \Session::flash('success', 'Пост успешно обновлен! Спасибо!');
        return redirect()->route('admin.post.index');
    }

}
