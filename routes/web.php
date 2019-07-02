<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Input;
use App\Category;
use App\Post;
use App\Notifications\DatabaseNotification;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/



Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');




Route::get('/notify',function (){
    $users=User::all();
    $letter = collect(['title'=>'New Policy Update','We have updated our TOS and privacy Policy, Kidly Read it!']);

    Notification::send($users,new DatabaseNotification($letter));

    echo ("Notification Sent to All Users!");
});

Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){

    Route::get('/home',['uses'=>'HomeController@index','as'=>'home']);


    /* ---------------------------------------- POST ---------------------------------------- */

    Route::get('posts',['uses'=>'PostsController@index','as'=>'posts']);

    Route::get('post/info/{id}',['uses'=>'PostsController@info','as'=>'post.info']);

    Route::get('displayposts',['uses'=>'PostsController@displayposts','as'=>'displayposts']);

    Route::get('postsIndex',['uses'=>'PostsController@postsIndex','as'=>'postsIndex']);

    Route::get('/posts/trashed',['uses'=>'PostsController@trashed','as'=>'posts.trashed']);

    Route::get('post/create',['uses'=>'PostsController@create','as'=>'post.create']);

    Route::post('post/store',['uses'=>'PostsController@store','as'=>'post.store']);

    Route::get('post/delete/{id}',['uses'=>'PostsController@destroy','as'=>'post.delete']);

    Route::get('post/kill/{id}',['uses'=>'PostsController@kill','as'=>'post.kill']);

    Route::get('post/restore/{id}',['uses'=>'PostsController@restore','as'=>'post.restore']);

    Route::post('post/update/{id}',['uses'=>'PostsController@update','as'=>'post.update']);

    Route::get('post/edit/{id}',['uses'=>'PostsController@edit','as'=>'post.edit']);

    Route::get('post/searchPost',['uses'=>'PostsController@searchPost','as'=>'post.searchPost']);

    Route::get('post/searchBarcode',['uses'=>'PostsController@searchBarcode','as'=>'post.searchBarcode']);

    Route::get('post/searchTrashedPost',['uses'=>'PostsController@searchTrashedPost','as'=>'post.searchTrashedPost']);

    Route::get('post/searchPostTrashed',['uses'=>'PostsController@searchPostTrashed','as'=>'post.searchPostTrashed']);



    Route::get('purchase',['uses'=>'PostsController@purchase','as'=>'purchase']);


    Route::post('post/purchase_update/{id}',['uses'=>'PostsController@purchase_update','as'=>'post.purchase_update']);




    /* ---------------------------------------- PURCHASE ---------------------------------------- */

    Route::get('purchases',['uses'=>'PurchasesController@index','as'=>'purchases']);

    Route::post('purchase/update/{id}',['uses'=>'PurchasesController@update','as'=>'purchase.update']);

    Route::get('purchase/edit/{id}',['uses'=>'PurchasesController@edit','as'=>'purchase.edit']);

    Route::get('purchase/create',['uses'=>'PurchasesController@create','as'=>'purchase.create']);

    Route::post('purchase/store',['uses'=>'PurchasesController@store','as'=>'purchase.store']);

    Route::get('purchase/searchBarcode',['uses'=>'PurchasesController@searchBarcode','as'=>'purchase.searchBarcode']);

    Route::post('purchase/update_quantity/{id}',['uses'=>'PurchasesController@update_quantity','as'=>'purchase.update_quantity']);

    Route::get('purchase/search',['uses'=>'PurchasesController@search','as'=>'purchase.search']);

    Route::get('purchase/delete/{id}',['uses'=>'PurchasesController@destroy','as'=>'purchase.delete']);


    /* ---------------------------------------- SALE ---------------------------------------- */

    Route::get('sales',['uses'=>'SalesController@index','as'=>'sales']);

    Route::get('sale/create',['uses'=>'SalesController@create','as'=>'sale.create']);

    Route::post('sale/store',['uses'=>'SalesController@store','as'=>'sale.store']);

    Route::get('sale/searchBarcode',['uses'=>'SalesController@searchBarcode','as'=>'sale.searchBarcode']);

    Route::get('sale/delete/{id}',['uses'=>'SalesController@destroy','as'=>'sale.delete']);





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

    Route::post('user/update/{id}',['uses'=>'UsersController@update','as'=>'user.update']);

    Route::get('user/edit/{id}',['uses'=>'UsersController@edit','as'=>'user.edit']);
    Route::get('user/add_user/{id}',['uses'=>'UsersController@add_user','as'=>'user.add_user']);
    Route::post('user/update_add_user/{id}',['uses'=>'UsersController@update_add_user','as'=>'user.update_add_user']);


    Route::get('user/create',['uses'=>'UsersController@create', 'as'=>'user.create']);

    Route::post('user/store',['uses'=>'UsersController@store','as'=>'user.store']);

    Route::get('user/admin({id}',['uses'=>'UsersController@admin','as'=>'user.admin']);

    Route::get('user/not-admin{id}',['uses'=>'UsersController@not_admin','as'=>'user.not.admin']);

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

