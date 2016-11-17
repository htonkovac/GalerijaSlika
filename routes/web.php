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

Route::get('images/{filename}', function ($filename)
{
    $path = storage_path('app/uploads') . '/' . $filename;

    if(!File::exists($path)){ abort(404);}

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
Route::get('/{username}','UserController@show');
