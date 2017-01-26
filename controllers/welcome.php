<?php
use Models\User;
if(isset($_SESSION['connecte']))
{
	$user = auth('user');
	//$nbFormation = $user->formations->count();
	$nbFormations = $user->getNbFormations();
}
include_once('views/welcome.php');