<?php

namespace Models;

class Type extends BaseModel {
	public $timestamps = false;
	protected $guarded = [];

	public function formations()
	{
		return $this->hasMany(Formation::class);
	}
}