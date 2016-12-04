@extends('layouts.admin')

@section('content')

    <h1>Edit Category</h1>


    {{--<form method="post" action="/post">--}}
    {!! Form::model($category,['method'=>'Patch','action'=>['AdminCategoriesController@update',$category->id]]) !!}

    <div class="form-group">
        {!! Form::text('id',null,['class'=>'form-control', 'readonly'=>'readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::text('name',null,['placeholder' => 'Category name','class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!!  Form::submit('Edit category',['class'=>'btn btn-primary col-sm-6']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::close() !!}
    <div class="form-group">
        {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}

        {!! Form::submit('DELETE this category',['class'=>'btn btn-danger col-sm-6']) !!}

        {!! Form::close() !!}
    </div>


@endsection