<?php
try{
	$db = new PDO('mysql:host=localhost;dbname=scrollinfini', 'root', '1234');
}
catch(PDOException $e)
{
	echo "erreur de connexion";
	die();
}
