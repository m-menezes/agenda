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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/help',             'EventoApiController@help')->name('help');
Route::get('/users',             'EventoApiController@users')->name('users');

Route::group(['prefix' => 'agenda'],  function () {
    Route::get('/',             'EventoApiController@index')->name('agenda');
    Route::get('/search',       'EventoApiController@search')->name('search');
    Route::get('/{id}',         'EventoApiController@show')->name('show');
    Route::post('/store',       'EventoApiController@store')->name('store');
    Route::put('/update/{id}',  'EventoApiController@update')->name('update');
    Route::delete('/{id}',      'EventoApiController@destroy')->name('destroy');
});

