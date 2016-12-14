<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentsRequest;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
        if($id)
            $comments=Post::findOrFail($id)->comments;
        else
            $comments=Comment::all();

        return view('admin.comments.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentsRequest $request)
    {
        $user=Auth::user();
        $data=[

            'post_id'=>$request->post_id,
            'author'=>$user->name,
             'email'=>$user->email,
             'content'=>$request->content,
        ];

        Comment::create($data);
        return redirect()->back();
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $comment= Comment::findorFail($id);
        $comment->status=$request->status;
        $comment->save();

        return redirect()->back();

    }
    public function updateStatus(Request $request, $id)
    {
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::findorFail($id)->delete();
        session()->flash('Postdeleted', 'Post succesfully deleted!');
        return redirect()->back();
    }

}
