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


















<h1>Sharing using FB.ui() Dialogs</h1>

<p>Below are some simple examples of how to use UI dialogs in a web page.</p>

<h3>Sharing Links</h3>

<div id="shareBtn" class="btn btn-success clearfix">Share Dialog</div>

<p>The Share Dialog enables you to share links to a person's profile without them having to use Facebook Login. <a href="https://developers.facebook.com/docs/sharing/reference/share-dialog">Read our Share Dialog guide</a> to learn more about how it works.</p>

<script>
document.getElementById('shareBtn').onclick = function() {
  FB.ui({
    display: 'popup',
    method: 'share',
    href: 'https://developers.facebook.com/docs/',
  }, function(response){});
}
</script>

<h3>Publishing Open Graph Stories</h3>

<p>The Share Dialog can also be used to publish Open Graph stories without using Facebook Login or the Graph API. <a href="https://developers.facebook.com/docs/sharing/reference/share-dialog">Read our Share Dialog guide</a> to learn more about how it works.</p>

<div id="ogBtn" class="btn btn-success clearfix">Simple OG Dialog</div>

<script>
document.getElementById('ogBtn').onclick = function() {
  FB.ui({
    display: 'popup',
    method: 'share_open_graph',
    action_type: 'og.likes',
    action_properties: JSON.stringify({
        object:'https://developers.facebook.com/docs/',
    })
  }, function(response){});
}
</script>

<h3>Sending App Requests</h3>

<p><a href="https://developers.facebook.com/docs/games/requests/">Requests</a> can be sent by any Facebook Apps that are categorised as Games and have a Canvas, iOS, or Android implementation. The JavaScript SDK enables web Canvas games to send requests. <a href="https://developers.facebook.com/docs/games/requests/">Read our guide to Requests</a> to learn more and see more complex examples that you could use.</p>

<div id="requestsBtn" class="btn btn-success clearfix">Basic Request Dialog</div>

<script>
document.getElementById('requestsBtn').onclick = function() {
  FB.ui({method: 'apprequests',
      message: 'This is a test message for the requests dialog.'
  }, function(data) {
    Log.info('App Requests Response', data);
  });
}
</script>


public function upload_video(Request $request){
  $data=$request->all();
  $rules=[
    'video'=>'mimes:mpeg,oggo,mp4,webm,wmv,mov,3gp,mov,flv,avi,mmv,ts|max'
    ]
  $validator=Validator($data,$rules);
  if($validator->fails()){
    return redirect()
    ->back()->withErrors($validator)->withInput();
  }else{
    $video=$data['video'];
    $input=time().$video->getClientOrginalExtension();
    $destinationPath='upload/videos';
    $video->move($destinationPath,$input);
    $user=video
  }

}
