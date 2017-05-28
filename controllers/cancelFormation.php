<?php

use Models\User;
use Models\users;
use Core\Session;
use Core\MyMailer;
use Models\Formation;

$id = $_GET['id'];
$formation = Formation::find($id);
if(!$formation->users->contains(auth('user')->id)){
	Session::setFlash("Vous n'ête pas inscrit à cette formation", "warning");
	redirectBack();
}
if(auth('user')->formations()->find($id)->pivot->valide == 1){
	$users = $formation->registerBackUsers();
	MyMailer::sendMail($users->pluck('email')->toArray(), "M2L - Formations", "Une place s'est libérée dans la formation {$formation->titre}, vous y avez été automatiquement réinscrit si vos crédits et jours restant le permetent et êtez en attende d'une validation par votre chef");
	auth('user')->formations()->detach($id);
	auth('user')->updateCurrencies($formation->cout, $formation->duree);
	Session::setFlash("Désinscription réussie!");
	redirectBack();
}