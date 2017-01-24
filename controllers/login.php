<?php
	if(isset($_SESSION['connecte']) || (!isset($_POST['email']) || !isset($_POST['mdp'])))
	{
		include('views/login.php');
	}
	else{
		include("models/login.php");
		if($donnee = login($bdd))
		{
			$_SESSION['connecte']=true;
			$_SESSION['id']=$donnee['id'];
			$_SESSION['nom']=$donnee['nom'];
			$_SESSION['prenom']=$donnee['prenom'];
			$_SESSION['email']=$donnee['email'];
			$_SESSION['lvl']=$donnee['lvl'];
			$_SESSION['credit'] = $donnee['credit'];
			echo "Connexion réussi";
			header('location:welcome');
		}
		else
		{
			echo "Mauvais login <a href='index.php'>Retour</a>";
		}
	}
