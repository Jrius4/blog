<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function index(){
        $title = "Welcome to ndebitech Designs blog!";
        return view('pages.index')->with('title',$title);
    }

    public function about(){
        $title = "About Us";
        return view('pages.about')->with('title',$title);
    }
    public function services(){
        $data = array(
            'title'=>'Serivces Page',
            'services'=>['Digital Marketing','Business Method Corpus design','Graphics & Video editing']
    );
        return view('pages.services')->with($data);
    }
}
