<?php

use Core\Session;
use Models\Formation;

$id = $_GET['id'];
$user = auth('user');
if(!$formation = Formation::find($id)){
	Session::setFlash('La formation demandée n\'existe pas', "danger");
	redirect(baseUrl());
}
if($user->formations->contains($id)){
	Session::setFlash('Vous êtes déjà inscrit à cette formation', 'warning');
	redirect($_SERVER['HTTP_REFERER']);
}

if($user->isChef())
{
	$user->formations()->attach($id, ['valide' => 1]);
	$user->update([
		'nbr_jour' => $user->nb_jours - $formation->duree,
		'credit' => $user->credit - $formation->cout
	]);
	$formation->checkIfFull();
}
else
{
	$user->formations()->attach($id);
	$user->update([
		'nbr_jour' => $user->nb_jours - $formation->duree,
		'credit' => $user->credit - $formation->cout
	]);

}

Session::setFlash('Inscription réussie, vous serez notifié par émail lorsque votre responsable aura accepté ou refusé votre demande', 'success');
redirect($_SERVER['HTTP_REFERER']);
