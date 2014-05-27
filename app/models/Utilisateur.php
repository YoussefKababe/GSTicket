<?php

class Utilisateur extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public function role()
	{
		return $this->belongsTo('Role');
	}

	public function tickets()
	{
		if ($this->role == "partenaire")
			return $this->hasManyThrough('Ticket', 'Produit');
		else
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

}