<?php
	include('models/get_formations.php');

	$users = getFormationsToValidate($bdd);
	foreach($users as $key => $value)
	{
		if(!isset($users[$key]['formations']))
		{
			unset($users[$key]);
		}
	}
	include('views/validerFormations.php');