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