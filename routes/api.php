<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return $request->user();
    });

Route::post('register', 'Auth\RegisterController@register');

Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('animes', 'AnimeController@index');
    Route::get('animes/{anime}', 'AnimeController@show');
    Route::put('animes', 'AnimeController@store');
    Route::patch('animes/{anime}', 'AnimeController@update');
    Route::delete('animes/{anime}', 'AnimeController@destroy');

    Route::get('animes/{anime}/composers', 'AnimeController@index');

    Route::get('composers', 'ComposerController@index');
    Route::get('composers/{composer}', 'ComposerController@show');
    Route::post('composers', 'ComposerController@store');
    Route::put('composers/{composer}', 'ComposerController@update');
    Route::delete('composers/{composer}', 'ComposerController@destroy');

    Route::get('songs', 'SongController@index');
    Route::get('songs/{song}', 'SongController@show');
    Route::post('songs', 'SongController@store');
    Route::put('songs/{song}', 'SongController@update');
    Route::delete('songs/{song}', 'SongController@destroy');
});