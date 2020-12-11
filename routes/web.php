<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin Users
Route::group(['prefix' => 'admin/users', 'middleware' => ['role:Admin']], function () {
	Route::get('/', [AdminUserController::class, 'index'])->name('users.index');
	Route::get('/role/{name}', [AdminUserController::class, 'role'])->name('users.role');
	Route::get('create', [AdminUserController::class, 'create'])->name('users.create');
	Route::post('create', [AdminUserController::class, 'store'])->name('users.store');
	Route::post('search', [AdminUserController::class, 'search'])->name('users.search');
	Route::post('{id}/update', [AdminUserController::class, 'update'])->name('users.update');
	Route::delete('{id}', [AdminUserController::class, 'destroy'])->name('users.destroy');
	Route::get('{id}', [AdminUserController::class, 'edit'])->name('users.edit');
});

// Admin Roles
Route::group(['middleware' => ['role:Admin']], function () {

	Route::group(['prefix' => 'admin/category'], function (){
		Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.category.index');	
		Route::post('create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
		Route::delete('{id}', [AdminCategoryController::class, 'destroy'])->name('admin.category.destroy');
		Route::post('update/{id}', [AdminCategoryController::class, 'update'])->name('admin.category.update');

	});

	Route::group(['prefix' => 'admin/post'], function (){
		Route::get('/', [AdminPostController::class, 'index'])->name('admin.post.index');	
		Route::post('create', [AdminPostController::class, 'create'])->name('admin.post.create');
		Route::delete('{id}', [AdminPostController::class, 'destroy'])->name('admin.post.destroy');
		Route::post('update/{id}', [AdminPostController::class, 'update'])->name('admin.post.update');

	});

	Route::group(['prefix' => 'admin/roles'], function () {
		Route::get('/', [AdminRoleController::class, 'index'])->name('roles.index');
		Route::post('create', [AdminRoleController::class, 'store'])->name('roles.store');
		Route::post('{name}/update', [AdminRoleController::class, 'update'])->name('roles.update');
		Route::delete('{name}', [AdminRoleController::class, 'destroy'])->name('roles.destroy');
	});

});




Route::group(['prefix' => 'comments'], function () {
	Route::post('create', [PostController::class, 'createComments'])->name('comments.create');
});



// Route::group(['prefix' => 'category'], function () {
// 	Route::get('/', [CategoryController::class, 'index'])->name('category.index');
// 	Route::post('create', [CategoryController::class, 'store'])->name('category.store');
// });

Route::get('/{id}-{code}', [PostController::class, 'index'])->name('post.index');

Route::get('{code}', [CategoryController::class, 'view'])->name('category.code');
