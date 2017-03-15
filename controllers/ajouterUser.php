<?php
use Core\Error;
use Core\Session;
use Models\Adresse;
use Models\User;

	if(!auth('user')->isAdmin())
		Error::set(403);
	if(methodIs('post'))
	{
		dd($_POST);
		extract($_POST);
		$mdp = randStr(8);

		$user = User::create([
			'nom' => $nom, 
			'prenom' => $prenom,
			'email' => $email,
			'login' => $email, //Life = null; :'(
			'password' => sha1($mdp),
			'chef_id' => isset($chef_id) ? $chef_id : 0
		]);

		Session::setFlash("Utilisateur {$user->fullName()} créé avec succès, appuyez <a href='user/{$user->id}'>ici</a> pour accéder à sa page");

	}

	$users = User::where('level','>=',1)->pluck('email','id');

	require 'views/ajouterUser.php';