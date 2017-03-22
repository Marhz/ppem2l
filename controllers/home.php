<?php
use Models\User;
use Core\Session;
use Models\Formation;

$user = auth('user');
$id = isset($_GET['id']) ? $_GET['id'] : 1;
$formations = Formation::myPaginate($id)->each(function ($formation) use ($user) {
	$formation->canDo = true;
	if($user->formations->contains($formation->id))
	{
		switch ($formation->users->find(auth('user'))->pivot->valide)
		{
			case 0 : $formation->status = "status-grey"; break;
			case 1 : $formation->status = "status-green"; break;
			default : $formation->status = null;
		}
		$formation->canDo = false;
		$formation->cantDoBecause = "Vous êtes déja inscrit à cette formation";
	}
	else if($formation->cout > $user->credit || $formation->duree > $user->nbr_jour)
	{
		$formation->canDo = false;
		$formation->cantDoBecause = 'Vous n\'avez pas assez de jours ou de crédits restants';
	}
});
// if($user->nbr_jour == 0)
// 	Session::setFlash("Vous n'avez plus de jours de formations disponible", "warning");
//$nbFormation = $user->formations->count();
// $formations = Formation::with('prestataire', 'type')->get();
include_once('views/welcome.php');