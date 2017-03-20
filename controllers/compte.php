<?php

use Models\User;

include('models/get_formations.php');
$user = auth('user');
$formations = $user->formations->load('adresse')->each(function($formation) {
	$formation->valide = $formation->pivot->valide;		
});
$page="formation";
include('views/compte.php');