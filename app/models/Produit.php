<?php

class Produit extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public function utilisateur()
	{
		return $this->belongsTo('Utilisateur');
	}

	public function tickets()
	{
		$this->hasMany('Ticket');
	}

}