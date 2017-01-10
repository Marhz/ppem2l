<?php
	session_start();
	if(isset($_POST['email']) && isset($_POST['mdp']))
	{ 
		$email=$_POST['email'];
		$mdp=sha1($_POST['mdp']);
		$requete = $bdd->prepare("SELECT * FROM users WHERE email=:email AND password=:mdp");
		$requete->execute(array('email'=>$email,'mdp'=>$mdp));
		if($donnee = $requete->fetch())
		{
			$_SESSION['connecte']=true;
			$_SESSION['id_u']=$donnee['id_u'];
			$_SESSION['nom']=$donnee['nom'];
			$_SESSION['prenom']=$donnee['prenom'];
			$_SESSION['email']=$donnee['email'];
			$_SESSION['lvl']=$donnee['lvl'];
			echo "Connexion réussi";
			header('location:welcome');
		}
		else
		{
			echo "Mauvais login <a href='index.php'>Retour</a>";
		}
	}
