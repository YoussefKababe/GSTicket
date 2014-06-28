<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Utilisateur extends \Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'utilisateurs';

	// Add your validation rules here
	public static $rules = [
		'nom' => 'between:3,20|alpha|required',
		'prenom' => 'between:3,20|alpha|required',
		'email' => 'email|required|unique:utilisateurs',
		'nomUtilisateur' => 'between:3,20|alpha_dash|required|unique:utilisateurs',
		'motDePasse' => 'sometimes|between:6,18|alpha_dash|alpha_num|confirmed|required',
		'motDePasse_confirmation' => 'sometimes|required'
	];

	// Don't forget to fill this array
	protected $fillable = ['nom', 'prenom', 'email', 'nomUtilisateur', 'role_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('motDePasse');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->motDePasse;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function role()
	{
		return $this->belongsTo('Role');
	}

	public function tickets()
	{
		return $this->hasMany('Ticket');
	}

	public function reponses()
	{
		return $this->hasMany('Reponse');
	}

	public function produits()
	{
		return $this->hasMany('Produit');
	}

	public function notifications()
	{
		return $this->belongsToMany('Notification');
	}

}