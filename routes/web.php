<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/comments/{id}',['as'=>'post.comments','uses'=>'PostCommentsController@index']);
    Route::get('admin/comments/replies/{id}',['as'=>'comments.replies','uses'=>'CommentsRepliesController@show']);
    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/posts','AdminPostsController');
    Route::resource('admin/categories','AdminCategoriesController');
    Route::resource('admin/media','AdminMediaController');
    Route::resource('admin/comments','PostCommentsController');
    Route::resource('admin/comment/replies','CommentsRepliesController');

    Route::get('/admin',function(){
        return view('admin.index');
    });
    //Route::get('admin/media/create',['as'=>'admin.media.create','uses'=>'AdminMediaController@store']);
});