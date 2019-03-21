<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $title='';
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $data=array(
            'title'=>'',
            'user_id'=>auth()->user()->id,
            'posts'=>User::find($user_id)->posts
        );
        return view('dashboard')->with($data);
    }
}
