<?php
use Models\User;
use Models\Formation;

$user = auth('user');
//$nbFormation = $user->formations->count();
$nbFormations = $user->getNbFormations();
$formations = Formation::with('prestataire')->get();
for($i = 0; $i < sizeof($formations)-1; $i++)
{
	$formations[$i]->side = ($i % 2 == 0) ? 'left' : 'right';
}
include_once('views/welcome.php');