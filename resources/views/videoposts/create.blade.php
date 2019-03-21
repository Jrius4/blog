@extends('layouts.app')

@section('content')
<h1>Create Video Form<h1>
    {!! Form::open(['action'=>'VideoPostController@store', 'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class'=>'form-control col-md-4','placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control col-md-4','placeholder'=>'Body text'])}}
    </div>
    <div class="form-group">
        {{Form::text('link','',['class'=>'form-control col-md-4','placeholder'=>'paste link to video'])}}
    </div>

    {{Form::submit('Submit Video',['class'=>'btn btn-success'])}}


    {!! Form::close() !!}
@endsection