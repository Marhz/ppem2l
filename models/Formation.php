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
		return $this->belongsToMany(User::class, 'attribution_formations')->withPivot('valide');
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

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
}