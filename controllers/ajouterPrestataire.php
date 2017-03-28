

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
	if(!isset($id))
	{
		$prestataire = Prestataire::create([
			'raison_sociale' => $raison_sociale, 
			'adresse_id' => $adresse_id
		]);
	}
	else
	{
		$data = [
			'raison_sociale' => $raison_sociale, 
			'adresse_id' => $adresse_id
		];
		$prestataire = Prestataire::find($id);
		$prestataire->update($data);
	}

	Session::setFlash("Prestataire crée avec succès, appuyez <a href='prestataire/{$prestataire->id}'>ici</a> pour accéder à sa page");

}
$adresses = Adresse::all()->map(function($adresse) {
	return ['id' => $adresse->id, 'data' => $adresse->format()];	
})->toJson(escapeJson());

if(isset($_GET['id'])){
	try {
		$prestataire = Prestataire::with('adresse')->findOrFail($_GET['id']);
	} catch (Exception $e) {
		Error::set(404);	
	}
}
else
	$prestataire = new Prestataire;

require 'views/ajouterPrestataire.php';