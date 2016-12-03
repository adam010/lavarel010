@extends('layouts.admin')

@section('content')
    <h1>Edit User</h1>
    <div class="col-sm-3">

        <img src="{{$user->photo ? $user->photo->file:'http://placehold.it/400x400'}}" alt="No image" class="img-responsive img-rounded">
    </div>
    <div class="col-sm-9">
        @include('includes.create_user_form_errors')

        {{--<form method="post" action="/post">--}}
        {!! Form::model($user,['method'=>'Patch','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}


        <div class="form-group">

            {!! Form::label('title','Name')!!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('title','Email')!!}
            {!! Form::text('email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','Password')!!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id','Role')!!}
            {!! Form::select('role_id',$roles, null, ['placeholder' => 'Please select User Role...','class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('status','Status')!!}
            {!! Form::select('status',array(1=>'Active',0=>'Non-active'), null, ['placeholder' => 'Please select User Status ...','class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('photo_id','Photo')!!}
            {!! Form::file('photo_id',null,['class'=>'btn btn-primary']) !!}</div>
        <div class="form-group">
            {!! Form::submit('Edit user',['class'=>'btn btn-primary col-sm-6']) !!}</div>



        {!! Form::close() !!}
        <div class="form-group">
            {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}

            {!! Form::submit('DELETE user',['class'=>'btn btn-danger col-sm-6']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection