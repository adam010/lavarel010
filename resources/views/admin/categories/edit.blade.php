@extends('layouts.admin')

@section('content')

    <h1>Edit Category</h1>


    {{--<form method="post" action="/post">--}}
    {!! Form::model($category,['method'=>'Patch','action'=>'AdminCategoriesController@update',$category->id]) !!}

    <div class="form-group">
        {!! Form::text('category_id',null,['class'=>'form-control','readonly'=>'readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::text('name',null,['placeholder' => 'Category name','class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!!  Form::submit('Edit category',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}




@endsection