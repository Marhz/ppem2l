<?php

namespace Models;

class Comment extends BaseModel {
	protected $guarded = [];

	public function formation()
	{
		return $this->belongsTo(Formation::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}