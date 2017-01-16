<?php
namespace Core;
class Error {
	public static function set($error)
	{
		http_response_code($error);
		require "views/errors/{$error}.php";
		die();
	}
}