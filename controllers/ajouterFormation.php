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
		unset($_POST['submit']);
		// if($prestataire_id == 0)
		// {

		// }
		// if($adresse_id == 0)
		// {

		// }
		// if($type_id == 0)
		// {

		// }
		$formation = Formation::create($_POST);
	}
	$adresses_tmp = Adresse::all();
	$adresses = [0 => 'remplir l\'adresse manuellement'];
	foreach($adresses_tmp as $adresse)
	{
		$adresses[$adresse->id] = $adresse->format();
	}
	$types = Type::all()->pluck('titre', 'id');
	$prestataires = Prestataire::all()->pluck('raison_sociale', 'id');

	require 'views/ajouterFormation.php';
