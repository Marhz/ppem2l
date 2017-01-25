<?php

session_start();

function auth($key)
{
	return $_SESSION[$key];
}

function affDate($date)
{
	return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->formatLocalized('%A %d %B %Y');
}
function formatDate($date)
{
	return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
}

function boldify($text)
{
	return "<b>{$text}</b>";
}

function formatAdresse($adresse)
{
	return $adresse['numero'].' '.$adresse['voirie'].' '.$adresse['nom_voirie'].', '.$adresse['code_postal'];
}

function isConnect()
{
	if(!isset($_SESSION['connecte']))
		{
			header("location:welcome");
		}
		else
		{
			return true;
		}
}
function randStr($size)
{
	$result = '';
	$str = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
	$strsize = strlen($str)-1;
	for($i = 0; $i < $size; $i++)
		$result .= $str[rand(0, $strsize)];
	return $result;
}

function myUcfirst($str)
{
	return ucfirst(strtolower($str));
}

function logger() 
{
	$queries = \Illuminate\Database\Capsule\Manager::getQueryLog();
	$formattedQueries = [];
	foreach( $queries as $query ) :
	    $prep = $query['query'];
	    foreach( $query['bindings'] as $binding ) :
	        $prep = preg_replace("#\?#", $binding, $prep, 1);
	    endforeach;
	    $formattedQueries[] = $prep;
	endforeach;
	return $formattedQueries;
}
