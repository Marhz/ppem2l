<?php
session_start();
	function get_form_titre()
	{
		global $bdd;
		$id_u=$_SESSION['id_u'];
		$req = $bdd->prepare("SELECT titre FROM formations INNER JOIN attribution_formation WHERE id_formation.formations = id_f.attribution_formation AND :id_u = id_u.attribution_formation");
		$req->execute(array('id_u'=>$id_u));
		$form_titre = $req->fetchAll();
		return $form_titre;
	}

	function get_form_adresse()
	{
		global $bdd;
		$req = $bdd->prepare("SELECT ville,rue,numero FROM adresses INNER JOIN attribution_adresse WHERE id_formation.formations = id_f.attribution_adresse AND :id_u = id_u.attribution_formation");
		$req->execute(array('id_u'=>$_SESSION['id_u']));
		$form_adresse = $req->fetchAll();
		return $form_adresse;
	}

