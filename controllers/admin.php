<?php

use Core\Error;
use Models\User;
use Core\Session;
use Models\Formation;
use Models\Prestataire;

if(!auth('user')->isAdmin())
	Error::set(403);
$users = User::all();
$formations = Formation::all();
$prestataires = Prestataire::all();
$csvErrors = Session::getCsvErrors();
$messages = Session::getMessages();

$page = "admin";
include("views/admin.php");