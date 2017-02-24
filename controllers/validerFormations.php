<?php

use Models\User;
	include('models/get_formations.php');

	$employes = User::where('chef_id', auth('user')->id)->with(['formations' => function($query){
		$query->where('valide', 0);
	}, 'formations.adresse'])->get();

	// dd($employes);
	// $users = getFormationsToValidate($bdd);
	// foreach($employes as $key => $value)
	// {
	// 	if(!isset($users[$key]['formations']))
	// 	{
	// 		unset($users[$key]);
	// 	}
	// }
	$page="gestion";
	include('views/validerFormations.php');