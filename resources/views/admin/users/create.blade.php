@extends('layouts.admin')

@section('content')
    <h1>Create User</h1>

    {{--<form method="post" action="/post">--}}
    {!! Form::open(['method'=>'Post','action'=>'AdminUsersController@store','files'=>true]) !!}


    <div class="form-group">

            {!! Form::text('name',null,['placeholder' => 'User full name','class'=>'form-control']) !!}
    </div>
    <div class="form-group">

         {!! Form::text('email',null,['placeholder' => 'Valid email address','class'=>'form-control']) !!}
    </div>
    <div class="form-group">

            {!! Form::password('password',['placeholder' => 'User password','class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::select('role_id',$roles, null, ['placeholder' => 'Please select User Role...','class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::select('status',array(1=>'Active',0=>'Non-active'), 0, ['placeholder' => 'Please select User Status ...','class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('photo_id','Photo')!!}
        {!! Form::file('photo_id',null,['class'=>'btn btn-primary']) !!}</div>
    <div class="form-group">
            {!! Form::submit('Create user',['class'=>'btn btn-primary']) !!}</div>


    {!! Form::close() !!}

@endsection