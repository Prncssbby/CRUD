<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/show','PersonController@index');

Route::get('/add','PersonController@create');

Route::post('/store','PersonController@store');

Route::get('/edit/{id}','PersonController@edit');

Route::post('/update/{id}','PersonController@update');

Route::get('/destroy/{id}','PersonController@destroy');