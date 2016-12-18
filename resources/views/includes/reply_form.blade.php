<!-- Comments Form
<div class="well"-->
    @include('includes.create_user_form_errors')
    {!! Form::open(['method'=>'Post','action'=>'CommentsRepliesController@createreply']) !!}
    <div class="form-group">
        {!! Form::hidden('comment_id',$comment->id,['class'=>'form-control']) !!}
        <p>{!! Form::textarea('content',null,['placeholder' => 'Write your reply here ...','cols'=>'100','rows'=>'2']) !!}</p>
    </div>
    <div class="form-group">
        {!!  Form::submit('Submit reply',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
<!--</div>
 Posted Comments -->