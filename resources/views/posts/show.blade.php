@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-warning m-2" role="button">Go Back</a>
<h1>{{$post->title}}</h1>


<div>
    <p>{!!$post->body!!}</p>
    <img class="w-50" src="/storage/cover_images/{{$post->cover_image}}" alt="cover-image"/>
<hr/>

  

<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
<hr/>
@if(!Auth::guest())
@if(Auth::user()->id == $post->user_id)

<a href="/posts/{{$post->id}}/edit/" class="btn btn-info mr-1">Edit</a>|
{!! Form::open(['action'=>['PostsController@destroy',$post->id], 'method'=>'POST','class'=>'']) !!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
{!! Form::close() !!}
@endif
@endif
</div>
@endsection 