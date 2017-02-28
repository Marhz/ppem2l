<?php
use Models\User;
use Models\Formation;

$user = auth('user');
//$nbFormation = $user->formations->count();
$nbFormations = $user->getNbFormations();
$formations = Formation::with('prestataire')->get();
include_once('views/welcome.php');