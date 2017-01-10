<?php
session_start();
	function get_user_formations_history()
	{
		global $bdd;
		$id_u=$_SESSION['id_u'];
		$req = $bdd->prepare("SELECT distinct(id_formation),numero, titre, rue, ville, cout, duree, valide FROM formations f INNER JOIN attribution_formation attrf ON f.id_formation IN (SELECT id_f from attribution_formation where id_u = :id_u) INNER JOIN adresses adr ON adr.id_adresse = (SELECT id_adresse FROM attribution_adresse attra WHERE f.id_formation = attra.id_formation)");
		$req->execute(array('id_u'=>$id_u));
		return  $req->fetchAll();
	}

