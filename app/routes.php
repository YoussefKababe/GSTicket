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

Route::get('/', 'HomeController@index')->before('auth');

Route::resource('users', 'UtilisateursController');

Route::resource('sessions', 'SessionsController');

Route::resource('tickets', 'TicketsController');

Route::get('login', ['as' => 'sessions.login', 'uses' => 'SessionsController@create']);

Route::get('logout', 'SessionsController@destroy');