<?php

use Carbon\Carbon;
use Models\Formation;

// if(strlen($_POST['search']) < 2){
// 	echo json_encode('');
// 	die();
// }
$formations = Formation::with('type', 'adresse')
	->where("debut", ">", Carbon::now())
	->orderBy('debut', 'desc')
	->get();
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
if(isset($_POST['ajax'])){
	$formations_tmp = [];
	foreach($formations as $formation)
	{
		$formations_tmp[] = $formation;
	}
	echo json_encode($formations_tmp, escapeJson());
	die();
}
else {
	include('views/search.php');
}