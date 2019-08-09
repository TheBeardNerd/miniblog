<?php
use App\Http\Controllers\CommentController;

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
Route::get('/home', 'HomeController@index');

/*
    Post Routes
**/
Route::resource('posts', 'PostController');
Route::get('/', 'PostController@index');

/*
    Comment Routes
**/
Route::resource('comments', 'CommentController')->middleware('auth');
Route::post('/posts/{post}/comments', 'CommentController@store')->middleware('auth');
