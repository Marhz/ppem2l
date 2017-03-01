<?php
use Core\Error;
use Models\Formation;

if(!isset($_GET['id'])) Error::set(404);

$formation = Formation::find($_GET["id"]);

	// $formations = $bdd->query('select * from formations');
	// $formations = $formations->fetchAll();
include_once('views/formations.php');