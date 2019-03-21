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
<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
<br>
<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<br>
<script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
<script type="IN/Share" data-url="http://ndebitech-blog.herokuapp.com/posts/5"></script>
<br>
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
<div>
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





<hr>
@php($url=url('share/'.'56'))

<a href="javascript:void(0);" onclick="fb_share('{{ $url }}', '{{ 'news letters' }}')" class="fbBtm">facebook </a>`
<div id="fb-root"></div>
<script>
(function (d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id))
return;
js = d.createElement(s);
js.id = id;
js.src =
"//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=2326205684328396";
fjs.parentNode.insertBefore(js, fjs);
}
(document, 'script', 'facebook-jssdk'));
function fb_share(dynamic_link,dynamic_title) {
var app_id = '2326205684328396';
var pageURL="https://www.facebook.com/dialog/feed?app_id=" + app_id + "&link=" +
dynamic_link;
var w = 600;
var h = 400;
var left = (screen.width / 2) - (w / 2);
var top = (screen.height / 2) - (h / 2);
window.open(pageURL, dynamic_title, 'toolbar=no, location=no, directories=no,status=no, menubar=yes, scrollbars=no, resizable=no, copyhistory=no, width=' + 800 + ',height=' + 650 + ', top=' + top + ', left=' + left)
return false;
}
</script>

<meta property="og:url"
content="http://www.vadsangal.in/share/{{ 58 }}" />
<meta property="og:type"
content="website" />
<meta property="og:title"
content="{{ 'news title' }}" />
<meta property="og:description" content="{{ 'text body' }}" />
<meta property="og:image"
content="{{ asset('upload/news-event/'.'image') }}" />
</div>
@endsection 