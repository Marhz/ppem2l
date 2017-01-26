<?php

require "vendor/autoload.php";
require "core/start.php";

use Core\Error;
use Carbon\Carbon;
	require "models/connexion.php";
	// dd($index);
	// dd($_SESSION);
	setLocale(LC_TIME, 'fr_FR.utf8', 'fra');
	define("BASE_URL",$_SERVER['REQUEST_URI']);
	if(!isset($_GET['p']) || $_GET['p'] == "") 
	{
		if(isset($_SESSION['connecte']))
		{
			$_GET['p'] = "welcome";
		}
		else
		{
			$_GET['p'] = "login";
		}
	}
	else
	{
		if(!file_exists("controllers/".$_GET['p'].".php"))
		{
			Error::set(404);
		}
	}
	if(!isset($_SESSION) || empty($_SESSION))
		$_GET['p'] = "login";	
	ob_start();
		include "controllers/".$_GET['p'].".php";
		$content = ob_get_contents();
	ob_end_clean();
	require "layout.php";
	dd(logger());