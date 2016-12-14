<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsRequest;
use App\Http\Requests\PostsUpdateRequest;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories= Category::lists('name', 'id');
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        //return $request->all();
        $user=Auth::user();
        //$category=$request->Category_id;
        $input=$request->all();

        $user->posts()->create($input);

        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post=Post::findOrFail($id);
        $user='';
            //$post->user->id;;

        $categories= Category::lists('name', 'id');
        if(Auth::check()) {
            $user= Auth::user()->id;

        }
        return view('admin.posts.edit',compact('post','categories','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsUpdateRequest $request, $id)
    {
       $user=User::findOrFail($request->user_id);
        //$user=
        $input = $request->all();
        $user->posts()->whereId($id)->first()->update($input);
      //  $post->update($input);

        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::findOrFail($id)->delete($id);

        session()->flash('Postdeleted', 'Post succesfully deleted!');
        return redirect('admin/posts');

    }
  /*  public function post($id){

        $post =Post::findOrFail($id);
        return view('post',compact('post'));

    }*/
}
