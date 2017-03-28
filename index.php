<?php

require "vendor/autoload.php";

use Core\Error;
use Carbon\Carbon;

setLocale(LC_TIME, 'fr_FR.utf8', 'fra');
define("BASE_URL",$_SERVER['REQUEST_URI']);
if(!isset($_GET['p']) || $_GET['p'] == "") 
{
	$_GET['p'] = "home";
}
else
{
	if(!file_exists("controllers/".$_GET['p'].".php"))
	{
		Error::set(404);
	}
}
if(!isset($_SESSION['user']) && $_GET['p'] != 'passwordReset')
	$_GET['p'] = "login";
else
	$_SESSION['user'] = Models\User::find(auth('user')->id);
ob_start();
	include "controllers/".$_GET['p'].".php";
	$content = ob_get_contents();
ob_end_clean();
require "layout.php";
// dd(logger());
