<?php

namespace Models;

use Core\MyMailer;

class Formation extends BaseModel 
{
	public $timestamp=false;
	protected $guarded = [];
	protected $perPage = 6;
	//Helpers
	public function getAdresse()
	{
		return $this->adresse->format();
	}

	public static function myPaginate($page = 1)
    {
        $perPage = (new static)->perPage;
        $items = static::with('type')
        	->offset(($perPage*($page-1)))
        	->limit(($perPage*$page) - ($perPage*($page-1)))
        	->orderBy('debut')->get();
        $items->push(['current' =>(int) $page, 'lastPage' => ceil((static::count() / $perPage))]);
        return $items;
    }

    public function checkIfFull()
    {
    	if($this->isFull())
    	{
    		$users = $this->users()->wherePivot('valide', 0)->get()->each(function ($user) {
    			MyMailer::sendMail($user->email, 'M2L - Formations', $this->title);
    			$user->formations()->updateExistingPivot($this->id, ['valide' => 2]);
    		});
    	}
    }

    public function checkIfFullBefore()
    {
    	if($this->isFull())
    	{
    		$users = $this->users()->wherePivot('valide', 2)->get()->each(function ($user) {
    			MyMailer::sendMail($user->email, 'M2L - Formations', "YA DLA PLACE OMG");
    			$user->formations()->updateExistingPivot($this->id, ['valide' => 0]);
    		});    		
    	}
    }

   	public function isFull()
   	{
   		return $this->users()->wherePivot('valide', 1)->count() == $this->nb_places;
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