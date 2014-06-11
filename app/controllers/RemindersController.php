<?php

class RemindersController extends Controller {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return View::make('password.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		$user = Utilisateur::where('nomUtilisateur', '=', Input::get('nomUtilisateur'))->first();
		$email = $user ? $user->email : '';

		$response = Password::remind(['email' => $email], function($message){
			$message->subject('Rénitialisation de mot de passe'); 
		});

		switch ($response)
		{
			case Password::INVALID_USER:
				return Redirect::back()->withInput()->with('error', Lang::get($response));

			case Password::REMINDER_SENT:
				return Redirect::back()->withInput()->with('status', Lang::get($response));
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		$email = DB::table('password_reminders')->where('token', $token)->pluck('email');

		$user = Utilisateur::where('email', $email)->first();

		return View::make('password.reset')->with(['token' => $token, 'nomUtilisateur' => $user->nomUtilisateur]);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'nomUtilisateur', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->motDePasse = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));

			case Password::PASSWORD_RESET:
				return Redirect::route('sessions.login')->withInput()->withInfo('Votre mot de passe a été enregistré avec succes, vous pouvez maintenant vous authentifier.');
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getSetpassword($token = null)
	{
		if (is_null($token)) App::abort(404);

		$email = DB::table('password_reminders')->where('token', $token)->pluck('email');

		$user = Utilisateur::where('email', $email)->first();

		return View::make('password.set')->with(['token' => $token, 'nomUtilisateur' => $user->nomUtilisateur]);
	}
}
