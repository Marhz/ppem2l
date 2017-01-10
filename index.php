<?php
	require "models/connexion.php";

	define("BASE_URL",$_SERVER['REQUEST_URI']);
	echo BASE_URL;
	die();

	if(!isset($_GET['p']) || $_GET['p'] == "") 
	{
		$_GET['p'] = "welcome";
	}
	else
	{
		if(!file_exists(BASE_URL."www/controllers/".$_GET['p'].".php"))
		{
			$_GET['p']="404";
			require BASE_URL."www/controllers/404.php";
			die();
		}
	}
	ob_start();
		include BASE_URL."www/controllers/".$_GET['p'].".php";
		$content = ob_get_contents();
	ob_end_clean();

	require "layout.php";