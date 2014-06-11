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

Route::get('/', 'HomeController@index');

Route::resource('users', 'UtilisateursController');

Route::resource('sessions', 'SessionsController');

Route::resource('reponses', 'ReponsesController');

Route::group(['before' => 'auth'], function()
{
	Route::resource('tickets', 'TicketsController');
	Route::get('logout', ['as' => 'sessions.logout', 'uses' => 'SessionsController@destroy']);
});

Route::group(['before' => 'guest'], function()
{
	Route::controller('password', 'RemindersController');
	Route::get('login', ['as' => 'sessions.login', 'uses' => 'SessionsController@create']);
	Route::get('register', ['as' => 'user.register', 'uses' => 'UtilisateursController@create']);
});

Route::get('{nomUtilisateur}', ['as' => 'user.show', 'uses' => 'UtilisateursController@show']);

