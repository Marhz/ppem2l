<?php
	function login($bdd)
	{
		$email=$_POST['email'];
		$mdp=sha1($_POST['mdp']);
		$requete = $bdd->prepare("SELECT * FROM users WHERE email=:email AND password=:mdp");
		$requete->execute(array('email'=>$email,'mdp'=>$mdp));
		return $requete->fetch();
	}