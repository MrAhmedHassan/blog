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
*/

Route::get('/', function () {

    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/posts', 'PostController@index')
        ->name('posts.index');

    Route::get('/posts/create', 'PostController@create')
        ->name('posts.create');

    Route::post('/posts', 'PostController@store')
        ->name('photos.store');

    Route::get('/posts/{post}', 'PostController@show')
        ->name('posts.show');

    Route::get('/posts/{post}/edit', 'PostController@edit')
        ->name('posts.edit');

    Route::put("/posts/{post}", 'PostController@update')
        ->name('photos.update');

    Route::delete("/posts/{post}", 'PostController@destroy')
        ->name('photos.destroy');
});

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
