@extends('layouts.app')

@section('content')
<h1>Create Form<h1>
    {!! Form::open(['action'=>'PostsController@store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class'=>'form-control col-md-4','placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control col-md-4','placeholder'=>'Body text'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image',['class'=>'btn btn-default'])}}
    </div>

    {{Form::submit('Submit',['class'=>'btn btn-success'])}}


    {!! Form::close() !!}
@endsection