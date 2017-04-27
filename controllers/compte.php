<?php

use Models\User;
use Core\Error;

if(isset($_GET['id'])){
	$user = User::find($_GET['id']);

	if(!$user)
		Error::set(404);	
}
else {
	$user = auth('user');
}


if($user->id == auth('user')->id || auth('user')->isAdmin()) {
	$formations = $user->formations->load('adresse')->each(function($formation) {
		$formation->valide = $formation->pivot->valide;		
	});
}
include('views/compte.php');