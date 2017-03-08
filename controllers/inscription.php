<?php

use Core\Session;
use Models\Formation;

$id = $_GET['id'];

if(!Formation::find($id)){
	Session::setFlash('La formation demandée n\'existe pas', "danger");
	redirect(baseUrl());
}
if(auth('user')->formations->contains($id)){
	Session::setFlash('Vous êtes déjà inscrit à cette formation', 'warning');
	redirect($_SERVER['HTTP_REFERER']);
}

if(auth('user')->isChef())
{
	auth('user')->formations()->attach($id, ['valide' => 1]);
}
else
{
	auth('user')->formations()->attach($id);
}

Session::setFlash('Inscription réussie, vous serez notifié par émail lorsque votre responsable aura accepté ou refusé votre demande', 'success');
redirect($_SERVER['HTTP_REFERER']);
