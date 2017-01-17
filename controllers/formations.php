<?php
include('models/get_formations.php');

$formations = getFullFormations();


	// $formations = $bdd->query('select * from formations');
	// $formations = $formations->fetchAll();
include_once('views/formations.php');