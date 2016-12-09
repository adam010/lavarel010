@extends('layouts.admin')


@section('content')
    <h1>Media</h1>
    @if('photos')
    <table class="table table-inverse">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created</th>

        </tr>
        </thead>
        <tbody>
        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" width="50" src="{{$photo->file ? $photo->file:'http://placehold.it/50x50'}}" alt="no Image"></td>
                    <td>{{$photo->email}}</td>
                    <td>{{$photo->created_at}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$photo->id]]) !!}
                        {!! Form::submit('DELETE photo',['class'=>'btn btn-danger']) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    @endif
@endsection