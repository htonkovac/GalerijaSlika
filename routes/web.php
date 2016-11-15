<?php

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

Route::get('/home', 'HomeController@index');
Route::get('/upload', 'UserController@uploadForm');
Route::post('/upload', 'UserController@upload');
/* popravi to http://stackoverflow.com/questions/30191330/laravel-5-how-to-access-image-uploaded-in-storage-within-view
Route::get('images/{filename}', function ($filename)
{
    return Image::make(storage_path() . '/' . $filename)->response();
});
 * */
 