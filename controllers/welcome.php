<?php
use Models\User;
use Models\Formation;

if(isset($_SESSION['connecte']))
{
	$user = auth('user');
	//$nbFormation = $user->formations->count();
	$nbFormations = $user->getNbFormations();
	$formations = Formation::with('prestataire')->paginate(5);
	include_once('views/welcome.php');
}
else
{
	include('views/login.php');
}