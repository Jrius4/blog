@extends('layouts.app')

@section('content')
<div>
<h1>{{$title}}</h1>
<p>
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius beatae nobis alias voluptates sit temporibus magnam culpa qui, reiciendis esse enim, repellat quaerat expedita
    doloremque? Dolorum sapiente minima eum laboriosam?
</p>
<hr />
@if(count($services)>0)
<div class="card shadow-sm col-md-4 m-2 p-2">
    <ul class="list-group">
        @foreach($services as $service)
        <li class="list-group-item">{{$service}}</li>
        @endforeach
    </ul>
    @endif
</div> 
</div>
@endsection