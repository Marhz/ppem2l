<?php
	include('models/get_formations.php');
	$formations=get_user_formations_history();
	foreach ($formations as $key => $value) 
	{
		$formations[$key]['titre'] = htmlspecialchars($formations[$key]['titre']);
		// $formations[$key]['valide'] = $formations[$key]['valide'] == 1 ? "valide" : null;
	}

	include_once('views/compte.php');