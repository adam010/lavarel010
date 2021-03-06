<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index');
Route::get('/post/{id}',['as'=>'home.post','uses'=>'HomeController@post']);
//

Route::auth();

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

Route::group(['middleware' => 'auth'], function () {
    Route::post('comment/reply','CommentsRepliesController@createreply');
});

