<?php

use Models\User;

	include('models/get_formations.php');
//	$formations=get_user_formations_history();
	$user = User::find($_SESSION['id'])->with('formations.adresse');
	foreach ($user->formations as $key => $value) 
	{
		$formations[$key]['titre'] = htmlspecialchars($formations[$key]['titre']);
		// $formations[$key]['valide'] = $formations[$key]['valide'] == 1 ? "valide" : null;
	}
	if(isConnect())
	{
	 	include_once("views/compte.php");
	}