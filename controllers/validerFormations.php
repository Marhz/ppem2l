<?php

use Models\User;

$employes = User::where('chef_id', auth('user')->id)->with(['formations' => function($query){
	$query->with('adresse')->where('valide', 0);
}])->get();
$page="gestion";
include('views/validerFormations.php');