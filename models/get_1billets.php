<?php
function get_1billets($id)
{
	global $bdd;
	$id=(int) $id;

	$req = $bdd->prepare("SELECT id, titre, contenu FROM article ORDER BY id_a WHERE id=:id")
	$req->bindParam(":id",$id, PDO::PARAM_INT);
	$req->execute();
	$billets = $req->fetchAll();

	return $billets;
}