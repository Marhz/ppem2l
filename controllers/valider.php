<?php

use Models\User;
use Core\MyMailer;
use Models\Formation;

extract($_POST);
// Core\MyMailer::sendMail('gderemusat@gmail.com','hello','there');
// validerFormation($bdd, $id_u, $id_f,$valide);
$user = User::findOrFail($id_u);
if(auth('user')->employes->contains($user))
{
	$user->formations()->updateExistingPivot($id_f, ['valide' => $valide]);
	$formation = Formation::find($id_f);
	MyMailer::sendMail($user->email, 'M2L - Acceptation de votre demande de formation', '<p>Votre demande de participation à la formation </p>');
}
header("location: validerFormations");