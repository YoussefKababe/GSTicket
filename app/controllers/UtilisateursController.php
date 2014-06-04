<?php

class UtilisateursController extends \BaseController {

	/**
	 * Display a listing of utilisateurs
	 *
	 * @return Response
	 */
	public function index()
	{
		$utilisateurs = Utilisateur::all();

		return View::make('utilisateurs.index', compact('utilisateurs'));
	}

	/**
	 * Show the form for creating a new utilisateur
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('utilisateurs.create');
	}

	/**
	 * Store a newly created utilisateur in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Utilisateur::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user = new Utilisateur;
		$user->fill(Input::except('motDePasse', 'motDePasse_confirmation'));
		$user->motDePasse = Hash::make(Input::get('motDePasse'));
		$user->save();

		return Redirect::route('users.index');
	}

	/**
	 * Display the specified utilisateur.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$utilisateur = Utilisateur::findOrFail($id);

		return View::make('utilisateurs.show', compact('utilisateur'));
	}

	/**
	 * Show the form for editing the specified utilisateur.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$utilisateur = Utilisateur::find($id);

		return View::make('utilisateurs.edit', compact('utilisateur'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$utilisateur = Utilisateur::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Utilisateur::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$utilisateur->update($data);

		return Redirect::route('utilisateurs.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Utilisateur::destroy($id);

		return Redirect::route('utilisateurs.index');
	}

}