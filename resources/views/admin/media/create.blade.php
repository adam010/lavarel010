@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@endsection
@section('content')
    @if(Session::has('Postcreate'))
        <p class="bg-info">{{session('Postcreate')}}</p>

    @endif
    <h1>Upload Media</h1>

       {!! Form::open(['method'=>'Post','action'=>'AdminMediaController@store','class'=>'dropzone']) !!}


    {!! Form::close() !!}




@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

@stop