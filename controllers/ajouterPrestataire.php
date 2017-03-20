

<?php
use Core\Error;
use Core\Session;
use Models\Adresse;
use Models\Prestataire;
	
if(!auth('user')->isAdmin())
	Error::set(403);
if(methodIs('post'))
{
	extract($_POST);
	if(!isset($adresse_id))
	{
		$adresse_id = Adresse::create([
			'ville' => $ville,
			'voirie' => $voirie,
			'nom_voirie' => $nom_voirie,
			'numero' => $numero,
			'code_postal' => $cp
		])->id;
	}
	$prestataire = Prestataire::create([
		'raison_sociale' => $raison_sociale, 
		'adresse_id' => $adresse_id
	]);

	Session::setFlash("Prestataire crée avec succès, appuyez <a href='prestataire/{$prestataire->id}'>ici</a> pour accéder à sa page");

}
$adresses = Adresse::all()->map(function($adresse) {
	return ['id' => $adresse->id, 'data' => $adresse->format()];	
})->toJson(escapeJson());
require 'views/ajouterPrestataire.php';