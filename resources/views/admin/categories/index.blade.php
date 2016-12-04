@extends('layouts.admin')

@section('content')
    @if(Session::has('Postdeleted'))
        <p class="bg-info">{{session('Postdeleted')}}</p>

    @endif

    <h1>Categories</h1>

    <table class="table table-inverse">
        <thead>
        <tr>
            <th>Id</th>
            <th>Category</th>

        </tr>
        </thead>
        <tbody>
        @if($categories)

            @foreach($categories as $category)

                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
                </tr>

            @endforeach
        @endif
        </tbody>
    </table>

@endsection