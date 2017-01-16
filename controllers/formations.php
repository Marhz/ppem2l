<?php


				$formations = $bdd->query('select * from formations');
			$formations = $formations->fetchAll();
include_once('views/formations.php');