<?php
use Models\User;
use Core\Session;
use Models\Formation;

$user = auth('user');
// if($user->nbr_jour == 0)
// 	Session::setFlash("Vous n'avez plus de jours de formations disponible", "warning");
//$nbFormation = $user->formations->count();
$nbFormations = $user->getNbFormations();
$formations = Formation::with('prestataire')->get();
for($i = 0; $i < sizeof($formations); $i++)
{
	$formations[$i]->side = ($i % 2 == 0) ? 'left' : 'right';
}
include_once('views/welcome.php');