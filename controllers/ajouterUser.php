<?php

use Core\Error;
use Models\User;
use Core\Session;
use Core\MyMailer;
use Models\Adresse;

if(!auth('user')->isAdmin())
	Error::set(403);
if(methodIs('post'))
{
	extract($_POST);

	$data = [
		'nom' => $nom, 
		'prenom' => $prenom,
		'email' => $email,
		'login' => $email,
	];
	
	if(!isset($id)) 
	{
		$mdp = randStr(8);
		$data['password'] = sha1($mdp);
	}

	if(isset($chef))
	{
		$data['level'] = 1;
		$data['chef_id'] = null;
	}

	else
	{
		if(isset($chef_id))
		{
			$data['chef_id'] = $chef_id;
		}
	}
	if(isset($id))
	{
		$data['edit'] = true;
	}

	if(!validateUser($data))
		redirect(baseUrl()."ajouterUser"); //validation des champs et retour erreur;

	if(!isset($id))
	{
		$user = User::create($data);
	}
	else
	{
		$user = User::find($id);
		$user->update($data);
	}
	if(!isset($id))
	{
		MyMailer::sendMail($user->email,"M2L - Création de votre comptre M2L maison des ligues","Bonjour, <br/><br/> Votre compte sur l'intranet de la maison des ligues a été créer. <br/> Login : {$user->email} <br/> Mot de passe : {$mdp}");
	}
	if(isset($chef))
	{
		if(!empty($employes))
		{
			User::whereIn('id', $employes)->update(['chef_id' => $user->id]);
		}
	}
	Session::setFlash("Utilisateur {$user->fullName()} créé avec succès, appuyez <a href='user/{$user->id}'>ici</a> pour accéder à sa page");

}

$chiefs = User::where('level','>=',1)->get();
$employes = User::where('level',0)->whereNull('chef_id')->get();
$errors = Session::getValidationErrors();
if(isset($_GET['id'])){
	try {
		$user = User::with('employes')->findOrFail($_GET['id']);
	} catch (Exception $e) {
		Error::set(404);	
	}
}
else
	$user = new User;

require 'views/ajouterUser.php';