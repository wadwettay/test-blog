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
    return view('index');
});

Route::get('demo-data', 'DemoController');
Route::get('method', function () {
  dd(\App\Models\Article::method(\App\Models\User::findOrFail(1)));
});

//User
Route::post('user/add', 'UserController@store')->name('user.add');
Route::put('user/{user}/profile', 'UserController@update')->name('user.update');
Route::get('user/{user}/edit', 'UserController@edit')->name('user.edit');
Route::get('user/{user}/profile', 'UserController@show')->name('user.show');
Route::get('user/{user}/articles', 'UserController@articles')->name('user.articles');

//Articles
Route::get('article/{article}/users', 'ArticleController@users')->name('article.users');
