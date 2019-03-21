@extends('layouts.app')

@section('content')
<a href="/videoposts" class="btn btn-warning m-2" role="button">Go Back</a>
<h1>{{$videopost->title}}</h1>


<div>
    <p>{!!$videopost->body!!}</p>
    <iframe class="w-50" src="{{$videopost->link}}" alt="cover-image"></iframe>
<hr/>

  

<small>Written on {{$videopost->created_at}} by {{$videopost->user->name}}</small>
<hr/>
@if(!Auth::guest())
@if(Auth::user()->id == $videopost->user_id)

<a href="/videoposts/{{$videopost->id}}/edit/" class="btn btn-info mr-1">Edit</a>|
{!! Form::open(['action'=>['VideoPostController@destroy',$videopost->id], 'method'=>'POST','class'=>'']) !!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
{!! Form::close() !!}
@endif
@endif
</div>
@endsection 