<?php
use Models\User;
if(isset($_SESSION['connecte']))
{
	$user = User::find($_SESSION['id']);
	//$nbFormation = $user->formations->count();
	$nbFormations = $user->getNbFormations();
	include_once('views/welcome.php');
}
else
{
	include('views/login.php');
}