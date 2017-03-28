<?php
use Models\User;
use Core\Session;
use Models\Formation;

$user = auth('user');
$id = isset($_GET['id']) ? $_GET['id'] : 1;
$formations = Formation::myPaginate($id)->each(function ($formation) use ($user) {
	if(is_array($formation))
		return false;
	$formation->canDo = true;
	$formation->debut = affDate($formation->debut);
	if($user->formations->contains($formation->id))
	{
		switch ($formation->users->find(auth('user'))->pivot->valide)
		{
			case 0 : $formation->status = "status-grey"; break;
			case 1 : $formation->status = "status-green"; break;
			default : $formation->status = null;
		}
		$formation->alreadyIn = true;
	}
	else if($formation->cout > $user->credit || $formation->duree > $user->nbr_jour)
	{
		$formation->canDo = false;
		$formation->cantDoBecause = 'Vous n\'avez pas assez de jours ou de crédits restants';
	}
})->toArray();
$formations = json_encode($formations, escapeJson());
if(isAjax()){
	echo $formations;
	die();
}
// if($user->nbr_jour == 0)
// 	Session::setFlash("Vous n'avez plus de jours de formations disponible", "warning");
//$nbFormation = $user->formations->count();
// $formations = Formation::with('prestataire', 'type')->get();
include_once('views/welcome.php');