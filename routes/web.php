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

Route::get('/', 'HomeController@getUsers');//makes no sense


Auth::routes();

Route::get('/upload', 'UserController@uploadForm');
Route::post('/upload', 'UserController@uploadImage');

Route::get('/manage','UserController@manage');
Route::post('/manage','UserController@updateImage');

Route::get('/search','GalleryController@search');

Route::get('images/{filename}','GalleryController@showImage');
Route::get('/{username}','GalleryController@showGallery');


