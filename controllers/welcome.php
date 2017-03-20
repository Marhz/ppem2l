<?php
use Models\User;
use Core\Session;
use Models\Formation;

$user = auth('user');
// if($user->nbr_jour == 0)
// 	Session::setFlash("Vous n'avez plus de jours de formations disponible", "warning");
//$nbFormation = $user->formations->count();
$nbFormations = $user->getNbFormations();
$formations = Formation::with('prestataire', 'type')->get();
include_once('views/welcome.php');