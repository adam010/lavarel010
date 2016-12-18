<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\CommentReply;
use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

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
    public function post($slug){
        $post =$post = Post::where('slug', $slug)->firstOrFail();
        $comments = $post->comments()->whereStatus(1)->get();
        $categories= Category::all();
            

       /* foreach ($coms as $comment){          
        
            $comment['replies']=$comment->replies()->whereStatus(1)->get();;
            $comments[]=$comment;
        }*/
      
        return view('post',compact('post','comments','categories'));
    }
}
