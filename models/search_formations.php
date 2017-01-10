<?php
	function search_formations($search)
	{
		global $bdd;
		
		$req = $bdd->prepare('SELECT * FROM formations where titre LIKE :search OR duree LIKE :search');
		$search = "%{$search}%";
		$req->bindParam(':search',$search, PDO::PARAM_STR);
		$req->execute();
		$formations = $req->fetchAll();

		return $formations;
	}

/*if(isset($_POST['submit']))
{
	$search = $_POST['search'];
	$search = explode($search, ' ');
	$ndsearch = count($search);
	$requete = 'Select * from formation where';
	for($i=0; i < $ndsearch; i++)
	{
		$requete.= '(titre like "%{$search[$i]}%" OR date ={$search[$i]} OR Lieu like "%{$search[$i]}%" OR duree={$search[$i]})';
		if($i < ($search -1))
		{
			$search = ' OR ';
		}
	}
	$res = $bdd->query($requete);
}*/


