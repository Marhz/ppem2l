<?php

use Models\User;
	include('models/get_formations.php');
//	$formations=get_user_formations_history();
	// $user = User::find($_SESSION['id'])->with('formations.adresse');
	// foreach ($user->formations as $key => $value) 
	$user = auth('user');
	$formations = $user->formations->load('adresse');
	// foreach ($formation_user as $key => $value) 
	// {
	// 	$formation_user[$key]['titre'] = htmlspecialchars($formation_user[$key]['titre']);
	// 	// $formations[$key]['valide'] = $formations[$key]['valide'] == 1 ? "valide" : null;
	// }
	$page="formation";
	include('views/compte.php');