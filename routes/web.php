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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// rota autenticada de toda agenda
Route::group(['middleware' => ['auth'], 'prefix' => 'agenda'],  function () {
    Route::get('/',         'EventoController@index'    )->name('agenda');
    Route::post('/search',   'EventoController@search'    )->name('search');
    Route::get('/create',   'EventoController@create'   )->name('create');
    Route::post('/store',   'EventoController@store'    )->name('store');
    Route::get('/edit/{id}','EventoController@edit'     )->name('edit');
    Route::put('/{id}',     'EventoController@update'   )->name('update');
    Route::get('/{id}',     'EventoController@destroy'  )->name('destroy');
});
