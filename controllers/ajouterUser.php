<?php

use Core\Error;
use Core\MyMailer;
use Core\Session;
use Illuminate\Database\Eloquent\Collection;
use Models\Adresse;
use Models\User;

if(!auth('user')->isAdmin() && !(auth('user')->id == $_GET['id']))
	Error::set(403);
if(methodIs('post'))
{
	extract($_POST);

	$data = [
		'nom' => $nom, 
		'prenom' => $prenom,
		'email' => $email,
		'login' => $email,
		'id' => isset($id) ? $id : false,
		'level' => 0,
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
	if(!validateUser($data, $data['id']))
		redirect(baseUrl()."ajouterUser/".$data['id']); //validation des champs et retour erreur;

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
			User::where('chef_id', $user->id)->whereNotIn('id', $employes)->update(['chef_id'=> null]);
		}
	}
	if(!isset($chef) && isset($id))
	{
		User::where('chef_id', $id)->update(['chef_id' => null]);
	}
	Session::setFlash("Utilisateur {$user->fullName()} créé avec succès, appuyez <a href='ajouterUser/{$user->id}'>ici</a> pour accéder à sa page");
	redirect(baseUrl().'admin#utilisateurs');

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
else{
	$user = new User;
}

require 'views/ajouterUser.php';