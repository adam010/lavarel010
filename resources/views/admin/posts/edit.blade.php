@extends('layouts.admin')

@section('content')

    <h1>Edit Post</h1>

    {!! Form::model($post,['method'=>'Patch','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}
    {!! Form::hidden('user_id',$post->user->id,['class'=>'form-control']) !!}
    <div class="form-group">
        {!! Form::select('category_id',$categories, null, ['placeholder' => 'Please select Post category ...','class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::file('photo_id',null,['placeholder' => 'Upload Post image ...','class'=>'btn btn-primary']) !!}
    </div>
    <div class="form-group">

        {!! Form::text('title',null,['placeholder' => 'Give this post a title','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('content',null,['placeholder' => 'Write your post content here ...','cols'=>'60','rows'=>'10']) !!}
    </div>

   <div class="form-group">
        {!! Form::submit('Edit this post',['class'=>'btn btn-primary col-sm-6']) !!}</div>
    {!! Form::close() !!}




    {!! Form::close() !!}
    <div class="form-group">
        {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}

        {!! Form::submit('DELETE this post',['class'=>'btn btn-danger col-sm-6']) !!}

        {!! Form::close() !!}
    </div>
@endsection