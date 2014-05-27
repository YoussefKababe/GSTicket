<?php

class Role extends \Eloquent {
	
	protected $fillable = ['role'];

	public function utilisateurs()
	{
		return $this->hasMany('Utilisateur');
	}
}