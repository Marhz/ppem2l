<?php
$index = require "vendor/autoload.php";

use Core\Error;
	require "models/connexion.php";
	// dd($index);
	define("BASE_URL",$_SERVER['REQUEST_URI']);
	if(!isset($_GET['p']) || $_GET['p'] == "") 
	{
		$_GET['p'] = "welcome";
	}
	else
	{
		if(!file_exists("controllers/".$_GET['p'].".php"))
		{
			Error::set(404);
		}
	}
	ob_start();
		include "controllers/".$_GET['p'].".php";
		$content = ob_get_contents();
	ob_end_clean();
	require "layout.php";