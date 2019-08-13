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

/*
    Authorization Routes
**/
Auth::routes();
Route::get('/home', 'HomeController@index')->middleware('auth');

/*
    Post Routes
**/
Route::resource('posts', 'PostController')->middleware('auth');
Route::get('/', 'PostController@index')->middleware('auth');

/*
    Comment Routes
**/
Route::resource('comments', 'CommentController')->middleware('auth');
Route::post('/posts/{post}/comments', 'CommentController@store')->middleware('auth');

/*
    Profile Routes
**/
Route::get('/profiles/{user}', 'ProfileController@show')->middleware('auth');

/*
    Avatar
**/

Route::post('users/{user}/avatar', 'UserAvatarController@store')->middleware('auth');
