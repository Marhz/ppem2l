<?php
	if(isset($_SESSION['connecte']) || (!isset($_POST['email']) || !isset($_POST['mdp'])))
	{
		include('views/login.php');
	}
	else{
		extract($_POST);
		include("models/login.php");
		$user = Models\User::where('email', $email)->where('password', sha1($mdp))->first();
		if($user)
		{
			$_SESSION['connecte']= true;
			$_SESSION['user'] = $user;
			echo "Connexion réussi";
			header('location:welcome');
		}
		else
		{
			echo "Mauvais login <a href='index.php'>Retour</a>";
		}
	}
