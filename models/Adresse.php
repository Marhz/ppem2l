<?php
namespace Models;

class Adresse extends BaseModel 
{
	public $timestamps = false;

	public function format()
	{
		return $this->numero." ".$this->voirie.' '.myUcfirst($this->nom_voirie).', '.$this->code_postal;
	}
	paris
	$formations = Formation::find($id)->with('adresse');

	safe($user->name);

}

