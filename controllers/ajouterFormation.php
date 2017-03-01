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
	$data = $_POST;
	extract($data);
	if(isset($raison_sociale))
	{
		if(isset($presta_ville))
		{
			$presta_adresse_id = Adresse::create([
				'ville' => $presta_ville,
				'voirie' => $presta_voirie,
				'nom_voirie' => $presta_nom_voirie,
				'numero' => $presta_numero,
				'code_postal' => $presta_cp
			])->id;
		}
		$prestataire_id = Prestataire::create([
			'raison_sociale' => $raison_sociale,
			'adresse_id' => $presta_adresse_id
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
	$formation = Formation::create([
		'titre' => $titre,
		'description' => $description,
		'debut' => $debut,
		'duree' => $duree,
		'cout' => $cout,
		'nb_places' => $nb_places,
		'type_id' => $type_id,
		'adresse_id' => $adresse_id,
		'prestataire_id' => $prestataire_id
	]);
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
