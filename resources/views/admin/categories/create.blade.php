@extends('layouts.admin')

@section('content')

    <h1>Create Category</h1>


    {{--<form method="post" action="/post">--}}
    {!! Form::open(['method'=>'Post','action'=>'AdminCategoriesController@store']) !!}

        <div class="form-group">

        {!! Form::text('name',null,['placeholder' => 'Category name','class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!!  Form::submit('Create ',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}




@endsection