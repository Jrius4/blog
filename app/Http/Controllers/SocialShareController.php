<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialShareController extends Controller
{
    //
public function share($id){
    $dataz=array(
        'result'=>"hello",
        'data'=>45
    );
    return view('posts.show',['data_array'=>$dataz]);
}

}
