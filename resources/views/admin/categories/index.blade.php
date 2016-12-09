@extends('layouts.admin')

@section('content')
    @if(Session::has('Postdeleted'))
        <p class="bg-info">{{session('Postdeleted')}}</p>

    @endif
    <h1>Categories</h1>
<div class="col-sm-6">

    {{--<form method="post" action="/post">--}}
    {!! Form::open(['method'=>'Post','action'=>'AdminCategoriesController@store']) !!}

    <div class="form-group">

        {!! Form::text('name',null,['placeholder' => 'Category name','class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!!  Form::submit('Create ',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

</div>


    <div class="col-sm-6">


    <table class="table table-inverse">
        <thead>
        <tr>
            <th>Id</th>
            <th>Category</th>
            <th>Created</th>

        </tr>
        </thead>
        <tbody>
        @if($categories)

            @foreach($categories as $category)

                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
                    <td>{{$category->created_at->DiffForhumans()}}</td>
                </tr>

            @endforeach
        @endif
        </tbody>
    </table>
    </div>
@endsection