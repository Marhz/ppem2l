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

	//Relation
	public function users()
	{
		return $this->belongsToMany(User::class);
	}

	public function adresse()
	{
		return $this->belongsTo(Adresse::class);
	}
}