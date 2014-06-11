<?php

use Carbon\Carbon;

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
		$user->fill(Input::all());
		$user->motDePasse = Hash::make(str_random(12));
		if (Auth::guest() && !Input::has('role_id'))
			$user->role_id = '3';
		$user->save();

		$token = str_random(40);

		DB::table('password_reminders')->insert(
	    array('email' => $user->email, 'token' => $token, 'created_at' => Carbon::now())
		);

		$data = [
			'token' => $token,
			'nom' => $user->nom,
			'prenom' => $user->prenom
		];

		Mail::send('emails.welcome', $data, function($message) use ($user)
		{
		  $message->to($user->email, "$user->prenom $user->nom")->subject('Bienvenue!');
		});

		return Redirect::to('/')->withInfo('Succes! Vous allez recevoir un message contenant les informations pour continuer la création de votre compte.');
	}

	/**
	 * Display the specified utilisateur.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($nomUtilisateur)
	{
		$utilisateur = Utilisateur::where('nomUtilisateur', '=', $nomUtilisateur)->first();

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