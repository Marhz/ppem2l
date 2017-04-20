<?php

namespace Models;

use Core\Error;
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
        if($items->isEmpty())
            Error::set(404);
        $items->push(['current' =>(int) $page, 'lastPage' => ceil((static::count() / $perPage))]);
        return $items;
    }

    public function checkIfFull()
    {
    	if($this->isFull())
    	{
    		$users = $this->users()->wherePivot('valide', 0)->get()->each(function ($user) {
    			MyMailer::sendMail($user->email, 'M2L - Formations', "Votre demande de participation à la formations {$formation->titre} a été refusée automatiquement car celle-ci est complète.<br/>Vous serez informé par mail et automatiquement réinscrit si une place se libère");
    			$user->formations()->updateExistingPivot($this->id, ['valide' => 2]);
    		});
    	}
    }

    public function checkIfFullBefore()
    {
    	if($this->isFull())
    	{
    		$users = $this->users()->wherePivot('valide', 2)->get()->each(function ($user) {
    			MyMailer::sendMail($user->email, 'M2L - Formations', "Une place s'est libérée dans la formation {$this->titre}, vous y avez été automatiquement réinscrit et êtez en attende d'une validation par votre chef");
    			$user->formations()->updateExistingPivot($this->id, ['valide' => 0]);
    		});
    	}
    }

   	public function isFull()
   	{
   		return $this->users()->wherePivot('valide', 1)->count() == $this->nb_places;
   	}

    public function participantsCount()
    {
        return $this->users()->wherePivot('valide', 1)->count();
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