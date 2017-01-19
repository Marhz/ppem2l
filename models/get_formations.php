<?php
	function get_user_formations_history()
	{
		global $bdd;
		$id_u=$_SESSION['id_u'];
		$req = $bdd->prepare("SELECT id_formation,numero, titre, voirie, nom_voirie, code_postal, ville, cout, duree, valide FROM formations f INNER JOIN attribution_formation attrf ON f.id_formation = attrf.id_f INNER JOIN adresses adr ON f.id_formation in (SELECT id_adresse FROM attribution_adresse attra WHERE f.id_formation = attra.id_f) where attrf.id_u = :id_u");
		$req->execute(array('id_u'=>$id_u));
		return  $req->fetchAll();
	}
	function getFullFormations()
	{
		global $bdd;
		$req = $bdd->prepare("SELECT type_titre, debut, id_formation,numero, f.titre, voirie, nom_voirie, code_postal, ville, cout, duree FROM formations f INNER JOIN adresses adr ON f.id_formation in (SELECT id_adresse FROM attribution_adresse attra WHERE f.id_formation = attra.id_f) INNER JOIN type_formation tf on f.type_id = id_type order by debut");
		$req->execute();
		return  $req->fetchAll();
	}
	function getFormationsToValidate($bdd)
	{
		$logged_id = $_SESSION['id_u'];
		$req = $bdd->query("SELECT * from users where id in (select id_user from chef_user where id_chef = {$logged_id})");
		foreach($tmp = $req->fetchAll() as $key => $value);
		{
			$req2 = $bdd->query("SELECT * from formations where id_formation in (select id_f from attribution_formation where id_u = {$tmp[$key]['id']} and valide = 0)");
			if($tmp2 = $req2->fetchAll())
			{
				$tmp[$key]['formations'] = $tmp2;
			}
			else
			{
				unset($tmp[$key]);
			}
		}
		return $tmp;
	}
	function validerFormation($bdd, $id_u, $id_f, $valide)
	{
		$req = $bdd->prepare("UPDATE attribution_formation set valide = :valide where id_u = :id_u and id_f = :id_f");
		$req->execute([
			'id_u' => $id_u,
			'id_f' => $id_f,
			'valide' => $valide
		]);
	}