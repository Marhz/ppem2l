<?php

namespace Models;

use Carbon\Carbon;

class User extends BaseModel
{
	public $timestamps = false;
	protected $hidden = ['password'];
	protected $guarded = [];
	//Helpers
	public function isAdmin()
	{
		return $this->level == 2;
	}
	public function isChef()
	{
		return $this->level >= 1;
	}
	public function fullName()
	{
		return ucwords($this->nom." ".$this->prenom);
	}
	public function getAdresse()
	{
		return Adresse::find($this->id)->format();
	}
	public function getChef()
	{
		return User::find($this->chef_id)->fullName();
	}

	public function hasEnoughCredit($formation)
	{
		return $this->credit >= $formation->cout;
	}
	//Relations
	public function getNbFormations()
	{
		return $this->formations->where('debut','>',Carbon::Now())->count();
	}
	public function formations()
	{
		return $this->belongsToMany(Formation::class, 'attribution_formations')->withPivot('valide');
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