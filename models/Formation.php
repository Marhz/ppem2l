<?php

namespace Models;

use Illuminate\Support\Facades\Auth;

class Formation extends BaseModel 
{
	public $timestamp=false;


	//Relation
	public function users()
	{
		return $this->belongsToMany(User::class);
	}
}