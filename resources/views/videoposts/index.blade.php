@extends('layouts.app')

@section('content')
<h1>Posts</h1>
@if(count($videoposts)>0)
@foreach($videoposts as $videopost)
<div class="card p-2">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <!--<iframe class="w-100" src="{{$videopost->link}}"></iframe>-->
            <iframe class="w-100" src="{{$videopost->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-md-8 col-sm-8">
                <h3><a href="/videoposts/{{$videopost->id}}">{{$videopost->title}}</a></h3>
    <small>Written on {{$videopost->created_at}} by {{$videopost->user->name}}</small>

        </div>
    </div>

</div>
@endforeach
{{$videoposts->links()}}

@else
<p>No video posts found</p>
@endif

@endsection

