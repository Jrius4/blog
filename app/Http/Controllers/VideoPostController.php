<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VideoPost;

class VideoPostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data=array(
            'title'=>'',
            'videoposts'=> VideoPost::orderBy('updated_at', 'desc')->paginate(5)

        );

        return view('videoposts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=array('title'=>''
    );
        return view('videoposts.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'link' => 'required'
        ]);
        //
        $data=array(
            'title'=>'',
            'success'=>'Post Created'
        );
        //Create Post

        $videopost = new VideoPost();
        $videopost->title = $request->input('title');
        $videopost->body = $request->input('body');
        $videopost->link=$request->input('link');
        $videopost->user_id = auth()->user()->id;
        $videopost->save();
        return redirect('/videoposts')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data=array(
            'title'=>'',
            'videopost'=>VideoPost::find($id)
        );
        return view('videoposts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data=array(
            'title'=>'',
            'videopost'=>VideoPost::find($id)
        );
       
        // check for correct user
        if (auth()->user()->id !== VideoPost::find($id)->user_id) {
            return redirect('/videoposts')->with('error', 'Unathorized page');
        }


        return view('videoposts.edit')->with($data);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Update Post
        $data=array(
            'title'=>'',
            'success'=>'Video Post Updated'
        );
        $videopost = VideoPost::find($id);
        $videopost->title = $request->input('title');
        $videopost->body = $request->input('body');
        $videopost->link = $request->input('link');
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'link' => 'required',
        ]);
        $videopost->save();

        return redirect('/videoposts')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=array(
            'title'=>'',
            'success'=>' video Post Removed'
        );
       
        $videopost = VideoPost::find($id);
        // check for correct user
        if (auth()->user()->id !== $videopost->user_id) {
            return redirect('/videoposts')->with('error', 'Unathorized page');
        }

        $videopost->delete();
        return redirect('/videoposts')->with($data);
    }
}
