<?php

class Produit extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public function tickets()
	{
		return $this->hasMany('Ticket');
	}

	public function utilisateurs()
	{
		return $this->belongsToMany('Utilisateur');
	}

}