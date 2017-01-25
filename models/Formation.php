<?php

namespace Models;

class Formation extends BaseModel 
{
	public $timestamp=false;

	//Helpers
	public function getAdresse()
	{
		return $this->adresse->format();
	}

	//Relations
	public function users()
	{
		return $this->belongsToMany(User::class)->withPivot('valide');
	}

	public function adresse()
	{
		return $this->belongsTo(Adresse::class);
	}
}