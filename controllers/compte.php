<?php

use Models\User;
use Models\Adresse;
use Models\Formation;

	include('models/get_formations.php');
//	$formations=get_user_formations_history();
	$user = User::find($_SESSION['id']);
	$formation_user = $user->formations->all();
	foreach ($formation_user as $key => $value) 
	{
		$formation_user[$key]['titre'] = htmlspecialchars($formation_user[$key]['titre']);
		// $formations[$key]['valide'] = $formations[$key]['valide'] == 1 ? "valide" : null;
	}
	if(isConnect())
	{
	 	include_once("views/compte.php");
	}