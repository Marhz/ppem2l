<?php

namespace Models;

class Formation extends BaseModel 
{
	public $timestamp=false;
	protected $guarded = [];
	
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

	public function prestataire()
	{
		return $this->belongsTo(Prestataire::class);
	}

	public function type()
	{
		return $this->belongsTo(Type::class);
	}
}