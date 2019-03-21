@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex justify-content-center">
        <div class="media row m-auto">
                    <div class="col-md-4 m-2 w-100 media-body">
                    <h2 class="blog-h">Digital Marketing Skills</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, ipsum neque odio voluptates </p>
                    <a class="btn btn-outline-danger" href="#">Read More &raquo;</a>
                    </div>
                    <div class="col-md-4 m-2 align-self-center ml-auto w-100">
                    <img class="w-100 h-50" src="{{asset('storage/cover_images/penguins_brand.jpg')}}"/>
                    </div>
        </div>

        
</div>
<section class="col-md-12">
        <h2 class="blog-h text-center">As ndebitech, this is what we do</h2>
        <div class="row">
            <div class="col-sm-3">col</div>
            <div class="col-sm-3">col</div>
            <div class="col-sm-3">col</div>
        </div>
    </section>
    <section class="col-md-12">
        <h2 class="blog-h text-center">As ndeis what we do</h2>
        <div class="row">
            <div class="col-sm-3">col</div>
            <div class="col-sm-3">col</div>
            <div class="col-sm-3">col</div>
        </div>
    </section>
@endsection