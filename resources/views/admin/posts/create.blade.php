@extends('layouts.admin')

@section('content')

    <h1>Create Post</h1>


    {{--<form method="post" action="/post">--}}
    {!! Form::open(['method'=>'Post','action'=>'AdminPostsController@store']) !!}
    {!! Form::hidden('user_id',Auth::user()->id,['class'=>'form-control']) !!}
    <div class="form-group">
        {!! Form::select('Category_id',$categories, 0, ['placeholder' => 'Please select Post category ...','class'=>'form-control']) !!}
    </div>


    <div class="form-group">

        {!! Form::text('title',null,['placeholder' => 'Give this post a title','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('content',null,['placeholder' => 'Write your post content here ...','cols'=>'60','rows'=>'10']) !!}
    </div>

    <div class="form-group">
       {!!  Form::submit('Create post',['class'=>'btn btn-primary']) !!}
    </div>
    <div class="form-group">
        {!! Form::file('photo_id',null,['placeholder' => 'Upload Post image ...','class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}




@endsection