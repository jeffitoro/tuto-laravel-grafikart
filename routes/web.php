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

// Route::group(['prefix' => 'admin','middleware'=>'ip'], function () {
//     Route::get('salut',// function () {
//         return 'salut les gens';
//     });
// });

Route::get('/', function () {
    return view('welcome');
});

Route::resource('news', 'PostController');
Route::resource('link', 'LinksController', ['only'=>['create','store']]);
Route::get('r/{link}', ['as' => 'link.show', 'uses' => 'LinksController@show'])->where('link', '[0-9]+');
Route::get('contact', 'PagesController@contact');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::resource('posts', 'PostsController');
});


// Route::get('r/{id}', ['as'=>'link.show','uses'=>'LinksController@show'])->where('id', '[0-9]+');

// Route::get('/links/create', 'LinksController@create') ;
// Route::post('/links/create', 'LinksController@store');
// Route::get('r/{id}', 'LinksController@show')->where('id', '[0-9]+');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('/salut/{name}', 'HomeController');
// Route::get('/salut/{name}', 'HomeController@index');

// Route::resource('/welcome', 'HomeController');
//Route::get("a-propos", ['as' => 'about', 'uses' => "PagesController@about"]);
