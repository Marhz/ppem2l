<?php
namespace Models;

class Adresse extends BaseModel 
{
	public $timestamps = false;
	protected $guarded = [];
	
	public function format()
	{
		return $this->numero." ".$this->voirie.' '.myUcfirst($this->nom_voirie).', '.$this->code_postal.', '.$this->ville;
	}
}

