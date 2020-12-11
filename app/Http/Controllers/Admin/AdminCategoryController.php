<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->get();
        return view('admin.category.home', compact('categories'));
    }

        public function create(Request $request)
    {
        $category = new Category();
        $category->name = $request['name'];
        $category->description = $request['description'];
        if (!$request['code'] OR $request['code'] == "")
            $category->code = Str::slug($request['name'],'_');
        else
            $category->code = Str::slug($request['code'],'_');

        $request['code'] = $category->code;


        $messages = ['Произошла ошибка. Проверьте правильно ли заполнены поля'];
        $validator = Validator::make($request->all(), [
        'code' => 'required|unique:categories|max:50',
        'name' => 'required|max:255',
        ],$messages);

        if ($validator->fails()) {
            return redirect()
                        ->route('admin.category.index')
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request['image'])
            $category->image = $request->file('image')->store('public/category');        
        $category->save();
        \Session::flash('success', 'Категория успешно добавлена!');
        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        Storage::delete($category->image);
        $category->delete();
        \Session::flash('success', 'Вы успешно удалили категорию');
        return redirect()->route('admin.category.index');
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request['name'];
        $category->description = $request['description'];
        if (!$request['code'] OR $request['code'] == "")
            $category->code = Str::slug($request['name'],'_');
        else
            $category->code = $request['code'];
        if ($category->image)
        	$category->image = $request['image'];
        $category->save();
        \Session::flash('success', 'Категория успешно обновлена! Спасибо!');
        return redirect()->route('admin.category.index');
    }




}
