<?php

function dd($dump)
{
	die(var_dump($dump));
}

function auth($key)
{
	return $_SESSION[$key];
}