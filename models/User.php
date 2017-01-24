<?php

namespace Models;

class User extends BaseModel 
{
	public $timestamps = false;

	//Helpers
	public function isAdmin()
	{
		return $this->level == 1;
	}

	public function fullName()
	{
		return $this->nom." ".$this->prenom;
	}

	public function hasEnoughCredit($formation)
	{
		return $this->credit >= $formation->cout;
	}

	//Relation
	public function formations()
	{
		return $this->belongsToMany(Formation::class);
	}

	public function adresse()
	{
		return $this->hasOne(Adresse::class);
	}

	public function chef()
	{
		return $this->belongsTo(User::class, 'chef_id');
	}

	public function employes()
	{
		return $this->hasMany(User::class, 'chef_id');
	}
}