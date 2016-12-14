<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\CommentReply;
use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function post($id){
        $post =Post::findOrFail($id);
        $categories= Category::all();
        $coms = $post->comments()->whereStatus(1)->get();
            //Post::find($id)->comments->whereStatus(1)->get();
        $comments=[];
        foreach ($coms as $comment){

            $replies=Comment::find($comment->id)->replies;
            $comment['replies']=$replies;
            $comments[]=$comment;
        }
      
        return view('post',compact('post','comments','categories'));
    }
}
