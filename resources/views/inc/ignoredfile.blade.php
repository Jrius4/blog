<!--
<div class="header-bg-video">
   
        <div class="blog-header player" style="width:100%;height:400px" data-property="{videoURL:'https://www.youtube.com/watch?v=fdJc1_IBKJA',containment:'.video-section', quality:'large', autoPlay:true, mute:true, opacity:1}">
        @include('inc.navbar')
            <div class="jumbotron text-center" style="margin-top:-55px;padding-top:80px;background-color:transparent">
                    <div>
                    <h1 class="jumbotron" style="background-color:transparent">{{$title}}</h1>
                                <p class="lead">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius beatae nobis alias voluptates sit temporibus magnam culpa qui, reiciendis esse enim, repellat quaerat expedita
                                                doloremque? Dolorum sapiente minima eum laboriosam?
                                                <hr />
                                                @if(Auth::guest())
                                                <p>
                                                <a href="/login" class="btn btn-primary btn-lg" role="button">Login</a>
                                                <a href="/register" class="btn btn-success btn-lg" role="button">register</a>
                                                </p>
                                                @endif
                                            </p>
                    </div>

            </div>
        </div>

</div> 
-->
<div class="sectio">
    <h1>Hello world</h1>
<div class="video-container">
<div class="color-overlay"></div>
    <video autoplay loop muted >
                    <source src="{{asset('storage/cover_images/video3.mp4')}}" type="video/mp4">
            </video>
</div>
</div>


@if($title=='Welcome to ndebitech Designs blog!')
        @include('inc.header')        
        @else
        @include('inc.navbar')
        @endif


        <script type="text/javascript">
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'article-ckeditor' );
        </script>

<script src="{{ asset('/vendor/ckeditor/ckeditor/ckeditor.js') }}"></script>