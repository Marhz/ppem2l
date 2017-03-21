<?php

use Core\Session;
use Models\User;

session_start();

function auth($key)
{
	return $_SESSION[$key];
}

function methodIs($method)
{
	return strtolower($_SERVER['REQUEST_METHOD']) == strtolower($method);
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
	return $adresse['adresse']['numero'].' '.$adresse['adresse']['voirie'].' '.$adresse['adresse']['nom_voirie'].', '.$adresse['adresse']['code_postal'];
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
function redirect($url)
{
	header('location: '.$url);
	die();
}

function redirectBack()
{
	//redirect($_SERVER['HTTP_REFERER'] ?: baseUrl());
}
function escapeJson()
{
	return JSON_HEX_QUOT|JSON_HEX_APOS;
}

function baseUrl()
{
	return 'http://'.$_SERVER['SERVER_NAME'].preg_replace('/index.php$/', '', $_SERVER['PHP_SELF']);
}

function validateUser($data)
{
	extract($data);
	$errorArray = [];
	if(!preg_match('/^[a-zA-Z\s]{2,50}$/',$nom))
	{
		$errorArray['nom'] = "Nom invalide."; 
	}
	if(!preg_match('/^[a-zA-Z\s]{2,50}$/',$prenom))
	{
		$errorArray['prenom'] = "Prenom invalide."; 
	}
	if(\Models\User::where('email', $email)->first())
		$errorArray['email'] = "Cet email est déjà utilisé.";
	if(!preg_match('/^[a-zA-Z0-9._-]{1,20}@[a-zA-Z]{3,10}\.[a-z]{2,6}$/',$email))
	{
		$errorArray['email'] = "Mail invalide."; 
	}
	if(!isset($chef_id) && !isset($employes))
	{
		$errorArray[] = "Veuillez choisir un chef ou un/des employé(s)."; 
	}
	if(sizeof($errorArray) > 0)
		Session::setValidationErrors($errorArray);
	return !(sizeof($errorArray) > 0);
}

function validateUserCsv($data)
{
	extract($data);
	$errorArray = [];
	if(!preg_match('/^[a-zA-Z\s]{2,50}$/',$nom))
	{
		$errorArray['nom'] = "Nom invalide."; 
	}
	if(!preg_match('/^[a-zA-Z\s]{2,50}$/',$prenom))
	{
		$errorArray['prenom'] = "Prenom invalide."; 
	}
	if(\Models\User::where('email', $email)->first())
		$errorArray['email'] = "Cet email est déjà utilisé.";
	if(!preg_match('/^[a-zA-Z0-9._-]{1,20}@[a-zA-Z]{3,10}\.[a-z]{2,6}$/',$email))
	{
		$errorArray['email'] = "Mail invalide."; 
	}
	if(sizeof($errorArray) > 0)
		Session::setValidationErrors($errorArray);
	return (sizeof($errorArray) > 0);
}
