<?php

class Notification extends \Eloquent {
	protected $fillable = [];

	public function utilisateurs() {
		return $this->belongsToMany('Utilisateur');
	}

	public function reponse()
	{
		return $this->belongsTo('Reponse');
	}

	public function ticket()
	{
		return $this->belongsTo('Ticket');
	}
}