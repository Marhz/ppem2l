<?php

session_start();

function dd($dump)
{
	die(var_dump($dump));
}

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