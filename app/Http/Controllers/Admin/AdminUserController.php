<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\SearchRequest;

class AdminUserController extends Controller
{

    public function index()
    {
        $users = User::with('roles')->orderBy('name')->paginate(20);
        return view('admin.user.user-index', ['users' => $users]);
    }

    public function role($name)
    {
        if ($name === 'default') {
            $users = User::doesntHave('roles')->with('roles')->orderBy('name')->paginate(20);
            return view('admin.user.user-index', ['users' => $users]);
        }
        $users = User::role($name)->with('roles')->orderBy('name')->paginate(20);
        return view('admin.user.user-index', ['users' => $users]);
    }


    public function create()
    {
        $roles = Role::all();
        return view('admin.user.user-create', ['roles' => $roles]);
    }


    public function store(UserCreateRequest $request)
    {
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        $user->assignRole($request['role']);
        \Session::flash('success', trans('alerts.user-created'));
        return redirect()->route('users.index');
    }


    public function edit($id)
    {
        $user = User::with('roles')->where('id', $id)->first();
        $allRoles = Role::all()->pluck('name');
        $userRoles = $user->roles->pluck('name');
        $roles = $allRoles->diff($userRoles);
        return view('admin.user.user-edit', ['user' => $user, 'roles' => $roles]);
    }


    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request['name'];
        $user->syncRoles($request['role']);
        $user->save();
        \Session::flash('success', trans('alerts.user-updated'));
        return redirect()->route('users.index');
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        \Session::flash('success', trans('alerts.user-deleted'));
        return redirect()->route('users.index');
    }


    public function search(SearchRequest $request)
    {
        $users = User::query()->where('name', 'LIKE', "%{$request['search']}%")->orWhere('email', 'LIKE', "%{$request['search']}%")->limit(50)->get();
        return view('admin.user.user-index', ['users' => $users]);
    }

}
