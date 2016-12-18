    <!-- Comments Form -->
    <div class="well">
        @include('includes.create_user_form_errors')

        <h4>Leave a Comment:</h4>
        {!! Form::open(['method'=>'Post','action'=>'PostCommentsController@store','role'=>'form']) !!}
        {!! Form::hidden('post_id',$post->id,['class'=>'form-control']) !!}
        <div class="form-group">
            <p>{!! Form::textarea('content',null,['placeholder' => 'Write your comments here ...','cols'=>'100','rows'=>'3']) !!}</p>
        </div>
        {!!  Form::submit('Submit comment',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>

    <!-- Posted Comments -->
