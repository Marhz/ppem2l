<?php

use Models\User;
use Models\Formation;
use Models\Prestataire;

$users = User::all();
$formations = Formation::all();
$prestataires = Prestataire::all();

$page = "admin";
include("views/admin.php");