@extends('layouts.admin')

@section('content')
    @if(Session::has('Postdeleted'))
        <p class="bg-info">{{session('Postdeleted')}}</p>

    @endif
    <style>
        .circle{border-radius: 50%/50%;
            width: 24px;
            height: 24px;
        }
    </style>

    @if(count($replies)>0)
        <h1>Comments (<span style="font:12px">{{count($replies)}}</span>)</h1>
        <table class="table table-inverse">
            <thead>
            <tr>


                <th>ID</th>
                <th>Status</th>
                <th>Author</th>
                <th>Email</th>
                <th>Created</th>
                <th></th>
                <th></th>

                <th></th>
            </tr>
            </thead>
            <tbody>


            @foreach($replies as $reply)

                <tr>

                    <td>{{$reply->id}}</td>
                    <td><div class="circle {{$reply->status ? 'btn-success':'btn-info'}}"> </div></td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->created_at->diffForhumans()}}</td>
                    <td><a href="{{route('home.post',$reply->id)}}">View replies</a> </td>
                    <td>
                        {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$reply->id]]) !!}
                        @if($reply->status==1)
                            {!! Form::hidden('status',0,[]) !!}
                            {!!  Form::submit('Un-Approve',['class'=>'btn btn-info','title'=>'Pending approval']) !!}

                        @else
                            {!! Form::hidden('status',1,['class'=>'form-control']) !!}
                            {!!  Form::submit('Approve',['class'=>'btn btn-success']) !!}

                        @endif
                        {!! Form::close() !!}

                    </td>
                    <td>

                        {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$reply->id]]) !!}

                        {!!  Form::submit('Delete',['class'=>'btn btn-danger']) !!}

                        {!! Form::close() !!}

                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
    @else
        <h2 class="text-center">No replies</h2>
    @endif <!-- comments -->

@endsection