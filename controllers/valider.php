<?php
	include('models/get_formations.php');
	extract($_POST);
	validerFormation($bdd, $id_u, $id_f,$valide);
	header("location: validerFormations");