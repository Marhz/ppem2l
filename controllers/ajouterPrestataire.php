

<?php
use Core\Session;
use Models\Adresse;
use Models\Prestataire;
	
	if(auth('user')->level < 2)
		Core\Error::set(503);
	if(methodIs('post'))
	{
		extract($_POST);
		if($adresse_id == 0)
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
	$adresses_tmp = Adresse::all();
	$adresses = [0 => 'remplir l\'adresse manuellement'];
	foreach($adresses_tmp as $adresse)
	{
		$adresses[$adresse->id] = $adresse->format();
	}
	// $adresses_tmp = $adresses->toArray();
	// array_map(function($adresse) use ($adresses) {
	// 	$adresses_tmp[$adresse['id']] = $adresses->get($adresse['id'])->format();
	// },$adresses_tmp);
	require 'views/ajouterPrestataire.php';