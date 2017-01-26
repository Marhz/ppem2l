<?php

namespace Models;

class Prestataire extends BaseModel {
	protected $guarded = [];
	public $timestamps = false;

	public function adresse()
	{
		return $this->belongsTo(Adresse::class);
	}
	public function formations()
	{
		return $this->hasMany(Formation::class);
	}
}