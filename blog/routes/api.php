<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvarticleer within a group which
| is assigned the "api" marticledleware group. Enjoy building your API!
|
*/

Route::get('articles', 'ArticleController@index');
Route::get('articles/{article}', 'ArticleController@show');
Route::post('articles', 'ArticleController@store');
Route::put('articles/{article}', 'ArticleController@update');
Route::delete('articles/{article}', 'ArticleController@delete');

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('articles', 'ArticleController@index');
Route::group(['middleware' => ['jwt.verify']], function () {
  Route::get('user', 'UserController@getAuthenticatedUser');
  Route::get('articles/{article}', 'ArticleController@show');
  Route::post('articles', 'ArticleController@store');
  Route::put('articles/{article}', 'ArticleController@update');
  Route::delete('articles/{article}', 'ArticleController@delete');
});
