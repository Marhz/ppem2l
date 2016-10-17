<?php
function get_billets($offset, $limit)
{
	global $bdd;
	$offset=(int) $offset;
	$limit=(int) $limit;

	$req = $bdd->prepare("SELECT id, titre, contenu FROM article ORDER BY id_a DESC LIMIT :offset, :limit");
	$req->bindParam(":offset",$offset, PDO::PARAM_INT);
	$req->bindParam(":limit",$limit, PDO::PARAM_INT);
	$req->execute();
	$billets = $req->fetchAll();

	return $billets;
}