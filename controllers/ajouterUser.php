<?php

use Core\Error;
use Core\MyMailer;
use Core\Session;
use Models\Adresse;
use Models\User;

	if(!auth('user')->isAdmin())
		Error::set(403);
	if(methodIs('post'))
	{
		extract($_POST);
		if(!validateUser($_POST))
		{
			redirect(baseUrl()."ajouterUser");
		}	
		$mdp = randStr(8);
		$data = [
			'nom' => $nom, 
			'prenom' => $prenom,
			'email' => $email,
			'login' => $email,
			'password' => sha1($mdp),
		];

		if(isset($chef))
		{
			$data['level'] = 1;
		}

		else
		{
			if(isset($chef_id))
			{
				$data['chef_id'] = $chef_id;
			}
		}
		$user = User::create($data);
		MyMailer::sendMail($user->email,"M2L - Création de votre comptre M2L maison des ligues","Bonjour, <br/><br/> Votre compte sur l'intranet de la maison des ligues a été créer. <br/> Login : {$user->email} <br/> Mot de passe : {$mdp}");
		if(isset($chef))
		{
			if(!empty($employes))
			{
				User::whereIn('id', $employes)->update(['chef_id' => $user->id]);
			}
		}
		Session::setFlash("Utilisateur {$user->fullName()} créé avec succès, appuyez <a href='user/{$user->id}'>ici</a> pour accéder à sa page");

	}

	$chiefs = User::where('level','>=',1)->pluck('email','id');
	$employes = User::where('level',0)->whereNull('chef_id')->pluck('email','id');
	$errors = Session::getValidationErrors();
	require 'views/ajouterUser.php';