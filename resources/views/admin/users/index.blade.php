@extends('layouts.admin')


@section('content')
    <h1>Users</h1>
    <table class="table table-inverse">
        <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td><img height="50" size="50" src="{{$user->photo ? $user->photo->file:'http://placehold.it/50x50'}}" alt='X'/></td>
                    <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->role}}</td>
                    <td>{{$user->status==true ? 'Yes': 'No' }}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection