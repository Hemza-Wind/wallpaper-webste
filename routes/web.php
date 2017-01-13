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
    return view('/');
});

Route::get('/upload', function () {
    return view('/upload');
});

Auth::routes();
Route::get('/', 'ImagesController@index');
Route::post('/upload' , 'ImagesController@store');
Route::get('/albums', 'AlbumsController@index');
Route::get('/myuploads', 'MyuploadsController@index');
Route::delete('/myuploads', 'MyuploadsController@destroy');