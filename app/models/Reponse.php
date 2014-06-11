<?php

class Reponse extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'message' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['message'];

	public function utilisateur()
	{
		return $this->belongsTo('Utilisateur');
	}

	public function ticket()
	{
		return $this->belongsTo('Ticket');
	}

	public function documents()
	{
		return $this->morphMany('Document', 'documentable');
	}

}