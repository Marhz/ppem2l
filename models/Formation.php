<?php

namespace Models;

class Formation extends BaseModel 
{
	public $timestamp=false;
	protected $guarded = [];
	protected $perPage = 12;
	//Helpers
	public function getAdresse()
	{
		return $this->adresse->format();
	}

	public static function myPaginate($page = 1)
    {
        $perPage = (new static)->perPage;
        $items = static::offset(($perPage*($page-1)))->limit(($perPage*$page) - ($perPage*($page-1)))->get();
        $items->page = $page;
        $items->lastPage = ceil((static::count() / $perPage));
        return $items;
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