@extends('layouts.app')

@section('content')
<h1>Edit Post<h1>
    {!! Form::open(['action'=>['VideoPostController@update', $videopost->id], 'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',$videopost->title,['class'=>'form-control col-md-4','placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body',$videopost->body,['id'=>'article-ckeditor','class'=>'form-control col-md-4','placeholder'=>'Body text'])}}
    </div>
    <div class="form-group">
        {{Form::text('link',$videopost->link,['class'=>'form-control col-md-4','placeholder'=>'Update link to video'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}


    {!! Form::close() !!}
@endsection