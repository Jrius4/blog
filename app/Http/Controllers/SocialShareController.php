<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialShareController extends Controller
{
    //
public function share($id){
    $result="hello";
    return view('posts.show',['data_array'=>$result]);
}

}
