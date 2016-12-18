@extends('layouts.admin')

@section('content')
    @if(Session::has('Postdeleted'))
        <p class="bg-info">{{session('Postdeleted')}}</p>

    @endif

<h1>Posts</h1>

<table class="table table-inverse">
    <thead>
    <tr>

        <th>User</th>
        <th>Category</th>
        <th>Title</th>
        <th>Created</th>
        <th>Updated</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if($posts)

        @foreach($posts as $post)

            <tr>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category->name}}</td>
                <td width="200px"><a href={{route('admin.posts.edit',$post->id)}}>{{$post->title}}</a></td>
                <td>{{$post->created_at->diffForhumans()}}</td>
                <td><a href="{{route('home.post',$post->slug)}}">View post</a></td>
                <td><a href="{{route('post.comments',$post->id)}}">View comments</a></td>
            </tr>

        @endforeach
    @endif
    </tbody>
</table>
    <div class="row">
        <div class="col-sm-6 col-sm-ofsset-5">
            {{$posts->render()}}
        </div>

    </div>
@endsection
