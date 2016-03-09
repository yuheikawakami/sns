<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('top');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //

    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/posts', 'PostsController@index');
    Route::get('/posts/{id}/edit', 'PostsController@edit');
    Route::get('/posts/{id}/show', 'PostsController@show');
    Route::post('/posts', 'PostsController@store');
    Route::patch('/posts/{id}', 'PostsController@update');
    Route::delete('/post/{id}','PostsController@destroy');

    Route::post('/posts/{post}/comments', 'CommentsController@store');

});
