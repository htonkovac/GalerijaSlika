<?php
//use Image;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home', 'HomeController@index'); //must die
Route::get('/upload', 'UserController@uploadForm');
Route::post('/upload', 'UserController@upload');
Route::get('/manage','UserController@manage');
Route::get('images/{filename}','ImageController@showImage');
Route::get('/{username}','UserController@show');
