<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Auth::attempt(Input::only('nomUtilisateur', 'password')))
		{
	    return Redirect::intended()->withInfo('Bienvenue ' . Auth::user()->nomUtilisateur . '!');
		}

		return Redirect::back()->withInput()->withError('Email ou mot de passe invalide!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		return Redirect::action('HomeController@index');
	}

}