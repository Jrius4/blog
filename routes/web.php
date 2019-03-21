<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/','PagesController@index');

Route::get('/about', 'PagesController@about');

 Route::get('/services', 'PagesController@services');

 Route::resource('/posts','PostsController');
 Route::resource('/videoposts','VideoPostController');


/*
 Route::get('/users/{id}/{name}', function ($id,$name) {
    return 'this is user with '.$id.' and name as '.$name;
});
*/
 
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
