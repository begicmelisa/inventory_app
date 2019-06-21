<?php

use Illuminate\Support\Facades\Input;
use App\Category;
use App\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () { return view('home'); });

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){

    Route::get('/home',['uses'=>'HomeController@index','as'=>'home']);

    /* ---------------------------------------- POST ---------------------------------------- */

    Route::get('posts',['uses'=>'PostsController@index','as'=>'posts']);

    Route::get('/posts/trashed',['uses'=>'PostsController@trashed','as'=>'posts.trashed']);

    Route::get('post/create',['uses'=>'PostsController@create','as'=>'post.create']);

    Route::post('post/store',['uses'=>'PostsController@store','as'=>'post.store']);

    Route::get('post/delete/{id}',['uses'=>'PostsController@destroy','as'=>'post.delete']);

    Route::get('post/kill/{id}',['uses'=>'PostsController@kill','as'=>'post.kill']);

    Route::get('post/restore/{id}',['uses'=>'PostsController@restore','as'=>'post.restore']);

    Route::post('post/update/{id}',['uses'=>'PostsController@update','as'=>'post.update']);

    Route::get('post/edit/{id}',['uses'=>'PostsController@edit','as'=>'post.edit']);

    Route::get('post/searchPost',['uses'=>'PostsController@searchPost','as'=>'post.searchPost']);

    Route::get('post/searchPostTrashed',['uses'=>'PostsController@searchPostTrashed','as'=>'post.searchPostTrashed']);


    /* ---------------------------------------- CATEGORY ---------------------------------------- */

    Route::get('category/create',['uses'=>'CategoriesController@create','as'=>'category.create']);

    Route::post('category/store',['uses'=>'CategoriesController@store','as'=>'category.store']);

    Route::get('categories',['uses'=>'CategoriesController@index','as'=>'categories']);

    Route::get('category/edit/{id}',['uses'=>'CategoriesController@edit','as'=>'category.edit']);

    Route::get('category/delete/{id}',['uses'=>'CategoriesController@destroy','as'=>'category.delete']);

    Route::post('category/update/{id}',['uses'=>'CategoriesController@update','as'=>'category.update']);

    Route::get('category/searchCat',['uses'=>'CategoriesController@searchCat','as'=>'category.searchCat']);


    /* ---------------------------------------- TAG ---------------------------------------- */

    Route::get('tags',['uses'=>'TagsController@index','as'=>'tags']);

    Route::get('tag/create',['uses'=>'TagsController@create','as'=>'tag.create']);

    Route::post('tag/store',['uses'=>'TagsController@store','as'=>'tag.store']);

    Route::get('tag/edit/{id}',['uses'=>'TagsController@edit','as'=>'tag.edit']);

    Route::post('tag/update/{id}',['uses'=>'TagsController@update','as'=>'tag.update']);

    Route::get('tag/delete/{id}',['uses'=>'TagsController@destroy','as'=>'tag.delete']);

    Route::get('tag/searchTag',['uses'=>'TagsController@searchTag','as'=>'tag.searchTag']);


    /* ---------------------------------------- USER ---------------------------------------- */

    Route::get('users',['uses'=>'UsersController@index', 'as'=>'users']);

    Route::get('user/create',['uses'=>'UsersController@create', 'as'=>'user.create']);

    Route::post('user/store',['uses'=>'UsersController@store','as'=>'user.store']);

    Route::get('user/admin({id}',['uses'=>'UsersController@admin','as'=>'user.admin']);

    Route::get('user/not-admin({id}',['uses'=>'UsersController@not_admin','as'=>'user.not.admin']);

    Route::get('user/delete({id}',['uses'=>'UsersController@destroy','as'=>'user.delete']);

    Route::get('user/profile',['uses'=>'UsersController@profile','as'=>'user.profile']);

    Route::name('user.update_avatar')->post('user/update_avatar',['uses'=>'UsersController@update_avatar']);

    Route::get('user/searchUser',['uses'=>'UsersController@searchUser', 'as'=>'user.searchUser']);


    /* ---------------------------------------- SETTINGS ---------------------------------------- */

    Route::get('settings',['uses'=>'SettingsController@index','as'=>'settings']);

    Route::get('settings/index',['uses'=>'SettingsController@indexV','as'=>'settings.index']);

    Route::post('settings/update',['uses'=>'SettingsController@update','as'=>'settings.update'])->middleware('admin');

    /* ---------------------------------------- SETTINGS ---------------------------------------- */




});
