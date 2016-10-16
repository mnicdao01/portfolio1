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

Route::get('/contact', 'PagesController@getContact');
Route::post('/contact', ['as' => 'pages.contact', 'uses' => 'PagesController@postContact']);
Route::get('/contact', ['as' => 'pages.landing', 'uses' => 'PagesController@getLanding']);
Route::get('/about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');
Route::resource('posts', 'PostController');
Route::get('blog/{slug}', ['as' => 'blog.single','uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses'=>'BlogController@index', 'as' => 'blog.index']);

Auth::routes();

//Route::get('/home', 'PostController@index');

//Category Resource
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
Route::resource('tags', 'TagController', ['except' => ['create']]);
