<?php

use Models\Adresse;
use Models\Formation;
use Models\Prestataire;
use Models\Type;
if(!auth('user')->isAdmin())
{
	Error::set(403);
}
if(methodIs('post'))
{
	extract($_POST);
	dd($_POST);
	unset($_POST['submit']);
	if(!$prestataire_id == 0)
	{
		// Prestataire::create
	}
	if($adresse_id == 0)
	{

	}
	if($type_id == 0)
	{

	}
	$formation = Formation::create($_POST);
}
$adresses_tmp = Adresse::all();
foreach($adresses_tmp as $adresse)
{
	$adresses[] = ['id' => $adresse->id, 'data' => $adresse->format()];
}
$adresses = json_encode($adresses, escapeJson());
$types = Type::all(['id', 'titre AS data'])->toJson(escapeJson());
$prestataires = Prestataire::all(['id', 'raison_sociale AS data'])->toJson(escapeJson());

require 'views/ajouterFormation.php';
