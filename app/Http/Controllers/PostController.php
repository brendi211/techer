<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\User;
use App\Models\View_post;
use App\Models\Comments;
class PostController extends Controller
{
	public $timestamps = true;
	public function index($id,$code)
	{
		$posts = Post::codeToPost($code);
		$view_count = View_post::where('session','=',$_COOKIE['techer_session'])->where('post_id','=',$posts->id)->get();

		// Создаем запись в БД о просмотре этого поста, если чел с этой сессией еще не смотрел этот пост.
	  	if ($_COOKIE['techer_session'] AND $view_count->count() == 0) {
			$view = new View_post;
			$view->post_id = $posts->id;
			$view->ip = getIp();
			$view->session = $_COOKIE['techer_session'];
			$view->save();
		}

		$one_com = Post::where('id', $id)->first(); 
		 if($one_com){
		    $comments = $one_com->Comments->where('moderate');
		    /*
		     * Группируем комментарии по полю parent_id. При этом данное поле становится ключами массива 
		     * коллекций содержащих модели комментариев
		     */
		    $com = $comments->groupBy('parent_id');
		 } else $com = false;



		return view('post.view',compact('posts','one_com','com'));
	}
	public function createComments(Request $request)
	{
        $messages = ['Произошла ошибка. Проверьте правильно ли заполнены поля'];
        $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'text' => 'required|min:10',
        ],$messages);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $comment = new Comments();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->post_id = $request->post_id;
        if ($request->parent_id > 0)
            $comment->parent_id = $request->parent_id;
        $comment->text = $request->text;
        $comment->session = $_COOKIE['techer_session'];
        if(Auth::user())
        	$comment->moderate = 1;
    	else
        	$comment->moderate = 0;
        if ($request->checkout == 'on'){
            setcookie("email_comment", $comment->email, time()+3600*24*30);
            setcookie("name_comment", $comment->email, time()+3600*24*30);
		}

        $comment->save();
        $check_out = ($request->checkout === 'on') ? 'Данные имени и email сохранены.' : '';
		return redirect()->back()->withInput()->with('success', 'Комментарий успешно добавлен. '. $check_out.'');
	}
}
