<?php

use Carbon\Carbon;

	include('models/search_formations.php');
	include('models/get_formations.php');
	// $formations = search_formations($_POST['search']);
	$formations = getFullFormations();
	foreach($formations as $key => $value)
	{
		$found = false;
		if($found = (levenshtein($_POST['search'], $formations[$key]['titre']) < 3) ||
			strstr(strtolower($formations[$key]['titre']), strtolower($_POST['search']))
		)
		{
			$formations[$key]['titre'] = boldify($formations[$key]['titre']);
		}
		else if($found = (levenshtein($_POST['search'], $formations[$key]['ville']) < 2))
		{
			$formations[$key]['ville'] = boldify($formations[$key]['ville']);
		}
		else if($found = (levenshtein($_POST['search'], $formations[$key]['nom_voirie']) < 2))
		{
			$formations[$key]['nom_voirie'] = boldify($formations[$key]['nom_voirie']);
		}
		else if($found = (levenshtein($_POST['search'], $formations[$key]['code_postal']) < 2))
		{
			$formations[$key]['code_postal'] = boldify($formations[$key]['code_postal']);
		}
		else if($found = ($_POST['search'] == formatDate($formations[$key]['debut'])))
		{
			$formations[$key]['bold_date'] = true;
		}
		if(!$found)
			unset($formations[$key]);
	}
	include_once('views/search.php');