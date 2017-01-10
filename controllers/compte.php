<?php
	include('models/get_form.php');
	$form_titre=get_form_titre();
	$form_adresse=get_form_adresse();
	foreach ($form_titre as $cle => $form_titres) 
	{
		$form_titre[$cle]['titre'] = htmlspecialchars($form_titres['titre']);
	}
	foreach ($form_adresse as $cle => $form_adresses) 
	{
		$form_adresse[$cle]['ville'] = htmlspecialchars($form_adresses['ville']);
		$form_adresse[$cle]['rue'] = htmlspecialchars($form_adresses['rue']);
	}

	include_once('views/compte.php');