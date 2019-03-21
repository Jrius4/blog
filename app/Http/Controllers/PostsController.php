<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
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
        //$posts = Post::orderBy('updated_at','desc')->get();
        $data=array(
            'title'=>'',
            'posts'=> Post::orderBy('updated_at', 'desc')->paginate(5)

        );
        //$posts = Post::orderBy('updated_at', 'desc')->paginate(5);
        //$posts = Post::all();
        //$posts=DB::select('SELECT * FROM posts')
        //return Post::where('title','Post two')->get(); 
       // return view('posts.index')->with('posts', $posts);
       return view('posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=array(
            'title'=>''
        );
        return view('posts.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999'
        ]);
        //

        //handle file Upload
        //
        if ($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            
          //  $imageName = time() . '.' . request()->cover_image->getClientOriginalExtension();



            //request()->cover_image->move(public_path('cover_images'), $fileNameToStore);

            //return back()->with('success', 'You have successfully upload image.');
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $data=array(
            'title'=>'',
            'success'=>'Post Created'
        );

        //Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        return redirect('/posts')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=array(
            'title'=>'',
            'post'=>Post::find($id)
        );
        //$post = Post::find($id);
        return view('posts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=array(
            'title'=>'',
            'error'=>'Unathorized page',
            'post'=>Post::find($id)
        );
    
        // check for correct user
        if (auth()->user()->id !== Post::find($id)->user_id) {
            return redirect('/posts')->with($data);
        }


        return view('posts.edit')->with($data);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        //handle file Upload
        if ($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
           // request()->cover_image->move(public_path('cover_images'), $fileNameToStore);
        }
        $data=array(
            'title'=>'',
            'success'=>'Post Updated'
        );

        //Update Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $data=array(
            'title'=>'',
            'success'=>'Post Removed'
        );
        
       
        // check for correct user
        if (auth()->user()->id !== Post::find($id)->user_id) {
            return redirect('/posts')->with('error', 'Unathorized page');
        }
        if (Post::find($id)->cover_image != 'noimage.jpg') {
            //Delete image
            Storage::delete('public/cover_images/' . Post::find($id)->cover_image);
            Storage::delete(public_path('cover_images/') . Post::find($id)->cover_image);
        }
        Post::find($id)->delete();
        return redirect('/posts')->with($data);
    }
}
