@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body bg-secondary">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="card-body">
                        <a href="/posts/create" class="btn btn-primary">Add Post</a>
                        <h3>Your Blog Posts</h3>
                        @if(count($posts)>0)
                        <table class="table table-striped table-info">
                            <thead>
                                <th>Title</th>

                                <th style="colspan:2">Action</th>
                            </thead>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td>
                                    {!! Form::open(['action'=>['PostsController@destroy',$post->id], 'method'=>'POST','class'=>'']) !!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                    {!! Form::close() !!}
</td>
                            </tr>

                            @endforeach
                        </table>
                        @else
                        <p class="text-warning">You have no posts</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 