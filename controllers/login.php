<?php
if(isset($_SESSION['connecte']))
{
	redirect(baseUrl());
}
if(isset($_SESSION['connecte']) || (!isset($_POST['email']) || !isset($_POST['mdp'])))
{
	if(isset($_COOKIE['remember']))
	{
		$user = Models\User::where('token', $_COOKIE['remember'])->first();

		if($user)
		{			
			$_SESSION['connecte']= true;
			$_SESSION['user'] = $user;	
			redirect(baseUrl());

		}
		else
		{
			$error = '<div class="alert alert-danger">Votre Cookie de connexion est expiré.</div>';
			include_once('views/login.php');
		}

	}
	include('views/login.php');
}
else
{	
	extract($_POST);
	// include("models/login.php");	
	$user = Models\User::where('email', $email)->where('password', sha1($mdp))->first();
	if($user)
	{			
		$_SESSION['connecte']= true;
		$_SESSION['user'] = $user;
		if(isset($remember))
        {
        	$user->token = sha1(randStr(25));
        	$user->save();
            setcookie('remember',$user->token, time() + 365*24*3600);
        }
		redirect(baseUrl());
	}
	else
	{
		$error = '<div class="alert alert-danger">Votre mot de passe ou nom d\'utilisateur est incorrect.</div>';
		include_once('views/login.php');
		//echo "Mauvais login <a href='index.php'>Retour</a>";
	}
	
}
