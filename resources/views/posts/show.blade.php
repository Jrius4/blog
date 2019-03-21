@extends('layouts.app')

@section('content')
<div id="fb-root"></div>

<a href="/posts" class="btn btn-warning m-2" role="button">Go Back</a>
<h1>{{$post->title}}</h1>


<div>
    <p>{!!$post->body!!}</p>
    <img class="w-50" src="/storage/cover_images/{{$post->cover_image}}" alt="cover-image"/>
<hr/>

  

<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
<hr/>
<div class="fb-share-button" data-href="http://ndebitech-blog.herokuapp.com/posts/5" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fndebitech-blog.herokuapp.com%2Fposts%2F5&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
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