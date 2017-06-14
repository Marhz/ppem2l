<?php

use Models\Type;
use Core\Session;
use Carbon\Carbon;
use Core\Validator;
use Models\Adresse;
use Models\Formation;
use Models\Prestataire;

if(!auth('user')->isAdmin())
	Error::set(403);
if(methodIs('post'))
{
	extract($_POST);
	$image = null; 
	if(!isset($prestataire_id))
	{
		if(isset($presta_ville))
		{
			$prestataire_adresse_id = Adresse::create([
				'ville' => $presta_ville,
				'voirie' => $presta_voirie,
				'nom_voirie' => $presta_nom_voirie,
				'numero' => $presta_numero,
				'code_postal' => $presta_cp
			])->id;
		}
		$prestataire_id = Prestataire::create([
			'raison_sociale' => $raison_sociale,
			'adresse_id' => $prestataire_adresse_id
		])->id;
	}
	if(isset($type_titre))
	{
		$type_id = Type::create(['titre' => $type_titre])->id;
	}
	if(isset($ville))
	{
		$adresse_id = Adresse::create([
			'ville' => $ville,
			'voirie' => $voirie,
			'nom_voirie' => $nom_voirie,
			'numero' => $numero,
			'code_postal' => $cp
		])->id;
	}
	if($_FILES['image']['size'] > 0)
	{
		if(Validator::fileImage($_FILES['image']))
		{
			$image = uploadImage($_FILES['image']);
		}
		else
		{
			redirectBack();
		}
	}

	if(!isset($id))
	{
		$formation = Formation::create([
			'titre' => $titre,
			'description' => $description,
			'debut' => $debut,
			'duree' => $duree,
			'cout' => $cout,
			'nb_places' => $nb_places,
			'type_id' => $type_id,
			'adresse_id' => $adresse_id,
			'prestataire_id' => $prestataire_id,
			'image' => $image
		]);
	}
	else
	{
		$data = [
			'titre' => $titre,
			'description' => $description,
			'debut' => $debut,
			'duree' => $duree,
			'cout' => $cout,
			'nb_places' => $nb_places,
			'type_id' => $type_id,
			'adresse_id' => $adresse_id,
			'prestataire_id' => $prestataire_id,
		];
		$formation = Formation::find($id);
		$oldImage = $formation->image;
		if(($oldImage != $image) && $image !== null)
			$data['image'] = $image;
		$formation->update($data);
	}
	Session::setFlash('La formation "'.$formation->titre.'" a été '.(!isset($id) ? 'crée' : 'changée').' avec succès');
	redirect(baseUrl()."admin#formations");
}
$adresses = Adresse::all()->map(function($adresse) {
	return ['id' => $adresse->id, 'data' => $adresse->format()];	
})->toJson(escapeJson());
$types = Type::all(['id', 'titre AS data'])->toJson(escapeJson());
$prestataires = Prestataire::all(['id', 'raison_sociale AS data'])->toJson(escapeJson());
if(isset($_GET['id'])){
	try {
		$formation = Formation::with('adresse','type','prestataire')->findOrFail($_GET['id']);
	} catch (Exception $e) {
		Error::set(404);	
	}
}
else
	$formation = new Formation;

require 'views/ajouterFormation.php';