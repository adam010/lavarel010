@extends('layouts.blog-post')
@section('content')
    @if(Session::has('Postdeleted'))
        <h2 class="bg-info">{{session('Postdeleted')}}</h2>

    @endif
    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> {{date_format($post->created_at, 'F jS, Y, \a\t g:i a')}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="http://placehold.it/900x300" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam
        sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus
        inventore?</p>
    <p>{{$post->content}}</p>


    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    @if(Auth::user())
    @include('includes/comments_form')

    @endif
    <hr>
    <!-- Posted Comments -->

    <!-- Comment -->
    @if(!$comments)
        <h2>No Comments</h2>
    @else
        @foreach($comments as $comment)

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" height="64" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$post->title}}
                        <small>{{date_format($comment->created_at,'F jS, Y, \a\t g:i a')}}</small>
            </h4>
            {{$comment->content}}
                        @if (count($comment->replies)> 0)
                            @foreach($comment->replies as $reply)

                                <!-- Nested Comment -->
                                    <div class="nested-comment media">
                                        <a class="pull-left" href="#">
                                            <img height="64" class="media-object" src="http://placehold.it/64x64" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Reply by:{{$reply->author}}
                                                <small>{{date_format($reply->created_at,'F jS, Y, \a\t g:i a')}}</small>
                                            </h4>
                                            {{$reply->content}}
                                        </div>

                                    </div>

                            @endforeach

                        @endif
                        <!-- End Nested Comment -->

                </div>
                <div class="comment-reply-container">

                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                    <div class="comment-reply">
                        {!! Form::open(['method'=>'Post','action'=>'CommentsRepliesController@createreply']) !!}
                        <div class="form-group">
                            {!! Form::hidden('comment_id',$comment->id,['class'=>'form-control']) !!}
                            <p>{!! Form::textarea('content',null,['placeholder' => 'Write your reply here ...','cols'=>'100','rows'=>'2']) !!}</p>
                        </div>
                        <div class="form-group">
                            {!!  Form::submit('Submit reply',['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        @endforeach
    @endif
@endsection
@section('categories')
@include('includes/category_menu')
@endsection
@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function(){
        $(".comment-reply")git.slideToggle("slow");

        })


    </script>
@endsection