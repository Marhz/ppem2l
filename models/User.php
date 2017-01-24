<?php

namespace Models;

use Illuminate\Support\Facades\Auth;

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
}