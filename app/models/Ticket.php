<?php

class Ticket extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'sujet' => 'required',
		'message' => 'required',
		'priorite' => 'required|in:Urgent,Normal,Critique',
		'produit' => 'required|exists:produits,nomProduit'
	];

	// Don't forget to fill this array
	protected $fillable = ['sujet', 'message', 'priorite'];

	public function utilisateur()
	{
		return $this->belongsTo('Utilisateur');
	}

	public function reponses()
	{
		return $this->hasMany('Reponse');
	}

	public function produit()
	{
		return $this->belongsTo('Produit');
	}

	public function documents()
	{
		return $this->morphMany('Document', 'documentable');
	}

}